<?php
/*
	Template Name: School Fee Menu
*/
	get_header();
?>
   <main id="mainContent">
   		<section class="content page">
   			<ol class="breadcrumbs" id="breadcrumbs">
		   		<li><a href="https://provo.edu/">Home</a> / </li>
		   		<li>School Fees</li>
	   		</ol>
   			<article class="activePost schoolFeesMenu">
				<?php
					if(have_posts()) :
						while (have_posts()) : the_post();?>
					   		<h1><?php the_title(); ?></h1>
					   		<div>
					   				<?php
						   				echo '<p>fees listed are maximum fees and may not reflect actual fees paid.<span class="right"><a href="https://provo.edu/pagos-escolares/">Pagos escolares</a></span></p>';

						   				the_content();
						   				?>
						   				<h2>By Category</h2>
						   				<?php
						   				// Get the taxonomy's terms
										$terms = get_terms(
										    array(
										        'taxonomy'   => 'school_fees_categories',
										        'hide_empty' => false,
										    )
										);
										// Check if any term exists
									if ( ! empty( $terms ) && is_array( $terms ) ) {
										// Run a loop and print them all
										    ?>
										    <div class="postgrid">
										    <?php
										foreach ( $terms as $term ) {
										    ?>
										    	<article class="post">
										        <a href="<?php echo esc_url( get_term_link( $term ) ) ?>"><?php echo $term->name; ?></a>
										        </article>
										    <?php
										}
										    ?>

										    <?php
									}
					   				?>
					   				<h2>By Location</h2>
					   					<article class="post">
										        <a href="https://provo.edu/school-fees/district-wide/">District Wide</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/school-fees/amelia-earhart/">Amelia Earhart</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/school-fees/canyon-crest/">Canyon Crest</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/school-fees/edgemont/">Edgemont</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/school-fees/franklin/">Franklin</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/school-fees/lakeview/">Lakeview</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/school-fees/provost/">Provost</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/school-fees/provo-peaks/">Provo Peaks</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/school-fees/rock-canyon/">Rock Canyon</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/school-fees/spring-creek/">Spring Creek</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/school-fees/sunset-view/">Sunset View</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/school-fees/timpanogos/">Timpanogos</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/school-fees/wasatch/">Wasatch</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/school-fees/westridge/">Westridge</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/school-fees/centennial-middle/">Centennial Middle</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/school-fees/dixon-middle/">Dixon Middle</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/school-fees/independence-high/">Independence High</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/school-fees/provo-high/">Provo High</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/school-fees/timpview-high/">Timpview High</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/school-fees/provo-transition-services-ebph/">Provo Transition Services/EBPH</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/school-fees/eschool/">eSchool</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/school-fees/provo-adult-education/">Provo Adult Education</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/school-fees/preschools/">Preschools</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/school-fees/district-office/">District Office</a>
										</article>
						   				</div>
					   		</div>
					   	<?php endwhile;
							else :
								echo('No school fees currently found for this location');
					endif;
				?>
				<div class="clear"></div>
     		</article>
      	</section>
   		<?php
	   		$sidebar = get_field('sidebar');
	   		get_sidebar( $sidebar );
	   	?>
   </main>
<?php
	get_footer();
?>
