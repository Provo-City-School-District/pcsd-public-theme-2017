<?php
/*
	Template Name: School Fee Menu - Spanish
*/
	get_header();
?>
   <main id="mainContent">
   		<section class="content page">
   			<ol class="breadcrumbs" id="breadcrumbs">
		   		<li><a href="https://provo.edu/">Home</a> / </li>
		   		<li>pagos escolares</li>
	   		</ol>
   			<article class="activePost schoolFeesMenu">
				<?php
					if(have_posts()) :
						while (have_posts()) : the_post();?>
					   		<h1><?php the_title(); ?></h1>
					   		<div>
					   				<?php 
						   				echo 'Tarifas listadas son las máximas y puden no reflejar la cantídad real a pagar.<span class="right"><a href="https://provo.edu/school-fees/">School Fees</a></span></p>';
						   				the_content(); 
						   				?>
						   				<h2>By Category</h2>
						   				<?php
						   				// Get the taxonomy's terms
										$terms = get_terms(
										    array(
										        'post_type' => 'Pagos escolares',
										        'taxonomy'   => 'school_fees_categories_spanish',
										        'hide_empty' => false,
										    )
										);
										// Check if any term exists
									if ( ! empty( $terms ) && is_array( $terms ) ) {
										// Run a loop and print them all
										    ?>
										    <div class="postgrid">
										
										    <?php
											   // print_r($terms);
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
										        <a href="https://provo.edu/pagos-escolares/district-wide/">District Wide</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/pagos-escolares/amelia-earhart/">Amelia Earhart</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/pagos-escolares/canyon-crest/">Canyon Crest</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/pagos-escolares/edgemont/">Edgemont</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/pagos-escolares/franklin/">Franklin</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/pagos-escolares/lakeview/">Lakeview</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/pagos-escolares/provost/">Provost</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/pagos-escolares/provo-peaks/">Provo Peaks</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/pagos-escolares/rock-canyon/">Rock Canyon</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/pagos-escolares/spring-creek/">Spring Creek</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/pagos-escolares/sunset-view/">Sunset View</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/pagos-escolares/timpanogos/">Timpanogos</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/pagos-escolares/wasatch/">Wasatch</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/pagos-escolares/westridge/">Westridge</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/pagos-escolares/centennial-middle/">Centennial Middle</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/pagos-escolares/dixon-middle/">Dixon Middle</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/pagos-escolares/independence-high/">Independence High</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/pagos-escolares/provo-high/">Provo High</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/pagos-escolares/timpview-high/">Timpview High</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/pagos-escolares/provo-transition-services-ebph/">Provo Transition Services/EBPH</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/pagos-escolares/eschool/">eSchool</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/pagos-escolares/provo-adult-education/">Provo Adult Education</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/pagos-escolares/preschools/">Preschools</a>
										</article>
										<article class="post">
										        <a href="https://provo.edu/pagos-escolares/district-office/">District Office</a>
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
   		<?php get_sidebar( 'school-fees' ); ?>
   </main>
<?php
	get_footer();
?>