<aside id="sidebar" class="sidebar counseling">
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
				<a href="https://provo.edu/category/news/cte/">
					<img src="//globalassets.provo.edu/image/icons/news-white.svg" alt="" />
					CTE News
				</a>
			</li>
			<li>
				<a href="https://www.linkedin.com/company/provo-school-district-cte-internships/">
					<img src="//globalassets.provo.edu/image/icons/employee-navigator-lt.svg" alt="" />
					CTE Linkedin Internship
				</a>
			</li>
			<li>
				<a href="https://www.instagram.com/provocte/">
					<img src="//globalassets.provo.edu/image/icons/instagram.svg" alt="" />
					CTE Instagram
				</a>
			</li>
		</ul>
	<h2>CTE Contacts</h2>
		<?php  
			echo file_get_contents('https://provo.edu/directory_page/cte-admin/');
		?>
	
</aside>
		