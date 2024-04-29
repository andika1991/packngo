<?php
include 'koneksi.php';

if(isset($_POST['edit-id'], $_POST['edit-username'], $_POST['edit-email'])) {
    // Retrieve form data
    $id = $_POST['edit-id'];
    $newUsername = $_POST['edit-username'];
    $newEmail = $_POST['edit-email'];
    $password = $_POST['password'];

    // Update user data in the database
    $query = "UPDATE pengguna SET username_pengguna='$newUsername', email='$newEmail' , password='$password' WHERE id_pengguna='$id'";
    if(mysqli_query($conn, $query)) {
        echo "Data berhasil diperbarui.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Form submission error: required fields are missing.";
}
?>
