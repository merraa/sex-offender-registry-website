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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $offenderId = $_POST['offender_id'];
    $city = $_POST['city'];
    $region = $_POST['region'];

    try {
        // Call the controller to add the location
        $locationController->addLocation($offenderId, $city, $region);
        $successMessage = "Location added successfully!";
        header('Location: manageLocation.php');
    } catch (Exception $e) {
        $errorMessage = "Error adding location: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Location - Admin Dashboard</title>
    <link rel="stylesheet" href="../shared/styles.css"> <!-- Assuming shared styles.css is there -->
</head>
<body style="font-family: Arial, sans-serif; margin: 20px; background-color: #f9f9f9;">
    <div style="max-width: 700px; margin: 20px auto; padding: 30px; background-color: #fff; border: 1px solid #ccc; border-radius: 8px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
        <div style="padding: 20px; background-color: #f8f8f8; border-bottom: 2px solid #ddd;">
            <h1 style="margin: 0;">Add Location</h1>
        </div>

        <!-- Success/Error Messages -->
        <?php if (isset($successMessage)): ?>
            <div style="color: green; text-align: center; padding: 10px;"><?php echo $successMessage; ?></div>
        <?php elseif (isset($errorMessage)): ?>
            <div style="color: red; text-align: center; padding: 10px;"><?php echo $errorMessage; ?></div>
        <?php endif; ?>

        <!-- Add Location Form -->
        <div style="padding: 20px; background-color: #fff; box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 5px; width: 90%; margin: 20px auto;">
            <form action="addLocation.php" method="POST">
                <div style="margin-bottom: 15px;">
                    <label for="offender_id" style="display: block; font-weight: bold;">Offender ID</label>
                    <input type="number" id="offender_id" name="offender_id" required style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label for="city" style="display: block; font-weight: bold;">City</label>
                    <input type="text" id="city" name="city" required style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label for="region" style="display: block; font-weight: bold;">Region</label>
                    <input type="text" id="region" name="region" required style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px;">
                </div>
                <button type="submit" style="padding: 10px 15px; background-color: #28a745; color: white; border: none; border-radius: 5px;">Add Location</button>
            </form>
        </div>
    </div>
</body>
</html>

