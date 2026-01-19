<?php
session_start();
include "../model/db.php"; 

if (isset($_POST['update'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $user_id = $_SESSION['user_id'];

    $sql = "UPDATE students SET name='$name', email='$email', phone='$phone' WHERE id='$user_id'";
    
    if ($conn->query($sql)) {
        $_SESSION['user_name'] = $name;  
        echo "<script>alert('Profile Updated Successfully!'); window.location.href='profile.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

if (isset($_POST['delete'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "DELETE FROM students WHERE id='$user_id'";
    
    if ($conn->query($sql)) {
        session_destroy();
        echo "<script>alert('Account Deleted Successfully!'); window.location.href='../view/register.html';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>