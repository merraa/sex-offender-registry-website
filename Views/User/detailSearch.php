<?php
    require_once('C:\xampp2\htdocs\SexOffenderRegistryWebsite\config\Db.class.php');
    
    if (!isset($_GET['offenderId']) || !is_numeric($_GET['offenderId'])) {
        echo "Invalid offender ID.";
        exit;
    }
    $sql = "
        SELECT 
            o.OffenderId,
            o.Name AS OffenderName,
            o.DOB AS DateOfBirth,
            o.Address AS OffenderAddress,
            o.RiskLevel AS OffenderRiskLevel,
            loc.City,
            loc.Region,
            off.OffenseType,
            off.DateCommitted,
            off.Description AS OffenseDescription,
            rep.DateReported,
            rep.Details AS ReportDetails
        FROM 
            Offender o
        LEFT JOIN 
            location loc ON o.OffenderId = loc.OffenderId
        LEFT JOIN 
            offense off ON o.OffenderId = off.OffenderId
        LEFT JOIN 
            report rep ON o.OffenderId = rep.OffenderId
        WHERE 
            o.OffenderId = ?;
     ";
    $offenderId = $_GET['offenderId'];
    $conn = new Db();
    $stmt = $conn->getConnection()->prepare($sql);
    $stmt->bind_param('i', $offenderId);

    $stmt->execute();
    $details = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
     
    if(empty($details)){
        echo "No details found for this offender.";
        exit;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offender Details</title>
    <link rel="stylesheet" href="styles.css"> <!-- Add your CSS file path -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #003366;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #003366;
            color: #fff;
        }
    </style>
</head>
<body>
    <!-- Include Header -->
    <?php include('../shared/header.php'); ?>

    <div class="container">
        <h1>Offender Details</h1>
        
        <h2>Basic Information</h2>
        <table>
            <tr>
                <th>ID</th>
                <td><?= htmlspecialchars($details[0]['OffenderId']) ?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?= htmlspecialchars($details[0]['OffenderName']) ?></td>
            </tr>
            <tr>
                <th>Date of Birth</th>
                <td><?= htmlspecialchars($details[0]['DateOfBirth']) ?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?= htmlspecialchars($details[0]['OffenderAddress']) ?></td>
            </tr>
            <tr>
                <th>Risk Level</th>
                <td><?= htmlspecialchars($details[0]['OffenderRiskLevel']) ?></td>
            </tr>
            <tr>
                <th>City</th>
                <td><?= htmlspecialchars($details[0]['City']) ?></td>
            </tr>
            <tr>
                <th>Region</th>
                <td><?= htmlspecialchars($details[0]['Region']) ?></td>
            </tr>
        </table>

        <h2>Offenses</h2>
        <table>
            <thead>
                <tr>
                    <th>Offense Type</th>
                    <th>Date Committed</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($details as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['OffenseType']) ?></td>
                        <td><?= htmlspecialchars($row['DateCommitted']) ?></td>
                        <td><?= htmlspecialchars($row['OffenseDescription']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Reports</h2>
        <table>
            <thead>
                <tr>
                    <th>Date Reported</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($details as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['DateReported']) ?></td>
                        <td><?= htmlspecialchars($row['ReportDetails']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Include Footer -->
    <?php include('../shared/footer.php'); ?>
</body>
</html>
