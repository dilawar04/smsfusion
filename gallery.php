    <!-- BEGIN HEADER HERE -->
    	<?php include 'partials/header.php'; ?>
    <!-- END HEADER HERE -->
    <div id="body">
		<section id="content">
		    <article>
				<h2>Gallery</h2>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing, elit. Cupiditate dicta tempore eveniet sit nemo facilis non deserunt harum. Dolorum officiis libero vitae quidem nobis, totam, aspernatur mollitia exercitationem doloremque harum.
                Minima doloremque nihil architecto earum, expedita. Ratione quo molestiae commodi. Similique, quisquam commodi libero molestias ipsa, et exercitationem ad cum recusandae optio in sequi reprehenderit quis voluptatum praesentium quasi, hic.</p>
			</article>
            <article>
                <ul class="list-unstyled list-inline">
                    <?php 
                    require_once 'config/dbc.php';
                    $getAllGallaries = mysqli_query($connection, "SELECT * FROM media WHERE status='ACTIVE' AND media_type='gallery' ORDER BY id DESC") or die(mysqli_error($connection));
                    while ($viewAllGallaries = mysqli_fetch_array($getAllGallaries)) {
                    ?>
                    
                    <li><a href="/uploads/<?php echo $viewAllGallaries['media_img']; ?>" data-lightbox="image-1">
                        <img src="/uploads/<?php echo $viewAllGallaries['media_img']; ?>" width="130" height="130" align="<?php echo $viewAllGallaries['title']; ?>" class="img-thumbnail"></a></li>
            <?php } ?>
            </ul>
            </article>
	
       	</section>
        
        <!-- BEGIN SIDEBAR HERE -->
        	<?php include 'partials/sidebar.php'; ?>
        <!-- END SIDEBAR HERE -->
    </div>
    
    <!-- BEGIN FOOTER HERE -->
    	<?php include 'partials/footer.php'; ?>
    <!-- END FOOTER HERE -->