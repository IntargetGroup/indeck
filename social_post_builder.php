<?php $pageTitle = "Generatore Prompt: Post Social Media"; require_once '_header.php'; ?>

    <?php require_once '_sidebar.php'; ?>

    <?php // Colonna Contenuto Principale ?>
    <div class="col main-content-area px-md-4 py-3">

        <?php require_once '_page_header.php'; ?>

        <main>
          <div class="container" id="prompt-builder-container"> <?php // Rimosso container doppio, usa quello BS ?>
            <form id="promptForm">
               <h2>Configura il Prompt per Post Social</h2>
                <p class="form-text mb-4">Il prompt generato si aggiornerà automaticamente mentre compili i campi.</p>

               <fieldset id="fs-infoGeneraliSocial">
                    <legend>Informazioni Base Post</legend>
                    <div class="preset-selector-container">
                        <label for="preset-infoGeneraliSocial" class="preset-label">Preset:</label>
                        <select id="preset-infoGeneraliSocial" class="form-select preset-selector"> <option value="">-- Seleziona Preset --</option> </select>
                    </div>
                    <div class="mb-3">
                        <label for="piattaforma" class="form-label">Piattaforma Target: <span class="required-label">*</span></label>
                        <select class="form-select form-select-sm" id="piattaforma" required>
                            <option value="">-- Seleziona --</option>
                            <option value="LinkedIn">LinkedIn</option>
                            <option value="Instagram Feed">Instagram Feed</option>
                            <option value="Instagram Stories">Instagram Stories</option>
                            <option value="Facebook">Facebook</option>
                            <option value="X (Twitter)">X (Twitter)</option>
                            <option value="TikTok">TikTok</option>
                            <option value="Altro (Specificare)">Altro (Specificare)</option>
                            <option value="AI_DECIDE">-- Suggerito da AI --</option>
                        </select>
                        <div class="form-text">Obbligatorio. Seleziona o chiedi suggerimento AI.</div>
                    </div>
                    <div class="mb-3">
                        <label for="obiettivoPost" class="form-label">Obiettivo del Post: <span class="required-label">*</span></label>
                         <input type="text" class="form-control form-control-sm" id="obiettivoPost" value="" required placeholder="Es. Awareness Brand, Engagement...">
                        <div class="form-text">Obbligatorio (o suggerimento AI se vuoto).</div>
                    </div>
                    <div class="mb-3">
                        <label for="targetAudienceSocial" class="form-label">Target Audience Specifico:</label>
                        <input type="text" class="form-control form-control-sm" id="targetAudienceSocial" value="" placeholder="Es. Marketing Manager B2B tech...">
                        <div class="form-text">Opzionale (consigliato). Lascia vuoto per ignorare (o per suggerimento AI).</div>
                    </div>
                     <div class="mb-3">
                        <label for="topic" class="form-label">Argomento/Prodotto/Servizio: <span class="required-label">*</span></label>
                        <input type="text" class="form-control form-control-sm" id="topic" value="" required placeholder="Di cosa parla il post?">
                        <div class="form-text">Obbligatorio (o suggerimento AI se vuoto).</div>
                    </div>
                     <div class="mb-3">
                        <label for="messaggioChiave" class="form-label">Messaggio Chiave / Insight Principale:</label>
                        <input type="text" class="form-control form-control-sm" id="messaggioChiave" value="" placeholder="L'idea fondamentale da comunicare.">
                        <div class="form-text">Opzionale (consigliato). Lascia vuoto per ignorare.</div>
                    </div>
                    <div class="mb-3">
                        <label for="cta" class="form-label">Call to Action (CTA):</label>
                        <input type="text" class="form-control form-control-sm" id="cta" value="" placeholder="Es. Scopri di più, Link in bio, Commenta...">
                        <div class="form-text">Opzionale. Lascia vuoto per ignorare (o suggerimento AI se obiettivo è conversione/lead).</div>
                    </div>
                </fieldset>

                 <fieldset id="fs-stileContenutoSocial">
                    <legend>Stile e Contenuto</legend>
                    <div class="preset-selector-container">
                         <label for="preset-stileContenutoSocial" class="preset-label">Preset:</label>
                         <select id="preset-stileContenutoSocial" class="form-select preset-selector"> <option value="">-- Seleziona Preset --</option> </select>
                    </div>
                     <div class="mb-3">
                         <label for="toneOfVoiceSocial" class="form-label">Tone of Voice:</label>
                         <select class="form-select form-select-sm" id="toneOfVoiceSocial">
                             <option value="" selected>-- Non specificato (Ignora) --</option>
                             <option value="Professionale">Professionale</option>
                             <option value="Informale">Informale</option>
                             <option value="Entusiasta">Entusiasta</option>
                             <option value="Divertente">Divertente</option>
                             <option value="Serio/Formale">Serio/Formale</option>
                             <option value="Urgente">Urgente</option>
                             <option value="Empatico">Empatico</option>
                             <option value="Provocatorio">Provocatorio</option>
                              <option value="AI_DECIDE">-- Suggerito da AI --</option>
                         </select>
                         <div class="form-text">Opzionale. Scegli, ignora o chiedi suggerimento AI.</div>
                     </div>
                     <div class="mb-3">
                         <label for="elementiObbligatori" class="form-label">Elementi Obbligatori:</label>
                         <textarea class="form-control form-control-sm" id="elementiObbligatori" rows="3" placeholder="Hashtag specifici, menzioni, link, dati..."></textarea>
                         <div class="form-text">Opzionale. Lascia vuoto per ignorare.</div>
                     </div>
                     <div class="mb-3">
                         <label for="evitareAssolutamente" class="form-label">Cosa Evitare Assolutamente:</label>
                         <textarea class="form-control form-control-sm" id="evitareAssolutamente" rows="3" placeholder="Termini, argomenti, stili da non usare..."></textarea>
                         <div class="form-text">Opzionale. Lascia vuoto per ignorare.</div>
                     </div>
                     <div class="mb-3">
                         <label for="outputDesiderato" class="form-label">Tipo di Output Richiesto: <span class="required-label">*</span></label>
                         <select class="form-select form-select-sm" id="outputDesiderato" required>
                             <option value="">-- Seleziona --</option>
                             <option value="Solo Testo Post" selected>Solo Testo Post</option>
                             <option value="Descrizione Idea Visuale">Descrizione Idea Visuale</option>
                             <option value="Testo + Idea Visuale">Testo + Idea Visuale</option>
                             <option value="Variazioni Multiple Testo">Variazioni Multiple Testo</option>
                              <option value="AI_DECIDE">-- Suggerito da AI --</option>
                         </select>
                         <div class="form-text">Obbligatorio. Cosa deve produrre l'AI?</div>
                     </div>
                     <div class="mb-3">
                         <label for="lunghezzaTesto" class="form-label">Lunghezza Indicativa Testo:</label>
                         <select class="form-select form-select-sm" id="lunghezzaTesto">
                             <option value="" selected>-- Non specificato (Ignora) --</option>
                             <option value="Molto Breve (Tweet/X)">Molto Breve (Tweet/X)</option>
                             <option value="Breve (Caption Instagram)">Breve (Caption Instagram)</option>
                             <option value="Medio (Post Facebook/LinkedIn)">Medio (Post Facebook/LinkedIn)</option>
                             <option value="Lungo (Articolo LinkedIn)">Lungo (Articolo LinkedIn)</option>
                              <option value="AI_DECIDE">-- Suggerito da AI --</option>
                         </select>
                         <div class="form-text">Opzionale. Scegli, ignora o chiedi suggerimento AI.</div>
                     </div>
                      <div class="mb-3">
                        <label for="linguaSocial" class="form-label">Lingua: <span class="required-label">*</span></label>
                        <input type="text" class="form-control form-control-sm" id="linguaSocial" value="Italiano" required>
                         <div class="form-text">Obbligatorio (o suggerimento AI se vuoto).</div>
                    </div>
                 </fieldset>

                 <fieldset id="fs-savePreset" class="mt-4 bg-light border rounded p-3">
                    <legend class="w-auto px-2 h6 mb-3 fw-semibold">Salva Preset Personale</legend>
                    <div class="d-flex flex-column flex-sm-row align-items-sm-end gap-2">
                         <div class="flex-grow-1">
                            <label for="newPresetName" class="form-label form-label-sm">Nome per il nuovo Preset:</label>
                            <input type="text" class="form-control form-control-sm" id="newPresetName" placeholder="Es. Post LinkedIn Servizio X">
                         </div>
                         <button type="button" id="savePresetBtn" class="btn btn-success btn-sm flex-shrink-0">Salva Preset Corrente</button> <?php // Bottone verde Save ?>
                    </div>
                    <div class="form-text mt-2">Salva la configurazione attuale per riutilizzarla (memorizzata solo su questo browser).</div>
                 </fieldset>
            </form>

            <h2 class="mt-4">Prompt Generato</h2>
            <textarea id="prompt_generato" class="form-control" rows="15" readonly></textarea>

            <div class="button-group text-end mt-4 pt-3 border-top"> <?php // Allineato a destra ?>
                <button type="button" id="resetBtn" class="btn btn-secondary btn-sm me-2">Reset Campi</button> <?php // Me-2 per spazio ?>
                <button type="button" id="copiaBtn" class="btn btn-primary btn-sm">Copia Prompt</button>
            </div>
          </div>
        </main>
    </div> <?php // Chiusura colonna main-content-area ?>

