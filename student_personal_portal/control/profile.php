<?php
session_start();
include "../model/db.php"; 

if (!isset($_SESSION['user_id'])) {
    header("Location: ../view/login.html");
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT name, email, phone FROM students WHERE id = '$user_id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - AIUB Portal</title>
    <link rel="stylesheet" href="../css/profileinfo_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <div class="profile-card">
        <h2>My Profile Info</h2>
        
        <form action="update_profile.php" method="POST">
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
            </div>

            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>

            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>">
            </div>

            <div class="btn-group">
                <button type="submit" name="update" class="btn-update">Save Changes</button>
                <button type="submit" name="delete" class="btn-delete" onclick="return confirm('Are you sure you want to delete your account permanently? This action cannot be undone!')">Delete Account</button>
            </div>
        </form>
        
        <a href="../dashboard.php" class="back-btn">← Back to Dashboard</a>
    </div>

</body>
</html>