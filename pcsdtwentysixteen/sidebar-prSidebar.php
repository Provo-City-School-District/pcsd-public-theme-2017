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
			<a href="https://provo.edu/policies-procedures-forms/7000-community/">
				<img src="//globalassets.provo.edu/image/icons/policies-lt.svg" alt="" />
				<span>Community Policies: 7000 Series</span>
			</a>
		</li>
		<li>
			<a href="https://provo.edu/category/news/public-relations/">
				<img src="//globalassets.provo.edu/image/icons/news-white.svg" alt="" />
				<span>Public Relations News</span>
			</a>
		</li>
		<li>
			<a href="https://provo.edu/public-relations/media-story-request-form/">
				<img src="//globalassets.provo.edu/image/icons/media-story-request.svg" alt="" />
				<span>Media Story Request</span>
			</a>
		</li>
	</ul>
	<h2>Public Relations Contacts</h2>
		<?php
			echo file_get_contents('https://provo.edu/directory_page/administrative-building-communications-admin/');
		?>
<ul class="sociallinks">
			<li><a href="https://www.facebook.com/provoschooldistrict/"><img src="//globalassets.provo.edu/image/icons/facebook.svg" alt="Link to Facebook" /></a></li>
			<li><a href="https://www.instagram.com/provocityschooldistrict/"><img src="//globalassets.provo.edu/image/icons/instagram.svg" alt="Link to Instagram" /></a></li>
			<li><a href="https://twitter.com/ProvoSchoolDist"><img src="//globalassets.provo.edu/image/icons/twitter.svg" alt="Link to Twitter" /></a></li>
		</ul>
</aside>
