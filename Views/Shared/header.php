<?php
    //header.php
?>
<header style="background-color: #003366; padding: 20px; color: white; display: flex; justify-content: space-between; align-items: center;">
    <div style="display: flex; align-items: center;margin-left: 180px">
        <img src="../images/logo.png" alt="Website Logo" style="height: 100px; margin-right: 20px; border-radius:50%;">
        <div>
            <h1 style="margin: 0; font-size: 24px;">NSOPR Organization</h1>
            <h2 style="margin: 0; font-size: 16px;">National Sex Offender Public Website</h2>
        </div>
    </div>
    <div style="margin-right: 180px;display:flex;flex-direction:column;">
        <div>
            <a href="#footer" style="color: white; text-decoration: none; margin-right: 20px;">Contact Us</a>
            <a href="../views/shared/login.php" style="color: white; text-decoration: none;">Admin</a>
        </div>
        <div style="margin-top:10px;">
            <input type="search" name="search" id="">
            <input type="button" value="search">
        </div>
    </div>
</header>