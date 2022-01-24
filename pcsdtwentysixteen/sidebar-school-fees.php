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
			<a href="https://provo.edu/school-fees/">
				<img src="//globalassets.provo.edu/image/icons/business-lt.svg" alt="" />
				<span>School Fees Menu</span>
			</a>
		</li>
		<li>
			<a href="https://provo.edu/wp-content/uploads/2021/02/Policy-6160-School-Fees-and-Fee-Waivers-revised-1-7-2021.pdf">
				<img src="//globalassets.provo.edu/image/icons/policy.svg" alt="" />
				<span>6160 School Fees and Fee Waivers</span>
			</a>
		</li>
		<li>
			<a href="https://provo.edu/wp-content/uploads/2021/02/6160-P1-School-Fees-and-Fee-Waivers-revised-1-7-2021.pdf">
				<img src="//globalassets.provo.edu/image/icons/policy.svg" alt="" />
				<span>6160 Procedure 1 School Fees and Fee Waivers</span>
			</a>
		</li>
		<li>
			<a href="https://provo.edu/wp-content/uploads/2020/02/6160FeesNoticeK-6.pdf">
				<img src="//globalassets.provo.edu/image/icons/policy.svg" alt="" />
				<span>6160 Fee Notice (Grade K-6)</span>
			</a>
		</li>
		<li>
			<a href="https://provo.edu/wp-content/uploads/2020/02/6160FeesNotice7-12.pdf">
				<img src="//globalassets.provo.edu/image/icons/policy.svg" alt="" />
				<span>6160 Fee Notice (Grade 7-12)</span>
			</a>
		</li>
		<li>
			<a href="https://provo.edu/wp-content/uploads/2020/08/6160-FeeWaiverApplicationK6.pdf">
				<img src="//globalassets.provo.edu/image/icons/policy.svg" alt="" />
				<span>6160 Form 1 Fee Waiver Application (Grade K-6)</span>
			</a>
		</li>
		<li>
			<a href="https://provo.edu/wp-content/uploads/2021/07/6160-FeeWaiverApplication7-12.pdf">
				<img src="//globalassets.provo.edu/image/icons/policy.svg" alt="" />
				<span>6160 Form 1 Fee Waiver Application (Grade 7-12)</span>
			</a>
		</li>
		<li>
			<a href="https://provo.edu/wp-content/uploads/2021/01/Spanish-Policy-6160-School-Fees-and-Fee-Waivers.pdf">
				<img src="//globalassets.provo.edu/image/icons/policy.svg" alt="" />
				<span>6160 Tarifas Escolares y Tarifas Exentas</span>
			</a>
		</li>
		<li>
			<a href="https://provo.edu/wp-content/uploads/2020/08/6160-FeeWaiverApplicationK6Spanish.pdf">
				<img src="//globalassets.provo.edu/image/icons/policy.svg" alt="" />
				<span>6160 Solicitud de Exención de Cuotas (Grados K-6)</span>
			</a>
		</li>
		<li>
			<a href="https://provo.edu/wp-content/uploads/2021/07/6160-FeeWaiverApplication7-12Spanish.pdf">
				<img src="//globalassets.provo.edu/image/icons/policy.svg" alt="" />
				<span>6160 Solicitud de Exoneracion de Cuotas (Grados 7-12)</span>
			</a>
		</li>
		<li>
			<a href="https://provo.edu/wp-content/uploads/2020/02/6160-F2-Fee-Waiver-Decision-And-Appeal.pdf">
				<img src="//globalassets.provo.edu/image/icons/policy.svg" alt="" />
				<span>6160 Form 2 Fee Waiver Decision And Appeal</span>
			</a>
		</li>
	</ul>
</aside>
