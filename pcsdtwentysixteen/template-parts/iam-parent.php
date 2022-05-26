<?php
	if(is_page(4150)) {
		$iconColor = 'dark';
	} else {
		$iconColor = 'light';
	}
?>
	<div>
		<ul class="imagebullets">
			<li><img src="<?php echo get_template_directory_uri() .'/assets/icons/' . $iconColor; ?>/pcsd-canvas-logo.png" alt="" /><a href="https://canvas.provo.edu">Canvas Login</a></li>
			<!--    <li><img src="https://globalassets.provo.edu/image/icons/light/return-plan-lt.svg" alt="" /><a href="https://provo.edu/returnplan/">Return to School Plan 2020</a></li> -->
			<li><img src="<?php echo get_template_directory_uri() .'/assets/icons/' . $iconColor; ?>/progress.svg" alt="" /><a class="ext" href="https://grades.provo.edu/public/">PowerSchool (Grades &amp; Attendance)</a></li>
			<li><img src="<?php echo get_template_directory_uri() .'/assets/icons/' . $iconColor; ?>/shield.svg" alt="" /><a href="https://provo.edu/covid-19-updates//">COVID Updates & Resources</a></li>
			<li><img src="<?php echo get_template_directory_uri() .'/assets/icons/' . $iconColor; ?>/register.svg" alt="" /><a class="ext" href="https://provo.edu/student-services/register-for-school/">Register For School</a></li>
		  	<li><img src="<?php echo get_template_directory_uri() .'/assets/icons/' . $iconColor; ?>/fee.svg" alt="" /><a class="ext" href="https://provo.aliohost.net:7443/AlioFeePay_PSD/Account/Login">Pay School Fees</a></li>
			<li><img src="<?php echo get_template_directory_uri() .'/assets/icons/' . $iconColor; ?>/fee.svg" alt="" /><a class="int" href="https://provo.edu/school-fees/">View School Fees</a></li>
		  	<li><img src="<?php echo get_template_directory_uri() .'/assets/icons/' . $iconColor; ?>/privacy.svg" alt="" /><a href="https://provo.edu/our-district/student-data-privacy/">Student Data Privacy</a></li>
		  	<li><img src="<?php echo get_template_directory_uri() .'/assets/icons/' . $iconColor; ?>/boundary-map.svg" alt="" /><a href="https://provo.edu/school-boundary-locator/">School Boundary Locator</a></li>
		  	<li><img src="<?php echo get_template_directory_uri() .'/assets/icons/' . $iconColor; ?>/nutrition.svg" alt="" /><a href="https://provo.edu/child-nutrition/">School Meals</a>
		  		<ul class="iamSubMenu subMenu">
					<li><a class="ext" href="http://www.schoolnutritionandfitness.com/index.php?page=menus&sid=2302081511134871">View School Meal Menus</a></li>
			  		<li><a class="ext" href="https://www.myschoolbucks.com/">Pay for School Meals</a></li>
			  		<li><a class="ext" href="https://www.myschoolapps.com/">Apply for Free &amp; Reduced Meals</a></li>
			  		<li><a class="pdf" href="https://provo.edu/wp-content/uploads/2017/01/09072017-6710P1-MealCharging.pdf">View Meal Charging Policy</a></li>
			  		<li><a class="ext" href="http://goo.gl/forms/T5Imne701daSSvTT2">Request a Refund</a></li>
		  		</ul>
			</li>
			<li><img src="<?php echo get_template_directory_uri() .'/assets/icons/' . $iconColor; ?>/bus.svg" alt="" /><a class="ext" href="https://www.infofinderi.com/tfi/address.aspx?cid=PCSD1CX16HAYK">View Bus Routes</a></li>
		</ul>
	</div>
	<div>
		  <ul class="imagebullets">
			<li><img src="<?php echo get_template_directory_uri() .'/assets/icons/' . $iconColor; ?>/opportunities.svg" alt="" /><a href="https://provo.edu/counseling-career-pathways/">Counseling</a></li>
			  <li><img src="<?php echo get_template_directory_uri() .'/assets/icons/' . $iconColor; ?>/tech.svg" alt="" /><a href="https://provo.edu/departments/technology-support/">Technology Support</a></li>
			  <li><img src="<?php echo get_template_directory_uri() .'/assets/icons/' . $iconColor; ?>/calendar.svg" alt="" /><a href="https://provo.edu/human-resources/calendars/">View Calendars</a>
				  <ul class="iamSubMenu subMenu">
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
			  <li><img src="<?php echo get_template_directory_uri() .'/assets/icons/' . $iconColor; ?>/peachjar.png" alt="" /><a href="https://provo.edu/electronic-flier-distribution/">Electronic Fliers</a></li>
			  <li><img src="<?php echo get_template_directory_uri() .'/assets/icons/' . $iconColor; ?>/parent-academy.svg" alt="" /><a href="https://provo.edu/covid-19-updates/parent-accademy-covid-19-resource/">Parent Academy</a></li>
		  </ul>
	  </div>
	  <div>
		  <ul class="imagebullets">
			  <li><img src="<?php echo get_template_directory_uri() .'/assets/icons/' . $iconColor; ?>/facebook.svg" alt="" /><a class="ext" href="https://www.facebook.com/provoschooldistrict/">Join Us On Facebook</a></li>
			  <li><img src="<?php echo get_template_directory_uri() .'/assets/icons/' . $iconColor; ?>/directory.svg" alt="" /><a href="https://provo.edu/district-office-directory/">Contact Administrators</a></li>
			  <li><img src="<?php echo get_template_directory_uri() .'/assets/icons/' . $iconColor; ?>/bully.svg" alt="" /><a href="https://provo.edu/student-services/bully-prevention-non-discrimination/">View Bullying Information</a>
				  <ul class="iamSubMenu subMenu">
					  <li><a class="pdf" href="https://provo.edu/wp-content/uploads/2020/08/Policy-3320-Prohibition-of-Bullying-Harassment-Hazing-and-Retaliation.pdf">3320 Bullying Policy</a></li>
					  <li><a class="pdf" href="https://provo.edu/wp-content/uploads/2020/08/3320-P1-Bullying-Harassment-Hazing-and-Retaliation.pdf">3320 Procedure 1 Bullying</a></li>
					  <li><a class="pdf" href="https://provo.edu/wp-content/uploads/2020/08/3320-F1-Bullying-Notification-Form.pdf">3320 Form 1 Bullying Notification</a></li>
					  <li><a class="pdf" href="https://provo.edu/wp-content/uploads/2020/08/3320-F2-Bullying-Harassment-Hazing-Retaliation-Incident-Reporting-Form.pdf">3320 Form 2 Bullying Harassment, Hazing &amp; Retaliation Incident Reporting</a></li>
				  </ul>
			  </li>
			  <li><img src="<?php echo get_template_directory_uri() .'/assets/icons/' . $iconColor; ?>/policies.svg" alt="" /><a href="https://provo.edu/policies-procedures-forms/">View Policies &amp; Procedures</a>
				  <ul class="iamSubMenu subMenu">
					  <li><a href="https://provo.edu/policies-procedures-forms/">English</a></li>
					  <li><a href="https://provo.edu/manual-de-normas-en-linea-normas-procedimientos-y-formas/">Spanish</a></li>
				  </ul>
			  </li>
			  <li><img src="<?php echo get_template_directory_uri() .'/assets/icons/' . $iconColor; ?>/child-find.svg" alt="" /><a href="https://provo.edu/special-education/child-find/">Child Find</a></li>
			  <li><img src="<?php echo get_template_directory_uri() .'/assets/icons/' . $iconColor; ?>/stem.svg" alt="" /><a href="https://provo.edu/teaching-learning/stem/">STEM</a></li>
			  <li><img src="<?php echo get_template_directory_uri() .'/assets/icons/' . $iconColor; ?>/camp.svg" alt="" /><a href="https://campbigsprings.provo.edu/">Camp Big Springs</a></li>
			<li><img src="<?php echo get_template_directory_uri() .'/assets/icons/' . $iconColor; ?>/district-communication.svg" alt="" /><a href="https://provo.edu/public-relations/ways-we-communicate/">District Communication</a></li>
		  </ul>
	  </div>
