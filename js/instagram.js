// js/instagram.js
document.addEventListener("DOMContentLoaded", function() {
  const container = document.querySelector(".cards-container");
  if (!container) return;

  const cardHTML = `
    <div class="card social-card mb-4">
      <div class="card-header">
        <img src="images/instagram-logo.png" alt="Instagram Logo" class="platform-logo">
        <h3>Instagram Hashtag</h3>
      </div>
      <div class="card-body">
        <p>Analizza i 10 post più recenti con un hashtag specifico.</p>
        <label for="email-instagram">Email</label>
        <input type="email" id="email-instagram" placeholder="Inserisci la tua email">
        <label for="hashtag-instagram">Hashtag</label>
        <input type="text" id="hashtag-instagram" placeholder="Inserisci l'hashtag (senza #)">
        <button onclick="sendDataToWebhook('instagram')" >Avvia Agente</button>
        <div class="status mt-2" id="status-instagram"></div>
      </div>
      <div class="card-footer d-flex justify-content-between text-muted">
        <span>Social Essential</span>
        <span>GPT-4o</span>
      </div>
    </div>
  `;
  container.insertAdjacentHTML("beforeend", cardHTML);

  // pre‐fill con la mail di login
  if (window.userEmail) {
    const inp = document.getElementById("email-instagram");
    if (inp) inp.value = window.userEmail;
  }
});
