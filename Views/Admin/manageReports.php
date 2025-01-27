<?php
// manageReports.php
session_start();

// Check if the user is logged in and has admin privileges
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'Admin') {
    header('Location: ../login.php');
    exit;
}
$_SESSION['resolved'] = false;
$_SESSION['id'] = 0;

require_once 'C:\xampp2\htdocs\SexOffenderRegistryWebsite\Controllers\ReportController.php'; // Include the ReportController class

$reportController = new ReportController();
$reports = $reportController->getAllReports(); // Fetch all reports

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resolved = $_POST['resolve'];
    $id = $_POST['report_id'];

    if($resolved == "true"){
        $_SESSION['resolved'] = true;
        $_SESSION['id'] = $id;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Manage Reports</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body style="background-color: #f4f4f4; display: flex; flex-direction: column; height: 100vh; margin: 0; font-family: Arial, sans-serif;">

    <div style="flex: 1; display: flex;">
        <?php include('../shared/sidebar.php'); ?>

        <div class="content" style="flex: 1; padding: 20px; margin-left: 350px;">
            <div style="padding: 20px; background-color: #f8f8f8; border-bottom: 2px solid #ddd;">
                <h1 style="margin: 0; color: #003366;">Manage Offenders</h1>
            </div>
            
            <?php if (count($reports) > 0): ?>
                <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                    <thead>
                        <tr style="background-color: #003366; color: white;">
                            <th style="padding: 10px; border: 1px solid #ddd;color:white;">Report ID</th>
                            <th style="padding: 10px; border: 1px solid #ddd;color:white;">User ID</th>
                            <th style="padding: 10px; border: 1px solid #ddd;color:white;">Offender ID</th>
                            <th style="padding: 10px; border: 1px solid #ddd;color:white;">Date Reported</th>
                            <th style="padding: 10px; border: 1px solid #ddd;color:white;">Details</th>
                            <th style="padding: 10px; border: 1px solid #ddd;color:white;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reports as $report): ?>
                            <tr>
                                <td style="padding: 10px; border: 1px solid #ddd; text-align: center;"> <?= htmlspecialchars($report['ReportId']); ?> </td>
                                <td style="padding: 10px; border: 1px solid #ddd; text-align: center;"> <?= htmlspecialchars($report['UserId']); ?> </td>
                                <td style="padding: 10px; border: 1px solid #ddd; text-align: center;"> <?= htmlspecialchars($report['OffenderId']); ?> </td>
                                <td style="padding: 10px; border: 1px solid #ddd; text-align: center;"> <?= htmlspecialchars($report['DateReported']); ?> </td>
                                <td style="padding: 10px; border: 1px solid #ddd;"> <?= htmlspecialchars($report['Details']); ?> </td>
                                <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">
                                    <a href="resolveReport.php?id=<?= $report['ReportId']; ?>" style="background-color: #003366; color: white; text-decoration: none; padding: 8px 12px; border-radius: 4px;">
                                        <?php 
                                            if($_SESSION['resolved'] && $report['ReportId'] == $_SESSION['id']) echo "Resolved"; 
                                            else echo "Pending"; 
                                        ?>
                                    </a>
                                    <a href="deleteReport.php?id=<?= $report['ReportId']; ?>" style="background-color: #dc3545; color: white; text-decoration: none; padding: 8px 12px; border-radius: 4px;">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p style="margin-top: 20px;">No reports found.</p>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>
