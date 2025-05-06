// js/meeting.js
document.addEventListener("DOMContentLoaded", function() {
    const container = document.querySelector(".cards-container");
    if (!container) return;

    const cardHTML = `
      <div class="card social-card mb-4">
        <div class="card-header">
          <img src="images/meeting-logo.png" alt="Meeting Logo" class="platform-logo">
          <h3>First Meeting</h3>
        </div>
        <div class="card-body">
          <p>Ricevi suggerimenti su come impostare un primo meeting perfetto.</p>

          <!-- Email -->
          <label for="email-meeting">Email</label>
          <input type="email" id="email-meeting" class="form-control form-control-sm mb-2" placeholder="Inserisci la tua email" value="">

          <!-- Nome -->
          <label for="nome-meeting">Nome</label>
          <input type="text" id="nome-meeting" class="form-control form-control-sm mb-2" value="Non specificato">

          <!-- Cognome -->
          <label for="cognome-meeting">Cognome</label>
          <input type="text" id="cognome-meeting" class="form-control form-control-sm mb-2" value="Non specificato">

          <!-- Ruolo -->
          <label for="ruolo-meeting">Ruolo</label>
          <select id="ruolo-meeting" class="form-select form-select-sm mb-2">
            <option selected>Non specificato</option>
            <option>CEO</option>
            <option>CMO</option>
            <option>CTO</option>
            <option>Marketing Manager</option>
            <option>Team Leader</option>
            <option>Altro</option>
          </select>
          <input type="text" id="ruolo-meeting-custom" class="form-control form-control-sm mb-2 d-none" placeholder="Inserisci ruolo">

          <!-- Brand -->
          <label for="brand-meeting">Brand</label>
          <input type="text" id="brand-meeting" class="form-control form-control-sm mb-2" value="Non specificato">

          <!-- Industry -->
          <label for="industry-meeting">Industry</label>
          <select id="industry-meeting" class="form-select form-select-sm mb-2">
            <option selected>Non specificato</option>
            <option>Tecnologia</option>
            <option>Finanza</option>
            <option>Sanità</option>
            <option>Retail</option>
            <option>Manifatturiero</option>
            <option>Media</option>
            <option>Energy</option>
            <option>Consulenza</option>
            <option>Altro</option>
          </select>
          <input type="text" id="industry-meeting-custom" class="form-control form-control-sm mb-2 d-none" placeholder="Inserisci industry">

          <!-- Obiettivo -->
          <label for="obiettivo-meeting">Obiettivo del meeting</label>
          <select id="obiettivo-meeting" class="form-select form-select-sm mb-2">
            <option selected>Non specificato</option>
            <option>Qualificare lead</option>
            <option>Demo prodotto</option>
            <option>Partnership</option>
            <option>Proposta commerciale</option>
            <option>Allineamento interno</option>
            <option>Altro</option>
          </select>
          <input type="text" id="obiettivo-meeting-custom" class="form-control form-control-sm mb-2 d-none" placeholder="Inserisci obiettivo">

          <!-- Sfide -->
          <label for="sfide-meeting">Sfide attuali del brand</label>
          <textarea id="sfide-meeting" class="form-control form-control-sm mb-2">Non specificato</textarea>

          <!-- Concorrenti -->
          <label for="concorrenti-meeting">Concorrenti principali</label>
          <textarea id="concorrenti-meeting" class="form-control form-control-sm mb-2">Non specificato</textarea>

          <!-- Interesse -->
          <label for="interesse-meeting">Interesse dichiarato</label>
          <select id="interesse-meeting" class="form-select form-select-sm mb-3">
            <option selected>Non specificato</option>
            <option>Budget allocato</option>
            <option>Interesse tecnologico</option>
            <option>Possibile partnership</option>
            <option>Referral</option>
            <option>Altro</option>
          </select>
          <input type="text" id="interesse-meeting-custom" class="form-control form-control-sm mb-3 d-none" placeholder="Inserisci interesse">

          <button class="btn btn-primary btn-sm w-100" onclick="sendDataToWebhook('meeting')">
            Avvia Agente
          </button>

          <div class="status mt-3" id="status-meeting"></div>
        </div>
      </div>
    `;
    container.insertAdjacentHTML("beforeend", cardHTML);

    // Pre‐compilo la mail
    if (window.userEmail) {
      const inp = document.getElementById("email-meeting");
      if (inp) inp.value = window.userEmail;
    }

    // Mostra/nascondi campi custom
    const toggles = [
      { sel: "ruolo-meeting", custom: "ruolo-meeting-custom" },
      { sel: "industry-meeting", custom: "industry-meeting-custom" },
      { sel: "obiettivo-meeting", custom: "obiettivo-meeting-custom" },
      { sel: "interesse-meeting", custom: "interesse-meeting-custom" }
    ];
    toggles.forEach(({ sel, custom }) => {
      const select = document.getElementById(sel);
      const input  = document.getElementById(custom);
      select.addEventListener("change", () => {
        if (select.value === "Altro") input.classList.remove("d-none");
        else {
          input.classList.add("d-none");
          input.value = ""; // reset
        }
      });
    });
});
