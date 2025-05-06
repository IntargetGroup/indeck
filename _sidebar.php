<?php
// _sidebar.php (root)
// Sidebar di In:Deck — Agent AI, LABS, TOOLS e Community

session_start();
require_once __DIR__ . '/_config.php';  // assicurati che qui ci sia isActive()

// Carico il numero totale di accessi (ogni login)
$loginsFile  = __DIR__ . '/logins.json';
$raw         = file_exists($loginsFile) ? file_get_contents($loginsFile) : '[]';
$logins      = json_decode($raw, true) ?: [];
$totalAccess = count($logins);
?>
<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 sidebar-wrapper bg-dark">
  <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-3 text-white min-vh-100">

    <!-- Logo e titolo -->
    <a href="index.php" class="d-flex align-items-center pb-3 mb-md-3 me-md-auto text-white text-decoration-none sidebar-header">
      <img class="intarget-logo img-fluid" src="images/intarget-logo.png" alt="In:Deck Logo">
      <span class="fs-5 d-none d-sm-inline ms-2 sidebar-title">In:Deck</span>
    </a>

    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100" id="menu">

      <!-- Agent AI -->
      <li class="nav-item-divider">Agent AI</li>
      <li class="nav-item w-100">
        <a href="social.php" class="nav-link align-middle px-sm-0 px-2<?= isActive('social.php') ?>">
          <i class="fas fa-hashtag fa-fw"></i>
          <span class="ms-2 d-none d-sm-inline">Social</span>
        </a>
      </li>
      <li class="nav-item w-100">
        <a href="meeting.php" class="nav-link align-middle px-sm-0 px-2<?= isActive('meeting.php') ?>">
          <i class="fas fa-calendar-alt fa-fw"></i>
          <span class="ms-2 d-none d-sm-inline">Meeting</span>
        </a>
      </li>
      <li class="nav-item w-100">
        <span class="nav-link disabled-menu align-middle px-sm-0 px-2">
          <i class="fas fa-newspaper fa-fw"></i>
          <span class="ms-2 d-none d-sm-inline">News</span>
          <span class="in-progress ms-auto">🛠️</span>
        </span>
      </li>
      <li class="nav-item w-100">
        <a href="presentation.php" class="nav-link align-middle px-sm-0 px-2<?= isActive('presentation.php') ?>">
          <i class="fas fa-rocket fa-fw"></i>
          <span class="ms-2 d-none d-sm-inline">Presentation</span>
        </a>
      </li>

      <!-- LABS -->
      <li class="nav-item-divider">LABS</li>
      <li class="nav-item w-100">
        <a href="prompt_overview.php" class="nav-link align-middle px-sm-0 px-2<?= isActive('prompt_overview.php') ?>">
          <i class="fas fa-magic fa-fw"></i>
          <span class="ms-2 d-none d-sm-inline">Prompt Builders</span>
        </a>
      </li>

      <!-- TOOLS -->
      <li class="nav-item-divider">TOOLS</li>
      <li class="nav-item w-100">
        <a href="discovery.php" class="nav-link align-middle px-sm-0 px-2<?= isActive('discovery.php') ?>">
          <i class="fas fa-search fa-fw"></i>
          <span class="ms-2 d-none d-sm-inline">Discovery</span>
        </a>
      </li>

      <!-- Community -->
      <li class="nav-item-divider">Community</li>
      <li class="nav-item w-100">
        <a href="community.php" class="nav-link align-middle px-sm-0 px-2<?= isActive('community.php') ?>">
          <i class="fas fa-users fa-fw"></i>
          <span class="ms-2 d-none d-sm-inline">Community</span>
        </a>
      </li>

    </ul>

    <hr class="text-secondary w-100">

    <!-- Utente e logout -->
    <div class="pb-4 pt-2 sidebar-footer w-100 d-flex flex-column align-items-sm-start align-items-center">
      <div class="d-flex align-items-center text-white text-truncate">
        <i class="fas fa-user-circle fs-4"></i>
        <span class="d-none d-sm-inline ms-2 user-email">
          <?= htmlspecialchars($_SESSION['email'] ?? 'Ospite') ?>
        </span>
      </div>
      <a href="logout.php" class="btn btn-outline-light btn-sm mt-2 w-100 text-start">
        <i class="fas fa-sign-out-alt"></i>
        <span class="d-none d-sm-inline">Logout</span>
      </a>
    </div>

    <!-- Contatore totale accessi (discreto) -->
    <div class="mt-auto mb-2 text-center w-100">
      <small class="text-secondary">Accessi totali: <?= $totalAccess ?></small>
    </div>

  </div>
</div>
