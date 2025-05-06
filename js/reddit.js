document.addEventListener("DOMContentLoaded", function() {
    const container = document.querySelector(".cards-container");
    if (!container) return;

    const cardHTML = `
        <div class="card social-card mb-4">
            <div class="card-header">
                <img src="images/reddit-logo.png" alt="Reddit Logo" class="platform-logo">
                <h3>Reddit Search</h3>
            </div>
            <div class="card-body">
                <p>Esplora i 10 post più discussi su Reddit.</p>
                <label for="email-reddit">Email</label>
                <input type="email" id="email-reddit" placeholder="Inserisci la tua email" value="">
                <label for="search-reddit">Search</label>
                <input type="text" id="search-reddit" placeholder="Inserisci il termine di ricerca">
                <button onclick="sendDataToWebhook('reddit')">Avvia Agente</button>
                <div class="status" id="status-reddit"></div>
            </div>
            <div class="card-footer">
                <span>Social Essential</span>
                <span>GPT-4o</span>
            </div>
        </div>
    `;
    container.insertAdjacentHTML("beforeend", cardHTML);

    if (window.userEmail) {
      const inp = document.getElementById("email-reddit");
      if (inp) inp.value = window.userEmail;
    }
});
