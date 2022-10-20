    <!-- BEGIN HEADER HERE -->
    	<?php include 'partials/header.php'; ?>
    <!-- END HEADER HERE -->
    <div id="body">
		<section id="content">
			<article>
				<h2>Introduction to Message DESK</h2>
				<p>Welcome to brio, a free premium valid CSS3 &amp; HTML5 web template from <a href="http://zypopwebtemplates.com/" title="ZyPOP">ZyPOP</a>. This template is completely <strong>free</strong> to use permitting a link remains back to  <a href="http://zypopwebtemplates.com/" title="ZyPOP">http://zypopwebtemplates.com/</a>. Should you wish to use this template unbranded you can buy a template license from our website for 8.00 GBP, this will allow you remove all branding related to our site, for more information about this see below.</p>	
				<a href="#" class="button">Read more</a>
			</article>
			<?php 
				require_once 'config/dbc.php';
				$category_id = $_GET['id'];
				$getAllSMS = mysqli_query($connection, "SELECT * FROM message WHERE category_id=$category_id ") or die (mysqli_error($connection));
				while ($viewAllSMS = mysqli_fetch_array($getAllSMS)){
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
							$viewcategoryByMSId = mysqli_fetch_array($getcategoryBySMSId);
							echo $viewcategoryByMSId['title'];
							?></a>
				</div>
            	<p><?php echo substr($viewAllSMS['content'], 0,150) ?></p>
				<a href="sms.php?id=<?php echo$viewAllSMS['id']; ?>" class="button">Read more</a>
			</article>
		<?php } ?>
       	</section>
        
        <!-- BEGIN SIDEBAR HERE -->
        	<?php include 'partials/sidebar.php'; ?>
        <!-- END SIDEBAR HERE -->
    </div>
    
    <!-- BEGIN FOOTER HERE -->
    	<?php include 'partials/footer.php'; ?>
    <!-- END FOOTER HERE -->