<?php require_once '_footer.php'; ?>

<?php // Script specifici per questa pagina ?>
<script>
    // Elementi del Form specifici per Social Post
    const formElements = {
        piattaforma: document.getElementById('piattaforma'), obiettivoPost: document.getElementById('obiettivoPost'), targetAudienceSocial: document.getElementById('targetAudienceSocial'), topic: document.getElementById('topic'), messaggioChiave: document.getElementById('messaggioChiave'), cta: document.getElementById('cta'), toneOfVoiceSocial: document.getElementById('toneOfVoiceSocial'), elementiObbligatori: document.getElementById('elementiObbligatori'), evitareAssolutamente: document.getElementById('evitareAssolutamente'), outputDesiderato: document.getElementById('outputDesiderato'), lunghezzaTesto: document.getElementById('lunghezzaTesto'), linguaSocial: document.getElementById('linguaSocial')
    };
    // Etichette per il Prompt
    const fieldLabels = {
        piattaforma: "Piattaforma Target", obiettivoPost: "Obiettivo del Post", targetAudienceSocial: "Target Audience Specifico", topic: "Argomento/Prodotto/Servizio", messaggioChiave: "Messaggio Chiave / Insight Principale", cta: "Call to Action (CTA)", toneOfVoiceSocial: "Tone of Voice", elementiObbligatori: "Elementi Obbligatori", evitareAssolutamente: "Cosa Evitare Assolutamente", outputDesiderato: "Tipo di Output Richiesto", lunghezzaTesto: "Lunghezza Indicativa Testo", linguaSocial: "Lingua"
    };
    // Preset Standard
    const builtInPresets = {
        'fs-infoGeneraliSocial': [ { name: "LinkedIn B2B Awareness", id: "liB2bAware", values: { piattaforma: "LinkedIn", obiettivoPost: "Awareness Brand/Servizio", targetAudienceSocial: "Professionisti settore [X]", topic: "[Nome Servizio/Azienda]", messaggioChiave: "Siamo leader in [X]", cta: "Visita il nostro sito" } }, { name: "Instagram Engagement Prodotto", id: "igEngProd", values: { piattaforma: "Instagram Feed", obiettivoPost: "Engagement (Like/Commenti)", targetAudienceSocial: "Follower interessati a [Y]", topic: "[Nome Prodotto]", messaggioChiave: "Guarda cosa puoi fare con [Prodotto]!", cta: "Commenta con la tua opinione!" } } ],
        'fs-stileContenutoSocial': [ { name: "Stile Formale LinkedIn", id: "liFormalStyle", values: { toneOfVoiceSocial: "Professionale", elementiObbligatori: "#[keywordsettore]", evitareAssolutamente: "Emoji eccessive, linguaggio troppo colloquiale", outputDesiderato: "Solo Testo Post", lunghezzaTesto: "Medio (Post Facebook/LinkedIn)", linguaSocial: "Italiano" } }, { name: "Stile Visual Instagram", id: "igVisualStyle", values: { toneOfVoiceSocial: "Entusiasta", elementiObbligatori: "#[prodotto] #[trend]", evitareAssolutamente: "Testo troppo lungo", outputDesiderato: "Testo + Idea Visuale", lunghezzaTesto: "Breve (Caption Instagram)", linguaSocial: "Italiano" } } ]
    };
    // Elementi UI
    const promptGeneratoTextarea = document.getElementById('prompt_generato');
    const copiaBtn = document.getElementById('copiaBtn');
    const resetBtn = document.getElementById('resetBtn');
    const newPresetNameInput = document.getElementById('newPresetName');
    const savePresetBtn = document.getElementById('savePresetBtn');
    const localStorageKey = 'userPresets_social'; // Chiave localStorage specifica

    // --- Funzioni Helper e Principali ---
    function getCheckboxValues(name) { const cbs = document.querySelectorAll(`input[name="${name}"]:checked`); return Array.from(cbs).map(cb => cb.value); }
    function setCheckboxValues(name, valuesArray) { const allCb = document.querySelectorAll(`input[name="${name}"]`); allCb.forEach(cb => { cb.checked = valuesArray ? valuesArray.includes(cb.value) : false; }); }
    function getFieldPromptValue(key, element, isMandatory = false) {
         if (element instanceof NodeList) { return ""; } // No checkbox multipli in questo form
         if (element && element.type === 'checkbox') { return ""; } // No checkbox singoli in questo form
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
    // Funzione Genera Prompt (specifica per Social)
    function generaPrompt() {
        let promptFinale = `**PROMPT PER POST SOCIAL MEDIA**\n\n`;
        let mandatoryFieldsSocial = ['piattaforma', 'obiettivoPost', 'topic', 'outputDesiderato', 'linguaSocial'];
        for (const key in formElements) { const element = formElements[key]; if (!element) continue; const isMandatory = mandatoryFieldsSocial.includes(key); promptFinale += getFieldPromptValue(key, element, isMandatory); }
        promptFinale += `\n---\nGenera l'output richiesto (${formElements.outputDesiderato.value || '[Non specificato, suggerisci tu]'}), seguendo tutte le specifiche indicate per creare un post efficace.`;
        promptGeneratoTextarea.value = promptFinale;
    }
    // Funzione Copia Prompt (identica)
    function copiaPrompt() { const testoDaCopiare = promptGeneratoTextarea.value; navigator.clipboard.writeText(testoDaCopiare).then(() => { const t = copiaBtn.textContent; copiaBtn.textContent = 'Copiato!'; copiaBtn.style.backgroundColor = '#28a745'; setTimeout(() => { copiaBtn.textContent = t; copiaBtn.style.backgroundColor = '#e43e30'; }, 2000); }).catch(err => { console.error('Errore copia: ', err); alert('Errore copia testo.'); }); }
    // Funzione Reset Form (specifica per Social)
    function resetForm() {
        const baseValues = { piattaforma: "", obiettivoPost: "", targetAudienceSocial: "", topic: "", messaggioChiave: "", cta: "", toneOfVoiceSocial: "", elementiObbligatori: "", evitareAssolutamente: "", outputDesiderato: "Solo Testo Post", lunghezzaTesto: "", linguaSocial: "Italiano" };
        for (const key in formElements) { const element = formElements[key]; if (element) { element.value = baseValues[key] || ''; } }
        if(formElements.piattaforma) formElements.piattaforma.value = ""; if(formElements.toneOfVoiceSocial) formElements.toneOfVoiceSocial.value = ""; if(formElements.outputDesiderato) formElements.outputDesiderato.value = baseValues.outputDesiderato; if(formElements.lunghezzaTesto) formElements.lunghezzaTesto.value = "";
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
                 const eventType = (element.tagName === 'SELECT' || element.type === 'checkbox' || element.type === 'date') ? 'change' : 'input';
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