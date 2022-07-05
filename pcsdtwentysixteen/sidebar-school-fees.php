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
				<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/light/employee-access.svg" alt="" />
				<span>School Fees Menu</span>
			</a>
		</li>
		<li>
			<a href="https://provo.edu/wp-content/uploads/2021/02/Policy-6160-School-Fees-and-Fee-Waivers-revised-1-7-2021.pdf">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/light/register.svg" alt="" />
				<span>6160 School Fees and Fee Waivers Policy</span>
			</a>
		</li>
		<li>
			<a href="https://provo.edu/wp-content/uploads/2021/02/6160-P1-School-Fees-and-Fee-Waivers-revised-1-7-2021.pdf">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/light/register.svg" alt="" />
				<span>6160 Procedure 1 School Fees and Fee Waivers</span>
			</a>
		</li>
		<li lang="es">
			<a href="https://provo.edu/wp-content/uploads/2021/01/Spanish-Policy-6160-School-Fees-and-Fee-Waivers.pdf">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/light/register.svg" alt="" />
				<span>6160 Tarifas Escolares y Tarifas Exentas</span>
			</a>
		</li>
		<li>
			<a href="https://provo.edu/wp-content/uploads/2020/02/6160-F2-Fee-Waiver-Decision-And-Appeal.pdf">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/light/register.svg" alt="" />
				<span>6160 Form 2 Fee Waiver Decision And Appeal</span>
			</a>
		</li>
	</ul>
	
	<h2>Grades K-6</h2>
		<ul class="imagelist">
			<li>
				<a href="https://provo.edu/wp-content/uploads/2022/06/march22-FeesNoticeK6.pdf">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/light/policies.svg" alt="" />
					<span>School Fees Notice</span>
				</a>
			</li>
			<li>
				<a href="https://provo.edu/wp-content/uploads/2022/06/march22-FeeWaiverApplicationK6.pdf">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/light/register.svg" alt="" />
					<span>School Fee Waiver Application</span>
				</a>
			</li>
			
			
			
			
			<li lang="es">
				<a href="https://provo.edu/wp-content/uploads/2022/06/march2022-FeesNoticeK6Spanish.pdf">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/light/register.svg" alt="" />
					<span>Aviso de Cuotas Escolares Para Familias de Estudiantes</span>
				</a>
			</li>
			<li lang="es">
				<a href="https://provo.edu/wp-content/uploads/2022/06/march22-FeeWaiverApplicationK6Spanish.pdf">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/light/register.svg" alt="" />
					<span>Solicitud de Exención de Cuotas</span>
				</a>
			</li>
		</ul>
	
	<h2>Grades 7-12</h2>
		<ul class="imagelist">
			<li>
				<a href="https://provo.edu/wp-content/uploads/2022/06/march22-FeesNotice712.pdf">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/light/policies.svg" alt="" />
					<span>School Fees Notice</span>
				</a>
			</li>
			<li>
				<a href="https://provo.edu/wp-content/uploads/2022/06/march22-FeeWaiverApplication712.pdf">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/light/register.svg" alt="" />
					<span>School Fee Waiver Application</span>
				</a>
			</li>
			
			
			
			
			<li lang="es">
				<a href="https://provo.edu/wp-content/uploads/2022/06/march2022-FeesNotice712Spanish.pdf">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/light/register.svg" alt="" />
					<span>Aviso de Cuotas Escolares Para Familias de Estudiantes</span>
				</a>
			</li>
			<li lang="es">
				<a href="https://provo.edu/wp-content/uploads/2022/06/march22-FeeWaiverApplication712Spanish.pdf">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/light/register.svg" alt="" />
					<span>Solicitud de Exención de Cuotas</span>
				</a>
			</li>
		</ul>

</aside>
