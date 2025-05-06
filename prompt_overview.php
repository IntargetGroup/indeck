<?php $pageTitle = "Catalogo Prompt Builders"; require_once '_header.php'; ?>

    <?php require_once '_sidebar.php'; ?>

    <?php // Colonna Contenuto Principale ?>
    <div class="col main-content-area px-md-4 py-3">

        <?php require_once '_page_header.php'; ?>

        <main id="prompt-overview-main">
          <p class="lead mb-4 text-secondary">
            Benvenuto nella vetrina dei modelli di prompt di In:Deck! Qui trovi strumenti pronti all'uso per
            generare prompt efficaci per diverse esigenze, dall'ideazione creativa alla generazione di codice.
            Esplora le categorie o scopri i modelli premiati nella nostra Hall of Fame.
          </p>

          <section class="hall-of-fame mb-5">
              <h2 class="h4"><i class="fas fa-trophy me-2"></i>Hall of Fame - Vincitori Challenge</h2>
              <div class="row g-4">
                  <div class="col-lg-8">
                      <div class="card h-100 winner-card featured shadow-lg">
                           <div class="winner-ribbon"><span>Vincitore #1</span></div>
                           <div class="card-body d-flex flex-column p-4">
                              <h3 class="card-title fs-5 fw-semibold">Generatore Infografica Dashboard</h3>
                              <p class="card-text flex-grow-1 small text-secondary mb-3">
                                  Crea prompt dettagliati per generare immagini infografiche per dashboard,
                                  specificando dati, stile visivo, layout e altri parametri. Utile per presentazioni
                                  e report. Vincitore della prima Prompt Challenge interna.
                              </p>
                              <div class="contributor-info mt-3 pt-3 border-top">
                                   <img src="images/stefano_macis.jpg" alt="Foto Stefano Macis" class="contributor-photo" onerror="this.style.display='none'; this.src='images/placeholder_user.png';">
                                   <div class="creator-details">
                                       Contributo Principale:
                                       <strong class="d-block">Stefano Macis</strong>
                                   </div>
                              </div>
                              <a href="infographic_prompt_builder.php" class="btn btn-warning btn-sm mt-3 fw-bold stretched-link">
                                 Vai al Generatore <i class="fas fa-arrow-right ms-1"></i>
                              </a>
                           </div>
                      </div>
                  </div>
                  <?php // Spazio per future card vincitrici ?>
              </div>
          </section>

          <?php
            // Array PHP che definisce tutti i modelli e le loro categorie
            $prompt_models = [
                "Creazione Testi" => [
                    [ "title" => "Generatore Post Social Media", "description" => "Crea testi e idee visuali per post social (LinkedIn, Instagram, Facebook, X...) definendo piattaforma, obiettivo, target e messaggio.", "link" => "social_post_builder.php", "creator" => "Team In:Deck Labs", "icon" => "fas fa-share-alt"],
                    [ "title" => "Generatore Scaletta Articolo Blog / SEO", "description" => "Definisci argomento, keyword, target e struttura per ottenere una scaletta dettagliata per articoli ottimizzati SEO.", "link" => "blog_outline_builder.php", "creator" => "Team In:Deck Labs", "icon" => "fas fa-align-left"],
                    [ "title" => "Generatore Copy Annunci PPC", "description" => "Genera varianti multiple di titoli e descrizioni per Google Ads e Meta Ads basate su prodotto, USP, target e CTA.", "link" => "ad_copy_builder.php", "creator" => "Team In:Deck Labs", "icon" => "fas fa-ad"],
                ],
                "Pianificazione Media & Budget" => [
                    [ "title" => "Generatore Bozza Mediaplan ADV", "description" => "Crea una bozza strutturata di un mediaplan definendo periodo, obiettivi, target, canali, budget indicativo e istruzioni avanzate.", "link" => "mediaplan_builder.php", "creator" => "Team In:Deck Labs", "icon" => "fas fa-calendar-alt"],
                ],
                 "Strategia & Planning" => [
                    [ "title" => "Generatore Persona Utente", "description" => "Crea profili dettagliati di buyer personas inserendo informazioni su obiettivi, sfide, motivazioni e dati demografici.", "link" => "persona_builder.php", "creator" => "Team In:Deck Labs", "icon" => "fas fa-users"],
                 ],
                 "Analisi Dati & Codice" => [
                     [ "title" => "Generatore Insight da Report", "description" => "Analizza dati e metriche da report per estrarre insight chiave, identificare trend e generare riassunti esecutivi.", "link" => "data_insight_builder.php", "creator" => "Team In:Deck Labs", "icon" => "fas fa-chart-pie"],
                 ],
                 "Generazione Immagini" => [
                     // Il modello infografica è nella Hall of Fame, potresti aggiungerne altri qui
                 ]
            ];
          ?>

          <?php foreach ($prompt_models as $category => $models): ?>
              <?php // Salta la categoria se non ci sono modelli (utile se l'unico modello è stato spostato in HoF) ?>
              <?php if (!empty($models)): ?>
                  <section class="prompt-category mb-5">
                      <?php // Trova l'icona corretta per la categoria ?>
                      <?php
                          $category_icon = 'fas fa-folder-open'; // Icona di default
                          if (!empty($models[0]['icon'])) {
                              $category_icon = $models[0]['icon'];
                          } elseif ($category === "Creazione Testi") { $category_icon = 'fas fa-pencil-alt';}
                            elseif ($category === "Pianificazione Media & Budget") { $category_icon = 'fas fa-calendar-alt';}
                            elseif ($category === "Strategia & Planning") { $category_icon = 'fas fa-clipboard-list';}
                            elseif ($category === "Analisi Dati & Codice") { $category_icon = 'fas fa-chart-pie';}
                            elseif ($category === "Generazione Immagini") { $category_icon = 'fas fa-image';}
                      ?>
                      <h2 class="h4"><i class="<?php echo $category_icon; ?> me-2"></i><?php echo htmlspecialchars($category); ?></h2>
                      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                          <?php foreach ($models as $model): ?>
                          <div class="col d-flex align-items-stretch">
                               <div class="card h-100 shadow-sm">
                                  <div class="card-body d-flex flex-column">
                                     <h5 class="card-title fs-6 fw-semibold"><?php echo htmlspecialchars($model['title']); ?></h5>
                                     <p class="card-text flex-grow-1 small text-secondary mb-3"><?php echo htmlspecialchars($model['description']); ?></p>
                                     <p class="card-text creator mb-2"><small class="text-muted">Creato da: <?php echo htmlspecialchars($model['creator']); ?></small></p>
                                     <a href="<?php echo htmlspecialchars($model['link']); ?>" class="btn btn-outline-primary btn-sm mt-auto">
                                        Vai al Generatore <i class="fas fa-chevron-right fa-xs ms-1"></i>
                                     </a>
                                    </div>
                               </div>
                          </div>
                          <?php endforeach; ?>
                      </div>
                  </section>
              <?php endif; ?>
          <?php endforeach; ?>

           <?php // Sezione per categorie senza modelli (se necessario) ?>
           <?php if (empty($prompt_models["Generazione Immagini"])): ?>
                <section class="prompt-category mb-5">
                    <h2 class="h4"><i class="fas fa-image me-2"></i>Generazione Immagini</h2>
                     <div class="empty-category-placeholder">
                        Nessun altro modello in questa categoria per ora (il Generatore Infografica è nella Hall of Fame!).
                    </div>
                </section>
           <?php endif; ?>


        </main>

    </div> <?php // Chiusura colonna main-content-area ?>

<?php require_once '_footer.php'; ?>