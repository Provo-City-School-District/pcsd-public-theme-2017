<aside id="sidebar" class="sidebar">
	<?php
		$i_am_buttons = curl_init();
		curl_setopt($i_am_buttons, CURLOPT_URL, 'https://globalassets.provo.edu/globalpages/i-am-sidebar-links.php');
		curl_setopt($i_am_buttons, CURLOPT_HEADER, 0);
			// grab URL and pass it to the browser
			curl_exec($i_am_buttons);
			// close cURL resource, and free up system resources
			curl_close($i_am_buttons);
		?>

	<ul class="imagelist">
		<li>
			<a href="https://provo.edu/special-education/child-find/">
				<img src="//globalassets.provo.edu/image/icons/child-find.svg" alt="" />
				<span>Child Find</span>
			</a>
		</li>
		
		<li>
			<a href="https://provo.edu/special-education/carson-smith-scholarship-program/">
				<img src="//globalassets.provo.edu/image/icons/policies-lt.svg" alt="" />
				<span>Carson Smith Scholarship Program</span>
			</a>
		</li>
		<li>
			<a href="https://provo.edu/wp-content/uploads/2021/08/pcsd-sped-policy-and-procedures-manual-august-2021.pdf">
				<img src="//globalassets.provo.edu/image/icons/policies-lt.svg" alt="" />
				<span>Special Education Local Policy (2021)</span>
			</a>
		</li>
		<li>
			<a href="https://www.schools.utah.gov/specialeducation/resources/lawsrulesregulations">
				<img src="//globalassets.provo.edu/image/icons/policies-lt.svg" alt="" />
				<span>Utah State Board of Education Special Ed Rules</span>
			</a>
		</li>
		<li>
			<a href="https://provo.edu/news/special-education-file-retentions-destruction-notice/">
				<img src="//globalassets.provo.edu/image/icons/file-white.svg" alt="" />
				<span>Special Education File Retentions & Destruction Notice
</span>
			</a>
		</li>
	</ul>
	<h2>Special Education Contacts</h2>
		<?php  
			echo file_get_contents('https://provo.edu/directory_page/special-education/');
		?>
</aside>	