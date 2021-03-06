<?php
/*==========================================================================================
Theme Setup
============================================================================================*/
function pcsd_scripts_styles() {
	/*   REGISTER ALL JS FOR SITE */
	wp_register_script( 'slick_slider', 'https://globalassets.provo.edu/slick/slick.min.js', array('jquery'), '1.0.1', true);
	wp_register_script( 'mega_menu', 'https://globalassets.provo.edu/js/jquery-accessibleMegaMenu.js', array('jquery'), '1.0.1', true);
	wp_register_script( 'cookie_script', 'https://globalassets.provo.edu/js/cookie.js', array('jquery'), '1.0.1', true);
	wp_register_script( 'global_scripts', get_template_directory_uri() .'/assets/js/parentscripts.js', array('jquery', 'mega_menu','slick_slider'), '1.0.1', true);
	wp_register_script( 'my_custom_scripts',get_template_directory_uri() .'/assets/js/childscripts.js', array('cookie_script','mega_menu','global_scripts'), '1.0.1', true);
	wp_register_script( 'linkDetection',get_template_directory_uri() .'/assets/js/linkDetection.js', '','1.0.1', true);
	wp_register_script( '404easterEgg', 'https://globalassets.provo.edu/js/404.js', '', '1.0.1', true );

	/*   REGISTER ALL CSS FOR SITE */
	/*   CALL ALL CSS AND SCRIPTS FOR SITE */
	wp_enqueue_style( 'parent_styles', get_template_directory_uri() . '/assets/css/parent-styles.css','','1.0.05', false);

	wp_enqueue_style( 'theme_stylesheet', get_stylesheet_uri(), array('parent_styles'), '1.0.1', false);

	wp_enqueue_script( 'slick_slider');
	wp_enqueue_script( 'mega_menu');
	wp_enqueue_script( 'cookie_script');
	wp_enqueue_script( 'global_scripts');
	wp_enqueue_script( 'my_custom_scripts');
	//load front page specific style sheet
	if ( is_front_page() ) {
		wp_enqueue_style( 'front_page', get_template_directory_uri() . '/assets/css/frontpage.css', array(),'1.0.1', false);
	}
	//does not load the link Detection script on menu pages
	if ( !is_page(array(4150,4148,4142,22494)) ) {
		wp_enqueue_script( 'linkDetection');
	}
	if ( is_404() ) {
		wp_enqueue_script( '404easterEgg');
	}
	if( is_page_template( 'template-department-staticmedia.php' )) {
		wp_enqueue_style( 'tile_styles', get_template_directory_uri() . '/assets/css/department-styles.css','1.0.1', false);
		wp_enqueue_style( 'parent_styles_2022', get_template_directory_uri() . '/assets/css/2022-parent-styles.css','1.0.1', false);
	}
}
add_action('wp_enqueue_scripts', 'pcsd_scripts_styles', 9999);

