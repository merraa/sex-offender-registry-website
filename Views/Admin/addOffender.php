<?php
require_once 'C:\xampp2\htdocs\SexOffenderRegistryWebsite\Controllers\OffenderController.php';

// Check if the admin is logged in
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] != true) {
    header("Location: ../shared/login.php");
    exit();
}

// Initialize UserController
$offenderController = new OffenderController();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $dob = $_POST['dob'];
    $address = trim($_POST['address']);
    $riskLevel = trim($_POST['riskLevel']);
    echo $name, $dob, $address, $riskLevel;
    // Validate form inputs
    if (empty($name) || empty($dob) || empty($address) || empty($riskLevel)) {
        $error = "All fields are required.";
    } else {
        $result = $offenderController->addOffender($name, $dob, $address, $riskLevel);
        if ($result) {
            $success = "Offender added successfully.";
            header("Location: manageOffenders.php");
        } else {
            $error = "Failed to add offender. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Offender - Admin Dashboard</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 20px; background-color: #f9f9f9;">
    <div style="max-width: 700px; margin: 20px auto; padding: 30px; background-color: #fff; border: 1px solid #ccc; border-radius: 8px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
        <h1 style="text-align: center; margin-bottom: 20px;">Add New Offender</h1>

        <?php if (!empty($error)): ?>
            <div style="margin-bottom: 15px; text-align: center; color: red;"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <div style="margin-bottom: 15px; text-align: center; color: green;"><?php echo $success; ?></div>
        <?php endif; ?>

        <form method="POST" action="addOffender.php">
            <label for="name" style="display: block; margin-bottom: 5px;">Name:</label>
            <input type="text" id="name" name="name" required style="width: 100%; padding: 12px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px;">

            <label for="dob" style="display: block; margin-bottom: 5px;">Dob:</label>
            <input type="date" id="dob" name="dob" required style="width: 100%; padding: 12px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px;">
            <label for="password" style="display: block; margin-bottom: 5px;">Address:</label>
            <input type="text" id="address" name="address" required style="width: 100%; padding: 12px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px;">

            <label for="riskLevel" style="display: block; margin-bottom: 5px;">Risk Level:</label>
            <select id="riskLevel" name="riskLevel" required style="width: 100%; padding: 12px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px;">
                <option value="">Select Risk Level</option>
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
            </select>
            <button type="submit" style="width: 100%; padding: 15px; background-color: #007bff; color: #fff; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;">Add Offender</button>
        </form>
    </div>

</body>
</html>
