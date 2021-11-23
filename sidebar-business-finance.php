<aside id="sidebar" class="businessSidebar sidebar">
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
			<a href="//provo.edu/policies-procedures-forms/6000-finance-and-operations/">
				<img src="//globalassets.provo.edu/image/icons/policies-lt.svg" alt="" />
				<span>Finance and Operations: 6000 Series</span>
			</a>
		</li>
		<li>
			<a href="https://provo.edu/business-and-finance/anonymously-report-financial-fraud/">
				<img src="//globalassets.provo.edu/image/icons/business-lt.svg" alt="" />
				<span>Anonymously Report Financial Fraud</span>
			</a>
		</li>
		<li>
			<a href="https://provo.edu/business-and-finance/esser-funding/">
				<img src="//globalassets.provo.edu/image/icons/news-white.svg" alt="" />
				<span>ESSER Funding Plan</span>
			</a>
		</li>
	</ul>
	<h2>Business Contacts</h2>
		
		<?php  
			echo file_get_contents('https://provo.edu/directory_page/business/');
		?>
</aside>