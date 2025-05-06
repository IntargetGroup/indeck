<?php
// ATTIVA DEBUG IN LOCALE (da disattivare in prod)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Caricamento JSON
$contenuti = [];
$jsonPath = __DIR__ . '/contenuti.json';

if (!file_exists($jsonPath)) {
  die('<div style="color:red;">Errore: File contenuti.json non trovato.</div>');
}

$jsonData = file_get_contents($jsonPath);
$contenuti = json_decode($jsonData, true);

if (json_last_error() !== JSON_ERROR_NONE) {
  die('<div style="color:red;">Errore nel parsing JSON: ' . json_last_error_msg() . '</div>');
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>Certificazione GenAI - Intarget</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="main-content-area">

  <header class="mb-4 pb-2 border-bottom">
    <h1 class="h3">📚 Repository Certificazione GenAI</h1>
    <p class="text-muted">Materiali di studio divisi per argomento, aggiornati nel tempo.</p>
  </header>

  <section class="cards-container">
    <?php if (empty($contenuti)): ?>
      <p class="text-muted">Nessun contenuto disponibile al momento.</p>
    <?php else: ?>
      <?php foreach ($contenuti as $c): ?>
        <div class="card p-4 d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
          <div class="flex-grow-1">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start">
              <div>
                <span class="badge bg-primary mb-1"><?= htmlspecialchars($c['tipo']) ?></span>
                <h5 class="card-title mt-1"><?= htmlspecialchars($c['titolo']) ?></h5>
                <p class="card-text mb-2"><strong><?= htmlspecialchars($c['categoria']) ?></strong> • <span class="text-muted small"><?= htmlspecialchars($c['data']) ?></span></p>
              </div>
            </div>
            <p class="text-muted"><?= htmlspecialchars($c['descrizione']) ?></p>
          </div>
          <div class="mt-2 mt-md-0">
            <a href="<?= htmlspecialchars($c['link']) ?>" class="btn btn-outline-primary btn-sm" target="_blank" rel="noopener noreferrer">Apri contenuto ↗</a>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </section>

</body>
</html>
