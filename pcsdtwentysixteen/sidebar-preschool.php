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
	<h2>PreSchool Contacts</h2>
			<h3><a class="ext" href="https://sunrise.provo.edu/">Sunrise Preschool</a></h3>
				<?php
					echo file_get_contents('https://provo.edu/directory_page/school-preschool-sunrise/');
				?>
			<h3><a class="ext" href="https://provohigh.provo.edu/school-info/baby-bulldog-preschool/"><strong>Baby Bulldog Preschool (PHS)</strong></a></h3>
				<?php
					echo file_get_contents('https://provo.edu/directory_page/school-preschool-baby-bulldog/');
				?>
			<h3><strong>Timpview Preschool (THS)</strong></h3>
				<?php
					echo file_get_contents('https://provo.edu/directory_page/school-preschool-ths-preschool/');
				?>
			
			<h3><a class="ext" href="https://provo.edu/preschool/title-i-preschool-registration/"><strong>Provo City School District Title I Preschool</strong></a></h3>
				<?php
					echo file_get_contents('https://provo.edu/directory_page/school-preschool-district-title-i/');
				?>	
</aside>