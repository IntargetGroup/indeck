document.addEventListener("DOMContentLoaded", function() {
    const container = document.querySelector(".cards-container");
    if (!container) return;

    const cardHTML = `
        <div class="card social-card mb-4">
            <div class="card-header">
                <img src="images/youtube-logo.png" alt="YouTube Logo" class="platform-logo">
                <h3>YouTube Search</h3>
            </div>
            <div class="card-body">
                <p>Analizza i 10 video più rilevanti su YouTube.</p>
                <label for="email-youtube">Email</label>
                <input type="email" id="email-youtube" placeholder="Inserisci la tua email" value="">
                <label for="search-youtube">Search</label>
                <input type="text" id="search-youtube" placeholder="Inserisci il termine di ricerca">
                <button onclick="sendDataToWebhook('youtube')">Avvia Agente</button>
                <div class="status" id="status-youtube"></div>
            </div>
            <div class="card-footer">
                <span>Social Essential</span>
                <span>GPT-4o</span>
            </div>
        </div>
    `;
    container.insertAdjacentHTML("beforeend", cardHTML);

    // Pre‐compila la mail se disponibile
    if (window.userEmail) {
      const inp = document.getElementById("email-youtube");
      if (inp) inp.value = window.userEmail;
    }
});
