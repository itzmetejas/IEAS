const semesterData = {
    Artificial_Intelligence_and_Data_Science: ["Semester 1", "Semester 2", "Semester 3", "Semester 4", "Semester 5", "Semester 6", "Semester 7", "Semester 8"],
    Computer_Engineering: ["Semester 1", "Semester 2"],
    Electrical_Engineering: ["Semester 1", "Semester 2"],
    Electronic_and_Telecommunication: ["Semester 1", "Semester 2"],
    Computer_Science_Design: ["Semester 1", "Semester 2"]
  };
  
  const courseData = {
    Artificial_Intelligence_and_Data_Science: {
      "Semester 1": ["Engineering Mathematics-I", "Engineering Physics","Systems in Mechanical Engineering","Basic Electrical Engineering","Programming & Problem Solving","Workshop"],
      "Semester 2": ["Engineering Mathematics-II", "Engineering Chemistry","Basic Electronic Engineering","Engineering Mechanics","Engineering Graphics","Project Based Learning"],
      "Semester 3":["Discrete Mathematics","Fundamentals of Data Structures","Object Oriented Programming","Computer Graphics","Operating Systems","Data Structures Laboratory","OOP & Computer Graphics Laboratory","Operating Systems Laboratory","Business Communication Skills","Humanity and Social Science" ],
      "Semester 4":["Statistics","Internet of Things","Data Structures and Algorithms","Software Engineering","Management Information System","Internet of Things Laboratory","Data Structures and Algorithms Laboratory","Project Based Learning II","Code of Conduct"],
      "Semester 5":["Data Base Management System","Computer Networks","Web Technology","Artificial Intelligence","Embedded Systems & Security","Design Thinking","Pattern Recognition","Human Computer Interface","Software Laboratory I","CN Laboratory","Embedded Systems & Security Laboratory","Design Thinking Laboratory","Pattern Recognition Laboratory","Human Computer Interface Laboratory","Seminar and Technical Communication","Environmental Studies"],
      "Semester 6":["Data Science","Cyber Security","Artificial Neural Network","Robotics and Automation","Natural Language Processing","Cloud Computing","Software Modeling and Architecture","Software Laboratory II","Software Laboratory III","Internship","Mini Project"],
      "Semester 7":["Machine Learning","Data Modeling & Visualization","Quantum Artificial Intelligence","Industrial Internet of Things","Enterprise Architecture and Components","Bioinformatics","GPU Programming and Architecture","Information Retrieval","UI/UX Design","Optimization Algorithms","Computer Laboratory I","Computer Laboratory II","Project Stage I","MOOC"],
      "Semester 8":["Computational Intelligence","Distributed Computing","Virtual Reality and Game Development","Big Data analytics","Software Development for Portable Devices","Deep Learning","Augmented Reality","Business Intelligence","Information Systems Management","Reinforcement Learning","Computer Laboratory III","Computer Laboratory IV","Project Stage II"]
    },
    Computer_Engineering: {
      "Semester 1": ["Course 1A", "Course 1B"],
      "Semester 2": ["Course 2A", "Course 2B"]
    },
    Electrical_Engineering: {
      "Semester 1": ["Course 1A", "Course 1B"],
      "Semester 2": ["Course 2A", "Course 2B"]
    },
    Electronic_and_Telecommunication: {
      "Semester 1": ["Course 1A", "Course 1B"],
      "Semester 2": ["Course 2A", "Course 2B"]
    },
    Computer_Science_Design: {
      "Semester 1": ["Course 1A", "Course 1B"],
      "Semester 2": ["Course 2A", "Course 2B"]
    }
  };
  
  const TheorycreditsData = {
    "Engineering Mathematics-I": 3,
    "Engineering Physics": 4,
    "Systems in Mechanical Engineering": 43,
    "Basic Electrical Engineering": 3,
    "Programming & Problem Solving": 3,
    "Engineering Mathematics-II": 4,
    "Engineering Chemistry":4,
    "Basic Electronic Engineering":3,
    "Engineering Mechanics":3,
    "Engineering Graphics":1
  };
  const Prac_Tut_creditsData = {
    "Engineering Mathematics-I":1,
    "Engineering Mathematics-II": 1,
    "Engineering Physics": 1,
    "Engineering Chemistry": 1,
    "Systems in Mechanical Engineering": 1,
    "Basic Electrical Engineering": 1,
    "Basic Electronic Engineering": 1,
    "Programming & Problem Solving": 1,
    "Engineering Mechanics":1,
    "Engineering Graphics":1,
    "Workshop": 1,
    "Project Based Learning":2

  };
  
  const lecturesData = {
    "Course 1A": 30,
    "Course 1B": 35,
    "Course 2A": 30,
    "Course 2B": 35,
    "Course 3A": 30,
    "Course 3B": 35
  };

  function populateClassDropdown(setNumber) {
    const classDropdown = document.querySelector(`.classDropdown${setNumber}`);
    classDropdown.innerHTML = "<option value=''>Select Class/ Department</option>";
    for (const deptName in semesterData) {
        const option = document.createElement("option");
        option.text = deptName;
        option.value = deptName;
        classDropdown.appendChild(option);
    }
    classDropdown.addEventListener('change', function() {
        const selectedDept = this.value;
        populateSemesterDropdown(selectedDept, setNumber);
    });
}

  
  // Function to populate semester dropdown and select the default semester
  
  function populateSemesterDropdown(selectedDept, setNumber) {
    const semesterDropdown = document.querySelector(`.semesterDropdown${setNumber}`);
    semesterDropdown.innerHTML = "<option value=''>Select Semester</option>";
    const semesters = semesterData[selectedDept];
    semesters.forEach((semester) => {
        const option = document.createElement("option");
        option.text = semester;
        option.value = semester;
        semesterDropdown.appendChild(option);
    });
}

