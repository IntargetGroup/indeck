<?php $pageTitle = "Generatore Prompt: Bozza Mediaplan"; require_once '_header.php'; ?>

    <?php require_once '_sidebar.php'; ?>

    <?php // Colonna Contenuto Principale ?>
    <div class="col main-content-area px-md-4 py-3">

        <?php require_once '_page_header.php'; ?>

        <main>
          <div id="prompt-builder-container">
            <form id="promptForm">
               <h2>Configura la Bozza del Mediaplan</h2>
               <p class="form-text mb-4">Il prompt generato si aggiornerà automaticamente mentre compili i campi.</p>

               <fieldset id="fs-infoGeneraliMedia">
                    <legend>Informazioni Generali Piano</legend>
                    <div class="preset-selector-container">
                         <label for="preset-infoGeneraliMedia" class="preset-label">Preset:</label>
                         <select id="preset-infoGeneraliMedia" class="form-select form-select-sm preset-selector"> <option value="">-- Seleziona Preset --</option> </select>
                    </div>
                    <div class="mb-3">
                        <label for="nomePiano" class="form-label">Nome Piano / Campagna: <span class="required-label">*</span></label>
                        <input type="text" class="form-control form-control-sm" id="nomePiano" value="" required placeholder="Es. Lancio Prodotto X Q3 2025">
                        <div class="form-text">Obbligatorio (o suggerimento AI se vuoto).</div>
                    </div>
                     <div class="mb-3">
                        <label for="clienteProdotto" class="form-label">Cliente / Prodotto: <span class="required-label">*</span></label>
                        <input type="text" class="form-control form-control-sm" id="clienteProdotto" value="" required placeholder="Nome cliente o prodotto/servizio principale">
                        <div class="form-text">Obbligatorio (o suggerimento AI se vuoto).</div>
                    </div>
                     <div class="mb-3">
                        <label for="periodoGenerale" class="form-label">Anno Fiscale / Periodo Generale:</label>
                        <input type="text" class="form-control form-control-sm" id="periodoGenerale" value="" placeholder="Es. 2025, H2 2025">
                        <div class="form-text">Opzionale. Lascia vuoto per ignorare.</div>
                    </div>
                    <div class="mb-3">
                        <label for="periodicitaDettaglio" class="form-label">Periodicità Dettaglio Piano: <span class="required-label">*</span></label>
                        <select class="form-select form-select-sm" id="periodicitaDettaglio" required>
                            <option value="Mensile" selected>Mensile</option>
                            <option value="Trimestrale (Quarter)">Trimestrale (Quarter)</option>
                            <option value="Giornaliero">Giornaliero (Attenzione: output lunghi)</option>
                            <option value="AI_DECIDE">-- Suggerito da AI --</option>
                        </select>
                        <div class="form-text">Obbligatorio. Scegli o chiedi suggerimento AI.</div>
                    </div>
                     <div class="mb-3">
                        <label for="dataInizio" class="form-label">Data Inizio Piano: <span class="required-label">*</span></label>
                        <input type="date" class="form-control form-control-sm" id="dataInizio" value="" required>
                        <div class="form-text">Obbligatorio (o suggerimento AI se date mancanti).</div>
                    </div>
                     <div class="mb-3">
                        <label for="dataFine" class="form-label">Data Fine Piano: <span class="required-label">*</span></label>
                        <input type="date" class="form-control form-control-sm" id="dataFine" value="" required>
                        <div class="form-text">Obbligatorio (o suggerimento AI se date mancanti).</div>
                    </div>
                     <div class="mb-3">
                        <label for="obiettivoGenerale" class="form-label">Obiettivo Generale Piano (SMART): <span class="required-label">*</span></label>
                        <textarea class="form-control form-control-sm" id="obiettivoGenerale" rows="3" required placeholder="Es. Aumentare vendite e-commerce del 15% in Q3... Lascia vuoto per suggerimento AI."></textarea>
                        <div class="form-text">Obbligatorio (o suggerimento AI se vuoto).</div>
                    </div>
                    <div class="mb-3">
                        <label for="budgetTotale" class="form-label">Budget Totale Approvato (Indicativo): <span class="required-label">*</span></label>
                        <input type="text" class="form-control form-control-sm" id="budgetTotale" value="" required placeholder="Es. € 100.000, >€50k... Lascia vuoto per suggerimento AI.">
                        <div class="form-text">Obbligatorio (o suggerimento AI se vuoto).</div>
                    </div>
                     <div class="mb-3">
                        <label for="dipartimentoCliente" class="form-label">Dipartimento Cliente (Budget):</label>
                        <input type="text" class="form-control form-control-sm" id="dipartimentoCliente" value="" placeholder="Es. Marketing, E-commerce, Comunicazione">
                        <div class="form-text">Opzionale. Lascia vuoto per ignorare.</div>
                    </div>
                     <div class="mb-3">
                        <label for="progettoCollegato" class="form-label">Progetto / Iniziativa Collegata:</label>
                        <input type="text" class="form-control form-control-sm" id="progettoCollegato" value="" placeholder="Se fa parte di un progetto più ampio">
                        <div class="form-text">Opzionale. Lascia vuoto per ignorare.</div>
                    </div>
                </fieldset>

                <fieldset id="fs-geoLingua">
                     <legend>Area Geografica e Lingua</legend>
                      <div class="preset-selector-container">
                         <label for="preset-geoLingua" class="preset-label">Preset:</label>
                         <select id="preset-geoLingua" class="form-select form-select-sm preset-selector"> <option value="">-- Seleziona Preset --</option> </select>
                      </div>

                      <div class="mb-3">
                           <label for="countryList" class="form-label">Aggiungi Paese Target: <span class="required-label">*</span></label>
                           <div id="country-selector-ui">
                               <select id="countryList" class="form-select form-select-sm">
                                   <option value="">-- Seleziona dalla lista --</option>
                                   <option value="CUSTOM">Altro (Specifica sotto)...</option>
                               </select>
                               <input type="text" id="customCountryInput" class="form-control form-control-sm" placeholder="Nome Paese personalizzato">
                               <button type="button" id="addCountryBtn" class="btn btn-secondary btn-sm">Aggiungi</button>
                           </div>
                           <div class="form-text">Seleziona o inserisci paesi. Marca almeno un paese come 'Top'. Modifica la lingua suggerita se necessario.</div>
                           <ul id="selectedCountriesList" class="mt-2">
                               <?php // Popolata da JS ?>
                           </ul>
                      </div>
                      <?php // Il campo lingua separato è stato rimosso ?>
                </fieldset>

               <fieldset id="fs-targetMedia">
                   <legend>Target Audience</legend>
                     <div class="preset-selector-container">
                         <label for="preset-targetMedia" class="preset-label">Preset:</label>
                         <select id="preset-targetMedia" class="form-select form-select-sm preset-selector"> <option value="">-- Seleziona Preset --</option> </select>
                      </div>
                     <div class="mb-3">
                        <label for="targetPrimario" class="form-label">Descrizione Target Primario: <span class="required-label">*</span></label>
                        <textarea class="form-control form-control-sm" id="targetPrimario" rows="4" required placeholder="Dettagliare demografia, interessi, bisogni... Lascia vuoto per suggerimento AI."></textarea>
                        <div class="form-text">Obbligatorio (o suggerimento AI se vuoto).</div>
                    </div>
                    <div class="mb-3">
                        <label for="targetSecondario" class="form-label">Descrizione Target Secondario:</label>
                        <textarea class="form-control form-control-sm" id="targetSecondario" rows="3" placeholder="Eventuale pubblico secondario da considerare"></textarea>
                        <div class="form-text">Opzionale. Lascia vuoto per ignorare.</div>
                    </div>
                     <div class="mb-3">
                        <label class="form-label d-block mb-2">Fase/i del Funnel Principale/i: <span class="required-label">*</span></label> <?php // Usa d-block mb-2 per label ?>
                        <div class="checkbox-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Awareness" id="funnelAwareness" name="faseFunnel">
                                <label class="form-check-label" for="funnelAwareness">Awareness</label>
                            </div>
                             <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Consideration" id="funnelConsideration" name="faseFunnel">
                                <label class="form-check-label" for="funnelConsideration">Consideration</label>
                            </div>
                             <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Conversion" id="funnelConversion" name="faseFunnel">
                                <label class="form-check-label" for="funnelConversion">Conversion</label>
                            </div>
                             <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Loyalty/Retention" id="funnelLoyalty" name="faseFunnel">
                                <label class="form-check-label" for="funnelLoyalty">Loyalty/Retention</label>
                            </div>
                        </div>
                        <div class="form-text">Obbligatorio. Seleziona almeno una fase (o l'AI suggerirà).</div>
                    </div>
                </fieldset>

                <fieldset id="fs-canaliBudget">
                     <legend>Canali Media e Budget</legend>
                      <div class="preset-selector-container">
                         <label for="preset-canaliBudget" class="preset-label">Preset:</label>
                         <select id="preset-canaliBudget" class="form-select form-select-sm preset-selector"> <option value="">-- Seleziona Preset --</option> </select>
                      </div>
                     <div class="mb-3">
                        <label class="form-label d-block mb-2">Canali Media Selezionati: <span class="required-label">*</span></label>
                        <div class="checkbox-group">
                            <div class="form-check"><input class="form-check-input" type="checkbox" name="canali" value="Google Ads Search" id="chGSearch"><label class="form-check-label" for="chGSearch">G Search</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox" name="canali" value="Google Ads Display/PMax" id="chGDisp"><label class="form-check-label" for="chGDisp">G Disp/PMax</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox" name="canali" value="Google Ads Video/YT" id="chGYT"><label class="form-check-label" for="chGYT">G Video/YT</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox" name="canali" value="Meta Ads (FB/IG)" id="chMeta"><label class="form-check-label" for="chMeta">Meta Ads</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox" name="canali" value="LinkedIn Ads" id="chLI"><label class="form-check-label" for="chLI">LinkedIn Ads</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox" name="canali" value="TikTok Ads" id="chTT"><label class="form-check-label" for="chTT">TikTok Ads</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox" name="canali" value="Pinterest Ads" id="chPin"><label class="form-check-label" for="chPin">Pinterest Ads</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox" name="canali" value="Programmatic Display/Video" id="chProg"><label class="form-check-label" for="chProg">Programmatic</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox" name="canali" value="Native Advertising" id="chNative"><label class="form-check-label" for="chNative">Native</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox" name="canali" value="Influencer Marketing" id="chInflu"><label class="form-check-label" for="chInflu">Influencer</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox" name="canali" value="Affiliation" id="chAff"><label class="form-check-label" for="chAff">Affiliation</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox" name="canali" value="TV (Lineare/CTV)" id="chTV"><label class="form-check-label" for="chTV">TV/CTV</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox" name="canali" value="Radio" id="chRadio"><label class="form-check-label" for="chRadio">Radio</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox" name="canali" value="Stampa" id="chPrint"><label class="form-check-label" for="chPrint">Stampa</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox" name="canali" value="OOH/DOOH" id="chOOH"><label class="form-check-label" for="chOOH">OOH/DOOH</label></div>
                        </div>
                        <div class="form-text">Obbligatorio. Seleziona almeno un canale (o l'AI suggerirà un mix).</div>
                    </div>
                     <div class="mb-3">
                        <label for="altriCanali" class="form-label">Altri Canali Specifici:</label>
                        <textarea class="form-control form-control-sm" id="altriCanali" rows="3" placeholder="Elenca altri canali non presenti sopra, uno per riga o separati da virgola"></textarea>
                        <div class="form-text">Opzionale. Lascia vuoto per ignorare.</div>
                    </div>
                     <div class="mb-3">
                        <label for="allocazioneBudget" class="form-label">Allocazione % Budget / Priorità per Canale: <span class="required-label">*</span></label>
                        <textarea class="form-control form-control-sm" id="allocazioneBudget" rows="4" required placeholder="Descrivi qualitativamente o con % indicative. Es. 'Focus 60% Meta...' Lascia vuoto per suggerimento AI."></textarea>
                        <div class="form-text">Obbligatorio (o suggerimento AI se vuoto).</div>
                    </div>
                </fieldset>

                <fieldset id="fs-dettagliOperativi">
                     <legend>Dettagli Operativi per Canale</legend>
                      <div class="preset-selector-container">
                         <label for="preset-dettagliOperativi" class="preset-label">Preset:</label>
                         <select id="preset-dettagliOperativi" class="form-select form-select-sm preset-selector"> <option value="">-- Seleziona Preset --</option> </select>
                      </div>
                     <div class="mb-3">
                         <label for="dettagliSpecificiCanale" class="form-label">Dettagli Specifici per Canale:</label>
                         <textarea class="form-control form-control-sm" id="dettagliSpecificiCanale" rows="8" placeholder="Per i canali selezionati, descrivi qui eventuali dettagli importanti: Site/Posizionamenti? Tipi Media? Metodi Acquisto? Audience/Keyword specifiche? Flighting? KPI specifici?..."></textarea>
                         <div class="form-text">Opzionale. Lascia vuoto per ignorare o per suggerimento AI generale.</div>
                     </div>
                </fieldset>

                <fieldset id="fs-advancedAI">
                    <legend>Istruzioni Avanzate per AI (Super Poteri)</legend>
                     <div class="preset-selector-container">
                         <label for="preset-advancedAI" class="preset-label">Preset:</label>
                         <select id="preset-advancedAI" class="form-select form-select-sm preset-selector"> <option value="">-- Seleziona Preset --</option> </select>
                      </div>
                    <div class="mb-3 form-check"> <?php // Usa form-check per spaziatura ?>
                        <input type="checkbox" class="form-check-input" id="considerSeasonality">
                        <label class="form-check-label" for="considerSeasonality">Considera Stagionalità / Festività</label>
                        <div class="form-text mt-1">Se attivo, l'AI modulerà il piano considerando eventi stagionali o festività.</div>
                    </div>
                     <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="includeForecast">
                        <label class="form-check-label" for="includeForecast">Includi Colonne Forecast nel Piano</label>
                        <div class="form-text mt-1">Se attivo, l'AI aggiungerà colonne con stime indicative dei KPI selezionati qui sotto.</div>

                        <div id="kpiForecastGroup" class="kpi-forecast-group disabled mt-3"> <?php // Aggiunto mt-3 ?>
                             <h4 class="mb-3">Seleziona KPI Forecast Media:</h4>
                             <div class="checkbox-group">
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="forecastMediaKpi" value="Impression" id="kpiImp"><label class="form-check-label" for="kpiImp">Imp</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="forecastMediaKpi" value="Click" id="kpiClick"><label class="form-check-label" for="kpiClick">Click</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="forecastMediaKpi" value="CTR" id="kpiCtr"><label class="form-check-label" for="kpiCtr">CTR</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="forecastMediaKpi" value="CPC" id="kpiCpc"><label class="form-check-label" for="kpiCpc">CPC</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="forecastMediaKpi" value="CPM" id="kpiCpm"><label class="form-check-label" for="kpiCpm">CPM</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="forecastMediaKpi" value="View Rate" id="kpiVr"><label class="form-check-label" for="kpiVr">View Rate</label></div>
                             </div>
                             <h4 class="mt-3 mb-3">Seleziona KPI Forecast Obiettivo:</h4> <?php // Aggiunto mt-3 ?>
                             <div class="checkbox-group">
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="forecastObjectiveKpi" value="Conversioni" id="kpiConv"><label class="form-check-label" for="kpiConv">Conv</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="forecastObjectiveKpi" value="Transazioni" id="kpiTrans"><label class="form-check-label" for="kpiTrans">Trans</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="forecastObjectiveKpi" value="Entrate" id="kpiEntr"><label class="form-check-label" for="kpiEntr">Entrate</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="forecastObjectiveKpi" value="ROAS" id="kpiRoas"><label class="form-check-label" for="kpiRoas">ROAS</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="forecastObjectiveKpi" value="CPA" id="kpiCpa"><label class="form-check-label" for="kpiCpa">CPA</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="forecastObjectiveKpi" value="LEADS" id="kpiLeads"><label class="form-check-label" for="kpiLeads">Leads</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="forecastObjectiveKpi" value="CPL" id="kpiCpl"><label class="form-check-label" for="kpiCpl">CPL</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="forecastObjectiveKpi" value="Conv.Rate" id="kpiCr"><label class="form-check-label" for="kpiCr">CR</label></div>
                             </div>
                        </div>
                     </div>
                </fieldset>

                 <fieldset id="fs-outputMedia">
                    <legend>Output Desiderato</legend>
                     <div class="preset-selector-container">
                         <label for="preset-outputMedia" class="preset-label">Preset:</label>
                         <select id="preset-outputMedia" class="form-select form-select-sm preset-selector"> <option value="">-- Seleziona Preset --</option> </select>
                      </div>
                     <div class="mb-3">
                        <label for="formatoOutputPiano" class="form-label">Formato Output Bozza Piano: <span class="required-label">*</span></label>
                        <select class="form-select form-select-sm" id="formatoOutputPiano" required>
                            <option value="Tabella Markdown per Canale" selected>Tabella Markdown</option>
                            <option value="Elenco Puntato Dettagliato per Canale">Elenco Puntato</option>
                            <option value="CSV (Testo delimitato da Virgole)">CSV</option>
                            <option value="Testo Semplice (TXT)">Testo Semplice</option>
                            <option value="JSON Strutturato">JSON Strutturato</option>
                            <option value="AI_DECIDE">-- Suggerito da AI --</option>
                        </select>
                        <div class="form-text">Obbligatorio. Come strutturare l'output. Qualità CSV/JSON varia.</div>
                    </div>
                     <div class="mb-3">
                        <label for="livelloDettaglioOutput" class="form-label">Livello Dettaglio Richiesto: <span class="required-label">*</span></label>
                        <select class="form-select form-select-sm" id="livelloDettaglioOutput" required>
                            <option value="Dettagliato per linea/canale" selected>Dettagliato</option>
                            <option value="Alto Livello/Sintetico">Alto Livello</option>
                            <option value="AI_DECIDE">-- Suggerito da AI --</option>
                        </select>
                        <div class="form-text">Obbligatorio. Quanto dettaglio per linea.</div>
                    </div>
                     <div class="mb-3">
                         <label for="noteAggiuntiveAI" class="form-label">Note Aggiuntive per AI:</label>
                         <textarea class="form-control form-control-sm" id="noteAggiuntiveAI" rows="3" placeholder="Istruzioni particolari, stile specifico del piano, cose da non fare..."></textarea>
                         <div class="form-text">Opzionale. Lascia vuoto per ignorare.</div>
                     </div>
                </fieldset>

                <fieldset id="fs-savePreset" class="mt-4 bg-light border rounded p-3">
                    <legend class="w-auto px-2 h6 mb-3 fw-semibold">Salva Preset Personale</legend>
                    <div class="d-flex flex-column flex-sm-row align-items-sm-end gap-2">
                         <div class="flex-grow-1">
                            <label for="newPresetName" class="form-label form-label-sm">Nome per il nuovo Preset:</label>
                            <input type="text" class="form-control form-control-sm" id="newPresetName" placeholder="Es. Mediaplan Lancio [Prodotto]">
                         </div>
                         <button type="button" id="savePresetBtn" class="btn btn-success btn-sm flex-shrink-0">Salva Preset Corrente</button>
                    </div>
                    <div class="form-text mt-2">Salva la configurazione attuale per riutilizzarla (memorizzata solo su questo browser).</div>
                 </fieldset>

            </form>

            <h2 class="mt-4">Prompt Generato per Bozza Mediaplan</h2>
            <textarea id="prompt_generato" class="form-control" rows="25" readonly></textarea>

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
    // --- DATI PAESI E LINGUE ---
    const topCountries = ["Italia", "Stati Uniti", "Regno Unito", "Germania", "Francia", "Spagna", "Canada", "Australia", "Brasile", "Messico", "Giappone", "Cina", "India", "Corea del Sud", "Paesi Bassi", "Svizzera", "Svezia", "Belgio", "Austria", "Portogallo"];
    const countryLanguageMap = { "Italia": "Italiano", "Stati Uniti": "Inglese", "Regno Unito": "Inglese", "Germania": "Tedesco", "Francia": "Francese", "Spagna": "Spagnolo", "Canada": "Inglese, Francese", "Australia": "Inglese", "Brasile": "Portoghese", "Messico": "Spagnolo", "Giappone": "Giapponese", "Cina": "Cinese Mandarino", "India": "Inglese, Hindi", "Corea del Sud": "Coreano", "Paesi Bassi": "Olandese", "Svizzera": "Tedesco, Francese, Italiano", "Svezia": "Svedese", "Belgio": "Olandese, Francese", "Austria": "Tedesco", "Portogallo": "Portoghese" };
    let selectedCountryData = []; // Array: [{name: 'Italia', status: 'Top', lang: 'Italiano'}, ...]

    // --- Elementi del Form ---
    const formElements = {
        nomePiano: document.getElementById('nomePiano'), clienteProdotto: document.getElementById('clienteProdotto'), periodoGenerale: document.getElementById('periodoGenerale'), periodicitaDettaglio: document.getElementById('periodicitaDettaglio'), dataInizio: document.getElementById('dataInizio'), dataFine: document.getElementById('dataFine'), obiettivoGenerale: document.getElementById('obiettivoGenerale'), budgetTotale: document.getElementById('budgetTotale'), dipartimentoCliente: document.getElementById('dipartimentoCliente'), progettoCollegato: document.getElementById('progettoCollegato'),
        // Paesi gestiti da selectedCountryData
        targetPrimario: document.getElementById('targetPrimario'), targetSecondario: document.getElementById('targetSecondario'), faseFunnel: document.querySelectorAll('input[name="faseFunnel"]'),
        canali: document.querySelectorAll('input[name="canali"]'), altriCanali: document.getElementById('altriCanali'), allocazioneBudget: document.getElementById('allocazioneBudget'),
        dettagliSpecificiCanale: document.getElementById('dettagliSpecificiCanale'),
        considerSeasonality: document.getElementById('considerSeasonality'), includeForecast: document.getElementById('includeForecast'), forecastMediaKpi: document.querySelectorAll('input[name="forecastMediaKpi"]'), forecastObjectiveKpi: document.querySelectorAll('input[name="forecastObjectiveKpi"]'),
        formatoOutputPiano: document.getElementById('formatoOutputPiano'), livelloDettaglioOutput: document.getElementById('livelloDettaglioOutput'), noteAggiuntiveAI: document.getElementById('noteAggiuntiveAI')
    };
    // Etichette
    const fieldLabels = {
        nomePiano: "Nome Piano / Campagna", clienteProdotto: "Cliente / Prodotto", periodoGenerale: "Anno Fiscale / Periodo Generale", periodicitaDettaglio: "Periodicità Dettaglio Piano", dateRange: "Periodo Piano", obiettivoGenerale: "Obiettivo Generale Piano (SMART)", budgetTotale: "Budget Totale Approvato (Indicativo)", dipartimentoCliente: "Dipartimento Cliente (Budget)", progettoCollegato: "Progetto / Iniziativa Collegata",
        geoLinguaTarget: "Aree Geografiche e Lingue Target",
        targetPrimario: "Descrizione Target Primario", targetSecondario: "Descrizione Target Secondario", faseFunnel: "Fase/i del Funnel Principale/i", canaliSelezionati: "Canali Media Selezionati", allocazioneBudget: "Allocazione % Budget / Priorità per Canale", dettagliSpecificiCanale: "Dettagli Specifici per Canale", formatoOutputPiano: "Formato Output Bozza Piano", livelloDettaglioOutput: "Livello Dettaglio Richiesto", noteAggiuntiveAI: "Note Aggiuntive per AI"
    };
    // Preset Standard
    const builtInPresets = {
         'fs-infoGeneraliMedia': [ { name: "Lancio Ecomm Q3", id: "ecomQ3", values: { nomePiano: "Lancio E-commerce Q3", clienteProdotto: "[Nome Cliente/Prodotto]", periodicitaDettaglio: "Mensile", obiettivoGenerale: "Generare vendite per €X nel Q3", budgetTotale: "€[Budget]", dipartimentoCliente: "E-commerce" } } /* ... altri ... */ ],
         'fs-geoLingua': [ { name: "Solo Italia", id: "geoIta", values: { countries: [{name: 'Italia', status: 'Top', lang: 'Italiano'}] } }, { name: "Europa ITA/FRA/DE", id: "geoMulti", values: { countries: [{name: 'Italia', status: 'Top', lang: 'Italiano'}, {name: 'Francia', status: 'Secondario', lang: 'Francese'}, {name: 'Germania', status: 'Secondario', lang: 'Tedesco'}] } } ],
         'fs-targetMedia': [ { name: "Target Performance", id: "targetConv", values: { targetPrimario: "Utenti [Descrizione], interessati a [X, Y], con comportamento d'acquisto online", targetSecondario: "", faseFunnel: ["Consideration", "Conversion"] } } ],
         'fs-canaliBudget': [ { name: "Mix Performance Search+Meta", id: "mixPerfSM", values: { canali: ["Google Ads Search", "Meta Ads (FB/IG)"], altriCanali: "", allocazioneBudget: "60% Meta, 40% Search, ottimizzare per ROAS" } } ],
         'fs-dettagliOperativi': [ { name: "Dettagli Ecomm", id: "detailsEcom", values: { dettagliSpecificiCanale: "Meta: ottimizzare per Conversioni (Acquisto), usare formati Catalogo e Advantage+. Search: Campagne per prodotto + Brand Protection." } } ],
         'fs-advancedAI': [ { name: "Base (No Superpoteri)", id: "advBase", values: { considerSeasonality: false, includeForecast: false } }, { name: "Avanzato con Forecast", id: "advForecast", values: { considerSeasonality: true, includeForecast: true, forecastMediaKpi: ["CTR", "CPC", "CPM"], forecastObjectiveKpi: ["Conversioni", "Entrate", "ROAS"] } } ],
         'fs-outputMedia': [ { name: "Tabella Dettagliata", id: "outTable", values: { formatoOutputPiano: "Tabella Markdown per Canale", livelloDettaglioOutput: "Dettagliato per linea/canale", noteAggiuntiveAI: ""} } ]
    };
    // Elementi UI
    const promptGeneratoTextarea = document.getElementById('prompt_generato');
    const copiaBtn = document.getElementById('copiaBtn');
    const resetBtn = document.getElementById('resetBtn');
    const newPresetNameInput = document.getElementById('newPresetName');
    const savePresetBtn = document.getElementById('savePresetBtn');
    const countryListSelect = document.getElementById('countryList');
    const customCountryInput = document.getElementById('customCountryInput');
    const addCountryBtn = document.getElementById('addCountryBtn');
    const selectedCountriesUl = document.getElementById('selectedCountriesList');
    const localStorageKey = 'userPresets_mediaplan'; // Chiave localStorage specifica

    // --- Funzioni Helper e Principali ---
    function getCheckboxValues(name) { const cbs = document.querySelectorAll(`input[name="${name}"]:checked`); return Array.from(cbs).map(cb => cb.value); }
    function setCheckboxValues(name, valuesArray) { const allCb = document.querySelectorAll(`input[name="${name}"]`); allCb.forEach(cb => { cb.checked = valuesArray ? valuesArray.includes(cb.value) : false; }); if (name === 'includeForecast') { toggleKpiVisibility(); } }
    function getFieldPromptValue(key, element, isMandatory = false) { if (element instanceof NodeList) { const values = getCheckboxValues(element[0].name); if (values.length > 0) { return `**${fieldLabels[key]}:** ${values.join(', ')}\n`; } else if (isMandatory) { return `**${fieldLabels[key]}:** [Nessun Valore - AI Deve Suggerire]\n`; } else { return ""; } } if (element && element.type === 'checkbox') { return ""; } if (key === 'geoLinguaTarget') { return ""; } const value = element && element.value ? element.value.trim() : ''; const label = fieldLabels[key] || key; if (value === 'AI_DECIDE') { return `**${label}:** [AI Deve Suggerire Valore Ottimale]\n`; } else if (value) { return `**${label}:** ${value}\n`; } else if (isMandatory) { return `**${label}:** [Valore Mancante - AI Deve Suggerire]\n`; } else { return ""; } }
    function populateCountryDropdown() { if (!countryListSelect) return; topCountries.sort().forEach(country => { const option = document.createElement('option'); option.value = country; option.textContent = country; countryListSelect.appendChild(option); }); }
    function renderSelectedCountries() {
        if (!selectedCountriesUl) return; selectedCountriesUl.innerHTML = ''; let hasTop = false;
        selectedCountryData.forEach((country, index) => {
            const li = document.createElement('li'); const countryNameId = `country_${index}`; const defaultLang = countryLanguageMap[country.name] || ''; const currentLang = country.lang !== undefined ? country.lang : defaultLang;
            li.innerHTML = `<span class="country-name">${country.name}</span> <input type="text" class="form-control form-control-sm country-lang-input" value="${currentLang}" placeholder="Lingua/e" data-index="${index}" title="Lingua/e per ${country.name}"> <span class="status-selector"> <label class="form-check-label small"><input class="form-check-input" type="radio" name="${countryNameId}_status" value="Top" ${country.status === 'Top' ? 'checked' : ''} data-index="${index}"> Top</label> <label class="form-check-label small"><input class="form-check-input" type="radio" name="${countryNameId}_status" value="Secondario" ${country.status === 'Secondario' ? 'checked' : ''} data-index="${index}"> Sec.</label> </span> <button type="button" class="btn btn-danger btn-sm removeCountryBtn" data-index="${index}" title="Rimuovi">&times;</button>`;
            selectedCountriesUl.appendChild(li); if (country.status === 'Top') hasTop = true;
        });
        selectedCountriesUl.querySelectorAll('.removeCountryBtn').forEach(btn => { btn.addEventListener('click', handleRemoveCountry); });
        selectedCountriesUl.querySelectorAll('input[type="radio"]').forEach(radio => { radio.addEventListener('change', handleCountryStatusChange); });
        selectedCountriesUl.querySelectorAll('.country-lang-input').forEach(input => { input.addEventListener('input', handleLanguageInputChange); });
        if (!hasTop && selectedCountryData.length > 0) { selectedCountryData[0].status = 'Top'; renderSelectedCountries(); } else if (selectedCountryData.length === 0) { /* No action */ }
        else { generaPrompt(); }
    }
    function handleAddCountry() { let countryToAdd = ''; if (countryListSelect.value === 'CUSTOM') { countryToAdd = customCountryInput.value.trim(); customCountryInput.value = ''; countryListSelect.value = ''; customCountryInput.style.display = 'none'; } else { countryToAdd = countryListSelect.value; countryListSelect.value = ''; } if (countryToAdd && !selectedCountryData.some(c => c.name.toLowerCase() === countryToAdd.toLowerCase())) { const defaultLang = countryLanguageMap[countryToAdd] || ''; selectedCountryData.push({ name: countryToAdd, status: 'Secondario', lang: defaultLang }); renderSelectedCountries(); } else if (countryToAdd) { alert(`Il paese "${countryToAdd}" è già stato aggiunto.`); } }
    function handleRemoveCountry(event) { const indexToRemove = parseInt(event.target.dataset.index, 10); if (!isNaN(indexToRemove)) { selectedCountryData.splice(indexToRemove, 1); renderSelectedCountries(); } }
    function handleCountryStatusChange(event) { const indexChanged = parseInt(event.target.dataset.index, 10); const newStatus = event.target.value; if (!isNaN(indexChanged) && selectedCountryData[indexChanged]) { if (newStatus === 'Top') { selectedCountryData = selectedCountryData.map((country, index) => ({ ...country, status: index === indexChanged ? 'Top' : 'Secondario' })); } else { selectedCountryData[indexChanged].status = 'Secondario'; } renderSelectedCountries(); } }
    function handleLanguageInputChange(event) { const indexChanged = parseInt(event.target.dataset.index, 10); const newLang = event.target.value; if (!isNaN(indexChanged) && selectedCountryData[indexChanged]) { selectedCountryData[indexChanged].lang = newLang; generaPrompt(); } }
    function loadUserPresets() { try { const storedPresets = localStorage.getItem(localStorageKey); return storedPresets ? JSON.parse(storedPresets) : []; } catch (e) { console.error(`Errore caricamento ${localStorageKey}:`, e); return []; } }
    function saveUserPresets(presetsArray) { try { localStorage.setItem(localStorageKey, JSON.stringify(presetsArray)); } catch (e) { console.error(`Errore salvataggio ${localStorageKey}:`, e); alert("Errore salvataggio preset."); } }
    function saveCurrentPreset() { const presetName = newPresetNameInput.value.trim(); if (!presetName) { alert("Inserisci un nome per il preset."); return; } const userPresets = loadUserPresets(); const existingPresetIndex = userPresets.findIndex(p => p.name === presetName); if (existingPresetIndex !== -1) { if (!confirm(`Preset "${presetName}" esiste già. Sovrascrivere?`)) { return; } } const currentValues = {}; for (const key in formElements) { const element = formElements[key]; if (element instanceof NodeList && element.length > 0 && element[0].type === 'checkbox') { currentValues[key] = getCheckboxValues(element[0].name); } else if (element && element.type === 'checkbox') { currentValues[key] = element.checked; } else if (element) { currentValues[key] = element.value; } } currentValues.countries = JSON.parse(JSON.stringify(selectedCountryData)); const newPreset = { name: presetName, values: currentValues }; if (existingPresetIndex !== -1) { userPresets[existingPresetIndex] = newPreset; } else { userPresets.push(newPreset); } saveUserPresets(userPresets); populatePresetDropdowns(); newPresetNameInput.value = ''; alert(`Preset "${presetName}" salvato!`); }
    function populatePresetDropdowns() { const userPresets = loadUserPresets(); const allSelectors = document.querySelectorAll('.preset-selector'); allSelectors.forEach(selector => { const sectionId = selector.id.replace('preset-', 'fs-'); const builtInSectionPresets = builtInPresets[sectionId] || []; const existingOptgroups = selector.querySelectorAll('optgroup'); existingOptgroups.forEach(og => og.remove()); while (selector.options.length > 1) { selector.remove(1); } builtInSectionPresets.forEach(preset => { const option = document.createElement('option'); option.value = preset.id; option.textContent = preset.name; option.dataset.isBuiltIn = "true"; selector.appendChild(option); }); if (userPresets.length > 0) { const optgroup = document.createElement('optgroup'); optgroup.label = "Preset Salvati"; userPresets.forEach((preset) => { let isRelevant = false; const fieldsetElement = document.getElementById(sectionId); if (fieldsetElement) { const fieldsInSection = Array.from(fieldsetElement.querySelectorAll('input, select, textarea')).map(el => el.id); const checkCountries = sectionId === 'fs-geoLingua' ? ['countries'] : []; isRelevant = Object.keys(preset.values).some(key => fieldsInSection.includes(key) || checkCountries.includes(key)); } if(isRelevant) { const option = document.createElement('option'); option.value = `user_${preset.name}`; option.textContent = preset.name; option.dataset.isUserPreset = "true"; optgroup.appendChild(option); } }); if (optgroup.children.length > 0) { selector.appendChild(optgroup); } } }); }
    function applyPreset(sectionId, presetId) { let selectedPresetData = null; let isUserPreset = presetId.startsWith('user_'); if (isUserPreset) { const presetName = presetId.substring(5); const userPresets = loadUserPresets(); selectedPresetData = userPresets.find(p => p.name === presetName); } else { const sectionPresets = builtInPresets[sectionId]; if (sectionPresets) { selectedPresetData = sectionPresets.find(p => p.id === presetId); } } if (!selectedPresetData || !selectedPresetData.values) { console.warn("Preset non trovato:", presetId); const selector = document.getElementById(`preset-${sectionId.replace('fs-', '')}`); if (selector) selector.value = ""; return; } const fieldset = document.getElementById(sectionId); if (!fieldset) return; const presetValues = selectedPresetData.values; for (const fieldId in formElements) { if (presetValues.hasOwnProperty(fieldId)) { const element = formElements[fieldId]; const valueToApply = presetValues[fieldId]; if (fieldId === 'countries' && Array.isArray(valueToApply)) { if(sectionId === 'fs-geoLingua') { selectedCountryData = JSON.parse(JSON.stringify(valueToApply)); renderSelectedCountries(); } } else if (element instanceof NodeList && element.length > 0 && element[0].type === 'checkbox') { if (Array.isArray(valueToApply)) { setCheckboxValues(element[0].name, valueToApply); } } else if (element && element.type === 'checkbox') { element.checked = valueToApply; if(element.id === 'includeForecast') toggleKpiVisibility(); } else if (element) { element.value = valueToApply; if (element.tagName === 'SELECT') { element.dispatchEvent(new Event('change')); } } } } if (sectionId === 'fs-geoLingua' && (!presetValues.hasOwnProperty('countries'))) { selectedCountryData = []; renderSelectedCountries(); } generaPrompt(); const selector = document.getElementById(`preset-${sectionId.replace('fs-', '')}`); if(selector) selector.value = ""; }
    function generaPrompt() {
        let promptFinale = `**PROMPT PER BOZZA MEDIAPLAN ADV**\n\nAgisci come un Media Planner esperto. Basandoti sulle seguenti informazioni, genera una bozza strutturata di un mediaplan pubblicitario. Per i campi obbligatori (*) lasciati vuoti, proponi un valore adeguato al contesto. Ometti completamente i campi opzionali non compilati.\n\n`;
        let mandatoryFields = ['nomePiano', 'clienteProdotto', 'periodicitaDettaglio', 'dataInizio', 'dataFine', 'obiettivoGenerale', 'budgetTotale', 'geoLinguaTarget', 'targetPrimario', 'faseFunnel', 'canali', 'allocazioneBudget', 'formatoOutputPiano', 'livelloDettaglioOutput'];
        const dataInizioVal = formElements.dataInizio.value; const dataFineVal = formElements.dataFine.value;
        promptFinale += "**--- CONTESTO E OBIETTIVI ---**\n";
        for (const key of ['nomePiano', 'clienteProdotto', 'periodoGenerale', 'periodicitaDettaglio']) { if(formElements[key]) { promptFinale += getFieldPromptValue(key, formElements[key], mandatoryFields.includes(key)); }}
        if (dataInizioVal && dataFineVal) { promptFinale += `**${fieldLabels.dateRange}:** Dal ${dataInizioVal} al ${dataFineVal}\n`;}
        else if ((!dataInizioVal || !dataFineVal) && mandatoryFields.includes('dataInizio')) { promptFinale += `**${fieldLabels.dateRange}:** [Date Mancanti - AI Deve Suggerire Periodo]\n`;}
        for (const key of ['obiettivoGenerale', 'budgetTotale', 'dipartimentoCliente', 'progettoCollegato']) { if(formElements[key]) { promptFinale += getFieldPromptValue(key, formElements[key], mandatoryFields.includes(key)); }}
        promptFinale += "\n**--- AREA GEOGRAFICA E LINGUE TARGET ---**\n";
        if (selectedCountryData.length > 0) { selectedCountryData.forEach(country => { promptFinale += ` - ${country.status}: ${country.name} (Lingua/e: ${country.lang || '[AI Suggerirà]'}) \n`; }); }
        else { promptFinale += `**${fieldLabels.geoLinguaTarget}:** [Nessun Paese Selezionato - AI Deve Suggerire Area e Lingua Principale]\n`; }
        promptFinale += "\n**--- TARGET AUDIENCE ---**\n";
        for (const key of ['targetPrimario', 'targetSecondario', 'faseFunnel']) { if(formElements[key]) { promptFinale += getFieldPromptValue(key, formElements[key], mandatoryFields.includes(key) || (formElements[key] instanceof NodeList && mandatoryFields.includes(formElements[key][0].name) ) ); }}
        promptFinale += "\n**--- CANALI MEDIA E BUDGET ---**\n";
        const canaliSelezionati = getCheckboxValues('canali'); const altriCanaliVal = formElements.altriCanali.value.trim(); const tuttiCanali = [...canaliSelezionati]; if(altriCanaliVal){ const altriParsed = altriCanaliVal.split(/[\n,]+/).map(c => c.trim()).filter(Boolean); tuttiCanali.push(...altriParsed); }
        if(tuttiCanali.length > 0){ promptFinale += `**${fieldLabels.canaliSelezionati}:** ${tuttiCanali.join(', ')}\n`; }
        else { promptFinale += `**${fieldLabels.canaliSelezionati}:** [Nessun Canale Selezionato - AI Deve Suggerire Mix Adeguato]\n`; }
        promptFinale += getFieldPromptValue('allocazioneBudget', formElements.allocazioneBudget, true);
        promptFinale += "\n**--- DETTAGLI OPERATIVI PER CANALE (Indicazioni Generali) ---**\n";
        promptFinale += getFieldPromptValue('dettagliSpecificiCanale', formElements.dettagliSpecificiCanale, false);
        promptFinale += "\n**--- ISTRUZIONI AVANZATE PER AI ---**\n";
        let hasAdvancedInstructions = false; if (formElements.considerSeasonality.checked) { promptFinale += `* **Stagionalità:** Modula il piano considerando stagionalità e festività rilevanti.\n`; hasAdvancedInstructions = true; }
        if (formElements.includeForecast.checked) { const mediaKPIs = getCheckboxValues('forecastMediaKpi'); const objectiveKPIs = getCheckboxValues('forecastObjectiveKpi'); if (mediaKPIs.length > 0 || objectiveKPIs.length > 0) { promptFinale += `* **Forecast:** Includi colonne Forecast (${formElements.periodicitaDettaglio.value || 'Mensile'}) stimando:`; if (mediaKPIs.length > 0) promptFinale += `\n    * KPI Media: ${mediaKPIs.join(', ')}`; if (objectiveKPIs.length > 0) promptFinale += `\n    * KPI Obiettivo: ${objectiveKPIs.join(', ')}`; promptFinale += "\n"; hasAdvancedInstructions = true; } else { promptFinale += `* **Forecast:** Richiesto ma nessun KPI selezionato. Suggerisci KPI rilevanti.\n`; hasAdvancedInstructions = true;} }
        if (!hasAdvancedInstructions) { promptFinale += "* Nessuna istruzione avanzata specificata.\n"; }
        promptFinale += "\n**--- OUTPUT RICHIESTO ---**\n";
        promptFinale += getFieldPromptValue('formatoOutputPiano', formElements.formatoOutputPiano, true);
        promptFinale += getFieldPromptValue('livelloDettaglioOutput', formElements.livelloDettaglioOutput, true);
        promptFinale += getFieldPromptValue('noteAggiuntiveAI', formElements.noteAggiuntiveAI, false);
        const formatoOut = formElements.formatoOutputPiano.value || 'Tabella Markdown';
        promptFinale += `\n---\nGenera la bozza del mediaplan nel formato richiesto (${formatoOut}). Struttura per canale/linea attività, includendo info chiave (periodo, obiettivo, target, tipo media, acquisto, budget indicativo). Applica istruzioni avanzate. Assicura coerenza.`;
        promptGeneratoTextarea.value = promptFinale;
    }
    function copiaPrompt() { const testoDaCopiare = promptGeneratoTextarea.value; navigator.clipboard.writeText(testoDaCopiare).then(() => { const t = copiaBtn.textContent; copiaBtn.textContent = 'Copiato!'; copiaBtn.style.backgroundColor = '#28a745'; setTimeout(() => { copiaBtn.textContent = t; copiaBtn.style.backgroundColor = '#e43e30'; }, 2000); }).catch(err => { console.error('Errore copia: ', err); alert('Errore copia testo.'); }); }
    function resetForm() { const baseValues = { nomePiano: "", clienteProdotto: "", periodoGenerale: "", periodicitaDettaglio: "Mensile", dataInizio: "", dataFine: "", obiettivoGenerale: "", budgetTotale: "", dipartimentoCliente: "", progettoCollegato: "", targetPrimario: "", targetSecondario: "", altriCanali: "", allocazioneBudget: "", dettagliSpecificiCanale: "", considerSeasonality: false, includeForecast: false, formatoOutputPiano: "Tabella Markdown per Canale", livelloDettaglioOutput: "Dettagliato per linea/canale", noteAggiuntiveAI: "" }; for (const key in formElements) { const element = formElements[key]; if (element instanceof NodeList && element.length > 0 && element[0].type === 'checkbox') { setCheckboxValues(element[0].name, []); } else if (element && element.type === 'checkbox') { element.checked = baseValues[key] || false; } else if (element) { element.value = baseValues[key] || ''; } } if(formElements.periodicitaDettaglio) formElements.periodicitaDettaglio.value = baseValues.periodicitaDettaglio; if(formElements.formatoOutputPiano) formElements.formatoOutputPiano.value = baseValues.formatoOutputPiano; if(formElements.livelloDettaglioOutput) formElements.livelloDettaglioOutput.value = baseValues.livelloDettaglioOutput; selectedCountryData = []; renderSelectedCountries(); toggleKpiVisibility(); generaPrompt(); }
    function toggleKpiVisibility() { const fc = document.getElementById('includeForecast'); const kg = document.getElementById('kpiForecastGroup'); if (fc && kg) { if (fc.checked) { kg.classList.remove('disabled'); } else { kg.classList.add('disabled'); } } }

    // --- Event Listeners ---
    document.addEventListener('DOMContentLoaded', () => {
        populateCountryDropdown(); populatePresetDropdowns();
        const presetSelectors = document.querySelectorAll('.preset-selector'); presetSelectors.forEach(selector => { selector.addEventListener('change', (event) => { const selectedPresetId = event.target.value; const fieldset = event.target.closest('fieldset'); if (fieldset && selectedPresetId) { applyPreset(fieldset.id, selectedPresetId); } else if (fieldset) { selector.value = ""; } }); });
        if(countryListSelect) { countryListSelect.addEventListener('change', () => { customCountryInput.style.display = countryListSelect.value === 'CUSTOM' ? 'block' : 'none'; }); }
        if(addCountryBtn) { addCountryBtn.addEventListener('click', handleAddCountry); }
        const forecastCheckbox = document.getElementById('includeForecast'); if (forecastCheckbox) { forecastCheckbox.addEventListener('change', toggleKpiVisibility); } toggleKpiVisibility();
        const form = document.getElementById('promptForm');
        if (form) {
            const inputElements = form.querySelectorAll('input:not(#customCountryInput):not([type=radio]):not(#newPresetName), select:not(#countryList):not(.preset-selector), textarea');
             inputElements.forEach(element => { element.addEventListener('input', generaPrompt); });
             const changeElements = form.querySelectorAll('select:not(#countryList):not(.preset-selector), input[type=date], input[type=checkbox]');
             changeElements.forEach(element => { element.addEventListener('change', generaPrompt); });
             selectedCountriesUl.addEventListener('change', (event) => { if (event.target.type === 'radio') generaPrompt(); });
             // handleLanguageInputChange chiama già generaPrompt
        }
        if(savePresetBtn) { savePresetBtn.addEventListener('click', saveCurrentPreset); }
        generaPrompt();
    });
    copiaBtn.addEventListener('click', copiaPrompt);
    resetBtn.addEventListener('click', resetForm);
  </script>

</body>
</html>