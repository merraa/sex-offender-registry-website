<?php
    require_once 'C:\xampp2\htdocs\SexOffenderRegistryWebsite\Controllers\UserController.php';
    session_start();

    // Check if user is logged in and is an admin
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] != true) {
        header("Location: login.php");
        exit();
    }

    // Initialize model
    $userModel = new UserController();

    // Fetch the list of all users
    $users = $userModel->getAllUsers();
    //var_dump($users);
?>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body style="background-color: #f4f4f4; margin: 0; font-family: Arial, sans-serif; display: flex; flex-direction: column; height: 100vh;">

    <!-- Sidebar -->
    <?php include('../shared/sidebar.php'); ?>

    <!-- Main Content -->
    <div class="content" style="flex: 1; padding: 20px; margin-left: 350px;">
        <div style="padding: 20px; background-color: #f8f8f8; border-bottom: 2px solid #ddd;">
            <h1 style="margin: 0; color: #003366;">Manage Users</h1>
        </div>

        <div class="user-list" style="margin-top: 20px; overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background-color: #003366; color: white;">
                        <th style="padding: 10px; text-align: left;">ID</th>
                        <th style="padding: 10px; text-align: left;">Name</th>
                        <th style="padding: 10px; text-align: left;">Email</th>
                        <th style="padding: 10px; text-align: left;">Role</th>
                        <th style="padding: 10px; text-align: center;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr style="background-color: #fff; border-bottom: 1px solid #ddd;">
                            <td style="padding: 10px;"><?php echo $user['UserId']; ?></td>
                            <td style="padding: 10px;"><?php echo $user['Name']; ?></td>
                            <td style="padding: 10px;"><?php echo $user['Email']; ?></td>
                            <td style="padding: 10px;"><?php echo $user['Role']; ?></td>
                            <td style="padding: 10px; text-align: center;">
                                <a href="edit_user.php?id=<?php echo $user['UserId']; ?>" style="color: #2196F3; text-decoration: none; margin-right: 10px;">Edit</a>
                                <a href="deleteUser.php?id=<?php echo $user['UserId']; ?>" style="color: red; text-decoration: none;">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div style="margin-top: 40px;">
            <a href="../Admin/addUser.php" style="background-color: #003366; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Add New User</a>
        </div>

    </div>

</body>
