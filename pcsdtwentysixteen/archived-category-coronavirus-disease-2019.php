<?php
	get_header();
?>
   <main id="mainContent">
   		<section class="content postgrid singlePost">
	   		<article class="activePost">
		   	<h1>District News : <?php single_cat_title(); ?></h1>
		   		<ul>
			   		<li><a href="https://provo.edu/news/noticias-del-distrito-enfermedad-por-el-coronavirus-2019/">Noticias del distrito: enfermedad por el coronavirus 2019</a></li>
		   		</ul>
		   		<p>The rapid outbreak of the COVID-19 has had a considerable impact on our daily routine. We are working in coordination with local, county and state officials who have expertise in this area. In this very dynamic and fluid situation, we want to make sure you have the latest information. <br />
	Here are key points to be aware of:</p>
				<ul>
					<li><a href="https://provo.edu/alert/school-dismissal-extended-through-may-1/">State school dismissal March 16-May 1 with a reassessment after that time frame</a></li>
					<li><a href="https://provo.edu/alert/school-dismissal-information-for-online-learning-technology-and-school-meals/">Online learning for students starting March 18</a></li>
					<li><a href="https://provo.edu/departments/technology-support/">Chromebooks can be checked out to support students online learning</li>
					<li><a href="https://provo.edu/news/child-nutrition-updates-during-school-dismissal/">Breakfast and lunch will be provided to Provo children ages 0-18</a></li>
					<li>Limit gathering to 10 or fewer people</li>
					<li>Fingerprinting services will be temporarily suspended until further notice</li>
					<li>Parents email student questions or concerns to your child’s teacher</li>
				</ul>
				<p>*Note – Regular updates are being sent to all employees and parents via email. If you are not receiving these notifications, please contact your school to ensure your personal information is up to date. Please also check your spam folder, and ensure your email server is not blocking district messages.</p>
				<p>You can also visit the <a href="https://www.facebook.com/provoschooldistrict/?ref=bookmarks">District Facebook</a>, <a href="https://www.instagram.com/provocityschooldistrict">Instagram</a>, and <a href="https://twitter.com/ProvoSchoolDist">Twitter</a> for updates, home learning tips and glimpses into the ongoing work. We would also like to share a list of additional information and resources should you need them.</p>
				<ul>
					<li><a href="http://coronavirus.utah.gov">Utah’s coronavirus information page</a></li>
					<li><a href="http://coronavirus.provo.org">Provo City coronavirus plan/information page</a></li>
					<li>Utah County hotline manned by the Utah County Health Department 801-851-4357 from 8:30 a.m. to 5:00 p.m.</li>
					<li><a href="https://provo.edu/news/united-way-211-information/">United Way 24/7 hotline 211</a></li>
					<li>State Crisis Line 800-273-8255</li>
				</ul>
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