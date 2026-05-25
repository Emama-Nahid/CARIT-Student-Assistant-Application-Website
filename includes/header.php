<?php
if (!isset($pageTitle)) {
  $pageTitle = "CARIT";
}

if (!isset($activePage)) {
  $activePage = "";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo $pageTitle; ?></title>
  <link rel="stylesheet" href="css/styles.css?v=3" />
</head>
<body>

<div class="site-top">
  <div class="topbar">
    <div class="container topbar-inner">
      <div class="brand">
        <a href="http://ccse.kennesaw.edu/it" target="_blank" rel="noopener">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/63/Kennesaw_State_Owls_logo.svg/1280px-Kennesaw_State_Owls_logo.svg.png" alt="CARIT Logo" />
        </a>
        <div>
          <h1 class="brand-title">CARIT</h1>
          <p class="brand-sub">Center for Applied Research in Information Technology</p>
        </div>
      </div>
    </div>
  </div>

  <?php include __DIR__ . "/nav.php"; ?>
</div>