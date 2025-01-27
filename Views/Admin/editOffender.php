<?php
require_once 'C:\xampp2\htdocs\SexOffenderRegistryWebsite\Controllers\OffenderController.php';

// Check if user is logged in and is an admin
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] != true) {
    header("Location: login.php");
    exit();
}

$offenderModel = new OffenderController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update offender details
    $offenderId = $_POST['offenderId'];
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $riskLevel = $_POST['riskLevel'];

    $updated = $offenderModel->updateOffender($offenderId, $name, $dob, $address, $riskLevel);

    if ($updated) {
        header("Location: manageOffenders.php?message=Offender updated successfully");
        exit();
    } else {
        $error = "Failed to update offender. Please try again.";
    }
} else {
    // Fetch offender details for editing
    $offenderId = $_GET['id'];
    $offender = $offenderModel->getOffenderById($offenderId);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Offender</title>
</head>
<body>
    <div style="max-width: 600px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
        <h2 style="text-align: center;">Edit Offender</h2>

        <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST">
            <input type="hidden" name="offenderId" value="<?php echo $offender['OffenderId']; ?>">
            <label style="font-weight: bold;">Name: <input type="text" name="name" value="<?php echo $offender['Name']; ?>" style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 4px; margin-top:20px;" required></label><br>
            <label style="font-weight: bold;">Date of Birth: <input type="date" name="dob" value="<?php echo $offender['DOB']; ?>" style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 4px; margin-top:20px;" required></label><br>
            <label style="font-weight: bold;">Address: <input type="text" name="address" value="<?php echo $offender['Address']; ?>" style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 4px; margin-top:20px;" required></label><br>
            <label style="font-weight: bold;">Risk Level:
                <select name="riskLevel" style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 4px; margin-top:20px;" required>
                    <option value="Low" <?php echo $offender['RiskLevel'] === 'Low' ? 'selected' : ''; ?>>Low</option>
                    <option value="Medium" <?php echo $offender['RiskLevel'] === 'Medium' ? 'selected' : ''; ?>>Medium</option>
                    <option value="High" <?php echo $offender['RiskLevel'] === 'High' ? 'selected' : ''; ?>>High</option>
                </select>
            </label><br>
            <button type="submit" style="padding: 10px; background-color: #003366; color: white; border: none; border-radius: 4px; cursor: pointer; margin-top:20px;">Save Changes</button>
        </form>
    </div>
</body>
</html>
