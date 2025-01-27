<?php
require_once 'C:\xampp2\htdocs\SexOffenderRegistryWebsite\Controllers\OffenderController.php';

// Check if the user is logged in and is an admin
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] != true) {
    header("Location: login.php");
    exit();
}

// Initialize the offender controller
$offenderController = new OffenderController();

// Fetch all offenders
try {
    $offenders = $offenderController->getAllOffenders();
} catch (Exception $e) {
    die('<div style="color: red; text-align: center; margin-top: 20px;">Error fetching offenders: ' . $e->getMessage() . '</div>');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Manage Offenders - Admin Dashboard</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0;">
    <!-- Sidebar -->
    <?php include('../shared/sidebar.php'); ?>

    <!-- Main Content -->
    <div style="margin-left: 350px; padding: 20px;">
        <div style="padding: 20px; background-color: #f8f8f8; border-bottom: 2px solid #ddd;">
            <h1 style="margin: 0; color: #003366;">Manage Offenders</h1>
        </div>

        <div style="padding: 20px;">
            <table style="width: 100%; border-collapse: collapse; margin-top: 20px; border: 1px solid #ddd; margin-bottom: 40px;">
                <thead>
                    <tr style="background-color:#003366; border-bottom: 2px solid #ddd;">
                        <th style="padding: 10px; border: 1px solid #ddd;color: white;">Offender ID</th>
                        <th style="padding: 10px; border: 1px solid #ddd;color: white;">Name</th>
                        <th style="padding: 10px; border: 1px solid #ddd;color: white;">DOB</th>
                        <th style="padding: 10px; border: 1px solid #ddd;color: white;">Address</th>
                        <th style="padding: 10px; border: 1px solid #ddd;color: white;">Risk Level</th>
                        <th style="padding: 10px; border: 1px solid #ddd;color: white;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($offenders) && count($offenders) > 0): ?>
                        <?php foreach ($offenders as $offender): ?>
                            <tr style="background-color: #fff; border-bottom: 1px solid #ddd;">
                                <td style="padding: 10px; border: 1px solid #ddd;"><?php echo $offender['OffenderId']; ?></td>
                                <td style="padding: 10px; border: 1px solid #ddd;"><?php echo $offender['Name']; ?></td>
                                <td style="padding: 10px; border: 1px solid #ddd;"><?php echo $offender['DOB']; ?></td>
                                <td style="padding: 10px; border: 1px solid #ddd;"><?php echo $offender['Address']; ?></td>
                                <td style="padding: 10px; border: 1px solid #ddd;"><?php echo $offender['RiskLevel']; ?></td>
                                <td style="padding: 10px; text-align: center; border: 1px solid #ddd;">
                                    <a href="editOffender.php?id=<?php echo $offender['OffenderId']; ?>" style="color: #2196F3; text-decoration: none; margin-right: 10px;">Edit</a>
                                    <a href="deleteOffender.php?id=<?php echo $offender['OffenderId']; ?>" style="color: red; text-decoration: none;">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 20px; color: red;">No offenders found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <a href="addOffender.php" style="padding: 10px 15px; background-color: #003366; color: white; text-decoration: none; border-radius: 5px;">Add New Offender</a>
        </div>
    </div>

</body>
</html>
