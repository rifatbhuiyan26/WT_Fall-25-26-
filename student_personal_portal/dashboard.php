<?php
session_start();
 
if (!isset($_SESSION['user_id'])) {
    header("Location: view/login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="css/dashboard_style.css">
</head>
<body>

    <div class="sidebar">
        <h2>AIUB PORTAL</h2>
        <div class="user-info">
            <p>Welcome, <b><?php echo $_SESSION['user_name']; ?></b></p>
        </div>
        <nav>
            <a href="view/index.html">🏠 Official Home</a>
            <a href="#">👤 My Profile</a>
            <a href="logout.php" style="color:#ff8080;">🚪 Logout</a>
        </nav>
    </div>

    <div class="main-content">
        <header>
            <h1>Academic Dashboard</h1>
        </header>

        <section class="content-card">
            <h3>My Class Schedule</h3>
            <table border="1" style="width:100%; border-collapse: collapse;">
                <tr><th>Course</th><th>Day</th><th>Time</th></tr>
                <tr><td>Web Tech</td><td>Sun, Tue</td><td>08:00 AM</td></tr>
                <tr><td>Networks</td><td>Mon, Wed</td><td>11:00 AM</td></tr>
                <tr><td>Database</td><td>Thursday</td><td>10:00 AM</td></tr>
            </table>
        </section>
    </div>

</body>
</html>