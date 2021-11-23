<?php
	get_header();
?>
   <main id="mainContent">
   		<section class="content singlePost">
	   		<ol class="breadcrumbs" id="breadcrumbs">
		   		<li><a href="https://provo.edu/">Home</a> / </li>
		   		<li><a href="https://provo.edu/departments/">Departments</a> / </li>
		   		<li><a href="https://provo.edu/departments/technology-support/">Technology Support</a> / </li>
		   		<!-- <li><a href="https://employee.provo.edu/technology/tech_faq/">Tech FAQ</a> / </li> -->
		   		<li><?php the_title(); ?></li>
	   		</ol>
   			<article class="activePost">
   					<p class="lastmodified"><em>Last modified: <?php the_modified_date(); ?></em></p>
					<?php
						
					$galleryArray = get_post_gallery_ids($post->ID);
					if(have_posts()) :
						while (have_posts()) : the_post();?>
						   			<header class="postmeta">
										<h1><?php the_title(); ?></h1>
										
									</header>
							   			<?php
									   		if(get_post_gallery_ids($post->ID)) { ?>
									   			<div class="featured-gallery">
										   			<div class="featured-for">
										   			<?php foreach ($galleryArray as $id) { ?>
										   				<img src="<?php echo wp_get_attachment_url( $id ); ?>" alt="" />
										   			<?php } ?>
										   			</div>
										   			<div class="featured-nav">
										   			<?php foreach ($galleryArray as $id) { ?>
										   				<img src="<?php echo wp_get_attachment_url( $id ); ?>" alt="" />
										   			<?php } ?>
										   			</div>
									   			</div>
									   		<?php } else { ?>
												<div class="featured-image-full">
													<?php the_post_thumbnail(); ?>
								   				</div>
								   					<?php }	?>

										<?php the_content(); ?>

					   	<?php endwhile;
							else :
								echo '<p>No Content Found</p>';
					endif;
					if( !is_singular( 'tech_faq' )){
						echo do_shortcode('[social_warfare]');	
					}
				?>
				<div class="bottom"></div>
   			</article>

   		</section>
   		<?php get_sidebar( 'tech' ); ?>
   </main>
<?php
	get_footer();
?>