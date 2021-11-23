<section class="alerts">
	<style>
		#mainContent {
			margin-top: 223px!important;
		}
		.content, .sidebar {
			margin-top: 110px!important;
		}
	</style>
	<?php
		$my_query = new WP_Query( array('showposts' => $posts_to_show, 'category_name'  => 'alert'));
	   			while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
	   				<article class="post">
				   		<header class="postmeta">
							<ul>
								<li><img src="//globalassets.provo.edu/image/icons/calendar-lt.svg" alt="" /><?php the_time(' F jS, Y') ?></li>
							</ul>
							<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
								
						</header>
				   		<?php //echo the_content(); ?>
				   	</article>
				<?php endwhile;
		wp_reset_query();
	?>
	<button class="closeAlert"><img src="https://globalassets.provo.edu/image/icons/round-delete-button-white.svg" alt="Close Alerts" /></button>
</section>