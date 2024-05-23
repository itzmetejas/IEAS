<?php 
// Database connection
session_start();
require_once 'config.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get user ID from session (assuming it's set in your login process)
    $user_id = $_SESSION['user_id'];

    //A1 Table
    $sem1_sub1_points = $_POST['sem1_sub1_points'];
    $sem1_sub2_points = $_POST['sem1_sub2_points'];
    $sem2_sub1_points = $_POST['sem2_sub1_points'];
    $sem2_sub2_points = $_POST['sem2_sub2_points'];
    $total_points = $sem1_sub1_points + $sem1_sub2_points + $sem2_sub1_points + $sem2_sub2_points;
    $verification_status = "Pending";

    $upload_base_dir = "uploads/";
    $supporting_document = '';

if (isset($_FILES['supporting_document']) && $_FILES['supporting_document']['error'] == UPLOAD_ERR_OK) {
    // Get the username from POST request (assuming it is passed in the form)
    $username = $_POST['username']; // Make sure this field is included in the form

    // Create user-specific directory if it doesn't exist
    $user_upload_dir = $upload_base_dir . $current_user . '/';
    if (!is_dir($user_upload_dir)) {
        if (!mkdir($user_upload_dir, 0777, true)) {
            die('Failed to create directories...');
        }
    }

    // Set the path for the uploaded file
    $supporting_document = $user_upload_dir . "a1.pdf";

    // Move the uploaded file to the user-specific directory with fixed name
    if (move_uploaded_file($_FILES['supporting_document']['tmp_name'], $supporting_document)) {
        echo "File uploaded successfully.";
    } else {
        echo "Error uploading file.";
    }
}




    // Insert data into database
    $sql = "INSERT INTO db_A1 (ID, sem1_sub1_points, sem1_sub2_points, sem2_sub1_points, sem2_sub2_points, total_points, supporting_document, verification_status) 
                VALUES ('$user_id', '$sem1_sub1_points', '$sem1_sub2_points', '$sem2_sub1_points', '$sem2_sub2_points', '$total_points', '$supporting_document', '$verification_status');";

    if ($conn->query($sql) === TRUE) {
        echo "Employee appraisal data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    //A2 Table
    $a2_classname1 = $_POST['a2_classname1'];
    $a2_semname1 = $_POST['a2_semname1'];
    $a2_coursename1 = $_POST['a2_coursename1'];
    $percentageOutput = $_POST['percentageOutput'];
    $creditInput1 = $_POST['creditInput1'];


}
?>