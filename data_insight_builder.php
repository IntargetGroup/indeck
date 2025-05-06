<?php $pageTitle = "Generatore Prompt: Insight da Report"; require_once '_header.php'; ?>

    <?php require_once '_sidebar.php'; ?>

    <?php // Colonna Contenuto Principale ?>
    <div class="col main-content-area px-md-4 py-3">

        <?php require_once '_page_header.php'; ?>

        <main>
            <div id="prompt-builder-container">
                <form id="promptForm">
                   <h2>Configura l'Analisi Dati</h2>
                    <p class="form-text mb-4">Il prompt generato si aggiornerà automaticamente mentre compili i campi.</p>

                   <fieldset id="fs-infoGeneraliDati">
                        <legend>Contesto dell'Analisi</legend>
                         <div class="preset-selector-container">
                             <label for="preset-infoGeneraliDati" class="preset-label">Preset:</label>
                             <select id="preset-infoGeneraliDati" class="form-select form-select-sm preset-selector"> <option value="">-- Seleziona Preset --</option> </select>
                          </div>
                          <div class="mb-3">
                             <label for="tipoReportDati" class="form-label">Tipo di Report/Dati: <span class="required-label">*</span></label>
                             <input type="text" class="form-control form-control-sm" id="tipoReportDati" value="" required placeholder="Es. Report Mensile GA4, Performance Campagna Meta...">
                             <div class="form-text">Obbligatorio (o suggerimento AI se vuoto). Specifica la natura dei dati.</div>
                         </div>
                         <div class="mb-3">
                             <label for="periodoAnalizzato" class="form-label">Periodo Analizzato: <span class="required-label">*</span></label>
                             <input type="text" class="form-control form-control-sm" id="periodoAnalizzato" value="" required placeholder="Es. Marzo 2025 vs Febbraio 2025, Q1 2025...">
                             <div class="form-text">Obbligatorio (o suggerimento AI se vuoto). Intervallo temporale.</div>
                         </div>
                         <div class="mb-3">
                             <label for="obiettivoAnalisi" class="form-label">Obiettivo dell'Analisi: <span class="required-label">*</span></label>
                              <input type="text" class="form-control form-control-sm" id="obiettivoAnalisi" value="" required placeholder="Es. Identificare trend, Trovare cause performance...">
                             <div class="form-text">Obbligatorio (o suggerimento AI se vuoto). Cosa vuoi scoprire?</div>
                         </div>
                         <div class="mb-3">
                             <label for="targetAudienceReport" class="form-label">Target Audience del Riassunto/Insight:</label>
                             <input type="text" class="form-control form-control-sm" id="targetAudienceReport" value="" placeholder="Es. Cliente, Manager Interno, Team Operativo">
                             <div class="form-text">Opzionale. Lascia vuoto per ignorare.</div>
                         </div>
                    </fieldset>

                    <fieldset id="fs-datiSpecifici">
                        <legend>Dati e Focus Analisi</legend>
                         <div class="preset-selector-container">
                             <label for="preset-datiSpecifici" class="preset-label">Preset:</label>
                             <select id="preset-datiSpecifici" class="form-select form-select-sm preset-selector"> <option value="">-- Seleziona Preset --</option> </select>
                          </div>
                         <div class="mb-3">
                             <label for="metricheChiave" class="form-label">Metriche Chiave Incluse/Da Focalizzare:</label>
                             <textarea class="form-control form-control-sm" id="metricheChiave" rows="3" placeholder="Es. Sessioni, Conversion Rate, CTR, CPA..."></textarea>
                             <div class="form-text">Opzionale (consigliato). Lascia vuoto per ignorare. Su quali metriche concentrarsi?</div>
                         </div>
                         <div class="mb-3">
                             <label for="datiForniti" class="form-label">Dati Forniti (incollare o descrivere): <span class="required-label">*</span></label>
                             <textarea class="form-control form-control-sm" id="datiForniti" rows="15" placeholder="Incolla tabelle semplici, elenchi di metriche con valori, o descrivi i dati principali e le loro variazioni..." required></textarea>
                             <div class="form-text">Obbligatorio. Fornisci i dati o una descrizione dettagliata.</div>
                         </div>
                         <div class="mb-3">
                             <label for="domandeSpecifiche" class="form-label">Domande Specifiche a Cui Rispondere:</label>
                             <textarea class="form-control form-control-sm" id="domandeSpecifiche" rows="3" placeholder="Es. Perché il traffico da X è calato? Quale campagna ha generato più lead?"></textarea>
                             <div class="form-text">Opzionale. Lascia vuoto per ignorare.</div>
                         </div>
                          <div class="mb-3">
                             <label for="formatoOutputDati" class="form-label">Formato Output Desiderato: <span class="required-label">*</span></label>
                             <select class="form-select form-select-sm" id="formatoOutputDati" required>
                                 <option value="">-- Seleziona --</option> <?php // Rimosso selected da qui ?>
                                 <option value="Punti Elenco Insight Chiave" selected>Punti Elenco Insight Chiave</option> <?php // Aggiunto selected qui ?>
                                 <option value="Paragrafo Riassuntivo Esecutivo">Paragrafo Riassuntivo Esecutivo</option>
                                 <option value="Analisi Trend Principali">Analisi Trend Principali</option>
                                 <option value="Prossimi Passi/Raccomandazioni Basate sui Dati">Prossimi Passi/Raccomandazioni</option>
                                 <option value="Analisi SWOT basata sui dati">Analisi SWOT basata sui dati</option>
                                 <option value="AI_DECIDE">-- Suggerito da AI --</option>
                             </select>
                             <div class="form-text">Obbligatorio. Come vuoi che vengano presentati i risultati?</div>
                         </div>
                          <div class="mb-3">
                            <label for="linguaReport" class="form-label">Lingua: <span class="required-label">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="linguaReport" value="Italiano" required>
                             <div class="form-text">Obbligatorio (o suggerimento AI se vuoto).</div>
                         </div>
                    </fieldset>

                    <fieldset id="fs-savePreset" class="mt-4 bg-light border rounded p-3">
                       <legend class="w-auto px-2 h6 mb-3 fw-semibold">Salva Preset Personale</legend>
                       <div class="d-flex flex-column flex-sm-row align-items-sm-end gap-2">
                            <div class="flex-grow-1">
                               <label for="newPresetName" class="form-label form-label-sm">Nome per il nuovo Preset:</label>
                               <input type="text" class="form-control form-control-sm" id="newPresetName" placeholder="Es. Analisi GA4 Mensile">
                            </div>
                            <button type="button" id="savePresetBtn" class="btn btn-success btn-sm flex-shrink-0">Salva Preset Corrente</button>
                       </div>
                       <div class="form-text mt-2">Salva la configurazione attuale per riutilizzarla (memorizzata solo su questo browser).</div>
                    </fieldset>
                </form>

                <h2 class="mt-4">Prompt Generato per Analisi Dati</h2>
                <textarea id="prompt_generato" class="form-control" rows="15" readonly></textarea>

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
    // Elementi del Form specifici per Data Insight
    const formElements = {
        tipoReportDati: document.getElementById('tipoReportDati'), periodoAnalizzato: document.getElementById('periodoAnalizzato'), obiettivoAnalisi: document.getElementById('obiettivoAnalisi'), targetAudienceReport: document.getElementById('targetAudienceReport'), metricheChiave: document.getElementById('metricheChiave'), datiForniti: document.getElementById('datiForniti'), domandeSpecifiche: document.getElementById('domandeSpecifiche'), formatoOutputDati: document.getElementById('formatoOutputDati'), linguaReport: document.getElementById('linguaReport')
    };
    // Etichette per il Prompt
    const fieldLabels = {
        tipoReportDati: "Tipo di Report/Dati", periodoAnalizzato: "Periodo Analizzato", obiettivoAnalisi: "Obiettivo dell'Analisi", targetAudienceReport: "Target Audience del Riassunto/Insight", metricheChiave: "Metriche Chiave Incluse/Da Focalizzare", datiForniti: "Dati Forniti", domandeSpecifiche: "Domande Specifiche a Cui Rispondere", formatoOutputDati: "Formato Output Desiderato", linguaReport: "Lingua"
    };
    // Preset Standard
    const builtInPresets = {
        'fs-infoGeneraliDati': [ { name: "Sintesi Mensile GA Cliente", id: "gaSynthClient", values: { tipoReportDati: "Report Mensile Google Analytics 4", periodoAnalizzato: "[Mese Corrente] vs [Mese Precedente]", obiettivoAnalisi: "Riassumere performance chiave e identificare variazioni significative per il cliente.", targetAudienceReport: "Cliente (Referente Marketing)" } }, { name: "Analisi Performance Campagna Interna", id: "campPerfInternal", values: { tipoReportDati: "Report Performance Campagna [Nome]", periodoAnalizzato: "Dall'inizio ad oggi", obiettivoAnalisi: "Valutare ROI e identificare ottimizzazioni.", targetAudienceReport: "Team Marketing Interno" } } ],
        'fs-datiSpecifici': [ { name: "Focus su Conversioni", id: "convFocus", values: { metricheChiave: "Conversioni, Conversion Rate, CPA, Valore Conversione", datiForniti: "[Incollare qui i dati sulle conversioni...]", domandeSpecifiche: "Quali canali/campagne generano più conversioni? Perché il CR è cambiato?", formatoOutputDati: "Punti Elenco Insight Chiave" } }, { name: "Analisi Trend Traffico", id: "trafficFocus", values: { metricheChiave: "Sessioni, Utenti, Sorgenti Traffico, Bounce Rate", datiForniti: "[Incollare qui i dati sul traffico...]", domandeSpecifiche: "Quali sono i principali trend di traffico? Quali sorgenti sono cresciute/calate?", formatoOutputDati: "Analisi Trend Principali" } } ]
    };
    // Elementi UI
    const promptGeneratoTextarea = document.getElementById('prompt_generato');
    const copiaBtn = document.getElementById('copiaBtn');
    const resetBtn = document.getElementById('resetBtn');
    const newPresetNameInput = document.getElementById('newPresetName');
    const savePresetBtn = document.getElementById('savePresetBtn');
    const localStorageKey = 'userPresets_dataInsight';

    // --- Funzioni Helper e Principali ---
    // (Queste funzioni sono identiche a quelle degli altri builder recenti)
    function getCheckboxValues(name) { const cbs = document.querySelectorAll(`input[name="${name}"]:checked`); return Array.from(cbs).map(cb => cb.value); }
    function setCheckboxValues(name, valuesArray) { const allCb = document.querySelectorAll(`input[name="${name}"]`); allCb.forEach(cb => { cb.checked = valuesArray ? valuesArray.includes(cb.value) : false; }); }
    function getFieldPromptValue(key, element, isMandatory = false) {
        if (element instanceof NodeList) { return ""; } if (element && element.type === 'checkbox') { return ""; }
        const value = element && element.value ? element.value.trim() : ''; const label = fieldLabels[key] || key;
        if (key === 'datiForniti') { if (value) { return `\n**${label}:**\n\`\`\`\n${value}\n\`\`\`\n`; } else { return `\n**${label}:** [Nessun dato specifico fornito - L'AI non può generare insight senza dati!]\n`;} }
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
    // Funzione Genera Prompt (specifica per Data Insight)
    function generaPrompt() {
        // Verifica se il textarea esiste prima di provare a leggerlo/scriverlo
        if (!promptGeneratoTextarea) return;

        let promptFinale = `**PROMPT PER ANALISI DATI E INSIGHT**\n\n`;
        let mandatoryFieldsData = ['tipoReportDati', 'periodoAnalizzato', 'obiettivoAnalisi', 'datiForniti', 'formatoOutputDati', 'linguaReport'];
        let allMandatoryFilled = true; // Flag per verifica campi obbligatori

        for (const key in formElements) {
            const element = formElements[key];
            if (!element) {
                 // console.warn(`Elemento non trovato per key: ${key}`); // Debug se necessario
                 continue;
            }
            const isMandatory = mandatoryFieldsData.includes(key);
            const promptPart = getFieldPromptValue(key, element, isMandatory);
            promptFinale += promptPart;

            // Controlla se un campo obbligatorio è vuoto (e non è 'AI_DECIDE')
             if (isMandatory && !element.value.trim() && element.value !== 'AI_DECIDE' && key !== 'datiForniti') {
                 // 'datiForniti' ha una gestione speciale del messaggio vuoto
                 allMandatoryFilled = false;
             }
             // Controllo specifico per datiForniti (non può essere vuoto per analisi)
             if (key === 'datiForniti' && !element.value.trim()) {
                 allMandatoryFilled = false;
             }
        }

        const formato = formElements.formatoOutputDati ? (formElements.formatoOutputDati.value || 'Punti Elenco Insight Chiave') : 'Punti Elenco Insight Chiave';
        promptFinale += `\n---\nAnalizza i dati forniti nel contesto specificato. Rispondi alle domande (se presenti), identifica insight chiave, trend o anomalie rilevanti e presenta i risultati nel formato richiesto (${formato}). Sii specifico e data-driven.`;

        // Aggiorna il textarea solo se tutti gli elementi obbligatori sono ok (o se il prompt è cambiato)
        // O più semplicemente, aggiorna sempre ma logga un warning se mancano campi
        if (!allMandatoryFilled && formElements.datiForniti && !formElements.datiForniti.value.trim()) {
             // Se mancano proprio i dati, l'anteprima potrebbe essere meno utile
             // console.warn("Dati obbligatori mancanti per la generazione completa del prompt.");
        }
        promptGeneratoTextarea.value = promptFinale;
    }
    // Funzione Copia Prompt (identica)
    function copiaPrompt() { const testoDaCopiare = promptGeneratoTextarea.value; navigator.clipboard.writeText(testoDaCopiare).then(() => { const t = copiaBtn.textContent; copiaBtn.textContent = 'Copiato!'; copiaBtn.style.backgroundColor = '#28a745'; setTimeout(() => { copiaBtn.textContent = t; copiaBtn.style.backgroundColor = '#e43e30'; }, 2000); }).catch(err => { console.error('Errore copia: ', err); alert('Errore copia testo.'); }); }
    // Funzione Reset Form (specifica per Data Insight)
    function resetForm() {
        const baseValues = { tipoReportDati: "", periodoAnalizzato: "", obiettivoAnalisi: "", targetAudienceReport: "", metricheChiave: "", datiForniti: "", domandeSpecifiche: "", formatoOutputDati: "Punti Elenco Insight Chiave", linguaReport: "Italiano" };
        for (const key in formElements) { const element = formElements[key]; if (element) { element.value = baseValues[key] || ''; } }
        if(formElements.formatoOutputDati) formElements.formatoOutputDati.value = baseValues.formatoOutputDati;
        generaPrompt();
    }
    // Event Listeners (con real-time e save preset)
    document.addEventListener('DOMContentLoaded', () => {
        populatePresetDropdowns();
        const presetSelectors = document.querySelectorAll('.preset-selector');
        presetSelectors.forEach(selector => { selector.addEventListener('change', (event) => { const selectedPresetId = event.target.value; const fieldset = event.target.closest('fieldset'); if (fieldset && selectedPresetId) { applyPreset(fieldset.id, selectedPresetId); } else if (fieldset) { selector.value = ""; } }); });
        // Listener Real-Time
        const form = document.getElementById('promptForm');
        if (form) {
            const inputElements = form.querySelectorAll('input:not(#newPresetName), select:not(.preset-selector), textarea');
            inputElements.forEach(element => {
                 const eventType = (element.tagName === 'SELECT' || element.type === 'checkbox' || element.type === 'date') ? 'change' : 'input';
                 element.addEventListener(eventType, generaPrompt);
            });
        }
        // Listener Bottone Salva
        if(savePresetBtn) { savePresetBtn.addEventListener('click', saveCurrentPreset); }
        // Genera il prompt iniziale DOPO aver agganciato tutti i listener
        // e popolato i dropdown per assicurarsi che tutto sia pronto.
        // Usiamo un piccolo timeout per sicurezza, anche se DOMContentLoaded dovrebbe bastare.
        setTimeout(generaPrompt, 0);
    });
    copiaBtn.addEventListener('click', copiaPrompt);
    resetBtn.addEventListener('click', resetForm);
</script>

</body>
</html>