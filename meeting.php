<?php
// meeting.php – Pagina “Meeting”
$pageTitle = 'Meeting';
require_once '_header.php';
require_once '_sidebar.php';
?>

<div class="col main-content-area px-md-4 py-3">
  <?php require_once '_page_header.php'; ?>

  <main>
    <p class="text-secondary mb-4">
      Ottieni consigli su come impostare un primo meeting efficace.
    </p>

    <div class="cards-container"></div>
  </main>
</div>

<?php
// Footer carica bootstrap.bundle.js e script.js
require_once '_footer.php';
?>

<script>
  // Espongo la mail di sessione per i JS della card
  window.userEmail = "<?php echo htmlspecialchars($_SESSION['email']); ?>";
</script>

<script src="js/meeting.js"></script>
