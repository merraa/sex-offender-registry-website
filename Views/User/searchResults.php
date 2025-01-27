<?php
// Include the necessary files
require_once('C:\xampp\htdocs\SexOffenderRegistryWebsite\Models\Offender.class.php');
require_once('C:\xampp\htdocs\SexOffenderRegistryWebsite\Controllers\OffenderController.php');

$offenderController = new OffenderController();

// Get the search term from the query string
$searchName = isset($_GET['first_name']) ? trim($_GET['first_name'] . ' ' . $_GET['last_name']) : '';

// Check if the search term is provided
if (empty($searchName)) {
    echo "Please provide a name to search for.";
    exit;
}

// Fetch offenders by name
$offenders = $offenderController->getOffenderByName($searchName);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="styles.css"> <!-- Add your CSS file path -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            min-height: 100vh;
        }
        nav,footer,header{
            width: 100%;
        }

        main {
            flex: 1;
            width: 80%;
            max-width: 1200px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.1em;
        }

        footer {
            margin-top: auto;
        }
    </style>
</head>
<body>

    <!-- Include Header and Navigation -->
    <?php include('../shared/header.php'); ?>
    <?php include('../shared/navbar.php'); ?>

    <main>
        <h1>Search Results</h1>

        <?php if ($offenders): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date of Birth</th>
                        <th>Address</th>
                        <th>Risk Level</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($offenders as $offender): ?>
                        <tr>
                            <td><?= htmlspecialchars($offender['OffenderId']) ?></td>
                            <td>
                                <a href="detailSearch.php?offenderId=<?= urlencode($offender['OffenderId']) ?>">
                                    <?= htmlspecialchars($offender['Name']) ?>
                                </a>
                            </td>
                            <td><?= htmlspecialchars($offender['DOB']) ?></td>
                            <td><?= htmlspecialchars($offender['Address']) ?></td>
                            <td><?= htmlspecialchars($offender['RiskLevel']) ?></td>
                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No offenders found with the name "<?= htmlspecialchars($searchName) ?>".</p>
        <?php endif; ?>
    </main>

    <!-- Include Footer -->
    <?php include('../shared/footer.php'); ?>

</body>
</html>
