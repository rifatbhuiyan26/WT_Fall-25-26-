<?php
include "db.php";   
?>

<!DOCTYPE html>
<html>
<head>
  <title>Student Registration</title>
</head>
<body>
<h1>Welcome to Student Registration</h1>

<?php
 
$name = $email = $phone = $password = $confirm_password = "";
$nameerror = $emailerror = $phoneerror = $passworderror = $confirmpassworderror = "";

 
function test_input($data) {
    $data = trim($data); 
    return $data;
}

 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    if (empty($_POST["name"])) {
        $nameerror = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameerror = "Only letters and white space allowed";
        }
    }

   
    if (empty($_POST["email"])) {
        $emailerror = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailerror = "Invalid email format";
        }
    }

 
    if (empty($_POST["phone"])) {
        $phoneerror = "Phone number is required";
    } else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^\d+$/", $phone)) {
            $phoneerror = "Only digits allowed";
        }
    }

   
    if (empty($_POST["password"])) {
        $passworderror = "Password is required";
    } else {
        $password = $_POST["password"];
    }

    
    if (empty($_POST["confirm_password"])) {
        $confirmpassworderror = "Confirm password is required";
    } else {
        $confirm_password = $_POST["confirm_password"];
        if ($password !== $confirm_password) {
            $confirmpassworderror = "Passwords do not match";
        }
    }
}
?>

<form method="post" action="">
    <label>Name:</label>
    <input type="text" name="name" value="<?php echo $name; ?>">
    <span style="color:red;"><?php echo $nameerror; ?></span><br><br>

    <label>Email:</label>
    <input type="text" name="email" value="<?php echo $email; ?>">
    <span style="color:red;"><?php echo $emailerror; ?></span><br><br>

    <label>Phone:</label>
    <input type="text" name="phone" value="<?php echo $phone; ?>">
    <span style="color:red;"><?php echo $phoneerror; ?></span><br><br>

    <label>Password:</label>
    <input type="password" name="password">
    <span style="color:red;"><?php echo $passworderror; ?></span><br><br>

    <label>Confirm Password:</label>
    <input type="password" name="confirm_password">
    <span style="color:red;"><?php echo $confirmpassworderror; ?></span><br><br>

    <input type="submit" name="submit" value="Register">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];

    if(!empty($name) && !empty($email) && !empty($phone) && !empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO students(name, email, phone, password)
                VALUES ('$name', '$email', '$phone', '$hashedPassword')";

        if($conn->query($sql)) {
            echo "Registration Successful!";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "All fields are required!";
    }
}

?>



</body>
</html>
