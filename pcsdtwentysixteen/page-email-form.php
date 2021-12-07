<?php
	get_header();
	$staff_member = $_GET['staff'];
	$prefillsubject = $_GET['subject'];
	$prefillfrom = $_GET['from'];
	$prefillcarbon = $_GET['carbon'];
	$prefillsenderphone = $_GET['senderphone'];
	$prefillmessage = $_GET['message'];
?>
     <main id="mainContent">

   		<section class="content page contact">
   		<?php custom_breadcrumbs(); ?>
   			<article id="activePost" class="activePost emailForm">
   				<h2>Contact <?php echo get_the_title($staff_member); ?></h2>
					<form action="https://provo.edu/email-sent/" method='post' id="emailForm" class="emailForm">
						<label for="from">From: </label>
						<input type="email" id="from" name="senderemail" placeholder="username@example.com" <?php if(!empty($prefillfrom)) { echo 'value="' . $prefillfrom . '"';} ?> required>
						<label for="fromPhone">Phone: </label>
						<input type="tel" id="fromPhone" name="senderphone" placeholder="801-374-4800 (Optional)" <?php if(!empty($prefillsenderphone)) { echo 'value="' . $prefillsenderphone . '"';} ?>>
						<label for="to_staff">To: </label>
						<input type="text" name="to_staff" value="<?php echo get_the_title($staff_member); ?>" readonly>
						<label for="subject">Subject: </label>
						<input id="subject" name="subject" <?php if(!empty($prefillsubject)) { echo 'value="' . $prefillsubject . '"';} ?>>
						<label for="message">Message: </label>
						<textarea id="message" name="message" minlength="15" placeholder="What would you like to say..." required><?php if(!empty($prefillmessage)) { echo $prefillmessage;} ?></textarea>
						<input type="checkbox" name="carbon" <?php if(!empty($prefillcarbon)) { echo 'checked';} ?>><p>Send a copy to my address</p>
						<label for="staff_id"></label><input type="hidden" id="staff_id" name="staff_id" value="<?php echo $staff_member; ?>" readonly>
						<input type="checkbox" name="sanity" id="sanity" class="hidden" unchecked><label for="sanity" class="hidden">sanity check</label>
						<input type="submit" value="Send Message" class="g-recaptcha" >

						<script>
							jQuery("#emailForm").submit(function(e) {
								if(!jQuery('#sanity:unchecked').length) {
									alert("Are you a robot?");
									//stop the form from submitting
									return false;
								}
								return true;
							});
						</script>

						<!--

						<input class="g-recaptcha" data-sitekey="6LckCL0ZAAAAAGx733fhC7SB8zd3s_aczlGdlnvT" data-callback='onSubmit' value="Send Message" type="submit">
						<script src="https://www.google.com/recaptcha/api.js"></script>

												<script>
													   function onSubmit(token) {
														 document.getElementById("emailForm").submit();
													   }
													   function onClick(e) {
														   e.preventDefault();
														   grecaptcha.ready(function() {
															 grecaptcha.execute('6LckCL0ZAAAAAGx733fhC7SB8zd3s_aczlGdlnvT', {action: 'submit'}).then(function(token) {
																 // Add your logic to submit to your backend server here.
															 });
														   });
														 }
												 </script>
						-->
					</form>

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
