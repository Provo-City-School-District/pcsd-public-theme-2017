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
    <h2>Elementary Schools</h2>
        <ul>
        	<li><a href="#Amelia_Earhart">Amelia Earhart</a></li>
		 	<li><a href="#Canyon_Crest">Canyon Crest</a></li>
		 	<li><a href="#Edgemont">Edgemont</a></li>
		 	<li><a href="#Franklin">Franklin</a></li>
		 	<li><a href="#Lakeview">Lakeview</a></li>
		 	<li><a href="#Provost">Provost</a></li>
		 	<li><a href="#Provo_Peaks">Provo Peaks</a></li>
		 	<li><a href="#Rock_Canyon">Rock Canyon</a></li>
		 	<li><a href="#Spring_Creek">Spring Creek</a></li>
		 	<li><a href="#Sunset_View">Sunset View</a></li>
		 	<li><a href="#Timpanogos">Timpanogos</a></li>
		 	<li><a href="#Wasatch">Wasatch</a></li>
		 	<li><a href="#Westridge">Westridge</a></li>
	    </ul>
    <h2>Secondary Schools</h2>
    	<ul>
        	<li><a href="#Centennial_Middle">Centennial Middle</a></li>
		 	<li><a href="#Dixon_Middle">Dixon Middle</a></li>
		 	<li><a href="#Independence_Middle">Independence High</a></li>
		 	<li><a href="#Provo_High">Provo High</a></li>
		 	<li><a href="#Timpview_High">Timpview High</a></li>
		</ul>
	<h2>Specialized Schools</h2>
    	<ul>
        	<li><a href="#Provo_Transition_Services/EBPH">Provo Transition Services/EBPH</a></li>
		 	<li><a href="#eSchool">eSchool</a></li>
		 	<li><a href="#Provo_Adult_Education">Provo Adult Education</a></li>
		 	<li><a href="#Preschools">Preschool</a></li>
    	</ul>
</aside>
