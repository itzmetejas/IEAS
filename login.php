<?php

include 'config.php';
session_start();








if (isset($_POST['submit'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $result = mysqli_query($conn, "SELECT * FROM employees WHERE username ='$username' AND Password='$password' ") or die("Query Failed");
    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_array($result);
        $_SESSION['user_id'] = $row['ID'];
        $_SESSION['user_name'] = $row['username'];
        $_SESSION['current_user'] = $row['Employee_Name'];
        $user_id = $_SESSION['user_id'];
        $user_name = $_SESSION['user_name'];
        $current_user = $_SESSION['current_user'];
       
       



        

        $user_details = mysqli_query($conn, "SELECT * FROM employees JOIN EmployeeDetails ON employees.ID = EmployeeDetails.ID WHERE employees.username ='$username'") or die("Query Failed");
        if (mysqli_num_rows($user_details) > 0) {
            $row2 = mysqli_fetch_array($user_details);
            $_SESSION['dpt_name'] = $row2['DEPARTMENT_NAME'];
            $_SESSION['emp_fullname'] = $row2["EMPLOYEE_FIRST_NAME"] . " " . $row2["EMPLOYEE_MIDDLE_NAME"] . " " . $row2["EMPLOYEE_LAST_NAME"];
            $_SESSION['curr_poss'] = $row2["DESIGNATION"];
            $_SESSION["dateofjoiningcurr"] = $row2["Current_Position_DATE"];
            $_SESSION["Educational"] = $row2["HighestQualification"];
            $_SESSION["dateofjoining"] = $row2["DATE_OF_JOINING"];
            $_SESSION["total_teaching"] = $row2["EXPERIANCE"];
        


    

    

        //$a1 = mysqli_query($conn, "SELECT * FROM EmployeeDetails JOIN A1 ON EmployeeDetails.ID = A1.ID WHERE employees.username ='$username'") or die("Query Failed");





                }



        header('location:dashboard.php');
        exit;
    } else {

        $message[] = 'Wrong Email or Password' . $user_name;
    }
}

if (isset($_SESSION['user_name'])) {
    header('location: dashboard.php');
    exit; // Ensure script execution stops after redirection
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- Custom CSS File -->

    <link rel="stylesheet" href="css/credential.css">
    <link rel="stylesheet" href="css/style.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">




    <title>Employee Appraisal System</title>
    <nav class="navbar navbar-light bg-light ">
        <a class="navbar-brand" href="dashboard.php">
            <img src="https://agri.kkwagh.edu.in/assets/front_end/images/logo.png" width="80" height="60" class="d-inline-block align-content-center logoimage" alt="K.K Wagh I.E.E.R, Nashik">
            Employee Appraisal System
            <div class="cllgname d-flex" style="font-size: small;">
                K.K. Wagh I.E.E.R, Nashik
            </div>
        </a>


    </nav>






</head>

<body>






    <!-- Login Form -->
    <div class="form-container">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h3>Login now</h3>
            <?php
            if (isset($message)) {
                foreach ($message as $message) {
                    echo '<div class="message">' . $message . '</div>';
                }
            }
            ?>

            <div class="field input">
                <input type="text" name="username" id="username" autocomplete="off" required placeholder="Enter Username">
            </div>
            <div class="field input">
                <input type="password" name="password" id="password" autocomplete="off" required placeholder="Enter your password">
            </div>


            <input type="submit" name="submit" value="Login" class="form-btn" required>

        </form>


    </div>




</body>

</html>