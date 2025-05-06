<?php
session_start();
$loginsFile = __DIR__ . '/logins.json';
$logins     = file_exists($loginsFile)
              ? json_decode(file_get_contents($loginsFile), true)
              : [];
?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>Report Login Utenti</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container py-4">
    <h1 class="mb-4">Report Login Utenti</h1>
    <?php if (empty($logins)): ?>
      <p class="text-muted">Nessun login registrato.</p>
    <?php else: ?>
      <table class="table table-bordered">
        <thead class="table-light">
          <tr>
            <th>Email</th>
            <th>Data Primo Login</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($logins as $entry): ?>
          <tr>
            <td><?= htmlspecialchars($entry['email']) ?></td>
            <td><?= htmlspecialchars($entry['date']) ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </div>
</body>
</html>
