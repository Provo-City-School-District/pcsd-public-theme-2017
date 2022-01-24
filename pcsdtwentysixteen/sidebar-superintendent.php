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
				<a href="https://provo.edu/wp-content/uploads/2018/08/08032018-2010-OrgChart.pdf">
					<img src="//globalassets.provo.edu/image/icons/org-chart-white.svg" alt="" />
					<span>Organizational Chart (PDF)</span>
				</a>
			</li>
			<li>
				<a href="https://provo.edu/category/news/superintendent">
					<img src="//globalassets.provo.edu/image/icons/news-white.svg" alt="" />
					<span>Superintendent News</span>
				</a>
			</li>
		</ul>
	<h2>Superintendent Contacts</h2>
		<?php
			echo file_get_contents('https://provo.edu/directory_page/superintendent/');
		?>
</aside>
