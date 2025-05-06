// js/discovery.js
document.addEventListener('DOMContentLoaded', () => {
  // 1) Dati: solo i 3 tool iniziali
  const tools = [
    {
      nome: 'ElevenLabs',
      link: 'https://elevenlabs.io',
      categoria: 'Text-to-Speech',
      prezzo: 'Freemium',
      interesse: '★★★',
      data: '23 Apr 2025',
      descrizione: 'Sintesi vocale ultra-realistica',
      valueAdd: 'Voice cloning di qualità broadcast, perfetto per narrazioni',
      tags: 'Audio, TTS, Voice Cloning, Narration'
    },
    {
      nome: 'HeyGen',
      link: 'https://www.heygen.com',
      categoria: 'Video AI',
      prezzo: 'Freemium',
      interesse: '★★☆',
      data: '23 Apr 2025',
      descrizione: 'Generazione di video con avatar AI',
      valueAdd: 'Crea rapidamente video personalizzati per social o demo',
      tags: 'Video, Avatar, Marketing, Social'
    },
    {
      nome: 'Hugging Face',
      link: 'https://huggingface.co',
      categoria: 'Model Hub',
      prezzo: 'Open-source',
      interesse: '★★☆',
      data: '23 Apr 2025',
      descrizione: 'Repository di modelli ML (NLP, Vision, Audio…)',
      valueAdd: 'Accesso immediato a centinaia di modelli open source',
      tags: 'LLM, Vision, Audio, Community'
    }
  ];

  const tbody      = document.querySelector('#tools-table tbody');
  const inputSearch= document.getElementById('search-name');
  const selectCat  = document.getElementById('filter-category');
  const selectPrice= document.getElementById('filter-price');

  // 2) Popola filtro categorie
  const categories = [...new Set(tools.map(t => t.categoria))].sort();
  categories.forEach(cat => {
    const opt = document.createElement('option');
    opt.value = cat;
    opt.textContent = cat;
    selectCat.appendChild(opt);
  });

  // 3) Render della tabella
  function render(rows) {
    tbody.innerHTML = '';
    rows.forEach(t => {
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td><a href="${t.link}" target="_blank">${t.nome}</a></td>
        <td><a href="${t.link}" target="_blank">${t.link.replace(/^https?:\/\//, '')}</a></td>
        <td>${t.categoria}</td>
        <td>${t.prezzo}</td>
        <td>${t.interesse}</td>
        <td>${t.data}</td>
        <td>${t.descrizione}</td>
        <td>${t.valueAdd}</td>
        <td>${t.tags}</td>
      `;
      tbody.appendChild(tr);
    });
  }

  // 4) Filtri combinati
  function applyFilters() {
    const term  = inputSearch.value.trim().toLowerCase();
    const cat   = selectCat.value;
    const price = selectPrice.value;
    const filtered = tools.filter(t => {
      return (
        (!term  || t.nome.toLowerCase().includes(term)) &&
        (!cat   || t.categoria === cat) &&
        (!price || t.prezzo === price)
      );
    });
    render(filtered);
  }

  // 5) Event listeners
  inputSearch.addEventListener('input', applyFilters);
  selectCat.addEventListener('change', applyFilters);
  selectPrice.addEventListener('change', applyFilters);

  // 6) Ordinamento (clic su intestazioni sortabili)
  document.querySelectorAll('#tools-table th[data-sort]').forEach(th => {
    th.style.cursor = 'pointer';
    th.addEventListener('click', () => {
      const key = th.getAttribute('data-sort');
      const asc = !th.classList.contains('asc');
      tools.sort((a,b) => {
        if (a[key] < b[key]) return asc ? -1 : 1;
        if (a[key] > b[key]) return asc ? 1 : -1;
        return 0;
      });
      document.querySelectorAll('#tools-table th').forEach(h => h.classList.remove('asc','desc'));
      th.classList.add(asc ? 'asc' : 'desc');
      applyFilters();
    });
  });

  // render iniziale
  render(tools);
});