// Call the function to populate the class dropdown for each set
const numberOfSetss = 25;
for (let i = 1; i <= numberOfSetss; i++) {
    populateClassDropdown(i);
}
  
  // Function to populate course dropdown based on selected semester
  function populateCourses(select, setNumber) {
    const selectedDept = document.querySelector(`.classDropdown${setNumber}`).value;
    const selectedSemester = select.value;

    const courseDropdown = document.querySelector(`.courseDropdown${setNumber}`);
    courseDropdown.innerHTML = "<option value=''>Select Course</option>";
    if (courseData[selectedDept] && courseData[selectedDept][selectedSemester]) {
      const courses = courseData[selectedDept][selectedSemester];
      courses.forEach((course) => {
          const option = document.createElement("option");
          option.text = course;
          option.value = course;
          courseDropdown.appendChild(option);
      });
      courseDropdown.disabled = false;
  } else {
      // If no courses are available for the selected department and semester
      courseDropdown.disabled = true;
  }
}

  
  // Function to display course information (credits and total lectures)
  function LecdisplayCourseInfo(select, setNumber) {
    const selectedCourse = select.value;
    const Theorycredits = TheorycreditsData[selectedCourse];
    const courseInfoDiv = document.querySelector(`.TheorycourseInfo${setNumber}`);
    courseInfoDiv.textContent = ` ${Theorycredits}`;
    
    const hiddenInput = document.getElementById(`theory_credits_input1`);
    if (hiddenInput) {
        hiddenInput.innerHTML = Theorycredits;
        //print(hiddenInput) ;
    }

  }

  function PracdisplayCourseInfo(select, setNumber) {
    const selectedCourse = select.value;
    const Praccredits = Prac_Tut_creditsData[selectedCourse];
    const courseInfoDiv = document.querySelector(`.PraccourseInfo${setNumber}`);
    courseInfoDiv.innerHTML = ` ${Praccredits}`;
  }
  
  // Call the function to populate the semester dropdown for each set

  
  