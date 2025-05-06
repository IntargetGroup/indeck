<?php $pageTitle = "Generatore Prompt: Persona Utente"; require_once '_header.php'; ?>

    <?php require_once '_sidebar.php'; ?>

    <?php // Colonna Contenuto Principale ?>
    <div class="col main-content-area px-md-4 py-3">

        <?php require_once '_page_header.php'; ?>

        <main>
          <div id="prompt-builder-container">
            <form id="promptForm">
               <h2>Definisci le Caratteristiche della Persona</h2>
               <p class="form-text mb-4">Il prompt generato si aggiornerà automaticamente mentre compili i campi.</p>

                <fieldset id="fs-contestoPersona">
                     <legend>Contesto Generale</legend>
                      <div class="preset-selector-container">
                         <label for="preset-contestoPersona" class="preset-label">Preset:</label>
                         <select id="preset-contestoPersona" class="form-select form-select-sm preset-selector"> <option value="">-- Seleziona Preset --</option> </select>
                      </div>
                     <div class="mb-3">
                         <label for="prodottoServizioPersona" class="form-label">Prodotto/Servizio di Riferimento: <span class="required-label">*</span></label>
                         <input type="text" class="form-control form-control-sm" id="prodottoServizioPersona" value="" required placeholder="Per quale prodotto/servizio è questa persona?">
                         <div class="form-text">Obbligatorio (o suggerimento AI se vuoto). Il contesto.</div>
                     </div>
                      <div class="mb-3">
                         <label for="mercatoSettore" class="form-label">Mercato/Settore: <span class="required-label">*</span></label>
                         <input type="text" class="form-control form-control-sm" id="mercatoSettore" value="" required placeholder="Es. E-commerce Moda, Software B2B...">
                         <div class="form-text">Obbligatorio (o suggerimento AI se vuoto).</div>
                     </div>
                      <div class="mb-3">
                         <label for="nomePersona" class="form-label">Nome Fittizio Persona:</label>
                         <input type="text" class="form-control form-control-sm" id="nomePersona" value="" placeholder="Es. Mario Rossi, Laura Verdi">
                         <div class="form-text">Opzionale. Utile per identificarla. Lascia vuoto per ignorare.</div>
                     </div>
                      <div class="mb-3">
                         <label for="numeroPersonas" class="form-label">Numero Personas da Generare:</label>
                         <input type="number" class="form-control form-control-sm" id="numeroPersonas" value="1" min="1" max="5">
                         <div class="form-text">Quanti profili diversi generare con queste basi?</div>
                     </div>
                </fieldset>

                <fieldset id="fs-dettagliPersona">
                     <legend>Dettagli Profilo</legend>
                      <div class="preset-selector-container">
                         <label for="preset-dettagliPersona" class="preset-label">Preset:</label>
                         <select id="preset-dettagliPersona" class="form-select form-select-sm preset-selector"> <option value="">-- Seleziona Preset --</option> </select>
                      </div>
                     <div class="mb-3">
                        <label for="datiDemografici" class="form-label">Dati Demografici Base:</label>
                        <textarea class="form-control form-control-sm" id="datiDemografici" rows="3" placeholder="Es. Età 35-45, Vive in grandi città, Lavora come Manager..."></textarea>
                        <div class="form-text">Opzionale (consigliato). Lascia vuoto per ignorare (o per suggerimento AI).</div>
                    </div>
                    <div class="mb-3">
                        <label for="obiettiviPersona" class="form-label">Obiettivi Principali della Persona: <span class="required-label">*</span></label>
                        <textarea class="form-control form-control-sm" id="obiettiviPersona" rows="3" required placeholder="Es. Aumentare l'efficienza, Trovare soluzioni per risparmiare tempo..."></textarea>
                        <div class="form-text">Obbligatorio (o suggerimento AI se vuoto). Cosa vuole raggiungere?</div>
                    </div>
                    <div class="mb-3">
                        <label for="sfidePainPoints" class="form-label">Sfide/Punti Dolorosi (Pain Points): <span class="required-label">*</span></label>
                        <textarea class="form-control form-control-sm" id="sfidePainPoints" rows="4" required placeholder="Es. Mancanza di tempo, Budget limitato, Difficoltà informazioni..."></textarea>
                        <div class="form-text">Obbligatorio (o suggerimento AI se vuoto). Quali problemi incontra?</div>
                    </div>
                     <div class="mb-3">
                        <label for="canaliPreferiti" class="form-label">Canali Preferiti (Informazione/Social):</label>
                        <textarea class="form-control form-control-sm" id="canaliPreferiti" rows="3" placeholder="Es. LinkedIn, Blog di settore, Newsletter, Podcast, Instagram..."></textarea>
                        <div class="form-text">Opzionale. Lascia vuoto per ignorare (o per suggerimento AI).</div>
                    </div>
                    <div class="mb-3">
                        <label for="motivazioniAcquisto" class="form-label">Motivazioni d'Acquisto/Interesse:</label>
                        <textarea class="form-control form-control-sm" id="motivazioniAcquisto" rows="3" placeholder="Es. Risparmio economico, Miglioramento performance, Status symbol..."></textarea>
                        <div class="form-text">Opzionale (consigliato). Lascia vuoto per ignorare (o per suggerimento AI).</div>
                    </div>
                    <div class="mb-3">
                        <label for="obiezioniComuni" class="form-label">Obiezioni/Dubbi Comuni:</label>
                        <textarea class="form-control form-control-sm" id="obiezioniComuni" rows="3" placeholder="Es. Prezzo troppo alto, Difficile da usare, Ho già una soluzione..."></textarea>
                        <div class="form-text">Opzionale. Lascia vuoto per ignorare (o per suggerimento AI).</div>
                    </div>
                     <div class="mb-3">
                        <label for="citazionePersona" class="form-label">Citazione Rappresentativa:</label>
                        <input type="text" class="form-control form-control-sm" id="citazionePersona" value="" placeholder='Es. "Cerco sempre modi per ottimizzare il mio lavoro."'>
                        <div class="form-text">Opzionale. Lascia vuoto per ignorare.</div>
                    </div>
                      <div class="mb-3">
                        <label for="linguaPersona" class="form-label">Lingua: <span class="required-label">*</span></label>
                        <input type="text" class="form-control form-control-sm" id="linguaPersona" value="Italiano" required>
                         <div class="form-text">Obbligatorio (o suggerimento AI se vuoto).</div>
                     </div>
                </fieldset>

                 <fieldset id="fs-savePreset" class="mt-4 bg-light border rounded p-3">
                    <legend class="w-auto px-2 h6 mb-3 fw-semibold">Salva Preset Personale</legend>
                    <div class="d-flex flex-column flex-sm-row align-items-sm-end gap-2">
                         <div class="flex-grow-1">
                            <label for="newPresetName" class="form-label form-label-sm">Nome per il nuovo Preset:</label>
                            <input type="text" class="form-control form-control-sm" id="newPresetName" placeholder="Es. Persona Manager B2B">
                         </div>
                         <button type="button" id="savePresetBtn" class="btn btn-success btn-sm flex-shrink-0">Salva Preset Corrente</button>
                    </div>
                    <div class="form-text mt-2">Salva la configurazione attuale per riutilizzarla (memorizzata solo su questo browser).</div>
                 </fieldset>
            </form>

            <h2 class="mt-4">Prompt Generato per Persona Utente</h2>
            <textarea id="prompt_generato" class="form-control" rows="20" readonly></textarea>

            <div class="button-group text-end mt-4 pt-3 border-top">
                <button type="button" id="resetBtn" class="btn btn-secondary btn-sm me-2">Reset Campi</button>
                <button type="button" id="copiaBtn" class="btn btn-primary btn-sm">Copia Prompt</button>
            </div>
          </div>
        </main>
    </div> <?php // Chiusura colonna main-content-area ?>

