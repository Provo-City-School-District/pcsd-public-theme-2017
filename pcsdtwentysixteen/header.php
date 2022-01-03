<!DOCTYPE html>
<html <?php if(is_page([10048,2868,2871,9131,9906])) {?>
    lang="es"
    <?php
} else {
    language_attributes();
}
	?>>
  <head>
<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-34304269-3"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		  gtag('config', 'UA-34304269-3');
		</script>
	<meta charset="utf-8" />
    <title><?php if (is_home() ) {?>News | <?php } ?><?php if (is_page() ) {the_title();?> | <?php } ?><?php if ( is_single() ) {the_title(); ?> | <?php } ?><?php bloginfo('name'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:600" rel="stylesheet">
<!--end Fonts -->
	<link rel="stylesheet" type="text/css" href="https://globalassets.provo.edu/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="https://globalassets.provo.edu/slick/slick-theme.css"/>
<!-- Favicon Code -->
	<link rel="apple-touch-icon" sizes="180x180" href="//globalassets.provo.edu/image/favicons/public/apple-touch-icon.png">
	<link rel="icon" type="image/png" href="//globalassets.provo.edu/image/favicons/public/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="//globalassets.provo.edu/image/favicons/public/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="//globalassets.provo.edu/image/favicons/public/manifest.json">
<!-- Favicon End -->
	<link rel="mask-icon" href="//globalassets.provo.edu/image/favicons/public/safari-pinned-tab.svg">
	<meta name="theme-color" content="#ffffff ">
	<?php
		if (has_post_thumbnail()) {
	?>
			<meta property="og:image" content="<?php echo get_the_post_thumbnail_url(); ?>" />
	<?php
		} else {
	?>
			<meta property="og:image" content="https://provo.edu/wp-content/uploads/2018/03/provo-school-district-logo.jpg" />
	<?php
		}
	?>
	<?php wp_head(); ?>
	<link href="https://customer.cludo.com/css/templates/v1.1/essentials/cludo-search.min.css" type="text/css" rel="stylesheet">
  </head>
  <body <?php body_class(); ?>>
	  <a href="#mainContent" class="skip-nav-link">
	  	skip navigation
	  </a>
	  <header id="mainHeader">
		<section id="covidBranding">
			<a href="https://provo.edu/covid-19-updates/covid-19-summary/">Provo City School District Covid-19 Updates</a>
		</section>
	   <a href="<?php echo home_url(); ?>"><img srcset="//globalassets.provo.edu/image/logos/pcsd-logo-website-header-half.png 103w, //globalassets.provo.edu/image/logos/pcsd-logo-website-header.png 205w, //globalassets.provo.edu/image/logos/pcsd-logo-website-header-x2.png 410w"  src="//globalassets.provo.edu/image/logos/pcsd-logo-website-header.png" alt="Provo City School District Home" class="districtLogo" /></a>
		<?php
			/*
			<ul class="contactinfo" itemscope itemtype="https://schema.org/PostalAddress"><!-- Contact Information -->
				<li>Provo City School District</li>
				<li><span itemprop="streetAddress">280 West 940 North</span></li>
				<li><span itemprop="addressLocality">Provo</span>, <span itemprop="addressRegion">Utah</span> <span itemprop="postalCode">84604</span></li>
				<li><span itemprop="telephone">(801) 374-4800</span></li>
				<!-- <li><span itemprop="faxNumber">Fax: (801) 374-4808</span></li> -->
			</ul><!-- End Contact Information -->
			*/
		?>
		<input type="checkbox" id="reveal-menu" role="button">
		<label class="mobileMenu" for="reveal-menu" onclick><img src="//globalassets.provo.edu/image/icons/hamburger-dk.svg" alt="" />Menu</label>
	  <nav id="mainNav" itemscope itemtype="https://schema.org/PostalAddress">
		  <?php get_template_part( 'mainmenu'); ?>
		  <p class="headerPhone"><span itemprop="streetAddress">280 West 940 North Provo, Utah </span><span itemprop="telephone">801-374-4800</span></p>
	 </nav>
	   <aside class="websiteSearch">
		   <form id="cludo-search-form" action="/" method="get" autocomplete="off"><!-- Search Form -->
				  <label for="s" class="visuallyhidden" id="websitesearch">Website Search: </label>
				  <input class="search-input" aria-labelledby="websitesearch" id="s" name="s" type="text" value="<?php the_search_query(); ?>" placeholder="Search Provo.edu" />
				  <input class="search-submit search-icon" type="submit" value="Search" />
		   </form> <!-- end Search Form -->
	   </aside>
   </header><!-- end mainHeader -->
<?php
