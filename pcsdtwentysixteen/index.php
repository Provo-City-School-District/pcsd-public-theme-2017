<?php
	get_header();
?>
   <main id="mainContent">
   		<section class="content postgrid newsBlog">
   			<h1>District News</h1>
			<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$the_query = new WP_Query( array( 'posts_per_page' => 18 , 'category_name'  => 'news' , 'post_type'  => 'post' , 'paged'  => $paged) );
				if($the_query->have_posts()) :
					while ($the_query->have_posts()) : $the_query->the_post();?>
				   		<article class="post">
					   		<a href="<?php the_permalink(); ?>">
							   	<div class="featured-image">
						   			<?php the_post_thumbnail('medium'); ?>
						   		</div>
					   			<h2><?php the_title(); ?></h2>
					   		</a>
				   				<header class="postmeta">
									<ul>
										<li><img src="//globalassets.provo.edu/image/icons/calendar-ltblue.svg" alt="" /><?php the_time(' F jS, Y') ?></li>
									</ul>
								</header>
				   				<?php
					   				echo get_excerpt();
					   			?>
				   		</article>

				   	<?php endwhile;?>
					   	<nav class="archiveNav">
					   		<?php echo paginate_links( array( 'total' => $the_query->max_num_pages)); ?>
					   	</nav>
						<?php else :
							echo '<p>No Content Found</p>';
				endif;
			?>
   		</section>
   		<?php get_sidebar( 'globalsidebar' ); ?>
   </main>
<?php
	get_footer();
?>