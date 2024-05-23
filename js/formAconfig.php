<?php
// Database connection
session_start();
require_once 'config.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sem1_sub1_points = $_POST['sem1_sub1_points'];
    $sem1_sub2_points = $_POST['sem1_sub2_points'];
    $sem2_sub1_points = $_POST['sem2_sub1_points'];
    $sem2_sub2_points = $_POST['sem2_sub2_points'];
    $total_points = $sem1_sub1_points + $sem1_sub2_points + $sem2_sub1_points + $sem2_sub2_points;
    $verification_status = "Pending";

    // Get user ID from session (assuming it's set in your login process)
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['user_name'];
    $current_user = $_SESSION['current_user'];
    $dpt_name = $_SESSION['dpt_name'];

    // File upload
    $upload_dir = "uploads/";
    $supporting_document = '';
    if ($_FILES['supporting_document']['name']) {
        $supporting_document = $upload_dir . basename($_FILES['supporting_document']['name']);
        move_uploaded_file($_FILES['supporting_document']['tmp_name'], $supporting_document);
    }

    // Insert data into database
    $sql = "INSERT INTO db_A1 (ID, sem1_sub1_points, sem1_sub2_points, sem2_sub1_points, sem2_sub2_points, total_points, supporting_document, verification_status) 
                VALUES ('$user_id', '$sem1_sub1_points', '$sem1_sub2_points', '$sem2_sub1_points', '$sem2_sub2_points', '$total_points', '$supporting_document', '$verification_status')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("status" => "success", "message" => "Employee appraisal data inserted successfully"));
        exit;
    } else {
        echo json_encode(array("status" => "error", "message" => "Error: " . $sql . "<br>" . $conn->error));
        exit;
    }
}
?>
