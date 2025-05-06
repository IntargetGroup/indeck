<?php
session_start();
if (!isset($_SESSION['is_logged'])||!$_SESSION['is_logged']) {
    header("Location: login.php");
    exit;
}
$pageTitle = 'Community';
require_once '_header.php';
require_once '_sidebar.php';

// Definisci moderatori
$mods = ['andrea.zennaro@intarget.net'];
?>
<script>
  window.currentUserEmail = "<?php echo htmlspecialchars($_SESSION['email']); ?>";
  window.isModerator      = <?php echo in_array($_SESSION['email'],$mods) ? 'true' : 'false'; ?>;
</script>
<div class="col main-content-area px-md-4 py-3">
  <?php require_once '_page_header.php'; ?>
  <main>
    <h2>Community</h2>
    <p class="text-secondary mb-4">Condividi idee, prompt e feedback con il team.</p>

    <div class="row mb-3">
      <div class="col-md-6 mb-2">
        <input id="search-input" type="text" class="form-control" placeholder="Cerca per titolo o contenuto">
      </div>
      <div class="col-md-6 mb-2">
        <select id="tag-filter" class="form-select">
          <option value="">--- Tutti i tag ---</option>
        </select>
      </div>
    </div>

    <div id="thread-list" class="mb-4"></div>

    <div class="card mb-5">
      <div class="card-body">
        <h5 class="card-title">Nuovo Thread</h5>
        <div class="mb-3">
          <input id="thread-title" type="text" class="form-control" placeholder="Titolo">
        </div>
        <div class="mb-3">
          <textarea id="thread-body" class="form-control" rows="3" placeholder="Contenuto"></textarea>
        </div>
        <div class="mb-3">
          <input id="thread-tags" type="text" class="form-control" placeholder="Tag (es: idea,bug)">
        </div>
        <button id="post-thread" class="btn btn-primary">Posta Thread</button>
      </div>
    </div>
  </main>
</div>
<?php require_once '_footer.php'; ?>
<script src="js/community.js"></script>
