<?php
// navbar.php
?>
<nav style="background-color:rgb(228, 241, 253); padding: 20px;">
    <ul style="list-style: none; padding: 0; margin: 0; display: flex; justify-content: center; align-items: center; font-size: 18px;">
        <li style="margin: 0 30px;"><a href="index.php" style="color: #003366; text-decoration: none; font-weight: bold;">Home</a></li>
        <li style="margin: 0 30px;"><a href="#search" style="color: #003366; text-decoration: none; font-weight: bold;">Search the Registry</a></li>
        <li style="margin: 0 30px; position: relative;">
            <a href="#" style="color: #003366; text-decoration: none; font-weight: bold;">Safety and Education</a>
            <ul style="list-style: none; padding: 0; margin: 0; position: absolute; top: 40px; left: 0; background-color:rgb(228, 241, 253); border: 1px solid #fff; display: none; font-size: 16px;">
                <li style="margin: 0; padding: 10px 20px;"><a href="../Views/User/safetyAndEducation.php" style="color: #003366; text-decoration: none; display: block;">Safety and Education</a></li>
                <li style="margin: 0; padding: 10px 20px;"><a href="../Views/User/howToPrevent.php" style="color: #003366; text-decoration: none; display: block;">How to Prevent</a></li>
                <li style="margin: 0; padding: 10px 20px;"><a href="../Views/User/howToIdentify.php" style="color: #003366; text-decoration: none; display: block;">How to Identify</a></li>
                <li style="margin: 0; padding: 10px 20px;"><a href="../Views/User/howToRespond.php" style="color: #003366; text-decoration: none; display: block;">How to Respond</a></li>
                <li style="margin: 0; padding: 10px 20px;"><a href="../Views/User/questionsAndAnswers.php" style="color: #003366; text-decoration: none; display: block;">Questions and Answers</a></li>
            </ul>
        </li>
        <li style="margin: 0 30px;"><a href="#website-info" style="color: #003366; text-decoration: none; font-weight: bold;">About</a></li>
        <li style="margin: 0 30px;"><a href="../Views/User/questionsAndAnswers.php" style="color: #003366; text-decoration: none; font-weight: bold;">FAQ</a></li>
    </ul>
</nav>

<script>
    document.querySelectorAll('nav ul li').forEach(function(item) {
        item.addEventListener('mouseover', function() {
            let dropdown = this.querySelector('ul');
            if (dropdown) dropdown.style.display = 'block';
        });
        item.addEventListener('mouseout', function() {
            let dropdown = this.querySelector('ul');
            if (dropdown) dropdown.style.display = 'none';
        });
    });
</script>