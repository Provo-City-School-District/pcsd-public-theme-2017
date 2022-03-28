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
	<img src="https://provo.edu/wp-content/uploads/2017/05/eschool-logo.png" alt="eSchool Logo" />
	<ul class="imagelist">
		<li>
			<a href="https://provo.edu/policies-procedures-forms/3000-students/">
				<img src="//globalassets.provo.edu/image/icons/policies-lt.svg" alt="" />
				<span class="ext">Student Services Policies: 3000 series</span>
			</a>
		</li>
		<li>
			<a href="https://provo.edu/eschool/eschool-calendar/">
				<img src="//globalassets.provo.edu/image/icons/calendar-lt.svg" alt="" />
				<span class="ext">View eSchool Calendar</span>
			</a>
		</li>
		<li>
			<a href="https://provo.edu/eschool/meet-your-staff/">
				<img src="//globalassets.provo.edu/image/icons/teaching-lt.svg" alt="" />
				<span class="ext">View eSchool Directory</span>
			</a>
		</li>
	</ul>

	<h2>Provo eSchool Contacts</h2>
		<ul>
			<li>Phone: (801) 374-4810</li>
			<li>Fax: (801) 374-4996</li>
			<li>Email: eschool@provo.edu</li>
		</ul>
		<p>Address:</p>
			<ul>
				<li>1591 N Jordan Ave</li>
				<li>Provo, UT 84604</li>
			</ul>
		<a href="https://www.peachjar.com/index.php?region=151161&a=28&b=138"><img src="https://westridge.provo.edu/wp-content/uploads/2019/05/button-orange-eflyers_202x46.png" alt="Link to PeachJar Fliers"></a>
</aside>
