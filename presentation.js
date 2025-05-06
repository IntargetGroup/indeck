// js/presentation.js
document.addEventListener("DOMContentLoaded", function() {
  function checkFileSize(input, maxSizeMB) {
    if (input.files && input.files[0] && input.files[0].size > maxSizeMB*1024*1024) {
      alert(`Il file supera ${maxSizeMB} MB.`); input.value="";
    }
  }
  window.checkFileSize = checkFileSize;

  const container = document.getElementById("presentation-card-container");
  if (!container) {
    console.error("Contenitore non trovato"); return;
  }

  const cardHTML = `
  <div class="card presentation-card shadow-sm mb-4">
    <div class="card-header bg-light">
      <h3 class="mb-0 h5">Crea la tua presentazione su Google Slides</h3>
    </div>
    <div class="card-body p-lg-4 p-3">
      <form id="presentation-form" onsubmit="event.preventDefault(); sendDataToWebhook('presentation');">
        <!-- Dati generali -->
        <div class="mb-3">
          <label class="form-label fw-semibold">* Email per condivisione:</label>
          <input type="email" name="emailPresentation" id="email-presentation"
                 class="form-control form-control-sm" required placeholder="La tua email">
        </div>
        <div class="mb-3">
          <label class="form-label fw-semibold">* Argomento principale:</label>
          <input type="text" name="argomento" id="argomento-presentazione"
                 class="form-control form-control-sm" required placeholder="Argomento">
        </div>
        <div class="mb-3">
          <label class="form-label fw-semibold">* Istruzioni:</label>
          <textarea name="istruzioni" id="istruzioni-presentazione"
                    class="form-control form-control-sm" rows="3" required></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label fw-semibold">Informazioni aggiuntive:</label>
          <textarea name="informazioni" id="informazioni-presentazione"
                    class="form-control form-control-sm" rows="2"></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label fw-semibold">* Lingua:</label>
          <div class="lingua-selector">
            <div class="lingua-option active" data-value="italiano">🇮🇹</div>
            <div class="lingua-option" data-value="inglese">🇺🇸</div>
            <div class="lingua-option-x">
              <div class="lingua-option" data-value="custom">X</div>
              <input type="text" class="lingua-custom-input" placeholder="Altra">
            </div>
          </div>
          <input type="hidden" name="linguaPresentazione" id="lingua-presentazione" value="italiano">
        </div>
        <div class="mb-3">
          <label class="form-label fw-semibold">* Obiettivo:</label>
          <input type="text" name="obiettivoPresentazione" id="obiettivo-presentazione"
                 class="form-control form-control-sm" required>
        </div>
        <div class="mb-3">
          <label class="form-label fw-semibold">* Target:</label>
          <input type="text" name="targetPresentazione" id="target-presentazione"
                 class="form-control form-control-sm" required>
        </div>
        <div class="mb-3">
          <label class="form-label fw-semibold">* Numero di slide:</label>
          <div class="slides-selector">
            <div class="slide-option active" data-value="5">5</div>
            <div class="slide-option" data-value="10">10</div>
            <div class="slide-option" data-value="15">15</div>
            <div class="slide-option-x">
              <div class="slide-option" data-value="custom">X</div>
              <input type="number" class="slide-custom-input" min="1" max="99">
            </div>
          </div>
          <input type="hidden" name="numSlides" id="num-slides" value="5">
        </div>
        <div class="mb-3">
          <label class="form-label fw-semibold">* Abilita news:</label>
          <select name="newsSearch" id="news-search" class="form-select form-select-sm" required>
            <option value="">Seleziona…</option>
            <option value="si">Si</option>
            <option value="no">No</option>
          </select>
        </div>

        <!-- File opzionali -->
        <div class="mb-3">
          <label class="form-label">File CSV:</label>
          <input type="file" name="fileCSV" id="file-csv"
                 class="form-control form-control-sm" accept=".csv"
                 onchange="checkFileSize(this,10)">
        </div>
        <div class="mb-3">
          <label class="form-label">Istruzioni CSV:</label>
          <textarea name="istruzioniFileCSV" id="istruzioni-file-csv"
                    class="form-control form-control-sm" rows="2"></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">File PDF:</label>
          <input type="file" name="filePDF" id="file-pdf"
                 class="form-control form-control-sm" accept=".pdf"
                 onchange="checkFileSize(this,10)">
        </div>
        <div class="mb-3">
          <label class="form-label">Istruzioni PDF:</label>
          <textarea name="istruzioniFilePDF" id="istruzioni-file-pdf"
                    class="form-control form-control-sm" rows="2"></textarea>
        </div>

        <div class="d-grid gap-2 col-lg-6 mx-auto">
          <button type="submit" class="btn btn-primary btn-lg">
            <i class="fas fa-rocket me-2"></i> Avvia Agente
          </button>
        </div>
        <div id="status-presentation" class="alert alert-info mt-4 d-none" role="alert"></div>
      </form>
    </div>
  </div>`;

  container.innerHTML = cardHTML;

  // … (il resto dei listener slide/lingua rimane identico) …
});
