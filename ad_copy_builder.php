<?php $pageTitle = "Generatore Prompt: Copy Annunci PPC"; require_once '_header.php'; ?>

    <?php require_once '_sidebar.php'; ?>

    <?php // Colonna Contenuto Principale ?>
    <div class="col main-content-area px-md-4 py-3">

        <?php require_once '_page_header.php'; ?>

        <main>
          <div id="prompt-builder-container">
            <form id="promptForm">
               <h2>Configura il Prompt per Ad Copy</h2>
                <p class="form-text mb-4">Il prompt generato si aggiornerà automaticamente mentre compili i campi.</p>

               <fieldset id="fs-infoGeneraliAd">
                    <legend>Informazioni Campagna</legend>
                    <div class="preset-selector-container">
                         <label for="preset-infoGeneraliAd" class="preset-label">Preset:</label>
                         <select id="preset-infoGeneraliAd" class="form-select form-select-sm preset-selector"> <option value="">-- Seleziona Preset --</option> </select>
                    </div>
                     <div class="mb-3">
                         <label for="piattaformaAd" class="form-label">Piattaforma Annuncio: <span class="required-label">*</span></label>
                         <select class="form-select form-select-sm" id="piattaformaAd" required>
                             <option value="">-- Seleziona --</option>
                             <option value="Google Ads (Search)">Google Ads (Search)</option>
                             <option value="Google Ads (Display/PMax)">Google Ads (Display/PMax)</option>
                             <option value="Meta Ads (Facebook/Instagram)">Meta Ads (Facebook/Instagram)</option>
                             <option value="LinkedIn Ads">LinkedIn Ads</option>
                              <option value="AI_DECIDE">-- Suggerito da AI --</option>
                         </select>
                         <div class="form-text">Obbligatorio. Scegli o chiedi suggerimento AI.</div>
                     </div>
                     <div class="mb-3">
                        <label for="prodottoServizio" class="form-label">Prodotto/Servizio Promosso: <span class="required-label">*</span></label>
                        <input type="text" class="form-control form-control-sm" id="prodottoServizio" value="" required placeholder="Cosa stai pubblicizzando?">
                        <div class="form-text">Obbligatorio (o suggerimento AI se vuoto).</div>
                    </div>
                     <div class="mb-3">
                        <label for="usp" class="form-label">Unique Selling Proposition (USP): <span class="required-label">*</span></label>
                        <input type="text" class="form-control form-control-sm" id="usp" value="" required placeholder="Es. Spedizione Gratuita, Funzione Unica X...">
                        <div class="form-text">Obbligatorio (o suggerimento AI se vuoto). Il vantaggio competitivo chiave.</div>
                    </div>
                     <div class="mb-3">
                        <label for="targetAudienceAd" class="form-label">Target Audience (Interessi/Keywords): <span class="required-label">*</span></label>
                        <textarea class="form-control form-control-sm" id="targetAudienceAd" rows="2" required placeholder="Descrivi il pubblico o le keyword del gruppo annunci"></textarea>
                        <div class="form-text">Obbligatorio (o suggerimento AI se vuoto). Chi vuoi raggiungere?</div>
                    </div>
                     <div class="mb-3">
                         <label for="obiettivoCampagna" class="form-label">Obiettivo Campagna: <span class="required-label">*</span></label>
                         <select class="form-select form-select-sm" id="obiettivoCampagna" required>
                             <option value="">-- Seleziona --</option>
                             <option value="Click/Traffico">Click/Traffico</option>
                             <option value="Conversioni/Vendite">Conversioni/Vendite</option>
                             <option value="Lead Generation">Lead Generation</option>
                             <option value="Brand Awareness">Brand Awareness</option>
                              <option value="AI_DECIDE">-- Suggerito da AI --</option>
                         </select>
                         <div class="form-text">Obbligatorio. Scegli il KPI principale o chiedi suggerimento AI.</div>
                     </div>
                </fieldset>

                <fieldset id="fs-elementiCopyAd">
                     <legend>Elementi del Copy</legend>
                      <div class="preset-selector-container">
                         <label for="preset-elementiCopyAd" class="preset-label">Preset:</label>
                         <select id="preset-elementiCopyAd" class="form-select form-select-sm preset-selector"> <option value="">-- Seleziona Preset --</option> </select>
                      </div>
                      <div class="mb-3">
                         <label for="keywordPrincipaleAd" class="form-label">Keyword Principale (per Google Ads Search):</label>
                         <input type="text" class="form-control form-control-sm" id="keywordPrincipaleAd" value="" placeholder="Keyword principale del gruppo annunci">
                         <div class="form-text">Opzionale (ma cruciale per Search). Lascia vuoto per ignorare.</div>
                     </div>
                      <div class="mb-3">
                         <label for="offertaPromozione" class="form-label">Offerta/Promozione:</label>
                         <input type="text" class="form-control form-control-sm" id="offertaPromozione" value="" placeholder="Es. Sconto 20%, Prova Gratuita">
                         <div class="form-text">Opzionale. Lascia vuoto per ignorare.</div>
                     </div>
                      <div class="mb-3">
                         <label for="ctaAd" class="form-label">Call to Action (CTA) Desiderata: <span class="required-label">*</span></label>
                         <input type="text" class="form-control form-control-sm" id="ctaAd" value="" required placeholder="Es. Acquista Ora, Scopri di Più...">
                         <div class="form-text">Obbligatorio (o suggerimento AI se vuoto).</div>
                     </div>
                      <div class="mb-3">
                         <label for="toneOfVoiceAd" class="form-label">Tone of Voice Annuncio:</label>
                         <select class="form-select form-select-sm" id="toneOfVoiceAd">
                              <option value="" selected>-- Non specificato (Ignora) --</option>
                             <option value="Diretto e Conciso">Diretto e Conciso</option>
                             <option value="Orientato al Beneficio">Orientato al Beneficio</option>
                             <option value="Urgente (FOMO)">Urgente (FOMO)</option>
                             <option value="Domanda Coinvolgente">Domanda Coinvolgente</option>
                             <option value="Prova Sociale (Recensioni)">Prova Sociale (Recensioni)</option>
                             <option value="Informativo">Informativo</option>
                              <option value="AI_DECIDE">-- Suggerito da AI --</option>
                         </select>
                         <div class="form-text">Opzionale. Scegli, ignora o chiedi suggerimento AI.</div>
                     </div>
                      <div class="mb-3">
                         <label for="evitareAd" class="form-label">Elementi da Evitare:</label>
                         <textarea class="form-control form-control-sm" id="evitareAd" rows="2" placeholder="Parole chiave negative, claim non supportati..."></textarea>
                         <div class="form-text">Opzionale. Lascia vuoto per ignorare.</div>
                     </div>
                     <div class="mb-3">
                         <label for="numeroVarianti" class="form-label">Numero Varianti Richieste:</label>
                         <input type="number" class="form-control form-control-sm" id="numeroVarianti" value="5" min="1" max="20">
                         <div class="form-text">Quanti titoli e/o descrizioni generare (indicativo).</div>
                     </div>
                      <div class="mb-3">
                        <label for="linguaAd" class="form-label">Lingua: <span class="required-label">*</span></label>
                        <input type="text" class="form-control form-control-sm" id="linguaAd" value="Italiano" required>
                         <div class="form-text">Obbligatorio (o suggerimento AI se vuoto).</div>
                     </div>
                </fieldset>

                 <fieldset id="fs-savePreset" class="mt-4 bg-light border rounded p-3">
                    <legend class="w-auto px-2 h6 mb-3 fw-semibold">Salva Preset Personale</legend>
                    <div class="d-flex flex-column flex-sm-row align-items-sm-end gap-2">
                         <div class="flex-grow-1">
                            <label for="newPresetName" class="form-label form-label-sm">Nome per il nuovo Preset:</label>
                            <input type="text" class="form-control form-control-sm" id="newPresetName" placeholder="Es. Copy Google Search Lead Gen">
                         </div>
                         <button type="button" id="savePresetBtn" class="btn btn-success btn-sm flex-shrink-0">Salva Preset Corrente</button>
                    </div>
                    <div class="form-text mt-2">Salva la configurazione attuale per riutilizzarla (memorizzata solo su questo browser).</div>
                 </fieldset>
            </form>

            <h2 class="mt-4">Prompt Generato per Ad Copy</h2>
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
    // Elementi del Form specifici per Ad Copy
    const formElements = {
        piattaformaAd: document.getElementById('piattaformaAd'), prodottoServizio: document.getElementById('prodottoServizio'), usp: document.getElementById('usp'), targetAudienceAd: document.getElementById('targetAudienceAd'), obiettivoCampagna: document.getElementById('obiettivoCampagna'), keywordPrincipaleAd: document.getElementById('keywordPrincipaleAd'), offertaPromozione: document.getElementById('offertaPromozione'), ctaAd: document.getElementById('ctaAd'), toneOfVoiceAd: document.getElementById('toneOfVoiceAd'), evitareAd: document.getElementById('evitareAd'), numeroVarianti: document.getElementById('numeroVarianti'), linguaAd: document.getElementById('linguaAd')
    };
    // Etichette per il Prompt
    const fieldLabels = {
        piattaformaAd: "Piattaforma Annuncio", prodottoServizio: "Prodotto/Servizio Promosso", usp: "Unique Selling Proposition (USP)", targetAudienceAd: "Target Audience (Interessi/Keywords)", obiettivoCampagna: "Obiettivo Campagna", keywordPrincipaleAd: "Keyword Principale (per Google Ads Search)", offertaPromozione: "Offerta/Promozione", ctaAd: "Call to Action (CTA) Desiderata", toneOfVoiceAd: "Tone of Voice Annuncio", evitareAd: "Elementi da Evitare", numeroVarianti: "Numero Varianti Richieste", linguaAd: "Lingua"
    };
    // Preset Standard
    const builtInPresets = {
        'fs-infoGeneraliAd': [ { name: "Google Search - Lead Gen B2B", id: "gsearchLead", values: { piattaformaAd: "Google Ads (Search)", obiettivoCampagna: "Lead Generation", targetAudienceAd: "Professionisti [Settore], Ruolo [X]", prodottoServizio:"[Servizio Specifico]", usp:"[Vantaggio Chiave per B2B]"} }, { name: "Meta Ads - Vendita Ecomm", id: "metaEcomm", values: { piattaformaAd: "Meta Ads (Facebook/Instagram)", obiettivoCampagna: "Conversioni/Vendite", targetAudienceAd: "Interessi: [Prodotto], Demografia: [Età], Lookalike: [Audience]", prodottoServizio:"[Prodotto Specifico]", usp:"[Vantaggio Chiave Prodotto]" } } ],
        'fs-elementiCopyAd': [ { name: "Copy Diretto + Urgenza", id: "directFomo", values: { offertaPromozione: "Sconto X% solo per oggi!", ctaAd: "Acquista Subito!", toneOfVoiceAd: "Urgente (FOMO)", numeroVarianti: "5", linguaAd: "Italiano" } }, { name: "Copy Benefici + CTA Soft", id: "benefitSoft", values: { usp: "Risparmia tempo e aumenta l'efficienza", offertaPromozione: "", ctaAd: "Scopri Come", toneOfVoiceAd: "Orientato al Beneficio", numeroVarianti: "5", linguaAd: "Italiano" } } ]
    };
    // Elementi UI
    const promptGeneratoTextarea = document.getElementById('prompt_generato');
    const copiaBtn = document.getElementById('copiaBtn');
    const resetBtn = document.getElementById('resetBtn');
    const newPresetNameInput = document.getElementById('newPresetName');
    const savePresetBtn = document.getElementById('savePresetBtn');
    const localStorageKey = 'userPresets_adCopy'; // Chiave localStorage specifica

    // --- Funzioni Helper e Principali ---
    function getCheckboxValues(name) { const cbs = document.querySelectorAll(`input[name="${name}"]:checked`); return Array.from(cbs).map(cb => cb.value); }
    function setCheckboxValues(name, valuesArray) { const allCb = document.querySelectorAll(`input[name="${name}"]`); allCb.forEach(cb => { cb.checked = valuesArray ? valuesArray.includes(cb.value) : false; }); }
    function getFieldPromptValue(key, element, isMandatory = false) {
         if (element instanceof NodeList) { return ""; } if (element && element.type === 'checkbox') { return ""; }
         // Gestione speciale per numeroVarianti che ha un default se vuoto
         if (key === 'numeroVarianti') {
             const value = element.value.trim() || '5'; // Default a 5 se vuoto
             return `**${fieldLabels[key]}:** ${value}\n`;
         }
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
    // Funzione Genera Prompt (specifica per Ad Copy)
    function generaPrompt() {
        let promptFinale = `**PROMPT PER COPY ANNUNCI PPC**\n\n`;
        let mandatoryFieldsAd = ['piattaformaAd', 'prodottoServizio', 'usp', 'targetAudienceAd', 'obiettivoCampagna', 'ctaAd', 'linguaAd'];
        for (const key in formElements) { const element = formElements[key]; if (!element) continue; if (key === 'numeroVarianti') continue; const isMandatory = mandatoryFieldsAd.includes(key); promptFinale += getFieldPromptValue(key, element, isMandatory); }
        const numVar = formElements.numeroVarianti.value.trim() || '5'; promptFinale += `**${fieldLabels.numeroVarianti}:** ${numVar}\n`; // Aggiunge numero varianti
        const piattaforma = formElements.piattaformaAd.value || '[Piattaforma non specificata]'; // Prende piattaforma per istruzione finale
        promptFinale += `\n---\nGenera ${numVar} varianti creative per titoli (headlines) e descrizioni per la piattaforma di annunci "${piattaforma}", basandoti sulle specifiche fornite. Rispetta i limiti di caratteri impliciti della piattaforma e adatta il copy allo stile e all'obiettivo indicati.`;
        promptGeneratoTextarea.value = promptFinale;
    }
    // Funzione Copia Prompt (identica)
    function copiaPrompt() { const testoDaCopiare = promptGeneratoTextarea.value; navigator.clipboard.writeText(testoDaCopiare).then(() => { const t = copiaBtn.textContent; copiaBtn.textContent = 'Copiato!'; copiaBtn.style.backgroundColor = '#28a745'; setTimeout(() => { copiaBtn.textContent = t; copiaBtn.style.backgroundColor = '#e43e30'; }, 2000); }).catch(err => { console.error('Errore copia: ', err); alert('Errore copia testo.'); }); }
    // Funzione Reset Form (specifica per Ad Copy)
    function resetForm() {
        const baseValues = { piattaformaAd: "", prodottoServizio: "", usp: "", targetAudienceAd: "", obiettivoCampagna: "", keywordPrincipaleAd: "", offertaPromozione: "", ctaAd: "", toneOfVoiceAd: "", evitareAd: "", numeroVarianti: "5", linguaAd: "Italiano" };
        for (const key in formElements) { const element = formElements[key]; if (element) { element.value = baseValues[key] || ''; } }
        if(formElements.piattaformaAd) formElements.piattaformaAd.value = ""; if(formElements.obiettivoCampagna) formElements.obiettivoCampagna.value = ""; if(formElements.toneOfVoiceAd) formElements.toneOfVoiceAd.value = "";
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