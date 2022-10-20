<aside class="sidebar">
    <ul>	
       <li>
            <h4>Categories</h4>
            <ul>
                <?php 
                require_once 'config/dbc.php';
                $getAllCategories = mysqli_query($connection, "SELECT * FROM category WHERE status='ACTIVE'") OR die (mysqli_error($connection));
                while ($viewAllCategories = mysqli_fetch_array($getAllCategories)) {
                ?>
                <li><a href="category.php?id=<?php echo $viewAllCategories['id']; ?>"><?php echo $viewAllCategories['title']; ?></a></li>
                <?php } ?>
            </ul>
        </li>
        <li>
            <h4>Latest SMS</h4>
            <ul>
                <?php
                $getAllLatestSMS = mysqli_query($connection, "SELECT * FROM message WHERE status='ACTIVE' ORDER BY id DESC LIMIT 5 ") or die (mysqli_error($connection));
                while ($viewAllLatestSMS = mysqli_fetch_array($getAllLatestSMS)) {
                ?>
                <li><a href="sms.php?id=<?php echo $viewAllLatestSMS['id']; ?>"><?php echo $viewAllLatestSMS['title']; ?></a></li>
                <?php } ?>
            </ul>
        </li>
        
        <li>
            <h4>SMS of the Day</h4>
            <ul>
                <?php
                require_once 'config/dbc.php';
                $getRandomSMS = mysqli_query($connection, "SELECT * FROM message WHERE status='ACTIVE' ORDER BY rand() LIMIT 1") or die(mysqli_error($connection));
                $viewRandomSMS = mysqli_fetch_array($getRandomSMS); 


                ?>
                <li class="text">
                	<p style="margin: 0;"><?php echo $viewRandomSMS['sms']; ?></p>
                </li>
            </ul>
        </li>
        
        <li>
        	<h4>Search site</h4>
            <ul>
            	<li class="text">
                    <form method="get" class="searchform" action="" >
                        <p><input type="search" size="28" value="" name="s" class="s" /></p>
                        <input type="submit" value="Search" class="btn btn-danger">
                    </form>	
				</li>
			</ul>
        </li>
    </ul>	
    </aside>
<div class="clear"></div>