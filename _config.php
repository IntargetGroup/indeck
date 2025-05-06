<?php
// Avvia la sessione (deve essere la primissima cosa)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// --- Controllo Sessione ---
// Reindirizza a login.php se l'utente non è loggato
if (!isset($_SESSION['is_logged']) || $_SESSION['is_logged'] !== true) {
    // Assicurati che il percorso a login.php sia corretto
    header("Location: login.php");
    exit;
}

// --- Funzione Helper Link Attivo Menu ---
function isActive($pageName) {
    $currentPage = basename($_SERVER['SCRIPT_FILENAME']);
    $activeClass = ' active'; // Classe Bootstrap per link attivo

    // Controllo corrispondenza esatta
    if ($currentPage == $pageName) {
        return $activeClass;
    }

    // Gestione index.php
    if (($currentPage == 'index.php' || $currentPage == '') && $pageName == 'index.php') {
         return $activeClass;
    }

    // Gestione evidenziazione "Prompt Builders" se siamo in una pagina builder
    $builderPages = [
        'prompt_overview.php', 'infographic_prompt_builder.php', 'social_post_builder.php',
        'blog_outline_builder.php', 'ad_copy_builder.php', 'data_insight_builder.php',
        'persona_builder.php', 'mediaplan_builder.php'
        // Aggiungi qui i nomi dei file di futuri builder
    ];
    if ($pageName == 'prompt_overview.php' && in_array($currentPage, $builderPages)) {
        return $activeClass;
    }

    return ''; // Nessuna classe attiva
}

// --- Altre Configurazioni Globali (Esempio) ---
// define('SITE_NAME', 'In:Deck');
// define('INTARGET_RED', '#e43e30');
?>