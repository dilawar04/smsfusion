    <!-- BEGIN HEADER HERE -->
    	<?php include 'partials/header.php'; ?>
    <!-- END HEADER HERE -->
    <div id="body">
		<section id="content">
			<?php 
				require_once 'config/dbc.php';
				$sms_id = $_GET['id'];
				$getAllSMS = mysqli_query($connection, "SELECT * FROM message WHERE id=$sms_id") or die(mysqli_error($connection));
				$viewAllSMS = mysqli_fetch_array($getAllSMS)
			?>
			<article class="expanded">
            	<h2><?php echo $viewAllSMS['title']; ?></h2>
				<div class="article-info">
					Posted on <time datetime="2013-05-14"><?php echo $viewAllSMS['create_date']; ?></time> 
					Posted by <a href="#" rel="author">
						<?php 
							$member_id = $viewAllSMS['member_id'];
							$getMemberBySMSId = mysqli_query($connection, "SELECT * FROM member WHERE id=$member_id") or die (mysqli_error($connection));
							$viewMemberBySMSId = mysqli_fetch_array($getMemberBySMSId);
							echo $viewMemberBySMSId['fullname'];
						?></a>
					Posted in <a href="#" rel="author">
						<?php 
							$category_id = $viewAllSMS['category_id'];
							$getcategoryBySMSId = mysqli_query($connection, "SELECT * FROM category WHERE id=$category_id") or die (mysqli_error($connection));
							$viewcategoryBYSMSId = mysqli_fetch_array($getcategoryBySMSId);
							echo $viewcategoryBYSMSId['title'];
							?></a>
				</div>
            	<p><?php echo $viewAllSMS['content']?></p>
			</article>
       	</section>
        
        <!-- BEGIN SIDEBAR HERE -->
        	<?php include 'partials/sidebar.php'; ?>
        <!-- END SIDEBAR HERE -->
    </div>
    
    <!-- BEGIN FOOTER HERE -->
    	<?php include 'partials/footer.php'; ?>
    <!-- END FOOTER HERE -->