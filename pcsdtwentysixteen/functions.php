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
	wp_register_script( 'linkDetection',get_template_directory_uri() .'/assets/js/linkDetection.js', '','1.0.0', true);
	wp_register_script( '404easterEgg', 'https://globalassets.provo.edu/js/404.js', '', '1.0.1', true );


	/*   REGISTER ALL CSS FOR SITE */
	/*   CALL ALL CSS AND SCRIPTS FOR SITE */
	wp_enqueue_style( 'style', get_stylesheet_uri(), '', '1.0.1', false);
	wp_enqueue_style( 'parent-styles', get_template_directory_uri() . '/assets/css/parent-styles.css','','1.0.1', false);
	wp_enqueue_script( 'slick_slider');
	wp_enqueue_script( 'mega_menu');
	wp_enqueue_script( 'cookie_script');
	wp_enqueue_script( 'global_scripts');
	wp_enqueue_script( 'my_custom_scripts');
	if ( !is_page(array(4150,4148,4142)) ) {
		wp_enqueue_script( 'linkDetection');
	}
	if ( is_404() ) {
		wp_enqueue_script( '404easterEgg');
	}
	if ( is_front_page() ) {
		wp_enqueue_style( 'frontPageStyle', get_template_directory_uri() . '/assets/css/frontpage.css', '', '1.0.0', false);
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
	 * Post Type: School Fees.
	 */

	$labels = [
		"name" => __( "School Fees", "custom-post-type-ui" ),
		"singular_name" => __( "School fee", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "School Fees", "custom-post-type-ui" ),
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
		"rewrite" => [ "slug" => "school_fees", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "https://globalassets.provo.edu/image/icons/pcsd-icon-16x16.png",
		"supports" => [ "title", "thumbnail" ],
		"taxonomies" => [ "school_fees_categories" ],
	];

	register_post_type( "school_fees", $args );

	/**
	 * Post Type: Schools.
	 */

	$labels = [
		"name" => __( "Schools", "custom-post-type-ui" ),
		"singular_name" => __( "School", "custom-post-type-ui" ),
		"featured_image" => __( "School Photo", "custom-post-type-ui" ),
		"set_featured_image" => __( "Remove School Photo", "custom-post-type-ui" ),
		"remove_featured_image" => __( "Use School Photo", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Schools", "custom-post-type-ui" ),
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
		"rewrite" => [ "slug" => "schools", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "https://globalassets.provo.edu/image/icons/pcsd-icon-16x16.png",
		"supports" => [ "title", "thumbnail" ],
	];

	register_post_type( "schools", $args );

	/**
	 * Post Type: Pagos escolares.
	 */

	$labels = [
		"name" => __( "Pagos escolares", "custom-post-type-ui" ),
		"singular_name" => __( "Cuotas escolares", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Pagos escolares", "custom-post-type-ui" ),
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
		"rewrite" => [ "slug" => "pagos_escolares", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "https://globalassets.provo.edu/image/icons/pcsd-icon-16x16.png",
		"supports" => [ "title", "thumbnail" ],
	];

	register_post_type( "pagos_escolares", $args );

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
	 * Post Type: COVID-19 Daily Stats.
	 commented out this block on 03-03-2021

	$labels = [
		"name" => __( "COVID-19 Daily Stats", "custom-post-type-ui" ),
		"singular_name" => __( "COVID-19 Daily Stats", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "COVID-19 Daily Stats", "custom-post-type-ui" ),
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
		"hierarchical" => true,
		"rewrite" => [ "slug" => "covid_daily_stats", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "https://globalassets.provo.edu/image/icons/pcsd-icon-16x16.png",
		"supports" => [ "title" ],
	];

	register_post_type( "covid_daily_stats", $args );
	*/





	/**
	 * Post Type: COVID-19 Trends.
	commented out this block on 03-03-2021

	$labels = [
		"name" => __( "COVID-19 Trends", "custom-post-type-ui" ),
		"singular_name" => __( "COVID-19 Trends", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "COVID-19 Trends", "custom-post-type-ui" ),
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
		"rewrite" => [ "slug" => "covid_19_trends", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "https://globalassets.provo.edu/image/icons/pcsd-icon-16x16.png",
		"supports" => [ "title" ],
	];

	register_post_type( "covid_19_trends", $args );
	*/











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

/*==========================================================================================
Custom Post Type Taxonomies
============================================================================================*/
function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Schools Categories.
	 */

	$labels = [
		"name" => __( "Schools Categories", "custom-post-type-ui" ),
		"singular_name" => __( "School Category", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Schools Categories", "custom-post-type-ui" ),
		"labels" => $labels,
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
	register_taxonomy( "school", [ "schools" ], $args );

	/**
	 * Taxonomy: Directory Categories.
	 */

	$labels = [
		"name" => __( "Directory Categories", "custom-post-type-ui" ),
		"singular_name" => __( "Directory Category", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Directory Categories", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
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
	register_taxonomy( "directory_category", [ "directory" ], $args );

	/**
	 * Taxonomy: School Fees Categories.
	 */

	$labels = [
		"name" => __( "School Fees Categories", "custom-post-type-ui" ),
		"singular_name" => __( "School Fee Category", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "School Fees Categories", "custom-post-type-ui" ),
		"labels" => $labels,
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
	register_taxonomy( "school_fees_categories", [ "school_fees" ], $args );

	/**
	 * Taxonomy: School Fees Categories Spanish.
	 */

	$labels = [
		"name" => __( "School Fees Categories Spanish", "custom-post-type-ui" ),
		"singular_name" => __( "School Fee Category Spanish", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "School Fees Categories Spanish", "custom-post-type-ui" ),
		"labels" => $labels,
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
	register_taxonomy( "school_fees_categories_spanish", [ "pagos_escolares" ], $args );
	/**
	 * Taxonomy: Tech FAQ Categories.
	 */

	$labels = [
		"name" => __( "Tech FAQ Categories", "custom-post-type-ui" ),
		"singular_name" => __( "Tech FAQ Category", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Tech FAQ Categories", "custom-post-type-ui" ),
		"labels" => $labels,
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
	register_taxonomy( "tech_faq_categories", [ "tech_faq" ], $args );
	/**
	 * Taxonomy: Digital Signage Categories
	 */

	$labels = [
		"name" => __( "Digital Signage Categories", "custom-post-type-ui" ),
		"singular_name" => __( "Digital Signage Category", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Digital Signage Categories", "custom-post-type-ui" ),
		"labels" => $labels,
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
	register_taxonomy( "digital_signage_category", [ "digital_signage" ], $args );
	/**
	 * Taxonomy: Internship Location Categories
	 */

	$labels = [
		"name" => __( "Internship Location Categories", "custom-post-type-ui" ),
		"singular_name" => __( "Internship Location Category", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Internship Location Categories", "custom-post-type-ui" ),
		"labels" => $labels,
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
	register_taxonomy( "internship_location_category", [ "internship_locations" ], $args );

}
add_action( 'init', 'cptui_register_my_taxes' );


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
		'core/text-columns', // — Columns
		'core/buttons',
		//'core/quote', - need styling
		//'core/cover', //(previously core/cover-image)
		//'core/file', - we want to take a closer look at this one later
		//'core/verse', - revisit
		//'core/code', - needs styling
		//'core/freeform', // — Classic
		//'core/html', // — Custom HTML
		//'core/preformatted',
		//'core/pullquote', - revisit
		//(Deprecated) 'core/subhead', — Subheading
		//'core/media-text', // — Media and Text Revisit this one later
		//'core/more',
		//'core/nextpage', //— Page break
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
