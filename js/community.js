// js/community.js
document.addEventListener('DOMContentLoaded', () => {
  const apiUrl    = './threads.php';
  const listEl    = document.getElementById('thread-list');
  const searchIn  = document.getElementById('search-input');
  const tagFilter = document.getElementById('tag-filter');
  const postBtn   = document.getElementById('post-thread');
  const inTitle   = document.getElementById('thread-title');
  const inBody    = document.getElementById('thread-body');
  const inTags    = document.getElementById('thread-tags');
  let allThreads  = [];

  async function loadThreads() {
    try {
      const resp = await fetch(apiUrl);
      allThreads = await resp.json();
      populateTagFilter();
      renderThreads();
    } catch (err) {
      listEl.innerHTML = '<p class="text-danger">Errore caricamento.</p>';
      console.error(err);
    }
  }

  function populateTagFilter() {
    const tags = new Set();
    allThreads.forEach(t => (t.tags||[]).forEach(tag => tags.add(tag)));
    tagFilter.innerHTML = '<option value="">--- Tutti i tag ---</option>';
    Array.from(tags).sort().forEach(tag => {
      const o = document.createElement('option');
      o.value = tag; o.textContent = tag;
      tagFilter.appendChild(o);
    });
  }

  function renderThreads() {
    const q = searchIn.value.trim().toLowerCase();
    const tf = tagFilter.value;
    listEl.innerHTML = '';

    allThreads
      .filter(t => {
        const okText = !q || t.title.toLowerCase().includes(q) || t.body.toLowerCase().includes(q);
        const okTag  = !tf || (t.tags||[]).includes(tf);
        return okText && okTag;
      })
      .forEach(t => {
        const card = document.createElement('div');
        card.className = 'card mb-3';
        card.dataset.id = t.id;

        let html = `<div class="card-body position-relative">`;
        if (window.isModerator) {
          html += `
            <button class="btn btn-sm btn-outline-danger position-absolute top-0 end-0 delete-btn">✕</button>
            <button class="btn btn-sm btn-outline-warning position-absolute top-0 end-50 me-2 edit-btn">✎</button>
          `;
        }
        html += `
            <h5 class="card-title">${t.title}</h5>
            <p class="card-text">${t.body}</p>
            <p>${(t.tags||[]).map(tag=>`<span class="badge bg-secondary me-1">${tag}</span>`).join('')}</p>
            <p class="text-muted">da <strong>${t.author}</strong> il ${t.date}</p>
            <button class="btn btn-sm btn-outline-primary like-thread-btn">👍 <span>${t.likes||0}</span></button>
          </div>
        `;

        if (Array.isArray(t.replies) && t.replies.length) {
          html += `<div class="px-3"><h6>Risposte:</h6>`;
          t.replies.forEach((r,ri) => {
            html += `
              <div class="border-start ps-3 mb-2">
                <p>${r.body}</p>
                <small class="text-muted">${r.author}, ${r.date}</small>
                <button class="btn btn-sm btn-outline-primary like-reply-btn" data-idx="${ri}">
                  👍 <span>${r.likes||0}</span>
                </button>
              </div>`;
          });
          html += `</div>`;
        }

        html += `
          <div class="card-body border-top">
            <button class="btn btn-sm btn-outline-secondary reply-btn">Rispondi</button>
            <div class="reply-form d-none mt-2">
              <textarea class="form-control reply-input" rows="2"></textarea>
              <button class="btn btn-sm btn-primary mt-1 submit-reply-btn">Invia</button>
            </div>
          </div>
        `;

        card.innerHTML = html;
        listEl.appendChild(card);
        attachCardListeners(card, t);
      });
  }

  function attachCardListeners(card, thread) {
    const tid = thread.id;

    // DELETE
    const db = card.querySelector('.delete-btn');
    if (db) db.onclick = async () => {
      if (!confirm('Eliminare questo thread?')) return;
      await fetch(apiUrl,{
        method:'POST',headers:{'Content-Type':'application/json'},
        body: JSON.stringify({ action:'deleteThread', threadId: tid })
      });
      loadThreads();
    };

    // EDIT
    const eb = card.querySelector('.edit-btn');
    if (eb) eb.onclick = async () => {
      const newT = prompt('Nuovo titolo', thread.title);
      if (newT===null) return;
      const newB = prompt('Nuovo contenuto', thread.body);
      if (newB===null) return;
      await fetch(apiUrl,{
        method:'POST',headers:{'Content-Type':'application/json'},
        body: JSON.stringify({ action:'editThread', threadId: tid, title:newT, body:newB })
      });
      loadThreads();
    };

    // LIKE THREAD
    card.querySelector('.like-thread-btn').onclick = async () => {
      await fetch(apiUrl,{
        method:'POST',headers:{'Content-Type':'application/json'},
        body: JSON.stringify({ action:'likeThread', threadId: tid })
      });
      loadThreads();
    };

    // REPLY TOGGLE
    const rb = card.querySelector('.reply-btn');
    const rf = card.querySelector('.reply-form');
    rb.onclick = () => rf.classList.toggle('d-none');

    // SUBMIT REPLY
    const srb = card.querySelector('.submit-reply-btn');
    srb.onclick = async () => {
      const ta = card.querySelector('.reply-input');
      const body = ta.value.trim();
      if (!body) return alert('Risposta vuota');
      const now = new Date().toLocaleString('it-IT',{day:'2-digit',month:'2-digit',year:'numeric',hour:'2-digit',minute:'2-digit'});
      await fetch(apiUrl,{
        method:'POST',headers:{'Content-Type':'application/json'},
        body: JSON.stringify({ replyTo:tid, reply:{ author:window.currentUserEmail, date:now, body } })
      });
      ta.value = '';
      rf.classList.add('d-none');
      loadThreads();
    };

    // LIKE REPLY
    card.querySelectorAll('.like-reply-btn').forEach(btn => {
      btn.onclick = async () => {
        const idx = btn.dataset.idx;
        await fetch(apiUrl,{
          method:'POST',headers:{'Content-Type':'application/json'},
          body: JSON.stringify({ action:'likeReply', threadId: tid, replyIndex: idx })
        });
        loadThreads();
      };
    });
  }

  // POST NEW THREAD
  postBtn.onclick = async () => {
    const title = inTitle.value.trim();
    const body  = inBody.value.trim();
    const tags  = inTags.value.split(',').map(t=>t.trim()).filter(Boolean);
    if (!title||!body) return alert('Titolo o contenuto mancanti');
    const now = new Date().toLocaleString('it-IT',{day:'2-digit',month:'2-digit',year:'numeric',hour:'2-digit',minute:'2-digit'});
    await fetch(apiUrl,{
      method:'POST',headers:{'Content-Type':'application/json'},
      body: JSON.stringify({ title, body, author:window.currentUserEmail, date:now, tags })
    });
    inTitle.value = ''; inBody.value = ''; inTags.value = '';
    loadThreads();
  };

  // SEARCH & TAG FILTER
  searchIn.oninput   = renderThreads;
  tagFilter.onchange = renderThreads;

  // INIT
  loadThreads();
});
