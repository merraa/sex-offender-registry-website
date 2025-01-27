<?php
    require_once  'C:\xampp2\htdocs\SexOffenderRegistryWebsite\Controllers\UserController.php';
    require_once  'C:\xampp2\htdocs\SexOffenderRegistryWebsite\Controllers\OffenderController.php';
    require_once  'C:\xampp2\htdocs\SexOffenderRegistryWebsite\Controllers\OffenseController.php';
    
    // Check if user is logged in and is an admin
    session_start();
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] != true) {
        header("Location: login.php");
        exit();
    }

    // Initialize models
    $userModel = new UserController();
    $offenderModel = new OffenderController();
    $offenseModel = new OffenseController();

    // Fetch the stats from the database
    $totalUsers = $userModel->getTotalUsers();
    $totalOffenders = $offenderModel->getTotalOffenders();
    $totalOffenses = $offenseModel->getTotalOffenses();

    $offenderData = $offenseModel->getAllOffenses();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Sex Offender Registry</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Include Chart.js for charts -->
    <style>
        /* Body Setup */
        body {
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Sidebar Setup */
        .sidebar {
            background-color: #003366;
            color: white;
            width: 250px;
            height: 100%;
            padding-top: 20px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2);
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar li {
            margin: 15px 0;
            padding-left: 20px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            display: flex;
            align-items: center;
            padding: 12px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #1E3A5F;  /* Darker shade on hover */
            cursor: pointer;
        }

        .sidebar i {
            margin-right: 15px;
            font-size: 20px;
        }

        /* Main Content Setup */
        .content {
            margin-left: 350px; /* Avoid overlap with the sidebar */
            padding: 20px;
            flex: 1;
            margin-top: 60px; /* Give space for the header */
        }

        /* Header Setup */
        .header {
            background-color: #003366;
            color: white;
            padding: 15px;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1100; /* Ensure the header stays above the sidebar */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            font-size: 24px;
        }

        /* Card Styling */
        .card {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 30%;
            height: 120px;
        }

        .card h3 {
            font-size: 24px;
            color: #333;
        }

        .card p {
            font-size: 28px;
            color: #4CAF50;
            font-weight: bold;
        }

        /* Charts Section */
        .charts {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div style="display: flex; flex: 1;">
        <!-- Sidebar -->
        <?php include('../shared/sidebar.php'); ?>
        <!-- Content -->
        <div class="content">
            <h1 style="font-size: 36px; color: #333;">Welcome to the Admin Dashboard</h1>
            
            <!-- Overview Section -->
            <h2 style="font-size: 24px; color: #333; margin-top: 40px;">Overview</h2>
            <div class="stats" style="display: flex; justify-content: space-between; margin-top: 20px;">
                <div class="card">
                    <h3>Total Users</h3>
                    <p><?php echo $totalUsers; ?></p>
                </div>
                <div class="card">
                    <h3>Total Offenders</h3>
                    <p><?php echo $totalOffenders; ?></p>
                </div>
                <div class="card">
                    <h3>Total Offenses</h3>
                    <p><?php echo $totalOffenses; ?></p>
                </div>
            </div>

            <!-- Charts Section -->
            <h2 style="font-size: 24px; color: #333; margin-top: 40px;">Offender & Offense Analysis</h2>
            <div class="charts">
                <div style="width: 48%;"><canvas id="offenderChart"></canvas></div>
                <div style="width: 48%;"><canvas id="offenseChart"></canvas></div>
            </div>
        </div>
    </div>

    <script>
        // Chart.js Data
        var offenderData = {
            labels: ['Category 1', 'Category 2', 'Category 3'], // Example labels, update according to your data
            datasets: [{
                label: 'Offenders by Category',
                data: [10, 30, 50], // Example data, update with real values
                backgroundColor: ['#FF5733', '#4CAF50', '#2196F3'],
            }]
        };

        var offenseData = {
            labels: ['Rape', 'Sexual Assault', 'Other'], // Example labels, update according to your data
            datasets: [{
                label: 'Offenses by Type',
                data: [30, 20, 50], // Example data, update with real values
                backgroundColor: ['#FF5733', '#4CAF50', '#2196F3'],
            }]
        };

        // Create Charts
        new Chart(document.getElementById('offenderChart'), {
            type: 'bar',
            data: offenderData,
        });

        new Chart(document.getElementById('offenseChart'), {
            type: 'bar',
            data: offenseData,
        });
    </script>
</body>
</html>
