<?php
	get_header();
?>
   <main id="mainContent">
   		<section class="content postgrid singlePost">
	   		<article class="activePost fullCategory">
		   	<h1>District News : <?php single_cat_title(); ?></h1>
		   		<p>We realize that there is a desire in the community to learn about the conditions of Provo City School District buildings and property. As the school board discusses issues related building and receives reports or information from experts, this page will provide the most up-to-date information.</p>
	   		</article>
			<?php
				if(have_posts()) :
					while (have_posts()) : the_post();?>
				   		<article class="post">
					   		<a href="<?php the_permalink(); ?>"><div class="featured-image">
					   			<?php the_post_thumbnail(); ?>
					   		</div></a>
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