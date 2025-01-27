<?php
require_once 'C:\xampp2\htdocs\SexOffenderRegistryWebsite\Controllers\OffenseController.php';

// Check if the user is logged in and is an admin
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] != true) {
    header("Location: login.php");
    exit();
}

// Initialize the offense controller
$offenseController = new OffenseController();

// Validate the ID parameter
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die('<div style="color: red; text-align: center; margin-top: 20px;">Invalid offense ID.</div>');
}

$offenseId = $_GET['id'];

// Fetch the offense details
try {
    $offense = $offenseController->getOffenseById($offenseId);
    if (!$offense) {
        die('<div style="color: red; text-align: center; margin-top: 20px;">Offense not found.</div>');
    }
} catch (Exception $e) {
    die('<div style="color: red; text-align: center; margin-top: 20px;">Error fetching offense: ' . $e->getMessage() . '</div>');
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $offenderId = $_POST['offenderId'];
    $offenseType = $_POST['offenseType'];
    $description = $_POST['description'];
    $dateReported = $_POST['dateCommitted'];

    $date = new DateTime($dateCommitted);
    echo $date->format('Y-m-d');

    try {
        $offenseController->updateOffense($offenseId, $offenderId, $offenseType, $date->format('Y-m-d'),$description);
        header("Location: manageOffenses.php?message=Offense updated successfully");
        exit();
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

// List of allowed offense types
$offenseTypes = ['Rape', 'Sexual Assault', 'Harassment', 'Stalking', 'Indecent Exposure', 'Child Exploitation', 'Trafficking', 'Forced Prostitution', 'Other'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Offense - Admin Dashboard</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 20px; background-color: #f9f9f9;">
    <div style="max-width: 700px; margin: 20px auto; padding: 30px; background-color: #fff; border: 1px solid #ccc; border-radius: 8px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
        <div style="padding: 20px; background-color: #f8f8f8; border-bottom: 2px solid #ddd;">
            <h1 style="margin: 0;">Edit Offense</h1>
        </div>

        <div style="padding: 20px;">
            <?php if (isset($error)): ?>
                <div style="color: red; margin-bottom: 15px;"><?php echo $error; ?></div>
            <?php endif; ?>

            <form method="POST" action="">
                <div style="margin-bottom: 15px;">
                    <label for="offenderId" style="display: block; font-weight: bold;">Offender ID:</label>
                    <input type="text" id="offenderId" name="offenderId" value="<?php echo htmlspecialchars($offense['OffenderId']); ?>" required style="width: 25%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="offenseType" style="display: block; font-weight: bold;">Offense Type:</label>
                    <select id="offenseType" name="offenseType" required style="width: 25%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                        <option value="" disabled>Select an offense type</option>
                        <?php foreach ($offenseTypes as $type): ?>
                            <option value="<?php echo $type; ?>" <?php echo ($type === $offense['OffenseType']) ? 'selected' : ''; ?>><?php echo $type; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="description" style="display: block; font-weight: bold;">Description:</label>
                    <textarea id="description" name="description" rows="5" required style="width: 50%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"><?php echo htmlspecialchars($offense['Description']); ?></textarea>
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="dateReported" style="display: block; font-weight: bold;">Date Reported:</label>
                    <input type="date" id="dateReported" name="dateReported" value="<?php echo htmlspecialchars($offense['DateCommitted']); ?>" required style="width: 25%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                </div>

                <button type="submit" style="padding: 10px 15px; background-color: #28a745; color: white; border: none; border-radius: 5px;">Update Offense</button>
                <a href="manageOffenses.php" style="padding: 10px 15px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 5px; margin-left: 10px;">Cancel</a>
            </form>
        </div>
    </div>
</body>
</html>
