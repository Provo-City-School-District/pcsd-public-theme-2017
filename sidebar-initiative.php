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
			<a href="https://provo.edu/category/news/provo-way-learning-initiative/">
				<img src="//globalassets.provo.edu/image/icons/policies-lt.svg" alt="" />
				<span>Learning Initiative News</span>
			</a>
		</li>
	</ul>
	<h2>Provo Way Innovative Learning Initiative Contacts</h2>
		<?php  
			echo file_get_contents('https://provo.edu/directory_page/leaning-initiative/');
		?>
</aside>