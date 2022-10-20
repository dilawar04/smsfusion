<footer>
        <div class="footer-content">
            <ul>
            	<li><h4>Categories</h4></li>
                <?php
                require_once 'config/dbc.php';
                $getAllCategories = mysqli_query($connection, "SELECT * FROM category WHERE status='ACTIVE' ORDER BY id DESC LIMIT 5") or die (mysqli_error($connection));
                while ($viewAllCategories = mysqli_fetch_array($getAllCategories)) {
                ?>
                <li><a href="category.php?id=<?php echo $viewAllCategories['id']; ?>"><?php echo $viewAllCategories['title']; ?></a></li>
                <?php } ?>
            </ul>
            
            <ul>
                <li><h4>Categories</h4></li>
                <?php
                require_once 'config/dbc.php';
                $getAllLatestSMS = mysqli_query($connection, "SELECT * FROM category WHERE status='ACTIVE' ORDER BY id DESC LIMIT 5") or die (mysqli_error($connection));
                while ($viewAllLatestSMS = mysqli_fetch_array($getAllLatestSMS)) {
                ?>
                <li><a href="category.php?id=<?php echo $viewAllLatestSMS['id']; ?>"><?php echo $viewAllLatestSMS['title']; ?></a></li>
                <?php } ?>
            </ul>
            
            <ul class="endfooter">
                <li><h4>Information</h4></li>
                <li><a href="about-us.php">About Us </a></li>
                <li><a href="our-vision.php">Our Vision</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
            
            <div class="clear"></div>
        </div>
        <div class="footer-bottom">
            <p>&copy; messagedesk 2020. <a href="https://www.alfateemacademy.com/" target="_blank">AFA</a> by Student of Al-Fateem Academy</p>
         </div>
    </footer>
</div>
</body>
</html>