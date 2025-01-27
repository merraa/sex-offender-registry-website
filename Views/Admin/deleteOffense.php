<?php
    require_once 'C:\xampp2\htdocs\SexOffenderRegistryWebsite\Controllers\OffenseController.php';

    // Check if the user is logged in and is an admin
    session_start();
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] != true) {
        header("Location: login.php");
        exit();
    }

    // Initialize the location controller
    $offenseController = new OffenseController();

    // Handle location deletion
    if (isset($_GET['id'])) {
        $offenseId = $_GET['id'];

        try {
            // Delete the location
            $offenseController->deleteOffense($offenseId);
            header("Location: manageOffenses.php");
            exit();
        } catch (Exception $e) {
            die('<div style="color: red; text-align: center; margin-top: 20px;">Error deleting location: ' . $e->getMessage() . '</div>');
        }
    } else {
        die('<div style="color: red; text-align: center; margin-top: 20px;">Location ID is missing.</div>');
    }
?>