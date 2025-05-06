document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("promptForm");
  const latestContainer = document.getElementById("latest-prompt");
  const categoriesContainer = document.getElementById("prompt-categories");

  const latestPrompt = {
    title: "Infografica per Generatore ChatGPT",
    category: "Infografiche",
    desc: "Prompt per generare infografiche con AI, secondo le linee guida Intarget.",
    text: "SEZIONE VARIABILE... [vedi sopra]",
    author: "Stefano Macis",
    role: "Adtech Operations Lead",
    date: "10/04/2025"
  };

  const archivePrompts = [latestPrompt];

  function renderLatestPrompt(p) {
    latestContainer.innerHTML = `
      <div class="card">
        <h3>${p.title}</h3>
        <p><strong>Categoria:</strong> ${p.category}</p>
        <p><strong>Descrizione:</strong> ${p.desc}</p>
        <pre>${p.text}</pre>
        <p><strong>Autore:</strong> ${p.author} (${p.role})</p>
        <p><strong>Data:</strong> ${p.date}</p>
        <button class="copy-btn">📋 Copia Prompt</button>
      </div>`;
  }

  function renderCategories(prompts) {
    const categories = {};
    prompts.forEach(p => {
      if (!categories[p.category]) categories[p.category] = [];
      categories[p.category].push(p);
    });

    categoriesContainer.innerHTML = Object.entries(categories).map(([cat, prompts]) => `
      <div class="category-section">
        <div class="category-title">${cat}</div>
        <div class="category-prompts">
          ${prompts.map(p => `<p><strong>${p.title}</strong> – ${p.author} (${p.role})</p>`).join("")}
        </div>
      </div>`).join("");
  }

  renderLatestPrompt(latestPrompt);
  renderCategories(archivePrompts);

  latestContainer.addEventListener("click", function (e) {
    if (e.target.classList.contains("copy-btn")) {
      const text = latestContainer.querySelector("pre").textContent;
      navigator.clipboard.writeText(text).then(() => {
        e.target.textContent = "✅ Copiato!";
        setTimeout(() => e.target.textContent = "📋 Copia Prompt", 2000);
      });
    }
  });

  form.addEventListener("submit", function (e) {
    e.preventDefault();
    const data = {
      brief: document.querySelector(".brief-box")?.textContent || "",
      text: document.getElementById("prompt-text").value,
      title: document.getElementById("prompt-title").value,
      category: document.getElementById("prompt-category").value,
      author: document.getElementById("prompt-author").value,
      role: document.getElementById("prompt-role").value
    };

    fetch("https://hook.eu2.make.com/l3fwxhd5mh2fshossa429tdqbggvugy4", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(data)
    })
    .then(res => {
      if (!res.ok) throw new Error("Errore nell'invio");
      alert("Prompt inviato con successo! Sarà visibile dopo revisione.");
      form.reset();
    })
    .catch(err => alert("Errore: " + err.message));
  });
});

