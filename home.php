
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Employee Appraisal System</title>

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
        <section>



            <form id="multiPageForm">

                <!-- Page 1 -->
                <div class="page active-page" id="page1">




                    <table>
                        <thead>


                            <tr>
                                <th colspan="6">
                                    <div id="A1metadata">
                                        <h5><b>A1. Preparation and Display of Course handout on First day of Semester for both Semesters in A.Y.</h5>
                                        <p style="text-align-last: right;">Maximum Score: 04 Points</b></p>
                                        <p><b>
                                                <hr>Guidelines to Earn Points:
                                            </b></p>
                                        <ol>
                                            <li>Displayed on Notice Board and uploaded on ERP / LMS for all subjects assigned during first semester : 1 Point /Sub/Sem</li>
                                            <li>Displayed on Notice Board and uploaded on ERP / LMS for all subjects assigned during second semester : 1 Point /Sub/Sem</li>
                                        </ol>
                                        <p><b><i>Note: <u>Upload the Course Handout and Proof of display for both semesters.</u></i></b></p>
                                    </div>
                                </th>


                            </tr>

                            <tr>
                                <th rowspan="2">Sr. No.</th>
                                <th rowspan="2">Semester</th>
                                <th colspan="2">Points Claimed</th>
                                <th rowspan="2">Supporting Document Attachment</th>

                                <th rowspan="2">Verification Status</th>
                            </tr>
                            <tr>
                                <th>Sub1</th>
                                <th>Sub2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>For 1st Semester</td>
                                <td><input type="number" id="sem1sub1pt" name="sem1sub1pt" min="0" max="1"></td>
                                <td><input type="number" id="sem1sub2pt" name="sem1sub2pt" min="0" max="1"></td>
                                <td>
                                    <form action="/submit" method="post" enctype="multipart/form-data">
                                        <input type="file" id="documentFile" name="documentFile" accept=".png, .pdf, .doc, .docx">
                                    </form>
                                </td>


                                <td id="verificationResult"></td>

                            </tr>
                            <tr>
                                <td>2</td>
                                <td>For 2st Semester</td>
                                <td><input type="number" id="sem2sub1pt" name="sem2sub1pt" min="0" max="1"></td>
                                <td><input type="number" id="sem2sub2pt" name="sem2sub2pt" min="0" max="1"></td>
                                <td>
                                    <form action="/submit" method="post" enctype="multipart/form-data">
                                        <input type="file" name="document" accept=".pdf, .doc, .docx">
                                    </form>
                                </td>

                                <td id="verificationResult"></td>

                            </tr>

                        </tbody>


                    </table>
                    <br>
                    <button type="button" onclick="nextPage('page1','page2')">Next</button>
                </div>

            </form>
        </section>

        
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