<?php require_once '_footer.php'; ?>

<?php // Script specifici per questa pagina ?>
<script>
    // Elementi del Form specifici per Persona
    const formElements = {
        prodottoServizioPersona: document.getElementById('prodottoServizioPersona'), mercatoSettore: document.getElementById('mercatoSettore'), nomePersona: document.getElementById('nomePersona'), numeroPersonas: document.getElementById('numeroPersonas'), datiDemografici: document.getElementById('datiDemografici'), obiettiviPersona: document.getElementById('obiettiviPersona'), sfidePainPoints: document.getElementById('sfidePainPoints'), canaliPreferiti: document.getElementById('canaliPreferiti'), motivazioniAcquisto: document.getElementById('motivazioniAcquisto'), obiezioniComuni: document.getElementById('obiezioniComuni'), citazionePersona: document.getElementById('citazionePersona'), linguaPersona: document.getElementById('linguaPersona')
    };
    // Etichette per il Prompt
    const fieldLabels = {
        prodottoServizioPersona: "Prodotto/Servizio di Riferimento", mercatoSettore: "Mercato/Settore", nomePersona: "Nome Fittizio Persona", datiDemografici: "Dati Demografici Base", obiettiviPersona: "Obiettivi Principali", sfidePainPoints: "Sfide/Punti Dolorosi (Pain Points)", canaliPreferiti: "Canali Preferiti (Informazione/Social)", motivazioniAcquisto: "Motivazioni d'Acquisto/Interesse", obiezioniComuni: "Obiezioni/Dubbi Comuni", citazionePersona: "Citazione Rappresentativa", linguaPersona: "Lingua"
    };
    // Preset Standard
    const builtInPresets = {
        'fs-contestoPersona': [ { name: "Persona B2B Servizi", id: "personaB2bSvc", values: { mercatoSettore: "Servizi B2B", numeroPersonas: "1" } }, { name: "Persona E-commerce B2C", id: "personaEcomB2c", values: { mercatoSettore: "E-commerce B2C", numeroPersonas: "1" } } ],
        'fs-dettagliPersona': [ { name: "Profilo Manager", id: "managerProfile", values: { datiDemografici: "Età 40-55, Ruolo Manageriale, Alto livello istruzione", obiettiviPersona: "Efficienza Team, Raggiungimento KPI, Crescita Carriera", sfidePainPoints: "Mancanza di tempo, Gestione Budget, Adozione nuove tecnologie", canaliPreferiti: "LinkedIn, Newsletter di settore, Eventi", motivazioniAcquisto: "ROI, Affidabilità, Supporto", obiezioniComuni: "Costo implementazione, Integrazione con sistemi esistenti", linguaPersona: "Italiano" } }, { name: "Profilo Giovane Consumatore", id: "youngConsumer", values: { datiDemografici: "Età 18-28, Studente o Neo-lavoratore, Attivo sui social", obiettiviPersona: "Appartenenza Sociale, Espressione Individualità, Esperienze", sfidePainPoints: "Budget limitato, Indecisione, Pressione sociale", canaliPreferiti: "Instagram, TikTok, Influencer, Amici", motivazioniAcquisto: "Trend, Prezzo, Brand Coolness, Valori Etici", obiezioniComuni: "Prezzo, Non ne ho bisogno ora, Recensioni negative", linguaPersona: "Italiano" } } ]
    };
    // Elementi UI
    const promptGeneratoTextarea = document.getElementById('prompt_generato');
    const copiaBtn = document.getElementById('copiaBtn');
    const resetBtn = document.getElementById('resetBtn');
    const newPresetNameInput = document.getElementById('newPresetName');
    const savePresetBtn = document.getElementById('savePresetBtn');
    const localStorageKey = 'userPresets_persona'; // Chiave localStorage specifica

    // --- Funzioni Helper e Principali ---
    function getCheckboxValues(name) { const cbs = document.querySelectorAll(`input[name="${name}"]:checked`); return Array.from(cbs).map(cb => cb.value); }
    function setCheckboxValues(name, valuesArray) { const allCb = document.querySelectorAll(`input[name="${name}"]`); allCb.forEach(cb => { cb.checked = valuesArray ? valuesArray.includes(cb.value) : false; }); }
    function getFieldPromptValue(key, element, isMandatory = false) {
         if (element instanceof NodeList) { return ""; } if (element && element.type === 'checkbox') { return ""; }
         const value = element && element.value ? element.value.trim() : ''; const label = fieldLabels[key] || key;
         if (value === 'AI_DECIDE') { return `**${label}:** [AI Deve Suggerire Valore Ottimale]\n`; }
         else if (value) { return `**${label}:** ${value}\n`; }
         else if (isMandatory) { return `**${label}:** [Valore Mancante - AI Deve Suggerire]\n`; }
         else { return ""; }
    }
    function loadUserPresets() { try { const storedPresets = localStorage.getItem(localStorageKey); return storedPresets ? JSON.parse(storedPresets) : []; } catch (e) { console.error(`Errore caricamento ${localStorageKey}:`, e); return []; } }
    function saveUserPresets(presetsArray) { try { localStorage.setItem(localStorageKey, JSON.stringify(presetsArray)); } catch (e) { console.error(`Errore salvataggio ${localStorageKey}:`, e); alert("Errore salvataggio preset."); } }
    function saveCurrentPreset() { const presetName = newPresetNameInput.value.trim(); if (!presetName) { alert("Inserisci un nome per il preset."); return; } const userPresets = loadUserPresets(); const existingPresetIndex = userPresets.findIndex(p => p.name === presetName); if (existingPresetIndex !== -1) { if (!confirm(`Preset "${presetName}" esiste già. Sovrascrivere?`)) { return; } } const currentValues = {}; for (const key in formElements) { const element = formElements[key]; if (element instanceof NodeList && element.length > 0 && element[0].type === 'checkbox') { currentValues[key] = getCheckboxValues(element[0].name); } else if (element && element.type === 'checkbox') { currentValues[key] = element.checked; } else if (element) { currentValues[key] = element.value; } } const newPreset = { name: presetName, values: currentValues }; if (existingPresetIndex !== -1) { userPresets[existingPresetIndex] = newPreset; } else { userPresets.push(newPreset); } saveUserPresets(userPresets); populatePresetDropdowns(); newPresetNameInput.value = ''; alert(`Preset "${presetName}" salvato!`); }
    function populatePresetDropdowns() { const userPresets = loadUserPresets(); const allSelectors = document.querySelectorAll('.preset-selector'); allSelectors.forEach(selector => { const sectionId = selector.id.replace('preset-', 'fs-'); const builtInSectionPresets = builtInPresets[sectionId] || []; const existingOptgroups = selector.querySelectorAll('optgroup'); existingOptgroups.forEach(og => og.remove()); while (selector.options.length > 1) { selector.remove(1); } builtInSectionPresets.forEach(preset => { const option = document.createElement('option'); option.value = preset.id; option.textContent = preset.name; option.dataset.isBuiltIn = "true"; selector.appendChild(option); }); if (userPresets.length > 0) { const optgroup = document.createElement('optgroup'); optgroup.label = "Preset Salvati"; userPresets.forEach((preset) => { let isRelevant = false; const fieldsetElement = document.getElementById(sectionId); if (fieldsetElement) { const fieldsInSection = Array.from(fieldsetElement.querySelectorAll('input, select, textarea')).map(el => el.id); isRelevant = Object.keys(preset.values).some(key => fieldsInSection.includes(key)); } if(isRelevant) { const option = document.createElement('option'); option.value = `user_${preset.name}`; option.textContent = preset.name; option.dataset.isUserPreset = "true"; optgroup.appendChild(option); } }); if (optgroup.children.length > 0) { selector.appendChild(optgroup); } } }); }
    function applyPreset(sectionId, presetId) { let selectedPresetData = null; let isUserPreset = presetId.startsWith('user_'); if (isUserPreset) { const presetName = presetId.substring(5); const userPresets = loadUserPresets(); selectedPresetData = userPresets.find(p => p.name === presetName); } else { const sectionPresets = builtInPresets[sectionId]; if (sectionPresets) { selectedPresetData = sectionPresets.find(p => p.id === presetId); } } if (!selectedPresetData || !selectedPresetData.values) { console.warn("Preset non trovato:", presetId); const selector = document.getElementById(`preset-${sectionId.replace('fs-', '')}`); if (selector) selector.value = ""; return; } const fieldset = document.getElementById(sectionId); if (!fieldset) return; const presetValues = selectedPresetData.values; for (const fieldId in formElements) { if (presetValues.hasOwnProperty(fieldId)) { const element = formElements[fieldId]; const valueToApply = presetValues[fieldId]; if (element instanceof NodeList && element.length > 0 && element[0].type === 'checkbox') { if (Array.isArray(valueToApply)) { setCheckboxValues(element[0].name, valueToApply); } } else if (element && element.type === 'checkbox') { element.checked = valueToApply; } else if (element) { element.value = valueToApply; if (element.tagName === 'SELECT') { element.dispatchEvent(new Event('change')); } } } } generaPrompt(); const selector = document.getElementById(`preset-${sectionId.replace('fs-', '')}`); if(selector) selector.value = ""; }
    // Funzione Genera Prompt (specifica per Persona)
    function generaPrompt() {
        let promptFinale = `**PROMPT PER GENERAZIONE PERSONA UTENTE**\n\n`;
        let mandatoryFieldsPersona = ['prodottoServizioPersona', 'mercatoSettore', 'obiettiviPersona', 'sfidePainPoints', 'linguaPersona'];
        let numero = formElements.numeroPersonas.value.trim() || '1'; // Default a 1
        for (const key in formElements) { if (key === 'numeroPersonas') continue; const element = formElements[key]; if (!element) continue; const isMandatory = mandatoryFieldsPersona.includes(key); promptFinale += getFieldPromptValue(key, element, isMandatory); }
        promptFinale += `\n---\nGenera ${numero} profilo/i di buyer persona dettagliato/i basato/i sulle caratteristiche fornite. Per ogni persona, includi se possibile: nome fittizio (se non fornito), background/ruolo, dati demografici chiave, obiettivi principali, sfide e punti dolorosi, canali preferiti, motivazioni d'acquisto/interesse, obiezioni comuni e una citazione rappresentativa. Assicurati che i profili siano coerenti con il contesto fornito.`;
        promptGeneratoTextarea.value = promptFinale;
    }
    // Funzione Copia Prompt (identica)
    function copiaPrompt() { const testoDaCopiare = promptGeneratoTextarea.value; navigator.clipboard.writeText(testoDaCopiare).then(() => { const t = copiaBtn.textContent; copiaBtn.textContent = 'Copiato!'; copiaBtn.style.backgroundColor = '#28a745'; setTimeout(() => { copiaBtn.textContent = t; copiaBtn.style.backgroundColor = '#e43e30'; }, 2000); }).catch(err => { console.error('Errore copia: ', err); alert('Errore copia testo.'); }); }
    // Funzione Reset Form (specifica per Persona)
    function resetForm() {
        const baseValues = { prodottoServizioPersona: "", mercatoSettore: "", nomePersona: "", numeroPersonas: "1", datiDemografici: "", obiettiviPersona: "", sfidePainPoints: "", canaliPreferiti: "", motivazioniAcquisto: "", obiezioniComuni: "", citazionePersona: "", linguaPersona: "Italiano" };
        for (const key in formElements) { const element = formElements[key]; if (element) { element.value = baseValues[key] || ''; } }
        generaPrompt();
    }
    // Event Listeners (con real-time e save preset)
    document.addEventListener('DOMContentLoaded', () => {
        populatePresetDropdowns();
        const presetSelectors = document.querySelectorAll('.preset-selector'); presetSelectors.forEach(selector => { selector.addEventListener('change', (event) => { const selectedPresetId = event.target.value; const fieldset = event.target.closest('fieldset'); if (fieldset && selectedPresetId) { applyPreset(fieldset.id, selectedPresetId); } else if (fieldset) { selector.value = ""; } }); });
        // Listener Real-Time
        const form = document.getElementById('promptForm');
        if (form) {
            const inputElements = form.querySelectorAll('input:not(#newPresetName), select:not(.preset-selector), textarea');
            inputElements.forEach(element => {
                 const eventType = (element.tagName === 'SELECT' || element.type === 'checkbox' || element.type === 'date' || element.type === 'number') ? 'change' : 'input';
                 element.addEventListener(eventType, generaPrompt);
            });
        }
        // Listener Bottone Salva
        if(savePresetBtn) { savePresetBtn.addEventListener('click', saveCurrentPreset); }
        generaPrompt(); // Genera prompt iniziale
    });
    copiaBtn.addEventListener('click', copiaPrompt);
    resetBtn.addEventListener('click', resetForm);
  </script>

</body>
</html>