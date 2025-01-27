<?php
require_once  'C:\xampp\htdocs\SexOffenderRegistryWebsite\Controllers\ReportController.php';
//require_once  'C:\xampp\htdocs\SexOffenderRegistryWebsite\Controllers\OffenderController.php';

session_start();

// Check if the user is logged in and has admin privileges
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'Admin') {
    header('Location: ../shared/login.php');
    exit;
}

$reportController = new ReportController();
//$offenderController = new OffenderController();

// Get the report ID from the query string
if (!isset($_GET['id'])) {
    $_SESSION['error'] = 'Report ID is missing.';
    header('Location: manageReports.php');
    exit;
}

$reportId = $_GET['id'];
$report = $reportController->getReportById($reportId);

if (!$report) {
    $_SESSION['error'] = 'Report not found.';
    header('Location: manageReports.php');
    exit;
}
//var_dump($report);
//$offender = $offenderController->getOffenderById($report['OffenderId']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resolve Report</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4; min-height: 100vh; display: flex; flex-direction: column;">

    <!-- Header -->
    <header style="background-color: #003366; color: white; padding: 20px; text-align: center;">
        <h1 style="margin: 0; font-size: 32px;">Resolve Report</h1>
        <p style="margin: 5px 0;">Manage and resolve reports efficiently</p>
    </header>

    <!-- Main Content -->
    <main style="flex: 1; display: flex; justify-content: center; align-items: center; padding: 20px;">
        <div style="width: 100%; max-width: 900px; background: #ffffff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 20px;">
            
            <!-- Report Details Section -->
            <section>
                <h2 style="color: #003366; font-size: 24px; border-bottom: 2px solid #003366; padding-bottom: 5px;">Report Details</h2>
                <div style="background: #f9f9f9; padding: 15px; border-radius: 8px; margin-top: 10px;">
                    <p style="margin: 10px 0;"><strong>Report ID:</strong> <?= htmlspecialchars($report['ReportId']); ?></p>
                    <p style="margin: 10px 0;"><strong>User ID:</strong> <?= htmlspecialchars($report['UserId']); ?></p>
                    <p style="margin: 10px 0;"><strong>Offender ID:</strong> <?= htmlspecialchars($report['OffenderId']); ?></p>
                    <p style="margin: 10px 0;"><strong>Date Reported:</strong> <?= htmlspecialchars($report['DateReported']); ?></p>
                    <p style="margin: 10px 0;"><strong>Details:</strong> <?= htmlspecialchars($report['Details']); ?></p>
                </div>
            </section>

            <!-- Offender Details Section
            <?php if ($offender): ?>
                <section style="margin-top: 20px;">
                    <h2 style="color: #003366; font-size: 24px; border-bottom: 2px solid #003366; padding-bottom: 5px;">Offender Details</h2>
                    <div style="background: #f9f9f9; padding: 15px; border-radius: 8px; margin-top: 10px;">
                        <p style="margin: 10px 0;"><strong>Offender ID:</strong> <?= htmlspecialchars($offender['OffenderId']); ?></p>
                        <p style="margin: 10px 0;"><strong>Name:</strong> <?= htmlspecialchars($offender['Name']); ?></p>
                        <p style="margin: 10px 0;"><strong>DOB:</strong> <?= htmlspecialchars($offender['DOB']); ?></p>
                        <p style="margin: 10px 0;"><strong>Address:</strong> <?= htmlspecialchars($offender['Address']); ?></p>
                        <p style="margin: 10px 0;"><strong>Risk Level:</strong> <?= htmlspecialchars($offender['RiskLevel']); ?></p>
                    </div>
                </section>
            <?php else: ?>
                <p style="color: red; font-weight: bold; margin-top: 20px;">No details found for this offender.</p>
            <?php endif; ?> -->

            <!-- Action Buttons -->
            <section style="margin-top: 30px; text-align: center;">
                <form action="manageReports.php" method="post" style="display: inline-block; margin: 0 10px;">
                    <input type="hidden" name="report_id" value="<?= htmlspecialchars($report['ReportId']); ?>">
                    <input type="hidden" name="resolve" value="true">
                    <button type="submit" style="background-color: #28a745; color: white; padding: 10px 20px; font-size: 16px; border: none; border-radius: 8px; cursor: pointer; transition: background-color 0.3s;">Resolve</button>
                </form>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer style="background-color: #003366; color: white; text-align: center; padding: 10px;">
        <p style="margin: 0; font-size: 14px;">© 2025 Sex Offender Registry Management System</p>
    </footer>

</body>
</html>

