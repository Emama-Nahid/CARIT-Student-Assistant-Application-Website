<?php
$pageTitle = "CARIT - Home";
$activePage = "home";
include "includes/header.php";
?>

  <header class="hero">
    <div class="hero-content">
      <h1>CARIT Center</h1>
      <p>
        CARIT supports applied research and collaboration in information technology.
        We connect students, faculty, and partners to solve real problems in cybersecurity,
        data-driven systems, and software engineering.
      </p>
      <p>
        Our work includes mentoring, research projects, seminars, and hands-on learning experiences.
        <br />Scroll down to see the latest news and updates.
      </p>

      <div class="hero-badges">
        <span class="badge">Applied Research</span>
        <span class="badge">Cybersecurity</span>
        <span class="badge">Data & AI</span>
        <span class="badge">Software Engineering</span>
      </div>
    </div>
  </header>

  <main>
    <section class="section">
      <div class="container">
        <div class="card">
          <h2 class="section-title">Latest News</h2>
          <ul class="news">
            <li><strong>Feb 2026:</strong> Student research showcase announced.</li>
            <li><strong>Jan 2026:</strong> Spring seminar series schedule posted.</li>
            <li><strong>Dec 2025:</strong> New collaboration project launched with industry partners.</li>
            <li><strong>Nov 2025:</strong> CARIT opens student volunteer roles for lab support.</li>
          </ul>

          <p class="muted">
            Learn more about the department at
            <a href="http://ccse.kennesaw.edu/it" target="_blank" rel="noopener">CCSE Information Technology</a>.
          </p>
        </div>
      </div>
    </section>
  </main>

  <?php include "includes/footer.php"; ?>