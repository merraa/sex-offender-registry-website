<!-- sidebar.php -->
<div class="sidebar" style="background-color: #003366; color: white; width: 300px; height: 100%; padding-top: 20px; position: fixed; top: 0; left: 0; z-index: 1000; box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2); border-radius: 8px; font-family: Arial, sans-serif;">
    <ul style="list-style: none; padding: 0; margin: 0;">
        <!-- logo -->
        <li style="margin: 15px 0; padding-left: 20px;">
            <div style="display: flex; align-items: center; justify-content: center;">
                <div>
                    <img src="logo.png" alt="logo">
                    <h1 style="margin: 0; font-size: 24px;">Your Organization</h1>
                    <h2 style="margin: 0; font-size: 16px;">National Sex Offender Public Website</h2>
                </div>
            </div>
        </li>
        <!-- Dashboard -->
        <li style="margin: 15px 0; padding-left: 20px;">
            <a href="admin_dashboard.php" style="color: white; text-decoration: none; font-size: 18px; display: flex; align-items: center; padding: 12px 10px; border-radius: 5px; transition: background-color 0.3s; background-color: <?= ($currentPage == 'admin_dashboard.php') ? '#1E3A5F' : 'transparent'; ?>;">
                <i class="fas fa-tachometer-alt" style="margin-right: 15px; font-size: 20px;"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Manage Users -->
        <li style="margin: 15px 0; padding-left: 20px;">
            <a href="manageUsers.php" style="color: white; text-decoration: none; font-size: 18px; display: flex; align-items: center; padding: 12px 10px; border-radius: 5px; transition: background-color 0.3s; background-color: <?= ($currentPage == 'manageUsers.php') ? '#1E3A5F' : 'transparent'; ?>;">
                <i class="fas fa-users" style="margin-right: 15px; font-size: 20px;"></i>
                <span>Manage Users</span>
            </a>
        </li>

        <!-- Manage Offenders -->
        <li style="margin: 15px 0; padding-left: 20px;">
            <a href="manageOffenders.php" style="color: white; text-decoration: none; font-size: 18px; display: flex; align-items: center; padding: 12px 10px; border-radius: 5px; transition: background-color 0.3s; background-color: <?= ($currentPage == 'manageOffenders.php') ? '#1E3A5F' : 'transparent'; ?>;">
                <i class="fas fa-user-shield" style="margin-right: 15px; font-size: 20px;"></i>
                <span>Manage Offenders</span>
            </a>
        </li>

        <!-- Manage Offenses -->
        <li style="margin: 15px 0; padding-left: 20px;">
            <a href="manageOffenses.php" style="color: white; text-decoration: none; font-size: 18px; display: flex; align-items: center; padding: 12px 10px; border-radius: 5px; transition: background-color 0.3s; background-color: <?= ($currentPage == 'offenses.php') ? '#1E3A5F' : 'transparent'; ?>;">
                <i class="fas fa-gavel" style="margin-right: 15px; font-size: 20px;"></i>
                <span>Manage Offenses</span>
            </a>
        </li>

        <!-- Reports -->
        <li style="margin: 15px 0; padding-left: 20px;">
            <a href="manageReports.php" style="color: white; text-decoration: none; font-size: 18px; display: flex; align-items: center; padding: 12px 10px; border-radius: 5px; transition: background-color 0.3s; background-color: <?= ($currentPage == 'manageReports.php') ? '#1E3A5F' : 'transparent'; ?>;">
                <i class="fas fa-file-alt" style="margin-right: 15px; font-size: 20px;"></i>
                <span>Reports</span>
            </a>
        </li>

        <!-- Manage Locations -->
        <li style="margin: 15px 0; padding-left: 20px;">
            <a href="manageLocation.php" style="color: white; text-decoration: none; font-size: 18px; display: flex; align-items: center; padding: 12px 10px; border-radius: 5px; transition: background-color 0.3s; background-color: <?= ($currentPage == 'manageLocation.php') ? '#1E3A5F' : 'transparent'; ?>;">
                <i class="fas fa-map-marker-alt" style="margin-right: 15px; font-size: 20px;"></i>
                <span>Manage Locations</span>
            </a>
        </li>

        <!-- Logout -->
        <li style="margin: 20px 0; position: absolute; bottom: 20px; left: 20px;">
            <a href="logout.php" style="color: white; text-decoration: none; font-size: 18px; display: flex; align-items: center; padding: 12px 10px; border-radius: 5px; transition: background-color 0.3s;">
                <i class="fas fa-sign-out-alt" style="margin-right: 15px; font-size: 20px;"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</div>

<style>
    .sidebar a:hover {
        background-color: #1E3A5F;  /* Darker shade on hover */
        cursor: pointer;
    }
</style>


