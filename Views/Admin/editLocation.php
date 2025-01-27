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

// Fetch location data based on the LocationId from the URL
// Check if a User ID is provided in the query string
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die('Location ID is required.');
}

$locationId = $_GET['id'];

// Fetch the user's details
$location = $locationController->getLocationById($locationId);

if (!$location) {
    die('Location not found.');
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $offenderId = $_POST['offender_id'];
    $city = $_POST['city'];
    $region = $_POST['region'];

    try {
        // Call the controller to update the location
        $locationController->updateLocation($locationId, $offenderId, $city, $region);
        $successMessage = "Location updated successfully!";
        header('Location: manageLocation.php');
    } catch (Exception $e) {
        $errorMessage = "Error updating location: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Location - Admin Dashboard</title>
    <link rel="stylesheet" href="../shared/styles.css">
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0;">
    <!-- Main Content -->
    <div style="max-width: 600px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
        <h2 style="text-align: center;">Edit Location</h2>

        <!-- Success/Error Messages -->
        <?php if (isset($successMessage)): ?>
            <div style="color: green; text-align: center; padding: 10px;"><?php echo $successMessage; ?></div>
        <?php elseif (isset($errorMessage)): ?>
            <div style="color: red; text-align: center; padding: 10px;"><?php echo $errorMessage; ?></div>
        <?php endif; ?>

        <!-- Edit Location Form -->
            <form action="editLocation.php?id=<?php echo $locationId; ?>" method="POST">
                <div style="margin-bottom: 15px;">
                    <label for="offender_id" style="display: block; font-weight: bold;">Offender ID</label>
                    <input type="number" id="offender_id" name="offender_id" value="<?php echo $location['OffenderId']; ?>" required style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label for="city" style="display: block; font-weight: bold;">City</label>
                    <input type="text" id="city" name="city" value="<?php echo $location['City']; ?>" required style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label for="region" style="display: block; font-weight: bold;">Region</label>
                    <input type="text" id="region" name="region" value="<?php echo $location['Region']; ?>" required style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px;">
                </div>
                <button type="submit" style="padding: 10px 15px; background-color: #2196F3; color: white; border: none; border-radius: 5px;">Update Location</button>
            </form>
    </div>

</body>
</html>
