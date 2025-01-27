<?php
require_once 'C:\xampp2\htdocs\SexOffenderRegistryWebsite\Controllers\LocationController.php';

// Check if the user is logged in and is an admin
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] != true) {
    header("Location: login.php");
    exit();
}

// Initialize the location controller
$locationController = new LocationController();

// Fetch all locations
try {
    $locations = $locationController->getAllLocations();
} catch (Exception $e) {
    die('<div style="color: red; text-align: center; margin-top: 20px;">Error fetching locations: ' . $e->getMessage() . '</div>');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Locations - Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0;">
    <!-- Sidebar -->
    <?php include('../shared/sidebar.php'); ?>

    <!-- Main Content -->
    <div style="margin-left: 350px; padding: 20px;">
        <div style="padding: 20px; background-color: #f8f8f8; border-bottom: 2px solid #ddd;">
            <h1 style="margin: 0; color: #003366;">Manage Location</h1>
        </div>

        <div style="padding: 20px;">
            <table style="width: 100%; border-collapse: collapse; margin-top: 20px; border: 1px solid #ddd; margin-bottom: 40px;">
                <thead>
                    <tr style="background-color: #003366; border-bottom: 2px solid #ddd;color:white;">
                        <th style="padding: 10px; border: 1px solid #ddd;">Location ID</th>
                        <th style="padding: 10px; border: 1px solid #ddd;">Offender ID</th>
                        <th style="padding: 10px; border: 1px solid #ddd;">City</th>
                        <th style="padding: 10px; border: 1px solid #ddd;">Region</th>
                        <th style="padding: 10px; border: 1px solid #ddd;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($locations) && count($locations) > 0): ?>
                        <?php foreach ($locations as $location): ?>
                            <tr style="background-color: #fff; border-bottom: 1px solid #ddd;">
                                <td style="padding: 10px; border: 1px solid #ddd;"><?php echo $location['LocationId']; ?></td>
                                <td style="padding: 10px; border: 1px solid #ddd;"><?php echo $location['OffenderId']; ?></td>
                                <td style="padding: 10px; border: 1px solid #ddd;"><?php echo $location['City']; ?></td>
                                <td style="padding: 10px; border: 1px solid #ddd;"><?php echo $location['Region']; ?></td>
                                <td style="padding: 10px; text-align: center; border: 1px solid #ddd;">
                                    <a href="editLocation.php?id=<?php echo $location['LocationId']; ?>" style="color: #2196F3; text-decoration: none; margin-right: 10px;">Edit</a>
                                    <a href="deleteLocation.php?id=<?php echo $location['LocationId']; ?>" style="color: red; text-decoration: none;">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 20px; color: red;">No locations found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <a href="addLocation.php" style="padding: 10px 15px; background-color: #003366; color: white; text-decoration: none; border-radius: 5px;">Add New Location</a>
        </div>
    </div>
</body>
</html>
