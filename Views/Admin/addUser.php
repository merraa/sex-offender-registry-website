<?php
require_once 'C:\xampp2\htdocs\SexOffenderRegistryWebsite\Controllers\UserController.php';

// Check if the admin is logged in
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] != true) {
    header("Location: login.php");
    exit();
}

// Initialize UserController
$userController = new UserController();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $role = trim($_POST['role']);
    $password = trim($_POST['password']);

    // Validate form inputs
    if (empty($name) || empty($email) || empty($role) || empty($password)) {
        $error = "All fields are required.";
    } else {
        //$hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Securely hash the password
        $result = $userController->createUser($name, $email, $role, $password);
        if ($result) {
            $success = "User added successfully.";
            header("Location: manageUsers.php");
        } else {
            $error = "Failed to add user. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User - Admin Dashboard</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 20px; background-color: #f9f9f9;">
    <div style="max-width: 700px; margin: 20px auto; padding: 30px; background-color: #fff; border: 1px solid #ccc; border-radius: 8px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
        <h1 style="text-align: center; margin-bottom: 20px;">Add New User</h1>

        <?php if (!empty($error)): ?>
            <div style="margin-bottom: 15px; text-align: center; color: red;"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <div style="margin-bottom: 15px; text-align: center; color: green;"><?php echo $success; ?></div>
        <?php endif; ?>

        <form method="POST" action="addUser.php">
            <label for="name" style="display: block; margin-bottom: 5px;">Name:</label>
            <input type="text" id="name" name="name" required style="width: 100%; padding: 12px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px;">

            <label for="email" style="display: block; margin-bottom: 5px;">Email:</label>
            <input type="email" id="email" name="email" required style="width: 100%; padding: 12px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px;">

            <label for="role" style="display: block; margin-bottom: 5px;">Role:</label>
            <select id="role" name="role" required style="width: 100%; padding: 12px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px;">
                <option value="">Select Role</option>
                <option value="Admin">Admin</option>
                <option value="User">User</option>
                <option value="Manager">Manager</option>
            </select>

            <label for="password" style="display: block; margin-bottom: 5px;">Password:</label>
            <input type="password" id="password" name="password" required style="width: 100%; padding: 12px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px;">

            <button type="submit" style="width: 100%; padding: 15px; background-color: #007bff; color: #fff; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;">Add User</button>
        </form>
    </div>

</body>
</html>
