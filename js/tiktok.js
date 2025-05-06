document.addEventListener("DOMContentLoaded", function() {
    const container = document.querySelector(".cards-container");
    if (!container) return;

    const cardHTML = `
        <div class="card social-card mb-4">
            <div class="card-header">
                <img src="images/tiktok-logo.png" alt="TikTok Logo" class="platform-logo">
                <h3>TikTok Search</h3>
            </div>
            <div class="card-body">
                <p>Analizza i 10 video di tendenza su TikTok.</p>
                <label for="email-tiktok">Email</label>
                <input type="email" id="email-tiktok" placeholder="Inserisci la tua email" value="">
                <label for="search-tiktok">Search</label>
                <input type="text" id="search-tiktok" placeholder="Inserisci il termine di ricerca">
                <button onclick="sendDataToWebhook('tiktok')">Avvia Agente</button>
                <div class="status" id="status-tiktok"></div>
            </div>
            <div class="card-footer">
                <span>Social Essential</span>
                <span>GPT-4o</span>
            </div>
        </div>
    `;
    container.insertAdjacentHTML("beforeend", cardHTML);

    if (window.userEmail) {
      const inp = document.getElementById("email-tiktok");
      if (inp) inp.value = window.userEmail;
    }
});
