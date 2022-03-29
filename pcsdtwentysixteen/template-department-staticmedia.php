<?php
/*
	Template Name: Static Media - Department Template
*/

	get_header();
?>
   <main id="pageContent" class="rsidebar">
   <?php custom_breadcrumbs(); ?>
		<section class="mainTileContent">

				<?php
					if(have_posts()) :
						while (have_posts()) : the_post();?>

<article class="currentPageContent">
						   			<h1><?php the_title(); ?></h1>
					   				<?php the_content(); ?>
</article>
					   	<?php endwhile;
							else :
								echo '<p>No Content Found</p>';
					endif;
				?>


			 <?php
			 	$slide2image = get_field('static_image');
				$slide2vid = get_field('static_video');
				if($slide2image['background_image']) {
					?>
						<article class="staticImage" style="background-image: url('<?php echo $slide2image['background_image']; ?>')">
							 <div class="slidertext">
								 <?php if($slide2image['tile_heading']) { ?><h2><?php if($slide2image['tile_heading_link']) { ?><a href="<?php echo $slide2image['tile_heading_link']; ?>"><?php echo $slide2image['tile_heading']; ?></a><?php } ?></h2><?php } ?>
								 <?php if($slide2image['tile_paragraph']) { ?><p><?php echo $slide2image['tile_paragraph']; ?></p><?php } ?>
							 </div>
						</article>
					<?php
				 } else {
					 ?>
					 <article class="staticVid">
					 	<video controls >
						   <source src="<?php echo $slide2vid['video_file'] ?>" type="video/mp4">
						   Your browser does not support the video tag.
						 </video>
					 </article>
					 <?php
				 }
			 ?>
			 </section>
   			<section class="departmentTiles">
			   <?php
			   	$pageTiles = get_field('page_tiles');

				   if( $pageTiles ) {
					   foreach( $pageTiles as $tile ) {
						   $image = $tile['tile_photo'];
						   ?>
						   <aside class="tile">
								  <div class="featured-image">
										  <img src="<?php echo wp_get_attachment_image_url( $image, 'full' ); ?>" alt="" />
								  </div>
									  <?php  echo wpautop( $tile['tile_content'] ); ?>
							  </aside>
						   <?php
					   }
				   }
			   ?>
	   		</section><!-- departmentResources end -->
   </main>
   <?php
		  $sidebar = get_field('sidebar');
		  get_sidebar( $sidebar );
	  ?>
<?php
	get_footer();
?>
