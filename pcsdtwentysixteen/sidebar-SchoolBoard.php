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
			<a href="//provo.edu/policies-procedures-forms/">
				<img src="https://globalassets.provo.edu/image/icons/policies-lt.svg" alt="" />
				<span>Board Policies</span>
			</a>
		</li>
		<li>
			<a href="https://provo.edu/diversity-equity-inclusion-statement/">
				<img src="<?php echo get_template_directory_uri() ?>/assets/icons/light/district-communication.svg" alt="" />
				<span>Diversity, Equity & Inclusion Statement</span>
			</a>
		</li>
	</ul>
	<h2>Board Member Contacts</h2>

		<div class="personalvCard">
			<img src="https://provo.edu/wp-content/uploads/2018/03/hall-melanie.jpg" alt="Melanie Hall" />
			<ul>
			 	<li class="title">President - District 2</li>
			 	<li class="name"><strong>Melanie Hall</strong></li>
			 	<li class="email">melanieh@provo.edu</li>
			</ul>
			<ul class="boardterms">
			 	<li><strong>Assigned Schools:</strong> Rock Canyon, Centennial</li>
			 	<li><strong>Term Began:</strong> December 2019</li>
			 	<li><strong>Term Ends:</strong> January 2023</li>
			</ul>
		</div>
		<div class="personalvCard">
			<img src="https://provo.edu/wp-content/uploads/2017/02/Rebecca-Nielsen125x150.jpg" alt="Rebecca Nielsen" />
			<ul>
				 <li class="title">Vice President - District 6</li>
				 <li class="name"><strong>Rebecca Nielsen</strong></li>
				 <li class="email">rnielsen@provo.edu</li>
			</ul>
			<ul class="boardterms">
				 <li><strong>Assigned Schools:</strong> Lakeview, Westridge</li>
				 <li><strong>Term Began:</strong> January 2017</li>
				 <li><strong>Term Ends:</strong> January 2024</li>
			</ul>
		</div>
		<div class="personalvCard">
			<img src="https://provo.edu/wp-content/uploads/2019/01/nate-bryson.jpg" alt="Nate Bryson" />
			<ul>
			 	<li class="title">District 1</li>
			 	<li class="name"><strong>Nate Bryson</strong></li>
			 	<li class="email">nateb@provo.edu</li>
			</ul>
			<ul class="boardterms">
				<li><strong>Assigned Schools:</strong> Canyon Crest, Edgemont, Timpview</li>
				<li><strong>Term Began:</strong> January 2019</li>
				<li><strong>Term Ends:</strong> January 2023</li>
			</ul>
		</div>
		<div class="personalvCard">
			<img src="https://provo.edu/wp-content/uploads/2017/02/mckay-jensen.jpg" alt="McKay Jensen" />
				<ul>
				 	<li class="title">District 3</li>
				 	<li class="name"><strong>McKay Jensen</strong></li>
				 	<li class="email">mckayj@provo.edu</li>
				</ul>
				<ul class="boardterms">
					<li><strong>Assigned Schools:</strong> Wasatch</li>
					<li><strong>Term Began:</strong> January 2019</li>
					<li><strong>Term Ends:</strong> January 2023</li>
				</ul>

		</div>
		<div class="personalvCard">
			<img src="https://provo.edu/wp-content/uploads/2021/03/jennifer-partridge.jpg" alt="Jennifer Partridge" />
			<ul>
			 	<li class="title">District 4</li>
			 	<li class="name"><strong>Jennifer Partridge</strong></li>
			 	<li class="email">jenniferpa@provo.edu</li>
			</ul>
			<ul class="boardterms">
			 	<li><strong>Assigned Schools:</strong> Provost, Provo Peaks, Spring Creek</li>
			 	<li><strong>Term Began:</strong> January 2019</li>
			 	<li><strong>Term Ends:</strong> January 2023</li>
			</ul>
		</div>
		<div class="personalvCard">
			<img src="https://provo.edu/wp-content/uploads/2021/03/teri-mccabe.jpg" alt="Teri McCabe" />
			<ul>
			 	<li class="title">District 5</li>
			 	<li class="name"><strong>Teri McCabe</strong></li>
			 	<li class="email">terim@provo.edu</li>
			</ul>
			<ul class="boardterms">
			 	<li><strong>Assigned Schools:</strong> Amelia, Franklin, Sunset View</li>
			 	<li><strong>Term Began:</strong> January 2020</li>
			 	<li><strong>Term Ends:</strong> January 2024</li>
			</ul>
		</div>

		<div class="personalvCard">
			<img src="https://provo.edu/wp-content/uploads/2021/03/gina-hale.jpg" alt="Gina Hales" />
				<ul>
					 <li class="title">District 7</li>
					 <li class="name"><strong>Gina Hales</strong></li>
					 <li class="email">ginah@provo.edu</li>
				</ul>
				<ul class="boardterms">
					<li><strong>Assigned Schools:</strong> Timpanogos, Dixon, IHS, Provo High</li>
					<li><strong>Term Began:</strong> January 2020</li>
					<li><strong>Term Ends:</strong> January 2024</li>
				</ul>
		</div>
		<div class="personalvCard">
			<img src="https://provo.edu/wp-content/uploads/2018/08/tautkus-bonnie.jpg" alt="Bonnie Tautkus" />
				<ul>
					 <li class="title">Superintendent Executive Assistant</li>
					 <li class="name"><strong>Bonnie Tautkus</strong></li>
					 <li class="phone">801-374-4805</li>
					 <li class="email">bonniet@provo.edu</li>
				</ul>

		</div>
		<!-- <?php dynamic_sidebar( 'globalsidebar' ); ?> -->
</aside>
