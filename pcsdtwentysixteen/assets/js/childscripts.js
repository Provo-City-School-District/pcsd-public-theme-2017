/*
=============================================================================================================
I am Click to toggle
=============================================================================================================
*/
jQuery(".iambutton").click( function() {
	var e=window.event||e;
	if (jQuery(window).width() > 685) {
		e.preventDefault();
	}
	jQuery('.on').not(this).removeClass('on');
	jQuery(this).toggleClass("on");
	//jQuery('html').animate({scrollTop: jQuery(this)},'fast');
	//add removable with delay after hover leaves the iAM buttons
	/*
	 mouseTrackEvent.addEventListener('mouseleave', e =>
	 {
		  iAmMenuTimeout = setTimeout(function() {
			jQuery(".iambutton").removeClass('on');
		 }, 1000);
	 });
	 */
});

//Clicking the X on the alert will close the alert section. it will also set a cookie with the name "alert"
jQuery(".closeAlert").click(function() {
	jQuery(".alerts").css("display", "none");
	setcookie('alert');
});
//function used to read cookies in browser
function getCookie(cName) {
	  const name = cName + "=";
	  const cDecoded = decodeURIComponent(document.cookie); //to be careful
	  const cArr = cDecoded .split('; ');
	  let res;
	  cArr.forEach(val => {
		  if (val.indexOf(name) === 0) res = val.substring(name.length);
	  })
	  return res;
}
//if a cookie named "alert" exists the alert box will automatically close
if (getCookie('alert')) {
  // Re-direct to this page
  jQuery(".alerts").css("display", "none");
}

/*
=============================================================================================================
keeps Alerts on top of Iambuttons if active, but Iam above alerts if not active
=============================================================================================================
jQuery('#distAlerts').click(function() {
	if(jQuery('.theAlerts').hasClass('active')) {
		jQuery('#iAmMenu').css('z-index','600');
	} else {
		jQuery('#iAmMenu').css('z-index','1100');
	}
});
/*
=============================================================================================================
Set cookie that expires at the end of the day
=============================================================================================================
*/
function setcookie(cname,cvalue)
{
	//expire in a year
	//var d = new Date();
	//d.setTime(d.getTime() + (24 * 60 * 60 * 1000 * 7));
	//var expires = "expires="+d.toUTCString();
	//expire at midnight the following day

    var now = new Date();
    var expire = new Date();

    expire.setFullYear(now.getFullYear());
    expire.setMonth(now.getMonth());
    expire.setDate(now.getDate()+1);
    expire.setHours(0);
    expire.setMinutes(0);
    expire.setSeconds(0);

    var expires = "expires="+expire.toString();
    document.cookie = cname + "=" + cvalue + "; " + expires +"; path=/";
}
/*
=============================================================================================================
If I am button is active, change news zindex so that it goes behind the pop up box
=============================================================================================================
*//*
jQuery(function(){
	if(jQuery('body').hasClass('.page-template-template-FrontPage')){
		var newsid = document.getElementById("homeNews");
		document.getElementById("iAmMenu").onclick = function() {
			if (newsid.style.zIndex != "800") {
				document.getElementById("homeNews").style.zIndex = "800";
			}else {
				document.getElementById("homeNews").style.zIndex = "875";
			}
		}
	}
});
/*
=============================================================================================================
If cookie alertcookie is found strip active tag from active alerts
=============================================================================================================
*/
jQuery(document).ready(function(){
	if (Cookies.get('alertcookie') == "yes") {
		jQuery("#distAlerts .theAlerts").removeClass("active");
	}
})
/*
=============================================================================================================
Recaptcha
=============================================================================================================
*/
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
/*
==================================================================================================
email helpdesk form
==================================================================================================
*/
//var bannedDomains = ["spam.com", "provo.edu"];
//document.addEventListener( 'wpcf7submit', function( event ) {
//	  if ( '51410' == event.detail.contactFormId ) {
//		//alert( "The contact form ID is 51410." );
//		if( 'your-email' )
		// do something productive
//	  }
//	}, false );
/*
==================================================================================================
school demo page
https://provo.edu/school-demographics/
==================================================================================================

var schoolDemo = document.getElementsByClassName("demographics");
var schoolDemoCounter;
for( schoolDemoCounter = 0; schoolDemoCounter < schoolDemo.length; schoolDemoCounter++ ){
	schoolDemo[schoolDemoCounter].addEventListener("click", function(e) {
		// Toggle between adding and removing the "active" class,
		//to highlight the button that controls the panel
		if( jQuery(e.target).is('a') || jQuery(e.target).is('.active img') || jQuery(e.target).is('li') ) {

		} else {
			this.classList.toggle("active");
		}
	});
}
*/
/*
==================================================================================================
make video on home page autoplay despite browser controls
==================================================================================================
*/
var autoPlayVideo = document.getElementById("heroVideo");
autoPlayVideo.oncanplaythrough = function() {
	autoPlayVideo.muted = true;
	autoPlayVideo.play();
	autoPlayVideo.pause();
	autoPlayVideo.play();
}
