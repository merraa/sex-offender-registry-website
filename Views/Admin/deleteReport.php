<?php
// deleteReport.php
session_start();

// Check if the user is logged in and has admin privileges
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'Admin') {
    header('Location: ../login.php');
    exit;
}

require_once 'C:\xampp\htdocs\SexOffenderRegistryWebsite\Controllers\ReportController.php'; // Include the ReportController class

if (isset($_GET['id'])) {
    $reportId = intval($_GET['id']);
    $reportController = new ReportController();

    if ($reportController->deleteReport($reportId)) {
        $_SESSION['success_message'] = "Report deleted successfully.";
    } else {
        $_SESSION['error_message'] = "Failed to delete the report. Please try again.";
    }
} else {
    $_SESSION['error_message'] = "Invalid report ID.";
}

header('Location: manageReports.php');
exit;
?>