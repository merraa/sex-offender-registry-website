<?php
    $offenderCount = 10; 
    $reportCount = 20;
    $locationCount = 30;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Add your CSS file -->
</head>
<body>
    <header>
        <h1>Welcome to the Admin Dashboard</h1>
    </header>

    <main>
        <section>
            <h2>Dashboard Overview</h2>
            <div class="dashboard-cards">
                <div class="dashboard-card">
                    <h3>Total Offenders</h3>
                    <p><?= $offenderCount ?></p>
                    <a href="manageOffenders.php">Manage Offenders</a>
                </div>
                <div class="dashboard-card">
                    <h3>Total Reports</h3>
                    <p><?= $reportCount ?></p>
                    <a href="manageReports.php">Manage Reports</a>
                </div>
                <div class="dashboard-card">
                    <h3>Total Locations</h3>
                    <p><?= $locationCount ?></p>
                    <a href="manageLocations.php">Manage Locations</a>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Sex Offender Registry. All Rights Reserved.</p>
    </footer>
</body>
</html>

