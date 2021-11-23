<?php

	//get info from post request and sanitizes the inputs
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$from = test_input($_POST['senderemail']);
		//make email all lower case for validation
		$from = strtolower($from);
		$staff_id = test_input($_POST['staff_id']);
		$subject = test_input($_POST['subject']);
		$submitmessage = test_input($_POST['message']);
		$carbon = test_input($_POST['carbon']);
		$phone = test_input($_POST['senderphone']);
	}
	//input validation function
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	$email_blacklist = array('vetus_republic_iii_percent@protonmail.com','bademail@gmail.com', 'bayville@gmail.com');
	if (array_search($from, $email_blacklist) !== false) {
		?>
		<p>Message delivery failed...error h!fbcak</p>
		<p><a href="https://provo.edu/district-office-directory/email-form/?staff=<?php echo $_POST['staff_id'] . '&subject=' . $_POST['subject'] . '&from=' . $_POST['senderemail'] . '&carbon=' . $_POST['carbon'] . '&senderphone=' . $_POST['senderphone'] . '&message=' . $_POST['message']; ?>">Go back to the previous email form to try and send again</a></p>	
		<?php
		die();
	}
	get_header();
?>
     <main id="mainContent">
   		<section class="content page contact">
   		<?php custom_breadcrumbs(); ?>
   			<article id="activePost" class="activePost">
   				<?php
				   if(strpos($from, 'safffsmail') !== false ){
					   echo('not a valid email');
				   } else {
					//checks if the email input is a district email
					   if(strpos($from, '@provo.edu') !== false || strpos($from, '@st.provo.edu') !== false || strpos($from, '@stu.provo.edu') !== false){
						   echo "this email form is for non district patrons only. Please use your district email to contact district employees";
					   } else {
						   //fetch destination email from database					
							$to = get_post_field( 'email', $staff_id);
						
						//build email headers
							$subject = 'From: ' . $from . ' - ' . $subject;
							$headers[] = 'From: PCSD Website <donotreply@provo.edu>';	
							$headers[] = 'Reply-To: ' . $from;				
							$headers[] = 'Bcc: ' . $to;
							//if user requested email cc
							if($carbon == 'on') {
								$headers[] = 'Bcc: ' . $from;
							}
						
						//email body message
							$newPhone = '('.substr_replace($phone, ')', 3, 0);
							$emailedmessage = 
								'This message was submitted through the District Website:' . "\r\n\r\n" . 
								$submitmessage . "\r\n\r\n" . 
								"Return Phone: " . $newPhone . "\r\n\r\n" . 
								'Please DO NOT respond to this email.  This account is for incoming messages only! You can contact the person who sent this message at: ' . $from;	
						
						//send mail
							if(wp_mail( null, $subject, $emailedmessage, $headers)) {
								echo('Your Message successfully sent!');
								echo'<script>setTimeout(function(){window.location.href="https://provo.edu"},15000);</script>';
								
							} else {
								?>
								<p>Message delivery failed...Please Contact inform the web team via the <a href="https://provo.edu/website-feedback/">Website Feedback Form</a></p>
								<p><a href="https://provo.edu/district-office-directory/email-form/?staff=<?php echo $_POST['staff_id'] . '&subject=' . $_POST['subject'] . '&from=' . $_POST['senderemail'] . '&carbon=' . $_POST['carbon'] . '&senderphone=' . $_POST['senderphone'] . '&message=' . $_POST['message']; ?>">Go back to the previous email form to try and send again</a></p>	
								<?php
							   }
							   	
					   }   
				   }
				?>
				<script>
					if ( window.history.replaceState ) {
					  window.history.replaceState( null, null, window.location.href );
					}
					</script>
				<div class="clear"></div>
   			</article>
   		</section>
   		<?php
	   		$sidebar = get_field('sidebar');
	   		get_sidebar( $sidebar );
	   	?>
   </main>
<?php
	get_footer();
?>
