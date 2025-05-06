document.addEventListener("DOMContentLoaded", function() {
    const container = document.querySelector(".cards-container");
    if (!container) return;

    const cardHTML = `
        <div class="card workflow-card">
            <div class="card-header">
                <img src="images/meeting-logo.png" alt="Meeting Logo" class="platform-logo">
                <h3>First Meeting</h3>
            </div>
            <div class="card-body">
                <p>Ricevi suggerimenti su come impostare un primo meeting perfetto.</p>
                <label for="email-meeting">Email</label>
                <input type="email" id="email-meeting" placeholder="Inserisci la tua email">
                <button onclick="sendDataToWebhook('meeting')">Avvia Agente</button>
                <div class="status" id="status-meeting"></div>
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML("beforeend", cardHTML);
});
