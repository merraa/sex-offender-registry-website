<?php
    require_once 'C:\xampp2\htdocs\SexOffenderRegistryWebsite\Controllers\UserController.php';

    // Check if the user is logged in and is an admin
    session_start();
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] != true) {
        header("Location: login.php");
        exit();
    }

    // Check if the user ID is provided in the query string
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        die('<div style="color: red; text-align: center; margin-top: 20px;">Error: User ID is missing.</div>');
    }

    $userId = $_GET['id'];
    $userController = new UserController();

    try {
        // Attempt to delete the user
        $result = $userController->deleteUser($userId);

        if ($result) {
            // Redirect to the Manage Users page with a success message
            header("Location: manageUsers.php?message=User deleted successfully");
            exit();
        } else {
            echo '<div style="color: red; text-align: center; margin-top: 20px;">Error: Failed to delete user.</div>';
        }
    } catch (Exception $e) {
        echo '<div style="color: red; text-align: center; margin-top: 20px;">Error: ' . $e->getMessage() . '</div>';
    }
?>
