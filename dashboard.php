<?php

session_start();



// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['user_name'])) {
    header('location: login.php');
    exit; // Ensure script execution stops after redirection
}
if (isset($_GET['logout'])) {
    unset($user_name);
    session_destroy();
    header('location: login.php');
}

// Retrieve username from session
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$current_user = $_SESSION['current_user'];
$dpt_name = $_SESSION['dpt_name'];






?>




<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom CSS File -->

    <link rel="stylesheet" href="css/dashboard.css">
    <script src="https://kit.fontawesome.com/93fe9777a8.js" crossorigin="anonymous"></script>

    <style>
        /* CSS for the selected menu item */
        .selected-menu-item {
            background-color: #D0D8FF;
            /* Change this to the desired background color */
            color: #fff;
            /* Change this to the desired text color */
        }
    </style>



    <title>Employee Appraisal System</title>

    <!-- Navbar -->
    <div class="sidebar-nav">

        <nav class="navbar navbar-dark bg-dark fixed-top">

            <div class="container">

                <!-- Mobile Menu Toggle Button -->

                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">

                    <span class="navbar-toggler-icon"></span>

                </button>
                <a class="navbar-brand d-flex align-items-center" href="dashboard.php">
                    <div>
                        <img src="https://agri.kkwagh.edu.in/assets/front_end/images/logo.png" width="80" height="60" class="logoimage" alt="K.K Wagh I.E.E.R, Nashik" style="filter: brightness(0) invert(1);">
                    </div>
                    <div>
                        <span>Employee Appraisal System</span>
                        <div class="cllgname" style="font-size: small; color: white;">
                            K.K. Wagh I.E.E.R, Nashik
                        </div>
                    </div>

                </a>



                <!-- Menus List -->

                <div class="bg-light offcanvas offcanvas-start shadow" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-body">
                        <ul class="navbar-nav">
                            <li>
                                <div style="border: 1px solid #ced4da; border-radius: 10px; padding: 15px;">
                                    <span style="font-size: 20px; font-weight: bold;">K.K. Wagh I.E.E.R, Nashik</span>
                                    <div class="cllgname" style="font-size: 16px;">Employee Appraisal System</div>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a href="#" onclick="selectMenuItem(this)" style="display: flex; align-items: center; padding: 10px; border: 1px solid #ced4da; border-radius: 10px; margin-bottom: 5px; text-decoration: none; color: #212529;">
                                    <i class="fas fa-chart-bar" style="margin-right: 10px;"></i> <!-- Font Awesome icon -->
                                    Part A: Teaching
                                </a></li>
                            <li><a href="" onclick="selectMenuItem(this)" style="display: flex; align-items: center; padding: 10px; border: 1px solid #ced4da; border-radius: 10px; margin-bottom: 5px; text-decoration: none; color: #212529;">
                                    <i class="fas fa-user" style="margin-right: 10px;"></i> <!-- Font Awesome icon -->
                                    Part B: Personal
                                </a></li>
                            <li><a href="" onclick="selectMenuItem(this)" style="display: flex; align-items: center; padding: 10px; border: 1px solid #ced4da; border-radius: 10px; margin-bottom: 5px; text-decoration: none; color: #212529;">
                                    <i class="fas fa-play-circle" style="margin-right: 10px;"></i> <!-- Font Awesome icon -->
                                    Part C: Demo
                                </a></li>
                            <li><a href="" onclick="selectMenuItem(this)" style="display: flex; align-items: center; padding: 10px; border: 1px solid #ced4da; border-radius: 10px; text-decoration: none; color: #212529;">
                                    <i class="fas fa-chart-pie" style="margin-right: 10px;"></i> <!-- Font Awesome icon -->
                                    Result
                                </a></li>
                            <li><a href="" onclick="selectMenuItem(this)" style="display: flex; align-items: center; padding: 10px; border: 1px solid #ced4da; border-radius: 10px; text-decoration: none; color: #212529;">
                                    <i class="fas fa-question-circle" style="margin-right: 10px;"></i> <!-- Font Awesome icon -->
                                    Help
                                </a></li>
                        </ul>
                    </div>
                </div>





                <div class="btn-group ">

                    <a href="#" class="dropdown-toggle text-white text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">



                        <span class="textnone"><?php echo "" . $current_user . "" ?></span>

                    </a>

                    <ul class="bg-light  dropdown-menu dropdown-menu-end">

                        <li><button class="dropdown-item" type="button" onclick="window.location.href='profile.php'">Edit Profile</button></li>


                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                        <li><button class="dropdown-item" type="button" onclick="window.location.href='dashboard.php?logout=<?php echo $user_name; ?>'">Logout</button></li>

                    </ul>

                </div>



            </div>
        </nav>
    </div>



