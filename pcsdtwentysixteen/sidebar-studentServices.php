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
			<a href="//provo.edu/policies-procedures-forms/3000-students/">
				<img src="//globalassets.provo.edu/image/icons/policies-lt.svg" alt="" />
				<span>Student Services Policies: 3000 series</span>
			</a>
		</li>
		<li>
			<a href="https://provo.edu/student-services/documents-and-forms/">
				<img src="//globalassets.provo.edu/image/icons/policies-lt.svg" alt="" />
				<span>Documents &amp; Forms</span>
			</a>
		</li>
		<li>
			<a href="https://provo.edu/student-services/section-504/">
				<img src="//globalassets.provo.edu/image/icons/policies-lt.svg" alt="" />
				<span>Section 504</span>
			</a>
		</li>
		<li>
			<a href="https://provo.edu/category/news/student-services/">
				<img src="//globalassets.provo.edu/image/icons/news-white.svg" alt="" />
				<span>Student Services News</span>
			</a>
		</li>
	</ul>
	<h2>Student Services Contacts</h2>
		<?php  
			echo file_get_contents('https://provo.edu/directory_page/student-services/');
		?>
</aside>