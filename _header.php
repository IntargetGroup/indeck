<?php require_once '_config.php'; // Include controllo sessione e funzioni ?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) . ' - In:Deck' : 'In:Deck'; ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="style.css">

  <link rel="icon" href="/images/favicon.png" />
</head>
<body>
  <div class="container-fluid">
    <div class="row flex-nowrap">
        <?php // Sidebar inclusa dalla pagina template ?>