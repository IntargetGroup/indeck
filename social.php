<?php
// social.php - Pagina Social per In:Deck
$pageTitle = 'Social';
require_once '_header.php';
require_once '_sidebar.php';
?>

<div class="col main-content-area px-md-4 py-3">
    <?php require_once '_page_header.php'; ?>

    <main>
        <p class="text-secondary mb-4">
            Seleziona uno degli agenti social per analizzare YouTube, TikTok, Instagram o Reddit.
        </p>

        <?php // Contenitore per le card Social ?>
        <div class="cards-container"></div>
    </main>
</div>

<?php
require_once '_footer.php';
?>

<script>
  // Rendo disponibile in JS la mail dell’utente loggato
  window.userEmail = "<?php echo htmlspecialchars($_SESSION['email']); ?>";
</script>

<?php // Script specifici per le card Social (dopo footer) ?>
<script src="js/youtube.js"></script>
<script src="js/tiktok.js"></script>
<script src="js/instagram.js"></script>
<script src="js/reddit.js"></script>
