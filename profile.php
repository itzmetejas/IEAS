<?php

session_start();


if (!isset($_SESSION['user_name'])) {
  header('location: login.php');
  exit; // Ensure script execution stops after redirection
}
if (isset($_GET['logout'])) {
  unset($user_name);
  session_destroy();
  header('location: login.php');
}

$user_name = $_SESSION['user_name'];

$emp_fullname = $_SESSION['emp_fullname'];
$dpt_name = $_SESSION['dpt_name'];
$curr_poss = $_SESSION['curr_poss'];
$dateofjoiningcurr = $_SESSION["dateofjoiningcurr"];
$Educational = $_SESSION["dateofjoiningcurr"];
$dateofjoining = $_SESSION["dateofjoining"];
$total_teaching = $_SESSION["total_teaching"];


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

                            <li><a href="#"> <span class="item-text">Home</span></a></li>

                            <li><a href="#"><span class="item-text">Contact Us</span></a></li>
                            <li><a href="#"><span class="item-text">About Us</span></a></li>

                            <li><a href="#"> <span class="item-text">Products</span></a></li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li><a href="#"><span class="item-text">Send</span></a></li>

                            <li><a href="#"><span class="item-text">Share</span></a></li>

                            <li><a href="#"><span class="item-text">Settings</span></a></li>

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

    </div>
</head>

<body>
  

  <main>
  <table class="profiletbl">
    <thead>


      <tr>
        <th colspan="2" class="text-center">Employee Details</th>

      </tr>
    </thead>
    <tbody>
      <tr class="row-height">
        <td>Name of Department</td>
        <td><?php echo $dpt_name; ?></td>
      </tr>
      <tr class="row-height">
        <td>Name of Faculty</td>
        <td><?php echo $emp_fullname; ?></td>
      </tr>
      <tr class="row-height">
        <td>Current Position / Designation</td>
        <td><?php echo $curr_poss; ?></td>
      </tr>
      <tr class="row-height">
        <td>Date of Joining on Current Position</td>
        <td><?php echo $dateofjoiningcurr; ?></td>
      </tr>
      <tr class="row-height">
        <td>Educational Qualification</td>
        <td><?php echo $Educational; ?></td>
      </tr>
      <tr class="row-height">
        <td>Date of Joining</td>
        <td><?php echo $dateofjoining; ?></td>
      </tr>
      <tr class="row-height">
        <td>Total Teaching Experience in years</td>
        <td><?php echo $total_teaching; ?></td>
      </tr>
    </tbody>
  </table>
  </main>

  

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<footer class="bg-info   fixed-bottom" style=" height: 30px;">
    <!-- Copyright -->
    <div class="text-center p-2" style="background-color: rgb(242, 242, 242); font-size: 12px;">
        © 2023 Copyright:
        <a class="text-dark">K.K.W.I.E.E.R, Nashik</a>
    </div>
    <!-- Copyright -->
</footer>

</html>