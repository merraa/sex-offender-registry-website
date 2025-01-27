<?php 
    require_once('../Views/Shared/header.php');
    require_once('../Views/Shared/navbar.php');
?>


<!-- About Section -->
<section id="about" style="padding: 20px; max-width: 100vw; background-color: #003366; color: white; font-family: Arial, sans-serif; display: flex; justify-content: center; align-items: center; gap: 15px;margin-top: 50px;margin-bottom: 30px;">
    <!-- Title -->
    <div style="flex: 1; text-align: right;">
        <h2 style="font-size: 4rem; margin-bottom: 25;">NSOPR</h2>
    </div>
    <!-- Text Content -->
    <div style="flex: 2; text-align: left;margin-left:20px;">
        <h1 style="font-size: 2rem;">Search sex offender registry</h1>
        <h4>Search sex offender registries for all 50 states, the District of Columbia, U.S. Territories, and Indian Country.</h4>
    </div>
</section>




<!-- Search Section -->
<section id="search" style="padding: 20px; background-color: #f4f4f4; text-align: center; max-width: 1500px; margin: 0 auto;">
    <h2 style="font-size: 2.5em; font-weight: bold; margin-bottom: 20px;">Search for Sex Offenders</h2>
    <div style="display: flex; justify-content: center; flex-wrap: nowrap; gap: 20px;">

        <!-- Search Registry Card -->
        <div style="flex: 1; padding: 30px; background-color: #0056b3; color: white; border-radius: 8px; min-width: 300px; max-width: 350px; text-align: center;">
            <h3 style="font-size: 2em; font-weight: bold;">SEARCH Registry</h3>
            <p style="font-size: 1.2em; margin-bottom: 20px;">Search sex offender registries for all 50 states, the District of Columbia, U.S. Territories, and Indian Country.</p>
        </div>

        <!-- Search by Name Card -->
        <div style="flex: 1; padding: 30px; background-color: #003366; color: white; border-radius: 8px; min-width: 300px; max-width: 350px; text-align: center;">
            <h3 style="font-size: 2em; font-weight: bold;">Search by Name</h3>
            <form action="../views/user/searchResults.php" method="GET">
                <div style="display: flex; flex-direction: column; gap: 15px; justify-content: center; align-items: center;">
                    <input type="text" name="first_name" placeholder="First Name" required style="width: 90%; padding: 12px; border-radius: 4px; font-size: 1em;">
                    <input type="text" name="last_name" placeholder="Last Name" required style="width: 90%; padding: 12px; border-radius: 4px; font-size: 1em;">
                    <button type="submit" style="padding: 12px; margin-top: 15px; background-color: #0056b3; border: none; border-radius: 4px; color: white; font-size: 1.1em;">Search</button>
                </div>
            </form>
        </div>

        <!-- Search by Location Card -->
        <div style="flex: 1; padding: 30px; background-color: #003366; color: white; border-radius: 8px; min-width: 300px; max-width: 350px; text-align: center;">
            <h3 style="font-size: 2em; font-weight: bold;">Search by Location</h3>
            <form action="../views/user/searchResultsLoc.php" method="GET">
                <div style="display: flex; flex-direction: column; gap: 15px; justify-content: center; align-items: center;">
                    <input type="text" name="city" placeholder="City" required style="width: 90%; padding: 12px; border-radius: 4px; font-size: 1em;">
                    <input type="text" name="region" placeholder="Region" required style="width: 90%; padding: 12px; border-radius: 4px; font-size: 1em;">
                    <button type="submit" style="padding: 12px; margin-top: 15px; background-color: #0056b3; border: none; border-radius: 4px; color: white; font-size: 1.1em;">Search</button>
                </div>
            </form>
        </div>

    </div>
</section>



<!-- About the Website Section -->
<section id="website-info" style="padding: 20px; text-align: center; max-width: 1500px; margin: 80 auto;">
    <h2 style="text-align: left;font-size:3rem;">About the Website</h2>
    <div style="display: flex; gap: 20px;">
        <img src="../views/shared/logo.png" alt="" style="border-radius: 50%; height: 300px;">
        <p style="text-align: right;">This website serves as a resource for the public to check the registry of sex offenders in their area. It includes detailed information about offenders, safety tips, and guidance on how to stay safe.lorem ipsumkj kijhdsihyj lokijuhy oikjuhy jhygtghjklkijuhygtf juhygtfghjkilokiuytrfg kjuhygtfrgthyjukuhytghyjukilokijuhy jhgfrghjkhghjkuhygthyjukijuhyuiuyujhygthju jhgfghjkhghjuhyghjuiytukjhrjed kjuhygthyujygthyjuyt kijuytghyjuytrfghytrf jhgthjhg</p>
    </div>
