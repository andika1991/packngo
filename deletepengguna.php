<?php
// Check if the ID parameter is set
if(isset($_GET['id'])) {
    // Include the database connection file
    include 'koneksi.php';

    // Escape the ID to prevent SQL injection
    $id_pengguna = mysqli_real_escape_string($conn, $_GET['id']);

    // Prepare a delete query
    $query = "DELETE FROM pengguna WHERE id_pengguna = '$id_pengguna'";

    // Execute the delete query
    if(mysqli_query($conn, $query)) {
        // Redirect to the page displaying the list of users after successful deletion
        header("Location: manajemenpengguna.php");
        exit();
    } else {
        // If an error occurs during deletion, display an error message
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    // If the ID parameter is not set, redirect to the page displaying the list of users
    header("Location: manajemenpengguna.php");
    exit();
}
?>
