// menu.js (Revisionato con Social abilitato)
document.addEventListener("DOMContentLoaded", function() {
  const sidebarContainer = document.querySelector(".sidebar-container");
  if (!sidebarContainer) return;

  sidebarContainer.innerHTML = `
    <nav class="sidebar">
      <div class="sidebar-header">
        <img class="intarget-logo" src="images/intarget-logo.png" alt="Intarget Logo">
      </div>
      <ul>
        <li class="menu-section-title">AgentAI</li>
        <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
        <li><a href="social.php"><i class="fas fa-hashtag"></i> Social</a></li>
        <li><span class="disabled-menu"><i class="fas fa-newspaper"></i> News <span class="in-progress">🛠️</span></span></li>
        <li><span class="disabled-menu"><i class="fas fa-cogs"></i> Workflow <span class="in-progress">🛠️</span></span></li>
        <li><span class="disabled-menu"><i class="fas fa-paint-brush"></i> Creative <span class="in-progress">🛠️</span></span></li>
        <li><a href="presentation.php"><i class="fas fa-rocket"></i> Presentation</a></li>
        <li><span class="disabled-menu"><i class="fas fa-lightbulb"></i> Feedback <span class="in-progress">🛠️</span></span></li>
        <li><span class="disabled-menu"><i class="fas fa-chart-line"></i> Analytics <span class="in-progress">🛠️</span></span></li>

        <li class="menu-section-title">LABS</li>
        <li><a href="prompt_overview.php"><i class="fas fa-magic"></i> Prompt Builders</a></li>
      </ul>
    </nav>`;

  // Evidenzia la voce attiva
  const currentPage = window.location.pathname.split("/").pop();
  const links = sidebarContainer.querySelectorAll("nav.sidebar ul li a");
  links.forEach(link => {
    const href = link.getAttribute("href");
    if (href === currentPage) {
      link.classList.add("active");
    }
  });
});