</section>

<!-- How to Report Abuse and Get Help Section -->
<section id="report-abuse" style="padding: 20px; background-color: #f4f4f4; text-align: center; max-width: 1500px; margin: 0 auto;">
    <h2 style="font-size: 2.5em; font-weight: bold; margin-bottom: 20px;text-align: left;font-size:3rem;">How to Report Abuse and Get Help</h2>
    <div style="display: flex; justify-content: space-between; flex-wrap: wrap; gap: 20px;">

        <!-- Section 1: Help Available Message -->
        <div style="flex: 1; padding: 20px; background-color: #003366; color: white; border-radius: 8px; min-width: 300px; max-width: 45%; text-align: center;">
            <h3 style="font-size: 2em; font-weight: bold;">If You Have Been Sexually Assaulted, Help Is Available</h3>
            <p style="font-size: 1.2em; margin-bottom: 20px;">
                Call your local police or contact the national sexual assault hotline at:
            </p>
            <ul style="list-style: none; padding: 0; font-size: 1.2em;">
                <li><strong>National Hotline:</strong> 1-800-656-HOPE</li>
                <li><strong>Local Police Department:</strong> Contact your local law enforcement agency.</li>
            </ul>
        </div>

        <!-- Section 2: Report Abuse Button and Description -->
        <div style="flex: 1; padding: 20px; background-color: #003366; color: white; border-radius: 8px; min-width: 300px; max-width: 45%; text-align: center;">
            <h3 style="font-size: 2em; font-weight: bold;">How to Report Abuse</h3>
            <p style="font-size: 1.2em; margin-bottom: 20px;">
                If you or someone you know has been affected by sexual assault, it is important to take action. You can file a report with the authorities and seek support.
            </p>
            <button style="padding: 15px; background-color: #0056b3; border: none; border-radius: 4px; color: white; font-size: 1.2em;">Report Abuse</button>
        </div>

    </div>
</section>


<!-- Safety and Education Section -->
<section id="safety-education" style="padding: 20px; text-align: center; max-width: 1500px; margin: 0 auto;">
    <h2 style="text-align: left;font-size:3rem;">Safety and Education</h2>
    <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 20px;">
        <!-- How to Prevent -->
        <div class="card" style="width: 22%; padding: 15px; background-color: #ddd; text-align: center;">
            <img src="../images/kidsParent.png" alt="How to Prevent" style="width: 100%; height: auto;">
            <h3>How to Prevent</h3>
            <a href="../views/user/howToPrevent.php" style="color: #0066cc;">Learn More</a>
        </div>
        
        <!-- How to Identify -->
        <div class="card" style="width: 22%; padding: 15px; background-color: #ddd; text-align: center;">
            <img src="../images/identify.png" alt="How to Identify" style="width: 100%; height: auto;">
            <h3>How to Identify</h3>
            <a href="../views/user/howToIdentify.php" style="color: #0066cc;">Learn More</a>
        </div>

        <!-- How to Respond -->
        <div class="card" style="width: 22%; padding: 15px; background-color: #ddd; text-align: center;">
            <img src="../images/respond.png" alt="How to Respond" style="width: 100%; height: auto;">
            <h3>How to Respond</h3>
            <a href="../views/user/howToRespond.php" style="color: #0066cc;">Learn More</a>
        </div>

        <!-- Facts about Sexual Assault -->
        <div class="card" style="width: 22%; padding: 15px; background-color: #ddd; text-align: center;">
            <img src="../images/facts.png" alt="Facts about Sexual Assault" style="width: 100%; height: auto;">
            <h3>Facts about Sexual Assault</h3>
            <a href="../views/user/questionsAndAnswers.php" style="color: #0066cc;">Learn More</a>
        </div>
    </div>
</section>


<?php require_once('../Views/Shared/footer.php'); ?>
</body>
</html>
