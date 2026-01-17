<?php
session_start();
include "../model/db.php";  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentId = mysqli_real_escape_string($conn, $_POST['studentId']); 
    $password = $_POST['pass']; 

    $sql = "SELECT * FROM students WHERE email = '$studentId' OR name = '$studentId'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) { 
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            
            header("Location: ../dashboard.php");
            exit();
        } else {
            echo "<script>alert('Invalid Password!'); window.location.href='../view/index.html';</script>";
        }
    } else {
        echo "<script>alert('User not found!'); window.location.href='../view/register.html';</script>";
    }
}
?>