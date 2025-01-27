<?php
require_once 'C:\xampp2\htdocs\SexOffenderRegistryWebsite\Controllers\UserController.php';

// Check if the admin is logged in
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] != true) {
    header("Location: ../shared/login.php");
    exit();
}

// Initialize the UserController
$userModel = new UserController();

// Check if a User ID is provided in the query string
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die('User ID is required.');
}

$userId = $_GET['id'];

// Fetch the user's details
$user = $userModel->getUserById($userId);

if (!$user) {
    die('User not found.');
}

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    // Validate the inputs
    if (empty($name) || empty($email) || empty($role)) {
        $error = 'All fields are required.';
    } else {
        // Update the user in the database
        $updated = $userModel->updateUser($userId, $name, $email, $role);
        if ($updated) {
            header("Location: manageUsers.php?success=User updated successfully");
            exit();
        } else {
            $error = 'Failed to update the user.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div style="max-width: 600px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
        <h2 style="text-align: center;">Edit User</h2>

        <?php if (isset($error)): ?>
            <p style="color: red; text-align: center;"><?php echo $error; ?></p>
        <?php endif; ?>

        <form action="" method="POST" style="display: flex; flex-direction: column; gap: 15px;">
            <label for="name" style="font-weight: bold;">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['Name']); ?>" style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 4px;">

            <label for="email" style="font-weight: bold;">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['Email']); ?>" style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 4px;">

            <label for="role" style="font-weight: bold;">Role:</label>
            <select id="role" name="role" style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 4px;">
                <option value="Admin" <?php echo $user['Role'] === 'Admin' ? 'selected' : ''; ?>>Admin</option>
                <option value="User" <?php echo $user['Role'] === 'User' ? 'selected' : ''; ?>>User</option>
                <option value="Manager" <?php echo $user['Role'] === 'Manager' ? 'selected' : ''; ?>>Manager</option>
            </select>

            <button type="submit" style="padding: 10px; background-color: #003366; color: white; border: none; border-radius: 4px; cursor: pointer;">Update User</button>
            <a href="manageUsers.php" style="display: block; text-align: center; margin-top: 10px; color: #2196F3; text-decoration: none;">Cancel</a>
        </form>
    </div>
</body>
</html>
