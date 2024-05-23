<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dynamic Dropdowns</title>
</head>
<body>

<!-- First set of dropdowns -->
<h2>First Set of Dropdowns</h2>
<label for="semesterDropdown1">Select Semester:</label>
<select class="semesterDropdown1" onchange="populateCourses(this, 1)">
  <option value="">Select</option>
</select>

<label for="courseDropdown1">Select Course:</label>
<select class="courseDropdown1" onchange="displayCourseInfo(this, 1)" disabled>
  <option value="">Select</option>
</select>

<div class="courseInfo1"></div>

<!-- Second set of dropdowns -->
<h2>Second Set of Dropdowns</h2>
<label for="semesterDropdown2">Select Semester:</label>
<select class="semesterDropdown2" onchange="populateCourses(this, 2)">
  <option value="">Select</option>
</select>

<label for="courseDropdown2">Select Course:</label>
<select class="courseDropdown2" onchange="displayCourseInfo(this, 2)" disabled>
  <option value="">Select</option>
</select>

<div class="courseInfo2"></div>

<script>
  const semesterData = {
    Artificial_Intelligence_and_Data_Science: ["Semester 1", "Semester 2", "Semester 3", "Semester 4", "Semester 5", "Semester 6", "Semester 7", "Semester 8"],
    class2: ["Semester 1", "Semester 2"]
  };
  
  const courseData = {
    Artificial_Intelligence_and_Data_Science: {
      "Semester 1": ["Engineering Mathematics-I", "Engineering Physics","Systems in Mechanical Engineering","Basic Electrical Engineering","Programming & Problem Solving","Workshop"],
      "Semester 2": ["Engineering Mathematics-II", "Engineering Chemistry","Basic Electronic Engineering","Engineering Mechanics","Engineering Graphics","Project Based Learning"],
      "Semester 3": ["Course 3A", "Course 3B"],
      "Semester 4": ["Course 4A", "Course 4B"],
      "Semester 5": ["Course 5A", "Course 5B"],
      "Semester 6": ["Course 6A", "Course 5B"]
    },
    class2: {
      "Semester 1": ["Course 1A", "Course 1B"],
      "Semester 2": ["Course 2A", "Course 2B"]
    }
  };
  
  const creditsData = {
    "Course 1A": 3,
    "Course 1B": 4,
    "Course 2A": 3,
    "Course 2B": 4,
    "Course 3A": 3,
    "Course 3B": 4
  };
  
  const lecturesData = {
    "Course 1A": 30,
    "Course 1B": 35,
    "Course 2A": 30,
    "Course 2B": 35,
    "Course 3A": 30,
    "Course 3B": 35
  };
  
  // Function to populate semester dropdown and select the default semester
  
  function populateSemesterDropdown(setNumber) {
    const defaultClass = "Artificial_Intelligence_and_Data_Science"; // Replace this with the logic to fetch the default class from the user profile
    const semesterDropdown = document.querySelector(`.semesterDropdown${setNumber}`);
    semesterDropdown.innerHTML = "<option value=''>Select</option>";
    const semesters = semesterData[defaultClass];
    semesters.forEach((semester) => {
      const option = document.createElement("option");
      option.text = semester;
      option.value = semester;
      semesterDropdown.appendChild(option);
    });
  }
  
  // Function to populate course dropdown based on selected semester
  function populateCourses(select, setNumber) {
    const defaultClass = "Artificial_Intelligence_and_Data_Science"; // Replace this with the logic to fetch the default class from the user profile
    const selectedSemester = select.value;
    const courseDropdown = document.querySelector(`.courseDropdown${setNumber}`);
    courseDropdown.innerHTML = "<option value=''>Select</option>";
    const courses = courseData[defaultClass][selectedSemester];
    courses.forEach((course) => {
      const option = document.createElement("option");
      option.text = course;
      option.value = course;
      courseDropdown.appendChild(option);
    });
    courseDropdown.disabled = false;
  }
  
  // Function to display course information (credits and total lectures)
  function displayCourseInfo(select, setNumber) {
    const selectedCourse = select.value;
    const credits = creditsData[selectedCourse];
    const courseInfoDiv = document.querySelector(`.courseInfo${setNumber}`);
    courseInfoDiv.innerHTML = ` ${credits}`;
  }
  
  // Call the function to populate the semester dropdown for each set
  populateSemesterDropdown(1);
  populateSemesterDropdown(2);

</script>

</body>
</html>
