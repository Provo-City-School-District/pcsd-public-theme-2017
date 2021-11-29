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

	<ul>
		<li><a href="https://provo.edu/wp-content/uploads/2017/01/6605P1SchoolBusRules.pdf">6605 P1 Student Conduct on School Buses Procedure</a></li>
	</ul>
	<h2>Transportation Contacts</h2>
	
		<?php  
			echo file_get_contents('https://provo.edu/directory_page/transportation/');
		?>
</aside>