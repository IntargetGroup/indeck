<?php $pageTitle = "Presentation Generator"; require_once '_header.php'; ?>

    <?php require_once '_sidebar.php'; // Include la sidebar ?>

    <?php // Colonna Contenuto Principale ?>
    <div class="col main-content-area px-md-4 py-3">

        <?php require_once '_page_header.php'; // Include l'header della pagina ?>

        <main>
          <p class="text-secondary mb-4"> <?php // Piccola descrizione ?>
            Questo strumento utilizza l'AI per generare automaticamente una bozza di presentazione in Google Slides basandosi sugli input forniti. Compila i campi sottostanti per iniziare.
          </p>
          <?php // Container per la card Presentation ?>
          <div class="cards-container presentation-only" id="presentation-card-container">
             <div class="text-center p-5 text-muted">
                 <div class="spinner-border text-primary" role="status">
                     <span class="visually-hidden">Caricamento modulo...</span>
                 </div>
                 <p class="mt-2">Caricamento modulo...</p> <?php // Messaggio di caricamento migliorato ?>
             </div>
          </div>
        </main>

    </div>

<?php require_once '_footer.php'; ?>

<?php // Script specifici per questa pagina (presentation.js viene dopo) ?>
<script src="presentation.js"></script>
<?php // script.js è già in _footer.php ?>