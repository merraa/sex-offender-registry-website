<?php
    // Get current year dynamically
    $year = date("Y");
?>

<footer style="background-color:  #003366; color: white; padding: 20px 0; text-align: center; margin-top: 200px;" id="footer">
    <div class="footer-content">
        <!-- Basic Footer Information -->
        <p>&copy; <?php echo $year; ?> sex offender registry. All rights reserved.</p>

        <!-- Privacy Policy Link -->
        <p><a href="/privacy-policy" style="color: #ccc; text-decoration: none;">Privacy Policy</a> | 
           <a href="/terms-of-service" style="color: #ccc; text-decoration: none;">Terms of Service</a></p>
        
        <!-- Contact Information -->
        <p>Contact Us: <a href="mailto:contact@example.com" style="color: #ccc; text-decoration: none;">sexoffender@registry.com</a></p>

        <!-- Social Media Links (Optional) -->
        <div class="social-links">
            <a href="https://www.facebook.com/yourprofile" target="_blank" style="color: #ccc; text-decoration: none; margin: 0 10px;">Facebook</a> |
            <a href="https://twitter.com/yourprofile" target="_blank" style="color: #ccc; text-decoration: none; margin: 0 10px;">Twitter</a> |
            <a href="https://www.linkedin.com/in/yourprofile" target="_blank" style="color: #ccc; text-decoration: none; margin: 0 10px;">LinkedIn</a>
        </div>
    </div>
</footer>