// Remove type from scripts and styles
add_filter('style_loader_tag', 'codeless_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'codeless_remove_type_attr', 10, 2);
function codeless_remove_type_attr($tag, $handle) {
	return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}
// Enable Featured Images
add_theme_support( 'post-thumbnails' );

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
/*==========================================================================================
// Main Menu Template pulls
============================================================================================*/
//[ourdistrict]
function ourdistrict_func() {
	get_template_part( 'template-parts/mega-menu-dropdowns', 'ourDistrict');
}
add_shortcode( 'ourdistrict', 'ourdistrict_func' );

//[departmentmenu]
function departmentMenu_func() {
	get_template_part( 'template-parts/mega-menu-dropdowns', 'departments');
}
add_shortcode( 'departmentmenu', 'departmentMenu_func' );
/*==========================================================================================
// Favicon
============================================================================================*/
function pcsd_add_favicon(){ ?>
	<!-- Custom Favicons -->
		<link rel="apple-touch-icon" sizes="180x180" href="//globalassets.provo.edu/image/favicons/public/apple-touch-icon.png">
		<link rel="icon" type="image/png" href="//globalassets.provo.edu/image/favicons/public/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="//globalassets.provo.edu/image/favicons/public/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="//globalassets.provo.edu/image/favicons/public/manifest.json">
		<link rel="mask-icon" href="//globalassets.provo.edu/image/favicons/public/safari-pinned-tab.svg">
	<?php }
//add the favicon link to the live site head
add_action('wp_head','pcsd_add_favicon');
//add the favicon to the login page
add_action('login_head','pcsd_add_favicon');
/*==========================================================================================
// custom Login Page
============================================================================================*/
function my_custom_login() {
echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/login/custom-login-styles.css" />';
}
add_action('login_head', 'my_custom_login');

function my_login_logo_url() {
return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
return 'Provo City School District';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

/*==========================================================================================
	block WordPress User Enumeration Scans
============================================================================================*/
if (!is_admin()) {
	// default URL format
	if (preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING'])) die();
	add_filter('redirect_canonical', 'shapeSpace_check_enum', 10, 2);
}
function shapeSpace_check_enum($redirect, $request) {
	// permalink URL format
	if (preg_match('/\?author=([0-9]*)(\/*)/i', $request)) die();
	else return $redirect;
}
/*==========================================================================================
Display Modified Date on Dashboard for Posts
============================================================================================*/
// Register Modified Date Column for both posts & pages
function modified_column_register( $columns ) {
	$columns['Modified'] = __( 'Modified Date', 'show_modified_date_in_admin_lists' );
	return $columns;
}
add_filter( 'manage_posts_columns', 'modified_column_register' );
add_filter( 'manage_pages_columns', 'modified_column_register' );

function modified_column_display( $column_name, $post_id ) {
	switch ( $column_name ) {
	case 'Modified':
		global $post;
	       	echo '<p class="mod-date">';
	       	echo '<em>'.get_the_modified_date().' '.get_the_modified_time().'</em><br />';
			echo '<small>' . esc_html__( 'by ', 'show_modified_date_in_admin_lists' ) . '<strong>'.get_the_modified_author().'<strong></small>';
			echo '</p>';
		break; // end all case breaks
	}
}
add_action( 'manage_posts_custom_column', 'modified_column_display', 10, 2 );
add_action( 'manage_pages_custom_column', 'modified_column_display', 10, 2 );

function modified_column_register_sortable( $columns ) {
	$columns['Modified'] = 'modified';
	return $columns;
}
add_filter( 'manage_edit-post_sortable_columns', 'modified_column_register_sortable' );
add_filter( 'manage_edit-page_sortable_columns', 'modified_column_register_sortable' );

//[directory url=""]

function directory_func($atts) {
	$category = shortcode_atts( array(
		'url' => 'something',
		//'bar' => 'something else',
	), $atts );
	$directory_url = "{$category['url']}";
	return file_get_contents($directory_url);
}
add_shortcode( 'directory', 'directory_func' );

/*==========================================================================================
Add Length Column to the Wordpress Dashboard
============================================================================================*/

//For Posts

	//Add the Length column, next to the Title column:

add_filter('manage_post_posts_columns', function ( $columns )
{
    $_columns = [];

    foreach( (array) $columns as $key => $label )
    {
        $_columns[$key] = $label;
        if( 'title' === $key )
            $_columns['wpse_post_content_length'] = __( 'Length' );
    }
    return $_columns;
} );

	//Fill that column with the post content length values:

add_action( 'manage_post_posts_custom_column', function ( $column_name, $post_id )
{
    if ( $column_name == 'wpse_post_content_length')
        echo mb_strlen( get_post( $post_id )->post_content );

}, 10, 2 );

	//Make our Length column orderable:

add_filter( 'manage_edit-post_sortable_columns', function ( $columns )
{
  $columns['wpse_post_content_length'] = 'wpse_post_content_length';
  return $columns;
} );
	//Finally we implement the ordering through the posts_orderby filter:

add_filter( 'posts_orderby', function( $orderby, \WP_Query $q )
{
    $_orderby = $q->get( 'orderby' );
    $_order   = $q->get( 'order' );

    if(
           is_admin()
        && $q->is_main_query()
        && 'wpse_post_content_length' === $_orderby
        && in_array( strtolower( $_order ), [ 'asc', 'desc' ] )
    ) {
        global $wpdb;
        $orderby = " LENGTH( {$wpdb->posts}.post_content ) " . $_order . " ";
    }
    return $orderby;
}, 10, 2 );

//For Pages

	//Add the Length column, next to the Title column:

add_filter('manage_page_posts_columns', function ( $columns )
{
    $_columns = [];

    foreach( (array) $columns as $key => $label )
    {
        $_columns[$key] = $label;
        if( 'title' === $key )
            $_columns['wpse_post_content_length'] = __( 'Length' );
    }
    return $_columns;
} );

	//Fill that column with the post content length values:

add_action( 'manage_page_posts_custom_column', function ( $column_name, $post_id )
{
    if ( $column_name == 'wpse_post_content_length')
        echo mb_strlen( get_post( $post_id )->post_content );

}, 10, 2 );

	//Make our Length column orderable:

add_filter( 'manage_edit-page_sortable_columns', function ( $columns )
{
  $columns['wpse_post_content_length'] = 'wpse_post_content_length';
  return $columns;
} );
	//Finally we implement the ordering through the posts_orderby filter:

add_filter( 'posts_orderby', function( $orderby, \WP_Query $q )
{
    $_orderby = $q->get( 'orderby' );
    $_order   = $q->get( 'order' );

    if(
           is_admin()
        && $q->is_main_query()
        && 'wpse_post_content_length' === $_orderby
        && in_array( strtolower( $_order ), [ 'asc', 'desc' ] )
    ) {
        global $wpdb;
        $orderby = " LENGTH( {$wpdb->posts}.post_content ) " . $_order . " ";
    }
    return $orderby;
}, 10, 2 );
//Notes

//If you want to target other post types, than we just have to modify the

//manage_post_posts_columns         -> manage_{POST_TYPE}_posts_columns
//manage_post_posts_custom_column   -> manage_{POST_TYPE}_posts_custom_column
//manage_edit-post_sortable_columns -> manage_edit-{POST_TYPE}_sortable_columns

//where POST_TYPE is the wanted post type.

/*==========================================================================================
add email column to Directory post type
stack thread -> https://stackoverflow.com/questions/54581263/sortable-custom-column-using-acf-pro-select-field-in-wordpress-admin-for-post-li/70628121#70628121
============================================================================================*/

add_filter('manage_directory_posts_columns', 'filter_directory_custom_columns');

function filter_directory_custom_columns($columns) {
	$columns['email'] = 'Email';
	return $columns;
}

add_action('manage_directory_posts_custom_column',  'action_directory_custom_columns');

function action_directory_custom_columns($column) {
	global $post;
	if($column == 'email') {
		$directoryfields = get_fields($post->ID);
		echo $directoryfields['email'];
	}
}

add_filter( 'manage_edit-directory_sortable_columns', 'sortable_directory_custom_columns' );

function sortable_directory_custom_columns( $columns ) {
	$columns['email'] = 'email';
	return $columns;
}
add_action( 'pre_get_posts', 'directory_orderby' );
function directory_orderby( $query ) {
	if( ! is_admin() )
		return;
	$orderby = $query->get( 'orderby');
	if( 'email' == $orderby ) {
		$query->set('meta_key','email');
		$query->set('orderby','meta_value');
	}
}

/*==========================================================================================
Custom Post Types
============================================================================================*/
function cptui_register_my_cpts_announcement() {

	/**
	 * Post Type: Announcements.
	 */

	$labels = [
		"name" => __( "Announcements", "custom-post-type-ui" ),
		"singular_name" => __( "Announcement", "custom-post-type-ui" ),
		"menu_name" => __( "Announcements", "custom-post-type-ui" ),
		"all_items" => __( "All Announcements", "custom-post-type-ui" ),
		"add_new" => __( "Add Announcement", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Announcements", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "announcement", "with_front" => true ],
		"query_var" => true,
		"menu_position" => 5,
		"menu_icon" => "https://globalassets.provo.edu/image/icons/pcsd-icon-16x16.png",
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "announcement", $args );
}

add_action( 'init', 'cptui_register_my_cpts_announcement' );

function cptui_register_my_cpts() {
	/**
	 * Post Type: Directory Pages.
	 */

	$labels = [
		"name" => __( "Directory Pages", "custom-post-type-ui" ),
		"singular_name" => __( "Directory Page", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Directory Pages", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "directory_page", "with_front" => true ],
		"query_var" => true,
		"menu_position" => 7,
		"menu_icon" => "https://globalassets.provo.edu/image/icons/pcsd-icon-16x16.png",
		"supports" => [ "title", "thumbnail", "page-attributes" ],
	];

	register_post_type( "directory_page", $args );

	/**
	 * Post Type: Directory.
	 */

	$labels = [
		"name" => __( "Directory", "custom-post-type-ui" ),
		"singular_name" => __( "Directory", "custom-post-type-ui" ),
		"featured_image" => __( "Staff Photo", "custom-post-type-ui" ),
		"set_featured_image" => __( "Set Staff Photo", "custom-post-type-ui" ),
		"remove_featured_image" => __( "Remove Staff Photo", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Directory", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => [ "slug" => "directory", "with_front" => true ],
		"query_var" => true,
		"menu_position" => 6,
		"menu_icon" => "https://globalassets.provo.edu/image/icons/pcsd-icon-16x16.png",
		"supports" => [ "title", "thumbnail" ],
	];

	register_post_type( "directory", $args );










	/**
	 * Post Type: Tech FAQs.
	 */

	$labels = [
		"name" => __( "Tech FAQs", "custom-post-type-ui" ),
		"singular_name" => __( "Tech FAQ", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Tech FAQs", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => [ "slug" => "tech_faq", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "https://employee.provo.edu/wp-content/themes/employeepcsdtwentysixteen/assets/icons/pcsd-icon-16x16.png",
		"supports" => [ "title", "editor", "thumbnail" ],
	];

	register_post_type( "tech_faq", $args );

	/**
	 * Post Type: Internship Locations
	 */

	$labels = [
		"name" => __( "Internship Locations", "custom-post-type-ui" ),
		"singular_name" => __( "Internship Locations", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Internship Locations", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "internship_locations", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "https://globalassets.provo.edu/image/icons/pcsd-icon-16x16.png",
		"supports" => [ "title" ],
	];

	register_post_type( "internship_locations", $args );


	/**
	 * Post Type: Digital Signage.
	 */

	$labels = [
		"name" => __( "Digital Signage", "sunset-child" ),
		"singular_name" => __( "Digital Signage", "sunset-child" ),
	];

	$args = [
		"label" => __( "Digital Signage", "sunset-child" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "digital_signage", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "https://globalassets.provo.edu/image/icons/pcsd-icon-16x16.png",
		"supports" => [ "title" ],
	];

	register_post_type( "digital_signage", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );



//add ID column to Directory Categories
add_filter( "manage_edit-directory_category_columns",          	'my_add_col' );
add_filter( "manage_edit-directory_category_sortable_columns", 	'my_add_col' );
add_filter( "manage_directory_category_custom_column",         	'my_tax_id', 10, 3 );


function my_add_col( $new_columns ) {
    $new_columns = array(
        'cb' => '<input type="checkbox" />',
        'name'   => __('Name'),
        'tax_id' => 'ID',
        'slug'   => __('Slug'),
        'posts'  => __('Posts')

    );

    return $new_columns;
}
//propagate the Tax ID on the Directory Categories when its listed in the dashboard
function my_tax_id( $value, $name, $id ) {
    return 'tax_id' === $name ? $id : $value;
}

//custom filter for Technology form to check to see if the person inputing info is using a district email and then stopping and referring them to the Helpdesk instead. https://provo.edu/technology-home-support-form/
add_filter( 'wpcf7_validate_email*', 'custom_email_confirmation_validation_filter', 20, 2 );

function custom_email_confirmation_validation_filter( $result, $tag ) {
  if ( 'your-email' == $tag->name ) {
	$your_email = isset( $_POST['your-email'] ) ? trim( $_POST['your-email'] ) : '';
	//$your_email_confirm = isset( $_POST['your-email-confirm'] ) ? trim( $_POST['your-email-confirm'] ) : '';

	if (strpos($your_email, '@provo.edu')) {
	  $result->invalidate( $tag, "This form is for Student and Parents only. Please refer to Technology Support to submit a work order" );
	}
  }
  return $result;
}

/*
=============================================================================================
define allowed block types
=============================================================================================
*/
add_filter( 'allowed_block_types', 'pcsd_allowed_block_types' );

function pcsd_allowed_block_types( $allowed_blocks ) {
	return array(
		'core/paragraph',
		'core/image',
		'core/heading',
		'core/gallery',
		'core/list',
		'core/audio',
		'core/video',
		'core/table',
		'core/text-columns', // ??? Columns
		'core/buttons',
		//'core/quote', - need styling
		//'core/cover', //(previously core/cover-image)
		//'core/file', - we want to take a closer look at this one later
		//'core/verse', - revisit
		//'core/code', - needs styling
		//'core/freeform', // ??? Classic
		//'core/html', // ??? Custom HTML
		//'core/preformatted',
		//'core/pullquote', - revisit
		//(Deprecated) 'core/subhead', ??? Subheading
		//'core/media-text', // ??? Media and Text Revisit this one later
		//'core/more',
		//'core/nextpage', //??? Page break
		//'core/separator',
		//'core/spacer',
		//'core/shortcode',
		//'core/archives',
		'core/categories',
		//'core/latest-comments',
		//'core/latest-posts',
		//'core/calendar',
		//'core/rss',
		//'core/search',
		//'core/tag-cloud',
		//'core/embed',
		//'core-embed/twitter',
		//'core-embed/youtube',
		//'core-embed/facebook',
		//'core-embed/instagram',
		//'core-embed/wordpress',
		//'core-embed/soundcloud',
		//'core-embed/spotify',
		//'core-embed/flickr',
		//'core-embed/vimeo',
		//'core-embed/animoto',
		//'core-embed/cloudup',
		//'core-embed/collegehumor',
		//'core-embed/dailymotion',
		//'core-embed/funnyordie',
		//'core-embed/hulu',
		//'core-embed/imgur',
		//'core-embed/issuu',
		//'core-embed/kickstarter',
		//'core-embed/meetup-com',
		//'core-embed/mixcloud',
		//'core-embed/photobucket',
		//'core-embed/polldaddy',
		//'core-embed/reddit',
		//'core-embed/reverbnation',
		//'core-embed/screencast',
		//'core-embed/scribd',
		//'core-embed/slideshare',
		//'core-embed/smugmug',
		//'core-embed/speaker',
		//'core-embed/ted',
		//'core-embed/tumblr',
		//'core-embed/videopress',
		//'core-embed/wordpress-tv'
	);
}
/*
=============================================================================================
register or unregister block patterns
=============================================================================================
*/
function my_plugin_unregister_my_patterns() {
	  remove_theme_support('core-block-patterns');
	  unregister_block_pattern_category('columns');
	  unregister_block_pattern_category('gallery');
	  unregister_block_pattern_category('text');
  }
add_action( 'init', 'my_plugin_unregister_my_patterns' );
/*-------------------------------------------------------*/
// "I am" Button Menu
/*-------------------------------------------------------*/
//[iamMenuparent]
function iamMenuparent_func() {
	get_template_part( 'template-parts/iam', 'parent');
}
add_shortcode( 'iamMenuparent', 'iamMenuparent_func' );

//[iamMenustudent]
function iamMenustudent_func() {
	get_template_part( 'template-parts/iam', 'student');
}
add_shortcode( 'iamMenustudent', 'iamMenustudent_func' );

//[iamMenuemployee]
function iamMenuemployee_func() {
	get_template_part( 'template-parts/iam', 'employee');
}
add_shortcode( 'iamMenuemployee', 'iamMenuemployee_func' );
/*======================================================================================================================================================================================
Custom Post Types
======================================================================================================================================================================================*/

//Custom Post Type Variables
$pcsd_custom_post_type_icon = "https://globalassets.provo.edu/image/icons/pcsd-icon-16x16.png";

/*===========================================================================================
Post Type: Schools.
	This is where the School Demographics page is managed
	https://provo.edu/school-demographics/
===========================================================================================*/
$schools_labels = [
	"name" => __( "Schools", "custom-post-type-ui" ),
	"singular_name" => __( "School", "custom-post-type-ui" ),
	"featured_image" => __( "School Photo", "custom-post-type-ui" ),
	"set_featured_image" => __( "Remove School Photo", "custom-post-type-ui" ),
	"remove_featured_image" => __( "Use School Photo", "custom-post-type-ui" ),
];

$schools_args = [
	"label" => __( "Schools", "custom-post-type-ui" ),
	"labels" => $schools_labels,
	"description" => "",
	"public" => true,
	"publicly_queryable" => false,
	"show_ui" => true,
	"show_in_rest" => true,
	"rest_base" => "",
	"rest_controller_class" => "WP_REST_Posts_Controller",
	"has_archive" => false,
	"show_in_menu" => true,
	"show_in_nav_menus" => true,
	"delete_with_user" => false,
	"exclude_from_search" => false,
	"capability_type" => "post",
	"map_meta_cap" => true,
	"hierarchical" => true,
	"rewrite" => [ "slug" => "schools", "with_front" => true ],
	"query_var" => true,
	"menu_icon" => $pcsd_custom_post_type_icon,
	"supports" => [ "title", "thumbnail" ],
	"taxonomies" => [ "school_fees_categories" ],
];

register_post_type( "schools", $schools_args );

/*===========================================================================================
Post Type: School Fees
===========================================================================================*/
$school_fees_labels = [
	"name" => __( "School Fees", "custom-post-type-ui" ),
	"singular_name" => __( "School fee", "custom-post-type-ui" ),
];

$school_fees_args = [
	"label" => __( "School Fees", "custom-post-type-ui" ),
	"labels" => $school_fees_labels,
	"description" => "",
	"public" => true,
	"publicly_queryable" => true,
	"show_ui" => true,
	"show_in_rest" => true,
	"rest_base" => "",
	"rest_controller_class" => "WP_REST_Posts_Controller",
	"has_archive" => false,
	"show_in_menu" => true,
	"show_in_nav_menus" => true,
	"delete_with_user" => false,
	"exclude_from_search" => false,
	"capability_type" => "post",
	"map_meta_cap" => true,
	"hierarchical" => false,
	"rewrite" => [ "slug" => "school_fees", "with_front" => true ],
	"query_var" => true,
	"menu_icon" => $pcsd_custom_post_type_icon,
	"supports" => [ "title", "thumbnail" ],
	"taxonomies" => [ "school_fees_categories" ],
];

//register_post_type( "school_fees", $school_fees_args );

/*===========================================================================================
Post Type: School Fees 21-22
===========================================================================================*/

$school_fees_2122_labels = [
	"name" => __( "School Fees 2021-2022", "custom-post-type-ui" ),
	"singular_name" => __( "School Fee 2021-2022", "custom-post-type-ui" ),
];

$school_fees_2122_args = [
	"label" => __( "School Fees 2021-2022", "custom-post-type-ui" ),
	"labels" => $school_fees_2122_labels,
	"description" => "",
	"public" => true,
	"publicly_queryable" => true,
	"show_ui" => true,
	"show_in_rest" => true,
	"rest_base" => "",
	"rest_controller_class" => "WP_REST_Posts_Controller",
	"has_archive" => false,
	"show_in_menu" => true,
	"show_in_nav_menus" => true,
	"delete_with_user" => false,
	"exclude_from_search" => false,
	"capability_type" => "post",
	"map_meta_cap" => true,
	"hierarchical" => false,
	"rewrite" => [ "slug" => "school_fees_21-22", "with_front" => true ],
	"query_var" => true,
	"menu_icon" => $pcsd_custom_post_type_icon,
	"supports" => [ "title", "thumbnail" ],
	"taxonomies" => [ "school_fees_categories" ],
];

register_post_type( "school_fees_21-22", $school_fees_2122_args );

/*===========================================================================================
Post Type: School Fees 22-23
===========================================================================================*/

$school_fees_2223_labels = [
	"name" => __( "School Fees 2022-2023", "custom-post-type-ui" ),
	"singular_name" => __( "School Fee 2022-2023", "custom-post-type-ui" ),
];

$school_fees_2223_args = [
	"label" => __( "School Fees 2022-2023", "custom-post-type-ui" ),
	"labels" => $school_fees_2223_labels,
	"description" => "",
	"public" => true,
	"publicly_queryable" => true,
	"show_ui" => true,
	"show_in_rest" => true,
	"rest_base" => "",
	"rest_controller_class" => "WP_REST_Posts_Controller",
	"has_archive" => false,
	"show_in_menu" => true,
	"show_in_nav_menus" => true,
	"delete_with_user" => false,
	"exclude_from_search" => false,
	"capability_type" => "post",
	"map_meta_cap" => true,
	"hierarchical" => false,
	"rewrite" => [ "slug" => "school_fees_22-23", "with_front" => true ],
	"query_var" => true,
	"menu_icon" => $pcsd_custom_post_type_icon,
	"supports" => [ "title", "thumbnail" ],
	"taxonomies" => [ "school_fees_categories" ],
];

register_post_type( "school_fees_22-23", $school_fees_2223_args );

/*===========================================================================================
Post Type: School Fees (Spanish) Pagos escolares
===========================================================================================*/

//original
$cuotas_escolares_labels = [
	"name" => __( "Pagos escolares", "custom-post-type-ui" ),
	"singular_name" => __( "Cuotas escolares", "custom-post-type-ui" ),
];

$cuotas_escolares_args = [
	"label" => __( "Pagos escolares", "custom-post-type-ui" ),
	"labels" => $cuotas_escolares_labels,
	"description" => "",
	"public" => true,
	"publicly_queryable" => true,
	"show_ui" => true,
	"show_in_rest" => true,
	"rest_base" => "",
	"rest_controller_class" => "WP_REST_Posts_Controller",
	"has_archive" => false,
	"show_in_menu" => true,
	"show_in_nav_menus" => true,
	"delete_with_user" => false,
	"exclude_from_search" => false,
	"capability_type" => "post",
	"map_meta_cap" => true,
	"hierarchical" => false,
	"rewrite" => [ "slug" => "pagos_escolares", "with_front" => true ],
	"query_var" => true,
	"menu_icon" => $pcsd_custom_post_type_icon,
	"supports" => [ "title", "thumbnail" ],
	"taxonomies" => [ "school_fees_categories" ],
];

//register_post_type( "pagos_escolares", $cuotas_escolares_args );
/*===========================================================================================
Post Type: School Fees 2021-2022 (Spanish) Pagos escolares
===========================================================================================*/
$cuotas_escolares_2122_labels = [
	"name" => __( "Pagos escolares 2021-2022", "custom-post-type-ui" ),
	"singular_name" => __( "Cuotas escolares 2021-2022", "custom-post-type-ui" ),
];

$cuotas_escolares_2122_args = [
	"label" => __( "Pagos escolares 21-22", "custom-post-type-ui" ),
	"labels" => $cuotas_escolares_2122_labels,
	"description" => "",
	"public" => true,
	"publicly_queryable" => true,
	"show_ui" => true,
	"show_in_rest" => true,
	"rest_base" => "",
	"rest_controller_class" => "WP_REST_Posts_Controller",
	"has_archive" => false,
	"show_in_menu" => true,
	"show_in_nav_menus" => true,
	"delete_with_user" => false,
	"exclude_from_search" => false,
	"capability_type" => "post",
	"map_meta_cap" => true,
	"hierarchical" => false,
	"rewrite" => [ "slug" => "pagos_escolares_2122", "with_front" => true ],
	"query_var" => true,
	"menu_icon" => $pcsd_custom_post_type_icon,
	"supports" => [ "title", "thumbnail" ],
	"taxonomies" => [ "school_fees_cate_spanish_2122" ],
];

register_post_type( "pagos_escolares_2122", $cuotas_escolares_2122_args );

/*===========================================================================================
Post Type: School Fees 2022-2023 (Spanish) Pagos escolares
===========================================================================================*/

$cuotas_escolares_2223_labels = [
	"name" => __( "Pagos escolares 2022-2023", "custom-post-type-ui" ),
	"singular_name" => __( "Cuotas escolares 2022-2023", "custom-post-type-ui" ),
];

$cuotas_escolares_2223_args = [
	"label" => __( "Pagos escolares 22-23", "custom-post-type-ui" ),
	"labels" => $cuotas_escolares_2223_labels,
	"description" => "",
	"public" => true,
	"publicly_queryable" => true,
	"show_ui" => true,
	"show_in_rest" => true,
	"rest_base" => "",
	"rest_controller_class" => "WP_REST_Posts_Controller",
	"has_archive" => false,
	"show_in_menu" => true,
	"show_in_nav_menus" => true,
	"delete_with_user" => false,
	"exclude_from_search" => false,
	"capability_type" => "post",
	"map_meta_cap" => true,
	"hierarchical" => false,
	"rewrite" => [ "slug" => "pagos_escolares_2223", "with_front" => true ],
	"query_var" => true,
	"menu_icon" => $pcsd_custom_post_type_icon,
	"supports" => [ "title", "thumbnail" ],
	"taxonomies" => [ "school_fees_cate_spanish_2223" ],
];

register_post_type( "pagos_escolares_2223", $cuotas_escolares_2223_args );
/*======================================================================================================================================================================================
Custom Post Type Taxonomies
======================================================================================================================================================================================*/
function cptui_register_my_taxes() {
	/*===========================================================================================
	Taxonomy: Schools Demographics Listing Categories.
	===========================================================================================*/

	$schools_demo_labels = [
		"name" => __( "Schools Categories", "custom-post-type-ui" ),
		"singular_name" => __( "School Category", "custom-post-type-ui" ),
	];

	$schools_demo_args = [
		"label" => __( "Schools Categories", "custom-post-type-ui" ),
		"labels" => $schools_demo_labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'school', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "school",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
			];
	register_taxonomy( "school", [ "schools" ], $schools_demo_args );

	/*===========================================================================================
	Taxonomy: Directory Categories.
	===========================================================================================*/

	$directory_categories_labels = [
		"name" => __( "Directory Categories", "custom-post-type-ui" ),
		"singular_name" => __( "Directory Category", "custom-post-type-ui" ),
	];

	$directory_categories_args = [
		"label" => __( "Directory Categories", "custom-post-type-ui" ),
		"labels" => $directory_categories_labels,
		"public" => true,
		"publicly_queryable" => false,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'directory_category', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "directory_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
			];
	register_taxonomy( "directory_category", [ "directory" ], $directory_categories_args );

	/*===========================================================================================
	Taxonomy: School Fees Categories.
	===========================================================================================*/

	$school_fees_categories_labels = [
		"name" => __( "School Fees Categories", "custom-post-type-ui" ),
		"singular_name" => __( "School Fee Category", "custom-post-type-ui" ),
	];

	$school_fees_categories_args = [
		"label" => __( "School Fees Categories", "custom-post-type-ui" ),
		"labels" => $school_fees_categories_labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'school_fees_categories', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "school_fees_categories",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
			];
	//register_taxonomy( "school_fees_categories", [ "school_fees" ], $school_fees_categories_args );

	/*===========================================================================================
	Taxonomy: School Fees Categories 21-22
	===========================================================================================*/

	$school_fees_categories_2122_labels = [
		"name" => __( "School Fees Categories 21-22", "custom-post-type-ui" ),
		"singular_name" => __( "School Fee Category 21-22", "custom-post-type-ui" ),
	];

	$school_fees_categories_2122_args = [
		"label" => __( "School Fees Categories 21-22", "custom-post-type-ui" ),
		"labels" => $school_fees_categories_2122_labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'school_fees_categories_2122', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "school_fees_categories_2122",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
			];
	register_taxonomy( "school_fees_categories_2122", [ "school_fees_21-22" ], $school_fees_categories_2122_args );

	/*===========================================================================================
	Taxonomy: School Fees Categories 22-23
	===========================================================================================*/

	$school_fees_categories_2223_labels = [
		"name" => __( "School Fees Categories 22-23", "custom-post-type-ui" ),
		"singular_name" => __( "School Fee Category 22-23", "custom-post-type-ui" ),
	];

	$school_fees_categories_2223_args = [
		"label" => __( "School Fees Categories 22-23", "custom-post-type-ui" ),
		"labels" => $school_fees_categories_2223_labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'school_fees_categories_2223', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "school_fees_categories_2223",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
			];
	register_taxonomy( "school_fees_categories_2223", [ "school_fees_22-23" ], $school_fees_categories_2223_args );

	/*===========================================================================================
	Taxonomy: School Fees Categories Spanish.
	===========================================================================================*/

	$school_fees_categories_spanish_labels = [
		"name" => __( "School Fees Categories Spanish", "custom-post-type-ui" ),
		"singular_name" => __( "School Fee Category Spanish", "custom-post-type-ui" ),
	];

	$school_fees_categories_spanish_args = [
		"label" => __( "School Fees Categories Spanish", "custom-post-type-ui" ),
		"labels" => $school_fees_categories_spanish_labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'school_fees_categories_spanish', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "school_fees_categories_spanish",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
			];
	//register_taxonomy( "school_fees_categories_spanish", [ "pagos_escolares" ], $school_fees_categories_spanish_args );

	/*===========================================================================================
	Taxonomy: School Fees Categories Spanish 21-22.
	===========================================================================================*/

	$school_fees_categories_spanish_2122_labels = [
		"name" => __( "School Fees Categories Spanish 21-22", "custom-post-type-ui" ),
		"singular_name" => __( "School Fee Category Spanish 21-22", "custom-post-type-ui" ),
	];

	$school_fees_categories_spanish_2122_args = [
		"label" => __( "School Fees Categories Spanish 21-22", "custom-post-type-ui" ),
		"labels" => $school_fees_categories_spanish_2122_labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'school_fees_cate_spanish_2122', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "school_fees_categories_spanish_2122",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
			];
	register_taxonomy( "school_fees_cate_spanish_2122", [ "pagos_escolares_2122" ], $school_fees_categories_spanish_2122_args );

	/*===========================================================================================
	Taxonomy: School Fees Categories Spanish 22-23.
	===========================================================================================*/

	$school_fees_categories_spanish_2223_labels = [
		"name" => __( "School Fees Categories Spanish 22-23", "custom-post-type-ui" ),
		"singular_name" => __( "School Fee Category Spanish 22-23", "custom-post-type-ui" ),
	];

	$school_fees_categories_spanish_2223_args = [
		"label" => __( "School Fees Categories Spanish 22-23", "custom-post-type-ui" ),
		"labels" => $school_fees_categories_spanish_2223_labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'school_fees_cate_spanish_2223', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "school_fees_cate_spanish_2223",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
			];
	register_taxonomy( "school_fees_cate_spanish_2223", [ "pagos_escolares_2223" ], $school_fees_categories_spanish_2223_args );

/*===========================================================================================
Taxonomy: Tech FAQ Categories.
===========================================================================================*/

	$tech_faq_cate_labels = [
		"name" => __( "Tech FAQ Categories", "custom-post-type-ui" ),
		"singular_name" => __( "Tech FAQ Category", "custom-post-type-ui" ),
	];

	$tech_faq_cate_args = [
		"label" => __( "Tech FAQ Categories", "custom-post-type-ui" ),
		"labels" => $tech_faq_cate_labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'tech_faq_categories', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "tech_faq_categories",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
			];
	register_taxonomy( "tech_faq_categories", [ "tech_faq" ], $tech_faq_cate_args );

/*===========================================================================================
Taxonomy: Digital Signage Categories
===========================================================================================*/

	$digital_signage_cate_labels = [
		"name" => __( "Digital Signage Categories", "custom-post-type-ui" ),
		"singular_name" => __( "Digital Signage Category", "custom-post-type-ui" ),
	];

	$digital_signage_cate_args = [
		"label" => __( "Digital Signage Categories", "custom-post-type-ui" ),
		"labels" => $digital_signage_cate_labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'digital_signage_category', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "digital_signage_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
			];
	register_taxonomy( "digital_signage_category", [ "digital_signage" ], $digital_signage_cate_args );

/*===========================================================================================
Taxonomy: Internship Location Categories
===========================================================================================*/

	$internship_locations_labels = [
		"name" => __( "Internship Location Categories", "custom-post-type-ui" ),
		"singular_name" => __( "Internship Location Category", "custom-post-type-ui" ),
	];

	$internship_locations_args = [
		"label" => __( "Internship Location Categories", "custom-post-type-ui" ),
		"labels" => $internship_locations_labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'internship_location_category', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "internship_location_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
			];
	register_taxonomy( "internship_location_category", [ "internship_locations" ], $internship_locations_args );

}
add_action( 'init', 'cptui_register_my_taxes' );
