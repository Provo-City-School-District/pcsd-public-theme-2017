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

	<ul class="address">
		<li>East Bay Post High</li>
		<li>515 East 1860 South</li>
		<li>Provo, UT 84606</li>
		<li>Phone: 801-374-4874</li>
	</ul>

	<h2>East Bay Post High Contacts</h2>
		
		<?php  
			echo file_get_contents('https://provo.edu/directory_page/east-bay-post-high/');
		?>
		<!-- <?php dynamic_sidebar( 'globalsidebar' ); ?> -->
</aside>