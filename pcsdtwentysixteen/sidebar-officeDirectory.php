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


	        <label for="dsearch" class="visuallyhidden" id="directorySearch">Directory Search: </label>
	        <input type="text" name="dsearch" class="text-input" aria-labelledby="directorySearch" id="sidebar-filter" value="" placeholder="Search our staff..." />
	        <img id="directorySearchIcon" src="//globalassets.provo.edu/image/icons/search-lt.svg" alt="" />

	<h2>Department Pages</h2>
		<ul class="imagelist">
			<li>
				<a href="https://provo.edu/business-and-finance/">
					<img src="//globalassets.provo.edu/image/icons/business-lt.svg" alt="" />
					<span>Business &amp; Finance</span>
				</a>
			</li>
            <li>
            	<a href="https://provo.edu/child-nutrition/">
            		<img src="//globalassets.provo.edu/image/icons/nutrition-lt.svg" alt="" />
            		<span>Child Nutrition</span>
            	</a>
            </li>
            <li>
            	<a href="https://provo.edu/human-resources/">
            		<img src="//globalassets.provo.edu/image/icons/hr-lt.svg" alt="" />
            		<span>Human Resources</span>
            	</a>
            </li>
			<li>
				<a href="https://provo.edu/maintenance-facilities/">
					<img src="//globalassets.provo.edu/image/icons/maintenance-lt.svg" alt="" />
					<span>Maintenance &amp; Facilities</span>
				</a>
			</li>
            <li>
            	<a href="https://provo.edu/public-relations/">
            		<img src="//globalassets.provo.edu/image/icons/pr-lt.svg" alt="" />
            		<span>Public Relations</span>
            	</a>
            </li>
            <li>
            	<a href="//provoschoolnurses.blogspot.com/">
            		<img src="//globalassets.provo.edu/image/icons/nurse-lt.svg" alt="" />
            		<span>School Nurses</span>
            	</a>
            </li>
            <li>
            	<a href="https://provo.edu/special-education/">
            		<img src="//globalassets.provo.edu/image/icons/special-lt.svg" alt="" />
	            	<span>Special Education</span>
	            </a>
	        </li>
            <li>
            	<a href="https://provo.edu/student-services/">
            		<img src="//globalassets.provo.edu/image/icons/student-lt.svg" alt="" />
            		<span>Student Services</span>
            	</a>
            </li>
            <li>
            	<a href="https://provo.edu/title-i/">
            		<img src="//globalassets.provo.edu/image/icons/opportunities-lt.svg" alt="" />
            		<span>Title I</span>
            	</a>
            </li>
            <li>
            	<a href="https://provo.edu/teaching-learning/">
            		<img src="//globalassets.provo.edu/image/icons/teaching-lt.svg" alt="" />
            		<span>Teaching &amp; Learning</span>
            	</a>
            </li>
            <li>
            	<a href="https://provo.edu/transportation/">
            		<img src="//globalassets.provo.edu/image/icons/bus-lt.svg" alt="" />
            		<span>Transportation</span>
            	</a>
            </li>
            <li>
            	<a href="https://provo.edu/schools/">
            		<img src="//globalassets.provo.edu/image/icons/school.svg" alt="" />
            		<span>School Sites</span>
            	</a>
            </li>
            <li>
				<a href="https://employee.provo.edu/employee-communications/">
					<img src="//globalassets.provo.edu/image/icons/pr-lt.svg" alt="" />
					<span>Employee Communications</span>
				</a>
			</li>
            <li>
				<a href="https://employee.provo.edu/technology/">
					<img src="//globalassets.provo.edu/image/icons/tech-2-lt.svg" alt="" />
					<span>Technology Support</span>
				</a>
			</li>
        </ul>
	  <!-- <?php dynamic_sidebar( 'globalsidebar' ); ?> -->
</aside>