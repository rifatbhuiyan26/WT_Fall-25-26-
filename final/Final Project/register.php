<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Collect POST data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Initialize errors array
    $errors = [];

    // Validate fields
    if (empty($name)) $errors[] = "Name is required.";
    if (empty($email)) $errors[] = "Email is required.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email format.";
    if (empty($phone)) $errors[] = "Phone number is required.";
    if (!preg_match("/^\d+$/", $phone)) $errors[] = "Phone must contain digits only.";
    if (empty($password)) $errors[] = "Password is required.";
    if ($password !== $confirm_password) $errors[] = "Passwords do not match.";

    // Display result
    if (count($errors) > 0) {
        echo "<h2>Registration Errors:</h2>";
        echo "<ul>";
        foreach($errors as $err){
            echo "<li>$err</li>";
        }
        echo "</ul>";
        echo '<a href="register.html">Go Back</a>';
    } else {
        echo "<h2>Registration Successful!</h2>";
        echo "Name: $name<br>";
        echo "Email: $email<br>";
        echo "Phone: $phone<br>";
        echo '<a href="index.html">Go to Login</a>';
    }
}
?>
