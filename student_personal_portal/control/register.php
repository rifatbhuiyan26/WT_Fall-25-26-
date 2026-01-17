<?php
include "../model/db.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if(!empty($name) && !empty($email) && !empty($password)) {
        if ($password !== $confirm_password) {
            echo "<script>alert('Passwords do not match!'); window.history.back();</script>";
            exit();
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO students(name, email, phone, password) VALUES ('$name', '$email', '$phone', '$hashedPassword')";

        if($conn->query($sql)) {
            echo "<script>alert('Registration Successful!'); window.location.href='../view/index.html';</script>";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "<script>alert('All fields are required!'); window.history.back();</script>";
    }
}
?>