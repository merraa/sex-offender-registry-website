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

    // Handle location deletion
    if (isset($_GET['id'])) {
        $locationId = $_GET['id'];

        try {
            // Delete the location
            echo "hey";
            $locationController->deleteLocation($locationId);
            header("Location: manageLocation.php");
            exit();
        } catch (Exception $e) {
            die('<div style="color: red; text-align: center; margin-top: 20px;">Error deleting location: ' . $e->getMessage() . '</div>');
        }
    } else {
        die('<div style="color: red; text-align: center; margin-top: 20px;">Location ID is missing.</div>');
    }
?>