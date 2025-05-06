<?php
session_start();
require_once '_config.php';
if (!isset($_SESSION['is_logged']) || $_SESSION['is_logged'] !== true) {
    header("Location: login.php");
    exit;
}
?>
<?php include '_header.php'; ?>
<?php include '_sidebar.php'; ?>

<div class="main-content-area">
  <?php include '_page_header.php'; ?>

  <main class="container py-5">

    <h1 class="display-4 fw-bold mb-4">Benvenuto su Indeck</h1>

    <!-- Agent AI -->
    <section class="mb-5">
      <h2 class="h5 fw-semibold mb-2">🤖 Agent AI</h2>
      <p><strong>Cosa:</strong> moduli interattivi che avviano flussi di lavoro automatici basati su intelligenza artificiale.</p>
      <p><strong>Perché:</strong> per liberare tempo dalle attività ripetitive, ottenere analisi immediate e supporto decisionale data-driven.</p>
      <p><strong>Come:</strong> compilate i campi richiesti, cliccate “Avvia Agente” e ricevete i risultati direttamente nella vostra casella email o nella dashboard.</p>
    </section>

    <!-- Prompt Builders -->
    <section class="mb-5">
      <h2 class="h5 fw-semibold mb-2">🧰 Prompt Builders</h2>
      <p><strong>Cosa:</strong> form dinamici che generano prompt pronti all’uso per i principali modelli di linguaggio.</p>
      <p><strong>Perché:</strong> per ottenere testi strutturati, coerenti e ottimizzati sui vostri obiettivi di comunicazione, senza partire da zero.</p>
      <p><strong>Come:</strong> scegliete il template più adatto, compilate i campi e copiate il prompt generato in un click per usarlo nei vostri LLM preferiti.</p>
    </section>

    <!-- Discovery -->
    <section class="mb-5">
      <h2 class="h5 fw-semibold mb-2">🔍 Discovery</h2>
      <p><strong>Cosa:</strong> una tabella sempre aggiornata di strumenti AI di nicchia e affermati.</p>
      <p><strong>Perché:</strong> per scoprire e valutare nuove soluzioni da integrare rapidamente nei progetti dell’agenzia.</p>
      <p><strong>Come:</strong> esplorate i tool, filtrate per tag o categoria e seguite i link diretti ai provider per approfondire.</p>
    </section>

    <!-- Community -->
    <section class="mb-5">
      <h2 class="h5 fw-semibold mb-2">👥 Community</h2>
      <p><strong>Cosa:</strong> il vostro spazio interno per discutere, condividere idee e best practice.</p>
      <p><strong>Perché:</strong> per costruire una cultura collaborativa, scambiare suggerimenti e risolvere insieme le sfide quotidiane.</p>
      <p><strong>Come:</strong> aprite nuovi thread, rispondete ai colleghi, utilizzate tag e ricerca full-text per trovare subito i contenuti più rilevanti.</p>
    </section>

  </main>
</div>

<?php include '_footer.php'; ?>
