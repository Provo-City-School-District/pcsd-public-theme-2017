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
						  <div class="threeColumn">
							  <ul>
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/pcsd-canvas-logo-white.png" alt="" /><a href="https://canvas.provo.edu">Canvas Login</a></li>
							  <!--	<li><img src="https://globalassets.provo.edu/image/icons/archived/return-plan-lt.svg" alt="" /><a href="https://provo.edu/returnplan/">Return to School Plan 2020</a></li> -->
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/progress-lt.svg" alt="" /><a class="ext" href="https://grades.provo.edu/public/">PowerSchool (Grades &amp; Attendance)</a></li>
								<li><img src="https://globalassets.provo.edu/image/icons/archived/shield-lt.svg" alt="" /><a href="https://provo.edu/covid-19-updates//">COVID Updates & Resources</a></li>
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/register-lt.svg" alt="" /><a class="ext" href="https://provo.edu/student-services/register-for-school/">Register For School</a></li>
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/fee-lt.svg" alt="" /><a class="ext" href="https://secure2.myschoolfees.com/start_v2.aspx">Pay School Fees</a></li>
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/privacy-lt.svg" alt="" /><a href="https://provo.edu/our-district/student-data-privacy/">Student Data Privacy</a></li>
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/boundary-map-lt.svg" alt="" /><a href="https://provo.edu/school-boundary-locator/">School Boundary Locator</a></li>
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/nutrition-lt.svg" alt="" /><a href="https://provo.edu/child-nutrition/">School Meals</a>
									  <ul class="iamSubMenu">
										  <li><a class="ext" href="http://www.schoolnutritionandfitness.com/index.php?page=menus&sid=2302081511134871">View School Meal Menus</a></li>
										  <li><a class="ext" href="https://www.myschoolbucks.com/">Pay for School Meals</a></li>
										  <li><a class="ext" href="https://www.myschoolapps.com/">Apply for Free &amp; Reduced Meals</a></li>
										  <li><a class="pdf" href="https://provo.edu/wp-content/uploads/2017/01/09072017-6710P1-MealCharging.pdf">View Meal Charging Policy</a></li>
										  <li><a class="ext" href="http://goo.gl/forms/T5Imne701daSSvTT2">Request a Refund</a></li>

									  </ul>
								  </li>
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/bus-lt.svg" alt="" /><a class="ext" href="https://www.infofinderi.com/tfi/address.aspx?cid=PCSD1CX16HAYK">View Bus Routes</a></li>
							  </ul>
						  </div>
						  <div class="threeColumn">
							  <ul>
								<li><img src="https://globalassets.provo.edu/image/icons/archived/opportunities-lt.svg" alt="" /><a href="https://provo.edu/counseling-career-pathways/">Counseling</a></li>
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/tech-lt.svg" alt="" /><a href="https://provo.edu/departments/technology-support/">Technology Support</a></li>
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/calendar-lt.svg" alt="" /><a href="https://provo.edu/human-resources/calendars/">View Calendars</a>
									  <ul class="iamSubMenu">
										  <li><a href="https://provo.edu/human-resources/calendars/district-events-calendar/">District Events Calendar</a></li>
										<li><a href="https://provo.edu/human-resources/calendars/">School Year Calendars</a></li>
										<li><a href="https://amelia.provo.edu/all-events-calendar/">Amelia Earhart Elementary</a></li>
										<li><a href="https://canyoncrest.provo.edu/school-information/all-events-calendar/">Canyon Crest Elementary</a></li>
										<li><a href="https://centennial.provo.edu/parent-essentials/calendar/">Centennial Middle School</a></li>
										<li><a href="https://dixon.provo.edu/parent-essentials/calendar/">Dixon Middle</a></li>
										<li><a href="https://edgemont.provo.edu/school-information/all-events-calendar/">Edgemont Elementary</a></li>
										<li><a href="https://franklin.provo.edu/all-events-calendar/">Franklin Elementary</a></li>
										<li><a href="https://lakeview.provo.edu/school-information/all-events-calendar/">Lakeview Elementary</a></li>
										<li><a href="https://independence.provo.edu/tools-for-students/calendar/">Independence High</a></li>
										<li><a href="https://provohigh.provo.edu/calendar/">Provo High</a></li>
										<li><a href="https://peaks.provo.edu/school-information/all-events-calendar/">Provo Peaks Elementary</a></li>
										<li><a href="https://provost.provo.edu/all-events-calendar/">Provost Elementary</a></li>
										<li><a href="https://rockcanyon.provo.edu/school-information/all-events-calendar/">Rock Canyon Elementary</a></li>
										<li><a href="https://springcreek.provo.edu/all-events-calendar/">Spring Creek Elementary</a></li>
										<li><a href="https://sunset.provo.edu/school-information/all-events-calendar/">Sunset View Elementary</a></li>
										<li><a href="https://timpview.provo.edu/school-information/all-events-calendar/">Timpview High</a></li>
										<li><a href="https://timpanogos.provo.edu/school-information/all-events-calendar/">Timpanogos Elementary</a></li>
										<li><a href="https://wasatch.provo.edu/all-events-calendar/">Wasatch Elementary</a></li>
										<li><a href="https://westridge.provo.edu/school-information/all-events-calendar/">Westridge Elementary</a></li>
									  </ul>
								  </li>
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/peachjarlt.png" alt="" /><a href="https://provo.edu/electronic-flier-distribution/">Electronic Fliers</a></li>
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/parent-academy-lt.svg" alt="" /><a href="https://provo.edu/covid-19-updates/parent-accademy-covid-19-resource/">Parent Academy</a></li>
							  </ul>
						  </div>
						  <div class="threeColumn">
							  <ul>
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/facebook-lt.svg" alt="" /><a class="ext" href="https://www.facebook.com/provoschooldistrict/">Join Us On Facebook</a></li>
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/directory-lt.svg" alt="" /><a href="https://provo.edu/district-office-directory/">Contact Administrators</a></li>
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/bully-lt.svg" alt="" /><a href="https://provo.edu/student-services/bully-prevention-non-discrimination/">View Bullying Information</a>
									  <ul class="iamSubMenu">
										  <li><a class="pdf" href="https://provo.edu/wp-content/uploads/2020/08/Policy-3320-Prohibition-of-Bullying-Harassment-Hazing-and-Retaliation.pdf">3320 Bullying Policy</a></li>
										  <li><a class="pdf" href="https://provo.edu/wp-content/uploads/2020/08/3320-P1-Bullying-Harassment-Hazing-and-Retaliation.pdf">3320 Procedure 1 Bullying</a></li>
										  <li><a class="pdf" href="https://provo.edu/wp-content/uploads/2020/08/3320-F1-Bullying-Notification-Form.pdf">3320 Form 1 Bullying Notification</a></li>
										  <li><a class="pdf" href="https://provo.edu/wp-content/uploads/2020/08/3320-F2-Bullying-Harassment-Hazing-Retaliation-Incident-Reporting-Form.pdf">3320 Form 2 Bullying Harassment, Hazing &amp; Retaliation Incident Reporting</a></li>
									  </ul>
								  </li>

								  <li><img src="https://globalassets.provo.edu/image/icons/archived/policies-lt.svg" alt="" /><a href="https://provo.edu/policies-procedures-forms/">View Policies &amp; Procedures</a>
									  <ul class="iamSubMenu">
										  <li><a href="https://provo.edu/policies-procedures-forms/">English</a></li>
										  <li><a href="https://provo.edu/manual-de-normas-en-linea-normas-procedimientos-y-formas/">Spanish</a></li>
									  </ul>
								  </li>
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/child-find.svg" alt="" /><a href="https://provo.edu/special-education/child-find/">Child Find</a></li>
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/stem-lt.svg" alt="" /><a href="https://provo.edu/teaching-learning/stem/">STEM</a></li>
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/cbs-icon-lt.svg" alt="" /><a href="https://campbigsprings.provo.edu/">Camp Big Springs</a></li>
								<li><img src="https://globalassets.provo.edu/image/icons/archived/district-communication-lt.svg" alt="" /><a href="https://provo.edu/public-relations/ways-we-communicate/">District Communication</a></li>
							  </ul>
						  </div>
					  </div>
				  </li>
				  <li class="iambutton" id="iamstudent">I am a<span>Student</span>
					  <div class="iamBox" id="studentbox">
						  <div class="threeColumn">
							  <ul>
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/pcsd-canvas-logo-white.png" alt="" /><a href="https://canvas.provo.edu">Canvas Login</a></li>
							  <!--	<li><img src="https://globalassets.provo.edu/image/icons/archived/return-plan-lt.svg" alt="" /><a href="https://provo.edu/returnplan/">Return to School Plan 2020</a></li> -->
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/progress-lt.svg" alt="" /><a class="ext" href="https://grades.provo.edu/public/">Update Powerschool or View Grades &amp; Attendance</a></li>
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/calendar-lt.svg" alt="" /><a href="https://provo.edu/human-resources/calendars/">View School Year Calendars</a></li>
							  </ul>
						  </div>
						  <div class="threeColumn">
						  <ul>
							  <li><img src="https://globalassets.provo.edu/image/icons/archived/nutrition-lt.svg" alt="" /><a class="ext" href="https://www.schoolnutritionandfitness.com/index.php?page=menus&sid=2302081511134871">School Menu</a></li>
							  <li><img src="https://globalassets.provo.edu/image/icons/archived/opportunities-lt.svg" alt="" /><a href="https://provo.edu/counseling-career-pathways/">Counseling &amp; Career Pathways</a>
								  <ul class="iamSubMenu">
									<li><a href="https://provo.edu/counseling-career-pathways/contact-your-counselor/">Contact Your Counselor</a></li>
									  <li><a href="https://provo.edu/counseling-career-pathways/utah-colleges/">Utah Colleges</a></li>
									  <li><a href="https://provo.edu/counseling-career-pathways/financial-aid/">Financial Aid</a></li>
									<li><a href="https://provo.edu/counseling-career-pathways/scholarships/">Scholarships</a></li>
									  <li><a href="https://provo.edu/counseling-career-pathways/distance-educationconcurrent-enrollment/">Distance Learning/Concurrent Enrollment</a></li>
									  <li><a href="https://provo.edu/counseling-career-pathways/internshipsmatcwork-based-learning/">Internships/MATC/Work-Based Learning</a></li>
									  <li><a href="https://provo.edu/counseling-career-pathways/actsat-information/">ACT/SAT Information</a></li>
									  <li><a href="https://provo.edu/category/programsopportunities/">Current Programs/Opportunities</a></li>
								</ul>
							  </li>

						  </ul>
						  </div>
						  <div class="threeColumn">
							  <ul>
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/facebook-lt.svg" alt="" /><a class="ext" href="https://www.facebook.com/provoschooldistrict/">Join Us On Facebook</a></li>
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/cte-icon-lt.png" alt="" /><a href="https://provo.edu/career-technical-education/">Career &amp; Technical Education</a></li>
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/stem-lt.svg" alt="" /><a href="https://provo.edu/teaching-learning/stem/">STEM</a></li>
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/cbs-icon-lt.svg" alt="" /><a href="https://campbigsprings.provo.edu/">Camp Big Springs</a></li>
							  </ul>
						  </div>
					  </div>
				  </li>
				  <li class="iambutton" id="iamemployee">I am an<span>Employee</span>
					  <div class="iamBox" id="employeebox">

						  <div class="threeColumn">
							  <ul>
								  <!-- <li><img src="https://globalassets.provo.edu/image/icons/archived/return-plan-lt.svg" alt="" /><a href="https://provo.edu/returnplan/">Return to School Plan 2020</a></li> -->
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/employee-news-lt.svg" alt="" /><a href="https://employee.provo.edu/news/">Employee News</a></li>
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/shield-lt.svg" alt="" /><a href="https://employee.provo.edu/covid-resource-page-for-employees/">COVID Resource Page for Employees</a></li>
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/calendar-lt.svg" alt="" /><a href="https://provo.edu/human-resources/calendars/">Calendars</a>
									  <ul class="iamSubMenu">
										<li><a href="https://provo.edu/human-resources/calendars/">School Year</a></li>
										<li><a href="https://provo.edu/human-resources/calendars/#contractcalendar">Contract Calendars</a></li>
										<li><a href="https://provo.mid.as/calendar.pl?cal=2">Meeting Room Calendar</a></li>
									</ul>
								</li>
							  </ul>
						  </div>
						  <div class="threeColumn">
							  <ul>
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/departments-lt.svg" alt="" /><a href="https://employee.provo.edu/departments/">Departments</a>
									  <ul class="iamSubMenu">
										<li><a href="https://employee.provo.edu/business-finance/">Business & Finance</a></li>
										<li><a href="https://employee.provo.edu/human-resource/">Human Resources</a></li>
										<li><a href="https://employee.provo.edu/employee-communications/">Employee Communications</a></li>
										<li><a href="https://employee.provo.edu/technology/">Technology Support</a></li>
										<li><a href="https://employee.provo.edu/teaching-learning/">Teaching & Learning</a></li>
										<li><a href="https://employee.provo.edu/teaching-learning/professional-development/">Professional Development</a></li>
									</ul>
								</li>
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/form-lt.svg" alt="" /><a href="https://employee.provo.edu/forms-documents/">Forms &amp; Docs</a></li>
								<li><img src="https://globalassets.provo.edu/image/icons/archived/policies-lt.svg" alt="" /><a href="https://provo.edu/policies-procedures-forms/">Policies &amp; Procedures</a></li>

								<li><img src="https://globalassets.provo.edu/image/icons/archived/facebook-lt.svg" alt="" /><a class="ext" href="https://www.facebook.com/provoschooldistrict/">Join Us On Facebook</a></li>
							  </ul>
						  </div>
						  <div class="threeColumn">
							  <ul>
								  <li><img src="https://globalassets.provo.edu/image/icons/archived/employee-access-lt.svg" alt="" /><a href="https://employee.provo.edu/">Employee Access</a>
									<ul class="iamSubMenu">
										<li><a href="https://www.aliosolutions.net/PROVO/login.aspx">ALIO Employee Service Portal Login</a></li>
										<li><a href="https://employee.provo.edu/teaching-learning/professional-development/16-hours-of-blended-learning-2021-22/">16 Hours of Blended Learning</a></li>
										<li><a href="https://employee.provo.edu/technology/approved-applications/">Approved Apps</a></li>
										<li><a href="https://www.employeenavigator.com/benefits/Account/Login">Benefits Enrollment Portal</a></li>
										<li><a href="https://employee.provo.edu/teaching-learning/curriculum-notebooks/">Curriculum Notebooks</a></li>
										<li><a href="http://mail.google.com/">Email Login</a></li>
										<li><a href="https://employee.provo.edu/">Employee Website</a></li>
										<li><a href="https://provo.emspaplus.com/Employee/Account/LogOn">ESP Evaluations</a></li>
										<li><a href="https://internet.provo.edu">Filter Login</a></li>
										<li><a href="https://kelly.aesoponline.com/login.asp">Find a Substitute Teacher</a></li>
										<li><a href="https://online1.timeanywhere.com/novatime/ewslogin.aspx?cid=4b2532f3-7e2d-45d4-a38f-8041083dfcdf">Novatime Timekeeping System</a></li>
										<li><a href="https://provosd.parentlink.net/html/ContentBase/Content/Home/Login">Parentlink Login</a></li>
										<li><a href="https://grades.provo.edu/teachers/pw.html">PowerSchool for Teachers Login</a></li>
										<li><a href="https://grades.provo.edu/admin/pw.html">Powerschool for Admin Login</a></li>
										<li><a href="https://provo-ut.safeschools.com/login">SafeSchools Training</a></li>
										<li><a href="https://infofinderle.transfinder.com/provo.edu/login.aspx">Schedule a Bus</a></li>
										<li><a href="https://employee.provo.edu/employee-communications/news-submission-form/">Submit News</a></li>
										<li><a href="https://helpdesk.provo.edu:8443">Technology Work Order</a></li>
										<li><a href="https://mwhd.provo.edu:8443/helpdesk/WebObjects/Helpdesk.woa">Maintenance Work Order</a></li>
									</ul>
								</li>
							  </ul>
						  </div>
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
				<?php

				?>
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
