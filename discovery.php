<?php
// discovery.php – Pagina Discovery
session_start();
if (!isset($_SESSION['is_logged']) || $_SESSION['is_logged'] !== true) {
    header("Location: login.php");
    exit;
}
$pageTitle = 'Discovery';
require_once '_header.php';
require_once '_sidebar.php';
?>

<div class="col main-content-area px-md-4 py-3">
  <?php require_once '_page_header.php'; ?>

  <main>
    <h2>Discovery – Catalogo Strumenti AI</h2>
    <p class="text-secondary mb-4">
      Un unico catalogo di tool AI di nicchia per la fase di discovery e ricerca.
    </p>

    <!-- Filtri Globali -->
    <div class="row g-3 align-items-center mb-4">
      <div class="col-auto">
        <input type="text" id="search-name" class="form-control" placeholder="🔍 Cerca per nome...">
      </div>
      <div class="col-auto">
        <select id="filter-category" class="form-select">
          <option value="">Tutte le categorie</option>
        </select>
      </div>
      <div class="col-auto">
        <select id="filter-price" class="form-select">
          <option value="">Tutti i prezzi</option>
          <option value="Gratuito">Gratuito</option>
          <option value="Freemium">Freemium</option>
          <option value="A pagamento">A pagamento</option>
        </select>
      </div>
    </div>

    <!-- Tabella Tool -->
    <div class="table-responsive">
      <table id="tools-table" class="table table-striped table-hover">
        <thead class="table-dark">
          <tr>
            <th data-sort="nome">Nome</th>
            <th>Link alla home</th>
            <th data-sort="categoria">Categoria</th>
            <th>Prezzo</th>
            <th data-sort="interesse">Interesse</th>
            <th data-sort="data">Data inserimento</th>
            <th>Descrizione</th>
            <th>Value Add</th>
            <th>Tags</th>
          </tr>
        </thead>
        <tbody>
          <!-- popolato da js/discovery.js -->
        </tbody>
      </table>
    </div>
  </main>
</div>

<?php require_once '_footer.php'; ?>
<script src="js/discovery.js"></script>
