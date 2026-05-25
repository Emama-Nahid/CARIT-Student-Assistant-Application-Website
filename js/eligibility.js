const data = {
  undergraduate: {
    requirement: 3.2,
    courses: [
      "CSE 3203 Mobile System Overview",
      "IT 4213 Mobile Web Development",
      "IT 3203 Introduction to Web Development",
      "IT 4403 Web Application Development",
      "IT 1114 Introduction to Information Technology"
    ]
  },
  graduate: {
    requirement: 3.7,
    courses: [
      "IT 7113 Data Visualization",
      "IT 6713 Business Intelligence",
      "IT 6823 Information Security Administration",
      "IT 7143 Advanced Database Systems"
    ]
  }
};

const gradePoints = {
  A: 4.0,
  B: 3.0,
  C: 2.0,
  D: 1.0,
  F: 0.0
};

const statusSelect = document.getElementById("studentStatus");
const courseArea = document.getElementById("courseArea");
const form = document.getElementById("eligibilityForm");
const resultBox = document.getElementById("result");

statusSelect.addEventListener("change", showCourses);
form.addEventListener("submit", evaluateEligibility);

function showCourses() {
  const status = statusSelect.value;
  courseArea.innerHTML = "";
  resultBox.innerHTML = "";

  if (status === "") {
    return;
  }

  const selectedData = data[status];

  for (let i = 0; i < selectedData.courses.length; i++) {
    const courseName = selectedData.courses[i];

    const group = document.createElement("div");
    group.className = "form-group";

    const label = document.createElement("label");
    label.textContent = courseName;

    const select = document.createElement("select");
    select.name = "grade" + i;

    select.innerHTML = `
      <option value="">Select grade</option>
      <option value="A">A</option>
      <option value="B">B</option>
      <option value="C">C</option>
      <option value="D">D</option>
      <option value="F">F</option>
    `;

    group.appendChild(label);
    group.appendChild(select);
    courseArea.appendChild(group);
  }
}

function evaluateEligibility(event) {
  event.preventDefault();

  const status = statusSelect.value;

  if (status === "") {
    resultBox.innerHTML = "<p>Please select your student status first.</p>";
    return;
  }

  const selectedData = data[status];
  const selects = courseArea.getElementsByTagName("select");
  let total = 0;

  for (let i = 0; i < selects.length; i++) {
    const letter = selects[i].value;

    if (letter === "") {
      resultBox.innerHTML = "<p>Please select a grade for every required course.</p>";
      return;
    }

    total = total + gradePoints[letter];
  }

  const average = total / selects.length;
  const requiredAverage = selectedData.requirement;

  if (average > requiredAverage) {
    resultBox.innerHTML =
      "<p><strong>Average Grade:</strong> " + average.toFixed(2) + "</p>" +
      "<p>Congratulations. You are eligible to apply for the CARIT student assistant position.</p>" +
      "<p><a href='application.php'>Go to the application form</a></p>";
  } else {
    resultBox.innerHTML =
      "<p><strong>Average Grade:</strong> " + average.toFixed(2) + "</p>" +
      "<p>Thank you for your interest. At this time, the minimum average grade requirement is not met.</p>";
  }
}