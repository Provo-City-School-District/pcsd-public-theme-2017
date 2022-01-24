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
			<a href="https://provo.edu/category/news/camp-big-springs/">
				<img src="//globalassets.provo.edu/image/icons/policies-lt.svg" alt="" />
				<span>Camp News</span>
			</a>
		</li>
		
	</ul>
	<p>Big Springs is a unique and rare experience that provides opportunities which many children may never get in any other way. Located up the South Fork of Provo Canyon on a beautiful and secluded spot, we utilize trained leadership and the resources of our natural surroundings to contribute to each camper's mental, physical, and social growth.</p>
	<h2>Camp Contacts</h2>
		
		<?php  
			echo file_get_contents('https://provo.edu/directory_page/camp-big-springs/');
		?>
</aside>