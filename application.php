<?php
$pageTitle = "CARIT - Application Form";
$activePage = "";
$errors = $_GET["errors"] ?? [];
$oldSkills = $_GET["skills"] ?? [];

function oldValue($name) {
  return htmlspecialchars($_GET[$name] ?? "");
}

function checkedValue($name, $value) {
  return (isset($_GET[$name]) && $_GET[$name] == $value) ? "checked" : "";
}

function selectedValue($name, $value) {
  return (isset($_GET[$name]) && $_GET[$name] == $value) ? "selected" : "";
}

function skillChecked($value, $oldSkills) {
  return in_array($value, $oldSkills) ? "checked" : "";
}

include "includes/header.php";
?>

<main class="section">
  <div class="container">
    <div class="card form-card">
      <h2 class="section-title">Student Assistant Application Form</h2>

      <p>Please complete the form below to submit your application.</p>

      <form id="applicationForm" action="process_application.php" method="post">
        <div class="form-group">
          <label for="full_name">Full Name</label>
          <input type="text" id="full_name" name="full_name" value="<?php echo oldValue('full_name'); ?>" required>
          <div class="error-text"><?php echo htmlspecialchars($errors["full_name"] ?? ""); ?></div>
        </div>

        <div class="form-group">
          <label for="student_id">Student ID</label>
          <input 
              type="text" 
              id="student_id" 
              name="student_id" 
              value="<?php echo oldValue('student_id'); ?>" 
              required
              pattern="[0-9]+"
              inputmode="numeric"
              title="Student ID must contain digits only."
              >
          <div class="error-text"><?php echo htmlspecialchars($errors["student_id"] ?? ""); ?></div>
        </div>

        <div class="form-group">
          <label for="email">KSU Email</label>
          <input 
            type="email" 
            id="email" 
            name="email" 
            value="<?php echo oldValue('email'); ?>" 
            required
            pattern="[^@\s]+@([A-Za-z0-9-]+\.)*kennesaw\.edu"
            title="Please enter a valid KSU email ending with kennesaw.edu"
           >
         <div class="error-text"><?php echo htmlspecialchars($errors["email"] ?? ""); ?></div>
       </div>

        <div class="form-group">
          <label>Student Level</label>
          <div class="option-group">
              <label><input type="radio" name="student_level" value="Undergraduate" <?php echo checkedValue("student_level", "Undergraduate"); ?> required> Undergraduate</label>
              <label><input type="radio" name="student_level" value="Graduate" <?php echo checkedValue("student_level", "Graduate"); ?> required> Graduate</label>
          </div>
          <div class="error-text"><?php echo htmlspecialchars($errors["student_level"] ?? ""); ?></div>
        </div>

        <div class="form-group">
          <label for="major">Major</label>
          <select id="major" name="major" required>
            <option value="">Select major</option>
            <option value="Information Technology" <?php echo selectedValue("major", "Information Technology"); ?>>Information Technology</option>
            <option value="Computer Science" <?php echo selectedValue("major", "Computer Science"); ?>>Computer Science</option>
            <option value="Data Science" <?php echo selectedValue("major", "Data Science"); ?>>Data Science</option>
            <option value="Software Engineering" <?php echo selectedValue("major", "Software Engineering"); ?>>Software Engineering</option>
          </select>
          <div class="error-text"><?php echo htmlspecialchars($errors["major"] ?? ""); ?></div>
        </div>

        <div class="form-group">
          <label>Skills</label>
          <label><input type="checkbox" name="skills[]" value="HTML/CSS" <?php echo skillChecked("HTML/CSS", $oldSkills); ?>> HTML/CSS</label>
          <label><input type="checkbox" name="skills[]" value="JavaScript" <?php echo skillChecked("JavaScript", $oldSkills); ?>> JavaScript</label>
          <label><input type="checkbox" name="skills[]" value="PHP" <?php echo skillChecked("PHP", $oldSkills); ?>> PHP</label>
          <label><input type="checkbox" name="skills[]" value="Data Analysis" <?php echo skillChecked("Data Analysis", $oldSkills); ?>> Data Analysis</label>
          <div id="skillsError" class="error-text"><?php echo htmlspecialchars($errors["skills"] ?? ""); ?></div>
        </div>

        <div class="form-group">
          <label>Preferred Work Type</label>
          <label><input type="radio" name="work_type" value="Research" <?php echo checkedValue("work_type", "Research"); ?> required> Research</label>
          <label><input type="radio" name="work_type" value="Web Support" <?php echo checkedValue("work_type", "Web Support"); ?> required> Web Support</label>
          <label><input type="radio" name="work_type" value="Data Support" <?php echo checkedValue("work_type", "Data Support"); ?> required> Data Support</label>
          <div class="error-text"><?php echo htmlspecialchars($errors["work_type"] ?? ""); ?></div>
        </div>

        <div class="form-group">
          <label for="availability">Weekly Availability</label>
          <select id="availability" name="availability" required>
            <option value="">Select hours</option>
            <option value="5-10 hours" <?php echo selectedValue("availability", "5-10 hours"); ?>>5-10 hours</option>
            <option value="10-15 hours" <?php echo selectedValue("availability", "10-15 hours"); ?>>10-15 hours</option>
            <option value="15-20 hours" <?php echo selectedValue("availability", "15-20 hours"); ?>>15-20 hours</option>
          </select>
          <div class="error-text"><?php echo htmlspecialchars($errors["availability"] ?? ""); ?></div>
        </div>

        <div class="form-group">
          <label for="statement">Why are you interested in this position?</label>
          <textarea id="statement" name="statement" rows="4" required><?php echo oldValue('statement'); ?></textarea>
          <div class="error-text"><?php echo htmlspecialchars($errors["statement"] ?? ""); ?></div>
        </div>

        <button type="submit" class="btn">Submit Application</button>
      </form>
    </div>
  </div>
</main>

<script>
document.getElementById("applicationForm").addEventListener("submit", function(event) {
  const checkedSkills = document.querySelectorAll('input[name="skills[]"]:checked');
  const skillsError = document.getElementById("skillsError");

  if (checkedSkills.length === 0) {
    event.preventDefault();
    skillsError.textContent = "Please select at least one skill.";
  } else {
    skillsError.textContent = "";
  }
});
</script>

<?php include "includes/footer.php"; ?>