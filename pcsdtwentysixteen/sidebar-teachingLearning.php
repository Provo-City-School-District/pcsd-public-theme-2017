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
				<a href="https://provo.edu/policies-procedures-forms/4000-curriculum-instruction-assessment/">
					<img src="https://globalassets.provo.edu/image/icons/policies-lt.svg" alt="" />
					<span>4000: Curriculum, Instruction, Assessment</span>
				</a>
			</li>
			<li>
			<a href="https://provo.edu/category/news/classroom-learning/">
				<img src="//globalassets.provo.edu/image/icons/news-white.svg" alt="" />
				<span>Teaching & Learning News</span>
			</a>
		</li>
		</ul>
	<h2>Teaching & Learning Contacts</h2>

		<?php
			echo file_get_contents('https://provo.edu/directory_page/teaching-and-learning/');
		?>
</aside>
