<?php
$pageTitle = "CARIT - Eligibility Check";
$activePage = "eligibility";
include "includes/header.php";
?>

<main class="section">
  <div class="container">
    <div class="card form-card">
      <h2 class="section-title">Student Assistant Eligibility Check</h2>

      <p>
        This page helps students check whether they are eligible to apply for the
        CARIT student assistant positions.
      </p>

      <p>
        First, select your student status. Then choose a letter grade for each required
        course and click the Evaluate button.
      </p>

      <form id="eligibilityForm">
        <div class="form-group">
          <label for="studentStatus">Student Status</label>
          <select id="studentStatus" name="studentStatus">
            <option value="">Select status</option>
            <option value="undergraduate">Undergraduate</option>
            <option value="graduate">Graduate</option>
          </select>
        </div>

        <div id="courseArea"></div>

        <button type="submit" class="btn">Evaluate</button>
      </form>

      <div id="result" class="result-box"></div>
    </div>
  </div>
</main>

<script src="js/eligibility.js"></script>

<?php include "includes/footer.php"; ?>