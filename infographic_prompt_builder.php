<?php $pageTitle = "Generatore Prompt: Infografica Dashboard"; require_once '_header.php'; ?>

    <?php require_once '_sidebar.php'; ?>

    <?php // Colonna Contenuto Principale ?>
    <div class="col main-content-area px-md-4 py-3">

        <?php require_once '_page_header.php'; ?>

        <main>
          <div id="prompt-builder-container">
            <form id="promptForm">
               <h2>Configura il tuo Prompt per Infografica</h2>
                <p class="form-text mb-4">Il prompt generato si aggiornerà automaticamente mentre compili i campi.</p>

               <fieldset id="fs-infoGeneraliInfogr">
                    <legend>Informazioni Generali</legend>
                    <div class="preset-selector-container">
                         <label for="preset-infoGeneraliInfogr" class="preset-label">Preset:</label>
                         <select id="preset-infoGeneraliInfogr" class="form-select form-select-sm preset-selector"> <option value="">-- Seleziona Preset --</option> </select>
                    </div>
                     <div class="mb-3">
                        <label for="formatoInfografica" class="form-label">Formato Infografica: <span class="required-label">*</span></label>
                        <select class="form-select form-select-sm" id="formatoInfografica" required>
                            <option value="Slide intera (16:9)" selected>Slide Intera 16:9</option>
                            <option value="Mezza slide verticale (8:9)">Mezza Slide Verticale 8:9</option>
                            <option value="Mezza slide orizzontale (16:4.5)">Mezza Slide Orizzontale 16:4.5</option>
                            <option value="Formato Quadrato (1:1)">Formato Quadrato (1:1)</option>
                            <option value="AI_DECIDE">-- Suggerito da AI --</option>
                             <option value="">-- Non specificato (Ignora) --</option> <?php // Aggiunto per poter ignorare ?>
                        </select>
                        <div class="form-text">Obbligatorio (o suggerimento AI). Scegli proporzioni o ignora.</div>
                    </div>
                    <div class="mb-3">
                        <label for="linguaInfogr" class="form-label">Lingua: <span class="required-label">*</span></label>
                        <input type="text" class="form-control form-control-sm" id="linguaInfogr" value="Italiano" required>
                         <div class="form-text">Obbligatorio (o suggerimento AI se vuoto).</div>
                    </div>
                    <div class="mb-3">
                        <label for="targetAudienceInfogr" class="form-label">Target Audience:</label>
                        <input type="text" class="form-control form-control-sm" id="targetAudienceInfogr" value="" placeholder="Es. C-Level, Team Marketing...">
                        <div class="form-text">Opzionale. Lascia vuoto per ignorare.</div>
                    </div>
                    <div class="mb-3">
                        <label for="contestoUsoInfogr" class="form-label">Contesto d’Uso:</label>
                        <input type="text" class="form-control form-control-sm" id="contestoUsoInfogr" value="" placeholder="Es. Presentazione cliente, Report interno...">
                        <div class="form-text">Opzionale. Lascia vuoto per ignorare.</div>
                    </div>
                     <div class="mb-3">
                        <label for="obiettivoComunicativoInfogr" class="form-label">Obiettivo Comunicativo:</label>
                        <input type="text" class="form-control form-control-sm" id="obiettivoComunicativoInfogr" value="" placeholder="Es. Informare, Ispirare, Spiegare...">
                        <div class="form-text">Opzionale (o suggerimento AI se vuoto e se altri campi lo implicano).</div>
                    </div>
                    <div class="mb-3">
                        <label for="messaggioPrincipaleInfogr" class="form-label">Messaggio principale:</label>
                        <input type="text" class="form-control form-control-sm" id="messaggioPrincipaleInfogr" value="" placeholder="Frase chiave sintetica">
                        <div class="form-text">Opzionale ma fortemente consigliato.</div>
                    </div>
                </fieldset>

                <fieldset id="fs-datiContenutoInfogr">
                     <legend>Dati e Contenuto</legend>
                      <div class="preset-selector-container">
                         <label for="preset-datiContenutoInfogr" class="preset-label">Preset:</label>
                         <select id="preset-datiContenutoInfogr" class="form-select form-select-sm preset-selector"> <option value="">-- Seleziona Preset --</option> </select>
                      </div>
                      <div class="mb-3">
                        <label for="datiGrezzi" class="form-label">Dati grezzi da considerare: <span class="required-label">*</span></label>
                        <textarea class="form-control form-control-sm" id="datiGrezzi" rows="15" placeholder="Incolla o scrivi qui i dati, testi, insight..." required></textarea>
                         <div class="form-text">Obbligatorio. Fornisci i dati o una descrizione dettagliata.</div>
                    </div>
                    <div class="mb-3">
                        <label for="interpretazioneDatiInfogr" class="form-label">Interpretazione dei dati:</label>
                        <textarea class="form-control form-control-sm" id="interpretazioneDatiInfogr" rows="3" placeholder="Note per aiutare l'AI a capire i dati..."></textarea>
                         <div class="form-text">Opzionale. Lascia vuoto per ignorare.</div>
                    </div>
                    <div class="mb-3">
                        <label for="prioritaDatiInfogr" class="form-label">Priorità dati:</label>
                        <input type="text" class="form-control form-control-sm" id="prioritaDatiInfogr" value="" placeholder="Indica ordine/valore dei dati">
                        <div class="form-text">Opzionale. Lascia vuoto per ignorare.</div>
                    </div>
                </fieldset>

                <fieldset id="fs-stileVisualizzazioneInfogr">
                    <legend>Stile e Visualizzazione</legend>
                     <div class="preset-selector-container">
                         <label for="preset-stileVisualizzazioneInfogr" class="preset-label">Preset:</label>
                         <select id="preset-stileVisualizzazioneInfogr" class="form-select form-select-sm preset-selector"> <option value="">-- Seleziona Preset --</option> </select>
                     </div>
                     <div class="mb-3">
                         <label for="tipologiaInfograficaInfogr" class="form-label">Tipologia infografica:</label>
                         <input type="text" class="form-control form-control-sm" id="tipologiaInfograficaInfogr" value="" placeholder="Es. Panoramica sintetica, Approfondimento...">
                         <div class="form-text">Opzionale. Lascia vuoto per ignorare (o suggerimento AI).</div>
                     </div>
                     <div class="mb-3">
                         <label for="graficiPreferitiInfogr" class="form-label">Grafici preferiti:</label>
                         <input type="text" class="form-control form-control-sm" id="graficiPreferitiInfogr" value="" placeholder="Es. barre, torta, scelta da AI...">
                          <div class="form-text">Opzionale. Lascia vuoto per ignorare (o suggerimento AI).</div>
                     </div>
                      <div class="mb-3">
                         <label for="toneOfVoiceInfogr" class="form-label">Tone of Voice:</label>
                          <select class="form-select form-select-sm" id="toneOfVoiceInfogr">
                             <option value="" selected>-- Non specificato (Ignora) --</option>
                             <option value="Ispirazionale">Ispirazionale</option>
                             <option value="Informativo">Informativo</option>
                             <option value="Persuasivo">Persuasivo</option>
                             <option value="Formale">Formale</option>
                             <option value="Motivazionale">Motivazionale</option>
                             <option value="Neutro">Neutro</option>
                             <option value="AI_DECIDE">-- Suggerito da AI --</option>
                          </select>
                         <div class="form-text">Opzionale. Scegli, ignora, o chiedi suggerimento AI.</div>
                     </div>
                     <div class="mb-3">
                         <label for="colorPaletteInfogr" class="form-label">Color Palette:</label>
                         <input type="text" class="form-control form-control-sm" id="colorPaletteInfogr" value="" placeholder="Es. Rosso Intarget #e43e30, Nero #000000...">
                          <div class="form-text">Opzionale. Lascia vuoto per ignorare (o suggerimento AI).</div>
                     </div>
                      <div class="mb-3">
                         <label for="sfondoInfogr" class="form-label">Sfondo:</label>
                         <input type="text" class="form-control form-control-sm" id="sfondoInfogr" value="" placeholder="Es. Bianco, Trasparente...">
                          <div class="form-text">Opzionale. Lascia vuoto per ignorare (default: bianco/trasparente).</div>
                     </div>
                      <div class="mb-3">
                         <label for="tipografiaInfogr" class="form-label">Tipografia:</label>
                         <input type="text" class="form-control form-control-sm" id="tipografiaInfogr" value="" placeholder="Es. Stile: Sans-serif pulito...">
                         <div class="form-text">Opzionale. Descrivi lo STILE. Lascia vuoto per ignorare.</div>
                     </div>
                      <div class="mb-3">
                         <label for="iconografiaInfogr" class="form-label">Iconografia:</label>
                         <input type="text" class="form-control form-control-sm" id="iconografiaInfogr" value="" placeholder="Es. Icone semplici, piene, nere o rosse...">
                          <div class="form-text">Opzionale. Lascia vuoto per ignorare.</div>
                     </div>
                      <div class="mb-3">
                         <label for="strutturaLayoutInfogr" class="form-label">Struttura e Layout:</label>
                         <input type="text" class="form-control form-control-sm" id="strutturaLayoutInfogr" value="" placeholder="Es. minimalista, sezioni logiche...">
                          <div class="form-text">Opzionale. Lascia vuoto per ignorare.</div>
                     </div>
                      <div class="mb-3">
                         <label for="stileIllustrativoInfogr" class="form-label">Stile Illustrativo:</label>
                         <input type="text" class="form-control form-control-sm" id="stileIllustrativoInfogr" value="" placeholder="Es. Stilizzato, naturale, astratto...">
                         <div class="form-text">Opzionale. Lascia vuoto per ignorare.</div>
                     </div>
                </fieldset>

                 <fieldset id="fs-regoleFinalizzazioneInfogr">
                    <legend>Regole e Finalizzazione</legend>
                     <div class="preset-selector-container">
                         <label for="preset-regoleFinalizzazioneInfogr" class="preset-label">Preset:</label>
                         <select id="preset-regoleFinalizzazioneInfogr" class="form-select form-select-sm preset-selector"> <option value="">-- Seleziona Preset --</option> </select>
                      </div>
                     <div class="mb-3">
                        <label for="elementiDaNonIncludereInfogr" class="form-label">Elementi da NON includere:</label>
                        <textarea class="form-control form-control-sm" id="elementiDaNonIncludereInfogr" rows="3" placeholder="Es. Evita misspelling, colori specifici..."></textarea>
                         <div class="form-text">Opzionale. Lascia vuoto per ignorare.</div>
                    </div>
                     <div class="mb-3">
                        <label for="brandingDettagliInfogr" class="form-label">Branding e dettagli finali:</label>
                        <input type="text" class="form-control form-control-sm" id="brandingDettagliInfogr" value="" placeholder="Es. Fonti in basso a sinistra, logo...">
                         <div class="form-text">Opzionale. Lascia vuoto per ignorare.</div>
                    </div>
                    <div class="mb-3">
                        <label for="autonomiaAIInfogr" class="form-label">Autonomia Creativa dell’AI:</label>
                        <input type="text" class="form-control form-control-sm" id="autonomiaAIInfogr" value="" placeholder="Es. L'AI decide layout e grafici...">
                        <div class="form-text">Opzionale. Lascia vuoto per ignorare (l'AI avrà autonomia media).</div>
                    </div>
                </fieldset>

                 <fieldset id="fs-savePreset" class="mt-4 bg-light border rounded p-3">
                    <legend class="w-auto px-2 h6 mb-3 fw-semibold">Salva Preset Personale</legend>
                    <div class="d-flex flex-column flex-sm-row align-items-sm-end gap-2">
                         <div class="flex-grow-1">
                            <label for="newPresetName" class="form-label form-label-sm">Nome per il nuovo Preset:</label>
                            <input type="text" class="form-control form-control-sm" id="newPresetName" placeholder="Es. Infografica Report Mensile">
                         </div>
                         <button type="button" id="savePresetBtn" class="btn btn-success btn-sm flex-shrink-0">Salva Preset Corrente</button>
                    </div>
                    <div class="form-text mt-2">Salva la configurazione attuale per riutilizzarla (memorizzata solo su questo browser).</div>
                 </fieldset>
            </form>

            <h2 class="mt-4">Prompt Generato per Infografica</h2>
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
    // Elementi del Form specifici per Infografica
    const formElements = {
        formatoInfografica: document.getElementById('formatoInfografica'), linguaInfogr: document.getElementById('linguaInfogr'), targetAudienceInfogr: document.getElementById('targetAudienceInfogr'), contestoUsoInfogr: document.getElementById('contestoUsoInfogr'), obiettivoComunicativoInfogr: document.getElementById('obiettivoComunicativoInfogr'), messaggioPrincipaleInfogr: document.getElementById('messaggioPrincipaleInfogr'), datiGrezzi: document.getElementById('datiGrezzi'), interpretazioneDatiInfogr: document.getElementById('interpretazioneDatiInfogr'), prioritaDatiInfogr: document.getElementById('prioritaDatiInfogr'), tipologiaInfograficaInfogr: document.getElementById('tipologiaInfograficaInfogr'), graficiPreferitiInfogr: document.getElementById('graficiPreferitiInfogr'), toneOfVoiceInfogr: document.getElementById('toneOfVoiceInfogr'), colorPaletteInfogr: document.getElementById('colorPaletteInfogr'), sfondoInfogr: document.getElementById('sfondoInfogr'), tipografiaInfogr: document.getElementById('tipografiaInfogr'), iconografiaInfogr: document.getElementById('iconografiaInfogr'), strutturaLayoutInfogr: document.getElementById('strutturaLayoutInfogr'), stileIllustrativoInfogr: document.getElementById('stileIllustrativoInfogr'), elementiDaNonIncludereInfogr: document.getElementById('elementiDaNonIncludereInfogr'), brandingDettagliInfogr: document.getElementById('brandingDettagliInfogr'), autonomiaAIInfogr: document.getElementById('autonomiaAIInfogr')
    };
    // Etichette per il Prompt
    const fieldLabels = {
        formatoInfografica: "Formato Infografica", linguaInfogr: "Lingua", targetAudienceInfogr: "Target Audience", contestoUsoInfogr: "Contesto d’Uso", obiettivoComunicativoInfogr: "Obiettivo Comunicativo", messaggioPrincipaleInfogr: "Messaggio principale", datiGrezzi: "Dati da considerare", interpretazioneDatiInfogr: "Interpretazione dei dati", prioritaDatiInfogr: "Priorità dati", tipologiaInfograficaInfogr: "Tipologia infografica", graficiPreferitiInfogr: "Grafici preferiti", toneOfVoiceInfogr: "Tone of Voice", colorPaletteInfogr: "Color Palette", sfondoInfogr: "Sfondo", tipografiaInfogr: "Tipografia", iconografiaInfogr: "Iconografia", strutturaLayoutInfogr: "Struttura e Layout", stileIllustrativoInfogr: "Stile Illustrativo", elementiDaNonIncludereInfogr: "Elementi da NON includere", brandingDettagliInfogr: "Branding e dettagli finali", autonomiaAIInfogr: "Autonomia Creativa dell’AI"
    };
    // Preset Standard
    const builtInPresets = {
        'fs-infoGeneraliInfogr': [ { name: "Presentazione Cliente", id: "clientPres", values: { formatoInfografica: "Slide intera (16:9)", targetAudienceInfogr: "Referente Cliente", contestoUsoInfogr:"Presentazione Risultati/Proposta", obiettivoComunicativoInfogr:"Informare e Persuadere", messaggioPrincipaleInfogr:"[Sintesi Messaggio Chiave]"}} ],
        'fs-datiContenutoInfogr': [ { name: "Focus su Dati Chiave", id: "dataFocus", values: { interpretazioneDatiInfogr: "Evidenziare i KPI principali e il loro significato.", prioritaDatiInfogr:"Alta priorità ai numeri chiave, minimizzare testo descrittivo."}} ],
        'fs-stileVisualizzazioneInfogr': [ { name: "Stile Intarget", id: "intargetStyle", values: { tipologiaInfograficaInfogr: "Panoramica sintetica / Analitica", graficiPreferitiInfogr: "Barre/Linee pulite", toneOfVoiceInfogr: "Professionale", colorPaletteInfogr: "Rosso Intarget #e43e30, Nero #000000, Bianco sfondo", sfondoInfogr: "Bianco", tipografiaInfogr: "Stile: Sans-serif pulito", iconografiaInfogr: "Icone semplici, piene", strutturaLayoutInfogr: "minimalista, sezioni logiche", stileIllustrativoInfogr: "Stilizzato, astratto" } } ],
        'fs-regoleFinalizzazioneInfogr': [ { name: "Standard Intarget", id: "intargetRules", values: { elementiDaNonIncludereInfogr: "Evita misspelling, errori, impaginazioni non equilibrate.", brandingDettagliInfogr: "Fonti in basso a sx (Lato Light)", autonomiaAIInfogr: "Media autonomia" } } ]
     };
    // Elementi UI
    const promptGeneratoTextarea = document.getElementById('prompt_generato');
    const copiaBtn = document.getElementById('copiaBtn');
    const resetBtn = document.getElementById('resetBtn');
    const newPresetNameInput = document.getElementById('newPresetName');
    const savePresetBtn = document.getElementById('savePresetBtn');
    const localStorageKey = 'userPresets_infographic'; // Chiave localStorage specifica

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
    // Funzione Genera Prompt (specifica per Infografica)
    function generaPrompt() {
        let promptFinale = `**PROMPT PER IMMAGINE INFOGRAFICA DASHBOARD**\n\n`;
        let mandatoryFieldsInfogr = ['formatoInfografica', 'linguaInfogr', 'datiGrezzi'];
        for (const key in formElements) { const element = formElements[key]; if (!element) continue; const isMandatory = mandatoryFieldsInfogr.includes(key); promptFinale += getFieldPromptValue(key, element, isMandatory); }
        promptFinale += `\n---\nGenera un'immagine per infografica dashboard seguendo scrupolosamente tutte le specifiche sopra indicate. Assicurati che sia visivamente chiara, rispetti i dati forniti e le linee guida stilistiche.`;
        promptGeneratoTextarea.value = promptFinale;
    }
    // Funzione Copia Prompt (identica)
    function copiaPrompt() { const testoDaCopiare = promptGeneratoTextarea.value; navigator.clipboard.writeText(testoDaCopiare).then(() => { const t = copiaBtn.textContent; copiaBtn.textContent = 'Copiato!'; copiaBtn.style.backgroundColor = '#28a745'; setTimeout(() => { copiaBtn.textContent = t; copiaBtn.style.backgroundColor = '#e43e30'; }, 2000); }).catch(err => { console.error('Errore copia: ', err); alert('Errore copia testo.'); }); }
    // Funzione Reset Form (specifica per Infografica)
    function resetForm() {
        const baseValues = { formatoInfografica: "Slide intera (16:9)", linguaInfogr: "Italiano", targetAudienceInfogr: "", contestoUsoInfogr: "", obiettivoComunicativoInfogr: "", messaggioPrincipaleInfogr: "", datiGrezzi: "", interpretazioneDatiInfogr: "", prioritaDatiInfogr: "", tipologiaInfograficaInfogr: "", graficiPreferitiInfogr: "", toneOfVoiceInfogr: "", colorPaletteInfogr: "", sfondoInfogr: "", tipografiaInfogr: "", iconografiaInfogr: "", strutturaLayoutInfogr: "", stileIllustrativoInfogr: "", elementiDaNonIncludereInfogr: "", brandingDettagliInfogr: "", autonomiaAIInfogr: "" };
        for (const key in formElements) { const element = formElements[key]; if (element) { element.value = baseValues[key] || ''; } }
        if(formElements.formatoInfografica) formElements.formatoInfografica.value = baseValues.formatoInfografica; if(formElements.toneOfVoiceInfogr) formElements.toneOfVoiceInfogr.value = "";
        generaPrompt();
    }
    // Event Listeners (con real-time e save preset)
    document.addEventListener('DOMContentLoaded', () => {
        populatePresetDropdowns();
        const presetSelectors = document.querySelectorAll('.preset-selector'); presetSelectors.forEach(selector => { selector.addEventListener('change', (event) => { const selectedPresetId = event.target.value; const fieldset = event.target.closest('fieldset'); if (fieldset && selectedPresetId) { applyPreset(fieldset.id, selectedPresetId); } else if (fieldset) { selector.value = ""; } }); });
        const form = document.getElementById('promptForm');
        if (form) {
            const inputElements = form.querySelectorAll('input:not(#newPresetName), select:not(.preset-selector), textarea');
            inputElements.forEach(element => { const eventType = (element.tagName === 'SELECT' || element.type === 'checkbox' || element.type === 'date') ? 'change' : 'input'; element.addEventListener(eventType, generaPrompt); });
        }
        if(savePresetBtn) { savePresetBtn.addEventListener('click', saveCurrentPreset); }
        generaPrompt(); // Genera prompt iniziale
    });
    copiaBtn.addEventListener('click', copiaPrompt);
    resetBtn.addEventListener('click', resetForm);
  </script>

</body>
</html>