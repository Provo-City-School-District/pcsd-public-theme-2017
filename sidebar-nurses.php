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
			<a href="https://provo.edu/nurses/medicalhealth-forms/">
				<img src="//globalassets.provo.edu/image/icons/nurse-form.svg" alt="" />
				<span>Medical/Health Forms</span>
			</a>
		</li>
		<li>
			<a href="https://provo.edu/category/news/nurse/">
				<img src="//globalassets.provo.edu/image/icons/news-white.svg" alt="" />
				<span>Nurses News</span>
			</a>
		</li>
	</ul>
	<h2>Nurses Contacts</h2>
		
		<?php  
			echo file_get_contents('https://provo.edu/directory_page/nurse/');
		?>
		<!-- <?php dynamic_sidebar( 'globalsidebar' ); ?> -->
</aside>