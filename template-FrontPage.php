<?php
/*
Template Name: Front Page
*/
	get_header();

	//fetch all stored variables from the control post
	$get_to_know_fields = get_fields(55241);
	//print_r($get_to_know_fields);
?>

<main id="mainContent" class="homeMainContent">
	<h1 class="visuallyhidden">Provo City School District</h1>
	<section id="announcments">
		<h1>Provo City School District Announcements</h1>
			<?php

				if($get_to_know_fields['video_or_slider'] == 'video') {
					?>

					<video id="heroVideo" autoplay loop >
						<source src="<?php echo $get_to_know_fields['video_url'] ?>" type="video/mp4">
						Your browser does not support MP4 Format videos or HTML5 Video.
					</video>
					<?php
				} elseif ($get_to_know_fields['video_or_slider'] == 'slider') {
					?>
					<div class="slick-wrapper">
						  <?php
								$args = array( 'post_type' => 'announcement' ,'posts_per_page' => 5 , 'orderby'  => array('date' => 'DESC'));
								// Variable to call WP_Query.
								$the_query = new WP_Query( $args );
								if($the_query->have_posts()) :
									while ($the_query->have_posts()) : $the_query->the_post();?>
										<article class="slide" style="background-image: url('<?php the_field('announcement_image'); ?>')">
											 <!--
											  <div class="slide-text">
												  <h2><?php //the_title(); ?></h2>
												  <p><?php
														  //the_field('announcement_text');
														  //$slideLink = get_field('announcement_link');
														  //$slideLinkLabel = get_field('announcement_link_label');
														  //if($slideLink) { ?>
															 <a href="<?php //echo $slideLink ?>"><?php //echo $slideLinkLabel ?></a>
														 <?php //}
													  ?>
												  </p>
											  </div>
										  -->

										  </article>
									<?php endwhile;
								else :
									echo '<p>No Content Found</p>';
								endif;
							wp_reset_query();
							?>
						 </div>
					<?php
				}

			?>
	</section>
	<div id="belowSlider"><!-- Start of post slider content -->
		<!-- I am Buttons Home Page Start -->
		<section id="iAmMenu">
			<h2>I Am Menu</h2>
			   <ul>
				  <li class="iambutton" id="iamparent">I am a<span>Parent</span>
					  <div class="iamBox" id="parentbox">
						 <?php get_template_part( 'template-parts/iam', 'parent'); ?>
					  </div>
				  </li>
				  <li class="iambutton" id="iamstudent">I am a<span>Student</span>
					  <div class="iamBox" id="studentbox">
					  	<?php get_template_part( 'template-parts/iam', 'student'); ?>
					  </div>
				  </li>
				  <li class="iambutton" id="iamemployee">I am an<span>Employee</span>
					  <div class="iamBox" id="employeebox">
					  	<?php get_template_part( 'template-parts/iam', 'employee'); ?>
					  </div>
				  </li>
			   </ul>
		   </section>
		   <!-- I am Buttons Home Page End -->

		   <section id="homeNews"> <!-- News Home Page Start -->
				  <h1>District News & Events</h1>
					  <p>The latest news from Provo City School District</p>
					  <div class="stories">
				   <?php
					   $the_query = new WP_Query( array( 'posts_per_page' => 3 , 'category_name'  => 'news' ) );
					   if($the_query->have_posts()) :
						   while ($the_query->have_posts()) : $the_query->the_post();?>
								  <article>

									  	<div class="featured-image">
									  		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
								   		</div>

											<h2><?php the_title(); ?></h2>
										<div class="articleContent">
											  <?php
											  the_excerpt();
											  ?>
										<a href="<?php the_permalink(); ?>">Read More <span class="rightarrow"></span></a>
										</div>
										<p class="readMore"><a href="<?php the_permalink(); ?>">Read More <span class="rightarrow"></span></a></p>
											  <p class="postDate"><?php the_date(); ?></p>

								  </article>
							  <?php endwhile;
							   else :
								   echo '<p>No Content Found</p>';
					   endif;
				   ?>
					  </div>
					  <p class="moreNews"><a href="https://provo.edu/news/">Read More district news <span class="rightarrow"></span></a></p>
			</section> <!-- News Home Page End -->

			<section id="getToKnow"> <!-- Start Get to Know the District -->
				<h1>Get to Know the District</h1>
				Quick facts about Provo City School District
				<section class="gradRate">
					<dl>
						  <dt><strong>
						   <?php echo $get_to_know_fields['graduation_percentage']; ?>% Graduation Rate
						  </strong></dt>
						  <dd class="percentage percentage-<?php echo $get_to_know_fields['graduation_percentage']; ?>"></dd>
						</dl>
				</section>
				<div class="flexcontainer">
				<?php
				foreach($get_to_know_fields['districtinfo'] as $gettoknowtile) {

					?>

						<article>
							<a href="<?php echo $gettoknowtile['tile_link']; ?>">
								<h2><?php echo($gettoknowtile['tile_title']); ?></h2>
								<?php if($gettoknowtile['modifcation_date']){
								?>
									<p class="modDate"><em>*as of <?php echo($gettoknowtile['modifcation_date']); ?></em></p>
								<?php
								}
								?>

								<img class="getToKnowIcon" src="<?php echo $gettoknowtile['tile_icon']; ?>" alt="" />
								<span class="getToKnowContent">
									<?php echo $gettoknowtile['tile_content']; ?>
								</span>
							</a>
						</article>

					<?php
				}
				?>

				</div>
				<p class="demoLink"><a href="https://provo.edu/school-demographics/">Learn more about our schools & their demographics <span class="rightarrow"></span></a></p>
			</section> <!-- End Get to Know the District -->
			<section id="socialMediaFrontPage"> <!-- Start Social Media -->
				<h1>Social Media</h1>
					See what's being discussed & shared
						<script src="https://assets.juicer.io/embed.js" type="text/javascript"></script>
						<link href="https://assets.juicer.io/embed.css" media="all" rel="stylesheet" type="text/css" />

						<ul class="sociallinks">
							<li>
								<a href="https://www.instagram.com/provocityschooldistrict/"><img src="https://globalassets.provo.edu/image/icons/archived/instagram-social-network-logo-of-photo-camera.svg" alt="Link to Instagram" /></span></a>
							</li>
							<li><a href="https://twitter.com/ProvoSchoolDist"><img src="https://globalassets.provo.edu/image/icons/archived/twitter-logo-on-black-background.svg" alt="Link to Twitter" /></span>
								</a>
							</li>
							<li><a href="https://www.facebook.com/provoschooldistrict/"><img src="https://globalassets.provo.edu/image/icons/archived/facebook-app-logo.svg" alt="Link to Facebook" /></span>
								</a>
							</li>
						</ul>

						<h2>Instagram Feed</h2>
						<ul class="juicer-feed" data-feed-id="pcsd_webteam"><h1 class="referral"><a href="https://www.juicer.io">Powered by Juicer.io</a></h1></ul>
			</section> <!-- End Social Media -->
		</div><!-- End of post slider content -->
   </main><!-- End of #mainContent -->
<?php
	get_footer();
?>
