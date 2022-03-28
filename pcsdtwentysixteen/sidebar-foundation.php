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
			<li class="buttonlink"><a href="https://provo-city-school-district-foundation.square.site/">Donate to Foundation</a></li>
			<li class="buttonlink"><a href="https://provo.edu/wp-content/uploads/2020/01/1-13-2020-outstanding-educator-nomination-form.pdf">Outstanding Educator <span>Nomination Form (PDF)</span></a></li>
		</ul>
		<h2>Board of Governors</h2>
			<ul>
				<li>Brent Brown</li>
				<li>Dan Campbell</li>
				<li>Tracy Rawle </li>
			</ul>
		<h2>Executive Board Members</h2>
			<ul>
				<li>Curt Bramble</li>
				<li>Carolyn Wright</li>
				<li>Stan Lockhart</li>
			</ul>
		<h2>Board of Directors</h2>
			<ul>
				<li>Julia Doxey</li>
				<li>Jenae Thomas</li>
				<li>Carolyn Wright</li>
				<li>Colleen Christensen</li>
				<li>Greg Christofferson</li>
				<li>Susie Bramble</li>
				<li>Andrea Clarke</li>
				<li>Robyn Pulham</li>
				<li>Nick Whiting</li>
				<li>Marissa Bernards</li>
				<li>Ali Conger</li>
				<li>Jennifer Partridge</li>
				<li>Nate Bryson</li>
			</ul>

		<h2>District Advisors</h2>
			<ul>
				 <li>Douglas Finch</li>
				 <li>Jessica Miller</li>
				 <li>Caleb Price</li>
				 <li>Lauren Schoenwald</li>
				 <li>Charity Williams</li>
				 <li>Ricardo Ledesma</li>
				 <li>Shauna Sprunger</li>
			</ul>
</aside>
