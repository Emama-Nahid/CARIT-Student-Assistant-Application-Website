<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
  header("Location: application.php");
  exit;
}

$full_name = trim($_POST["full_name"] ?? "");
$student_id = trim($_POST["student_id"] ?? "");
$email = trim($_POST["email"] ?? "");
$student_level = trim($_POST["student_level"] ?? "");
$major = trim($_POST["major"] ?? "");
$skills = $_POST["skills"] ?? [];
$work_type = trim($_POST["work_type"] ?? "");
$availability = trim($_POST["availability"] ?? "");
$statement = trim($_POST["statement"] ?? "");

$errors = [];

if ($full_name == "") $errors["full_name"] = "Full name is required.";
if ($student_id == "") {
  $errors["student_id"] = "Student ID is required.";
} elseif (!ctype_digit($student_id)) {
  $errors["student_id"] = "Student ID must contain digits only.";
}
if ($email == "") {
  $errors["email"] = "Email is required.";
} elseif (
  !filter_var($email, FILTER_VALIDATE_EMAIL) ||
  !preg_match("/@([A-Za-z0-9-]+\.)*kennesaw\.edu$/i", $email)
) {
  $errors["email"] = "Please enter a valid KSU email ending with kennesaw.edu.";
}
if ($student_level == "") $errors["student_level"] = "Student level is required.";
if ($major == "") $errors["major"] = "Major is required.";
if (empty($skills)) $errors["skills"] = "Please select at least one skill.";
if ($work_type == "") $errors["work_type"] = "Work type is required.";
if ($availability == "") $errors["availability"] = "Availability is required.";
if ($statement == "") $errors["statement"] = "This field is required.";

if (!empty($errors)) {
  $queryData = [
    "errors" => $errors,
    "full_name" => $full_name,
    "student_id" => $student_id,
    "email" => $email,
    "student_level" => $student_level,
    "major" => $major,
    "skills" => $skills,
    "work_type" => $work_type,
    "availability" => $availability,
    "statement" => $statement
  ];

  header("Location: application.php?" . http_build_query($queryData));
  exit;
}

$pageTitle = "CARIT - Application Submitted";
$activePage = "";
include "includes/header.php";
?>

<main class="section">
  <div class="container">
    <div class="card form-card">
      <h2 class="section-title">Application Submitted</h2>
      <p>Your application has been received. The information below is displayed for confirmation.</p>

      <table class="confirm-table">
        <tr>
          <th>Full Name</th>
          <td><?php echo htmlspecialchars($full_name); ?></td>
        </tr>
        <tr>
          <th>Student ID</th>
          <td><?php echo htmlspecialchars($student_id); ?></td>
        </tr>
        <tr>
          <th>KSU Email</th>
          <td><?php echo htmlspecialchars($email); ?></td>
        </tr>
        <tr>
          <th>Student Level</th>
          <td><?php echo htmlspecialchars($student_level); ?></td>
        </tr>
        <tr>
          <th>Major</th>
          <td><?php echo htmlspecialchars($major); ?></td>
        </tr>
        <tr>
          <th>Skills</th>
          <td><?php echo htmlspecialchars(implode(", ", $skills)); ?></td>
        </tr>
        <tr>
          <th>Preferred Work Type</th>
          <td><?php echo htmlspecialchars($work_type); ?></td>
        </tr>
        <tr>
          <th>Weekly Availability</th>
          <td><?php echo htmlspecialchars($availability); ?></td>
        </tr>
        <tr>
          <th>Interest Statement</th>
          <td><?php echo htmlspecialchars($statement); ?></td>
        </tr>
      </table>

      <p>Your information has been saved successfully.</p>
    </div>
  </div>
</main>

<?php include "includes/footer.php"; ?>