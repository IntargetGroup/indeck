document.addEventListener("DOMContentLoaded", function() {
    const container = document.querySelector(".cards-container");
    if (!container) return;

    const cardHTML = `
        <div class="card news-card">
            <div class="card-header">
                <img src="images/news-logo.png" alt="News Logo" class="platform-logo">
                <h3>News Finder</h3>
            </div>
            <div class="card-body">
                <p>Estrai le ultime notizie basate su una determinata keyword.</p>
                <label for="email-news">Email</label>
                <input type="email" id="email-news" placeholder="Inserisci la tua email">
				
				<label for="search-news">Chiave di ricerca</label>
                <input type="text" id="search-news" placeholder="Keywords">
				
				
                <label for="country-news">Seleziona il Paese</label>
                <select id="country-news">
                    <option value="IT:it">Italia</option>
                    <option value="FR:fr">Francia</option>
                    <option value="DE:de">Germania</option>
                </select>
                <button onclick="sendDataToWebhook('news')">Avvia Agente</button>
                <div class="status" id="status-news"></div>
            </div>
            <div class="card-footer">
                <span>News Essentials</span>
                <span>GPT-4o</span>
            </div>
        </div>
    `;

    container.insertAdjacentHTML("beforeend", cardHTML);
});
