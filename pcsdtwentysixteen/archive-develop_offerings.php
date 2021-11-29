<?php
	get_header();
?>
   <main id="mainContent">
   		<section class="content postgrid">
	   		<h1>District News : <?php single_cat_title(); ?></h1>

			<?php
				if(have_posts()) :
					while (have_posts()) : the_post();?>
				   		<article class="post">
					   		
				   				<header class="postmeta">
									<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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
					   	<?php echo paginate_links(); ?>
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