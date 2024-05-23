<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the folder name from the form
    $folderName = $_POST['username'];

    // Directory where folders will be created
    $directory = "/Applications/XAMPP/xamppfiles/htdocs/IEAS2/documents_uploaded/"; // Adjust this path to your actual Documents folder path

    if (!empty($folderName)) {
        $path = $directory . $folderName;
        // Check if the folder does not already exist
        if (!is_dir($path)) {
            // Create the folder
            if (mkdir($path)) {
                // Redirect to a new page for uploading documents
                header("Location: dashboard.php?folder=$folderName");
                exit;
            } else {
                $error = error_get_last();
                echo "Error creating folder '$path': " . $error['message'];
            }
        } else {
            header("Location: dashboard.php?folder=$folderName");
            exit;
        }
    } else {
        echo "Folder name is empty.";
    }
}
?>