</head>

<body>






    <main>
        <?php include 'formA.php';
        ?>

    </main>







    <script>
        function nextPage(currentPageId, nextPageId) {
            // Check if inputs are filled
            var inputsFilled = checkInputsFilled(currentPageId);

            // If inputs are filled, proceed to the next page
            if (inputsFilled) {
                document.getElementById(currentPageId).classList.remove('active-page');
                document.getElementById(nextPageId).classList.add('active-page');
            } else {
                // If inputs are not filled, display a message or handle the situation accordingly
                alert('Please fill all inputs before proceeding.');
            }
        }

        function checkInputsFilled(pageId) {
            // Get all input elements on the current page


            var inputs = document.querySelectorAll('#' + pageId + ' input[type="number"]');
            var fileInputs = document.querySelectorAll('#' + pageId + ' input[type="file"]');

            var numberInputFilled = false;

            // Check if any number input is filled
            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].value) {
                    numberInputFilled = true;
                    break; // Exit loop if any number input is filled
                }
            }

            // Check if file input has a file selected
            var fileInputFilled = false;
            for (var i = 0; i < fileInputs.length; i++) {
                if (fileInputs[i].files.length) {
                    fileInputFilled = true;

                    break; // Exit loop if file input has a file selected
                }
            }
            var verificationResultCell = document.getElementById('a1_verificationResult');

            if (fileInputFilled) {
                verificationResultCell.innerText = "Verified";
            } else {
                verificationResultCell.innerText = ""; // Clear the cell if no file is uploaded
            }

            // Return true if at least one number input is filled and the file input has a file selected
            return numberInputFilled && fileInputFilled;


        }

        function previousPage(currentPageId, previousPageId) {
            document.getElementById(currentPageId).classList.remove("active-page");
            document.getElementById(previousPageId).classList.add("active-page");
            currentPageId = previousPageId;
        }

        // Get all number input fields
        var numberInputs = document.querySelectorAll('input[type="number"]');

        // Attach input event listener to each input
        numberInputs.forEach(function(input) {
            input.addEventListener("input", function() {
                var min = parseInt(this.getAttribute("min"));
                var max = parseInt(this.getAttribute("max"));
                var value = parseInt(this.value);

                // If the entered value is less than the min, set it to min
                if (value < min || isNaN(value)) {
                    this.value = min;
                }
                // If the entered value is greater than the max, set it to max
                else if (value > max) {
                    this.value = max;
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            var currentUrl = window.location.href;
            var menuItems = document.querySelectorAll('.navbar-nav li a');

            menuItems.forEach(function(menuItem) {
                if (menuItem.href === currentUrl) {
                    menuItem.parentElement.classList.add('selected-menu-item');
                }
            });
        });

        function selectMenuItem(item) {
            // Remove the 'selected-menu-item' class from all menu items
            var menuItems = document.querySelectorAll('.navbar-nav li a');
            menuItems.forEach(function(menuItem) {
                menuItem.parentElement.classList.remove('selected-menu-item');
            });

            // Add the 'selected-menu-item' class to the clicked menu item
            item.parentElement.classList.add('selected-menu-item');
        }

        // Get references to the input elements
        const numberOfSets = 8;

        for (let i = 1; i <= numberOfSets; i++) {
            const totalInput = document.getElementById(`totalInput${i}`);
            const outOfTotalInput = document.getElementById(`outOfTotalInput${i}`);

            totalInput.addEventListener("input", () => {
                updatePercentage(i);
                checkOutOfTotal(i);
            });
            outOfTotalInput.addEventListener("input", () => {
                updatePercentage(i);
                checkOutOfTotal(i);
            });
        }

        function updatePercentage(setNumber) {
            const totalInput = document.getElementById(`totalInput${setNumber}`);
            const outOfTotalInput = document.getElementById(`outOfTotalInput${setNumber}`);
            const percentageOutput = document.getElementById(`percentageOutput${setNumber}`);
            const creditInput = document.getElementById(`creditInput${setNumber}`);

            const total = parseInt(totalInput.value);
            let outOfTotal = parseInt(outOfTotalInput.value);

            if (!isNaN(total) && !isNaN(outOfTotal) && total !== 0) {
                if (outOfTotal > total) {
                    outOfTotal = total;
                    outOfTotalInput.value = outOfTotal;
                }

                const percentage = (outOfTotal / total) * 100;
                percentageOutput.textContent = percentage.toFixed(2);

                if (percentage === 100) {
                    creditInput.textContent = 2;
                } else if (percentage >= 90 && percentage <= 99) {
                    creditInput.textContent = 1;
                } else {
                    creditInput.textContent = 0;
                }
            } else {
                percentageOutput.value = "";
                creditInput.textContent = "";
            }
        }

        function checkOutOfTotal(setNumber) {
            const totalInput = document.getElementById(`totalInput${setNumber}`);
            const outOfTotalInput = document.getElementById(`outOfTotalInput${setNumber}`);

            const total = parseInt(totalInput.value);
            const outOfTotal = parseInt(outOfTotalInput.value);

            if (outOfTotal > total) {
                outOfTotalInput.value = total;
            }
        }





        const numberOfSetsss = 4;

        for (let i = 1; i <= numberOfSetsss; i++) {
            const creditInputs = document.getElementById(`A4credit${i}`);
            const feedbackInput = document.getElementById(`averagefeedback${i}`);

            feedbackInput.addEventListener("input", () => {
                const feedbackValue = parseFloat(feedbackInput.value);

                if (!isNaN(feedbackValue)) {
                    if (feedbackValue > 8) {
                        creditInputs.textContent = 2;
                    } else if (feedbackValue >= 6 && feedbackValue <= 8) {
                        creditInputs.textContent = 1;
                    } else {
                        creditInputs.textContent = 0;
                    }
                }
            });
        }

        // Iterate over each set
        const numberOfSetssss = 10;

        // Iterate over each set
        for (let i = 1; i <= numberOfSetssss; i++) {
            const A5testinput = document.getElementById(`testno${i}`);
            const selectInput = document.getElementById(`lmsyesno${i}`);
            const totalCreditOutput = document.getElementById(`A5credits${i}`);

            // Event listener for input changes
            A5testinput.addEventListener("input", () => updateCredit(i));
            selectInput.addEventListener("change", () => updateCredit(i));
        }

        // Function to update credit based on number input and select option
        function updateCredit(setNumber) {
            let totalCredits = 0;

            // Get input and select elements for the current set
            const A5testinput = document.getElementById(`testno${setNumber}`);
            const selectInput = document.getElementById(`lmsyesno${setNumber}`);

            // Get the values from the input and select elements
            const testValue = parseFloat(A5testinput.value);
            const selectValue = selectInput.value;

            // Calculate credits based on conditions
            let credits = 0;
            if (!isNaN(testValue) && testValue >= 2) {
                credits += 2;
            }
            if (selectValue === "yes") {
                credits += 1;
            }

            // Update total credits
            totalCredits += credits;

            // Update corresponding HTML element with total credits
            const totalCreditOutput = document.getElementById(`A5credits${setNumber}`);
            totalCreditOutput.textContent = totalCredits;
        }
        //A7credits
        function A7checkCredits() {
            const activity1 = document.getElementById('A7taskType1').value;
            const activity2 = document.getElementById('A7taskType2').value;
            const activity3 = document.getElementById('A7taskType3').value;
            const creditsCell = document.getElementById('A7credits');

            if (activity1 !== "" && activity2 !== "" && activity3 !== "") {
                if (activity1 !== activity2 && activity1 !== activity3 && activity2 !== activity3) {
                    creditsCell.textContent = 3;
                } else {
                    creditsCell.textContent = 0;
                }
            } else {
                creditsCell.textContent = 0; // Reset the content if any dropdown is not selected
            }
        }

        

        function printForm() {
            // Clone the table
            var formClone = document.getElementById('multiPageForm').cloneNode(true);

            // Loop through input fields and replace them with their values
            var inputs = formClone.querySelectorAll('input[type="number"]');
            inputs.forEach(function(input) {
                input.outerHTML = input.value;
            });

            // Open a new window for printing
            var printWindow = window.open('', '_blank');

            // Write the form HTML to the new window
            printWindow.document.write('<style>table {border-collapse: collapse;} th, td {border: 1px solid black; padding: 5px;text-align: left;} .print-hidden {display: none;}</style>');
            printWindow.document.write('</head><body>');
            printWindow.document.write('<h1>Filled Form</h1>');
            printWindow.document.write(formClone.outerHTML);
            printWindow.document.write('</body></html>');

            // Close the document writing
            printWindow.document.close();

            // Print the window
            printWindow.print();
        }
    </script>
    <script src="js/courses_database.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

<footer class="bg-info   fixed-bottom" style=" height: 30px;">
    <!-- Copyright -->
    <div class="text-center p-2" style="background-color: rgb(242, 242, 242); font-size: 12px;">
        © 2023 Copyright:
        <a class="text-dark">K.K.W.I.E.E.R, Nashik</a>
    </div>
    <!-- Copyright -->
</footer>

</html>