<?php
session_start();
include "db.php";  

 
$error_msg = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
    $studentId = $_POST['studentId']; 
    $password = $_POST['pass']; 

     
    $sql = "SELECT * FROM students WHERE email = '$studentId' OR name = '$studentId'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        
        if (password_verify($password, $user['password'])) { 
            $_SESSION['user_id'] = $user['id'];
            echo "<script>alert('Login Successful! Welcome " . $user['name'] . "'); window.location.href='dashboard.php';</script>";
            exit();
        } else {
             
            $error_msg = "Invalid Password! Please check your password.";
        }
    } else {
         
        $error_msg = "User not found! Please register first.";
    }
}
?>

<!DOCTYPE HTML>
<HTML>
<HEAD>
  <TITLE>Login Status</TITLE>
  <style>
     
    body { 
      font-family: Arial, sans-serif; 
      padding: 30px; 
      background-color: #f0f8ff; 
    }
    h2 { 
      text-align: center; 
      color: #003366; 
    }
    .status-box { 
      background-color: #ffffff; 
      padding: 20px; 
      border-radius: 10px; 
      width: 300px; 
      margin: 0 auto; 
      box-shadow: 0 0 10px rgba(0,0,0,0.1); 
      text-align: center;
    }
    .error { 
      color: red; 
      font-weight: bold; 
      margin-bottom: 10px;
    }
    button { 
      width: 100%; 
      padding: 8px; 
      margin-top: 10px; 
      border-radius: 5px; 
      border: none; 
      background-color: #003366; 
      color: white; 
      cursor: pointer; 
    }
    button:hover {
      background-color: #0055aa;
    }
  </style>
</HEAD>
<BODY>
 
  <h2>Login Authentication</h2>
 
  <div class="status-box">
    <?php if ($error_msg): ?>
        <p class="error"><?php echo $error_msg; ?></p>
        <button onclick="window.history.back()">Go Back</button>
    <?php else: ?>
        <p style="color: #003366;">Processing Login...</p>
        <p>Please wait a moment.</p>
    <?php endif; ?>
  </div>

</BODY>
</HTML>