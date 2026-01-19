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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal | AIUB Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/dashboard_style.css">
</head>
<body>

    <div class="sidebar">
        <div class="logo"><h2>AIUB PORTAL</h2></div>
        
        <div class="user-info">
            <img src="image/profile.jpg" alt="Profile Picture" class="profile-img" onerror="this.src='https://via.placeholder.com/80'">
            <h3><?php echo htmlspecialchars($_SESSION['user_name']); ?></h3>
            <p>ID: 22-XXXXX-3</p>
        </div>

        <nav>
            <a href="dashboard.php" class="active"><i class="fas fa-th-large"></i> Dashboard</a>
            
            <a href="control/profile.php"><i class="fas fa-user-circle"></i> My Profile</a>
            
            <div class="nav-group">
                <a href="javascript:void(0)" onclick="showMsg('reg-err')"><i class="fas fa-book"></i> Registered Courses</a>
                <span id="reg-err" class="inline-error">Registration not allowed today.</span>
            </div>

            <div class="nav-group">
                <a href="javascript:void(0)" onclick="showMsg('res-err')"><i class="fas fa-poll-h"></i> Results</a>
                <span id="res-err" class="inline-error">Grades are under processing.</span>
            </div>

            <div class="sidebar-footer">
                <a href="logout.php" class="logout-link">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </nav>
    </div>

    <div class="main-content">
        <header>
            <div class="welcome-text">
                <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h1>
                <div class="date-display">
                    <p><i class="fas fa-calendar-alt"></i> Spring Session: 2025-2026</p>
                </div>
            </div>
        </header>

        <div class="dashboard-body">
            <div class="top-stats">
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-graduation-cap"></i></div>
                    <div class="stat-details"><h3>3.85</h3><p>Current CGPA</p></div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-check-double"></i></div>
                    <div class="stat-details"><h3>122</h3><p>Credits Completed</p></div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-calendar-check"></i></div>
                    <div class="stat-details"><h3>94%</h3><p>Attendance</p></div>
                </div>
            </div>

            <div class="content-grid">
                <section class="content-card">
                    <h3><i class="fas fa-university"></i> Current Semester Courses</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Course Name</th>
                                <th>Room No.</th>
                                <th>Building</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Web Technologies</td>
                                <td><strong>DS0102</strong></td>
                                <td>D-Building</td>
                            </tr>
                            <tr>
                                <td>Database Management System</td>
                                <td><strong>DN0215</strong></td>
                                <td>D-Building</td>
                            </tr>
                            <tr>
                                <td>Software Engineering</td>
                                <td><strong>DS0305</strong></td>
                                <td>D-Building</td>
                            </tr>
                            <tr>
                                <td>Operating System</td>
                                <td><strong>DN0110</strong></td>
                                <td>D-Building</td>
                            </tr>
                            <tr>
                                <td>Artificial Intelligence</td>
                                <td><strong>DS0202</strong></td>
                                <td>D-Building</td>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <section class="content-card">
                    <h3><i class="fas fa-bullhorn"></i> Notice Board</h3>
                    <div class="notice-box">
                        <span class="event-tag">Important</span>
                        <p><strong>Mid-term Exam:</strong> Mid-term permit collection starts from next Sunday.</p>
                    </div>
                    <div class="notice-box" style="margin-top: 15px; background: #e8f4fd; border-left-color: #003366;">
                        <span class="event-tag" style="background: #003366;">Notice</span>
                        <p><strong>Convocation:</strong> 23rd Convocation registration is now open for graduates.</p>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script>
        function showMsg(id) {
            const msg = document.getElementById(id);
            
            document.querySelectorAll('.inline-error').forEach(el => {
                if(el.id !== id) el.style.display = 'none';
            });
            
            
            if (msg.style.display === 'block') {
                msg.style.display = 'none';
            } else {
                msg.style.display = 'block';
            }
        }
    </script>
</body>
</html>