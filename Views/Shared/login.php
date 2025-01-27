<?php
// login.php
session_start();
require_once  'C:\xampp2\htdocs\SexOffenderRegistryWebsite\Controllers\UserController.php';// Include the UserController class 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Initialize UserController
    $userController = new UserController();

    // Fetch user by username
    $user = $userController->verifyLogin($username,$password);
    
    if ($user) {
        // Verify password
        if ($user['Password'] == $password) {
            // Set session variables
            $_SESSION['user_id'] = $user['UserId'];
            $_SESSION['username'] = $user['Name'];
            $_SESSION['role'] = $user['Role'];

            // Redirect based on role
            if ($user['Role'] === 'Admin') {
                $_SESSION['admin_logged_in'] = true;
                header('Location: ../Admin/admin_dashboard.php');
            } elseif ($user['Role'] === 'moderator') {
                header('Location: moderator_dashboard.php');
            } else {
                header('Location: user_dashboard.php');
            }
            exit;
        } else {
                $error = 'Invalid username or password';
            }
    } else {
        $error = 'User not found';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">
    <div style="background-color: white; padding: 50px; border-radius: 10px; box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1); width: 100%; max-width: 600px;">
        <h2 style="text-align: center; margin-bottom: 30px; color: #003366; font-size: 24px;">Login</h2>
        <form action="" method="POST">
            <div style="margin-bottom: 20px;">
                <label for="username" style="display: block; margin-bottom: 8px; color: #333; font-size: 16px;">Username:</label>
                <input type="text" id="username" name="username" required style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 6px; font-size: 16px;">
            </div>
            <div style="margin-bottom: 20px;">
                <label for="password" style="display: block; margin-bottom: 8px; color: #333; font-size: 16px;">Password:</label>
                <input type="password" id="password" name="password" required style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 6px; font-size: 16px;">
            </div>
            <button type="submit" style="width: 100%; padding: 12px; background-color: #003366; color: white; border: none; border-radius: 6px; cursor: pointer; font-size: 18px;">Login</button>
        </form>
        <?php if (isset($error)): ?>
            <div style="color: red; font-size: 14px; margin-top: 15px; text-align: center;"> <?= htmlspecialchars($error); ?> </div>
        <?php endif; ?>
    </div>
</body>
</html>
