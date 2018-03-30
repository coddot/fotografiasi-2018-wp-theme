<?php
function my_theme_enqueue_styles() {
    $parent_style = 'twentyseventeen-style'; // This is 'twentyseventeen-style' for the Twenty Fifteen theme.
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
	);
	wp_enqueue_style( 'main-style', get_template_directory_uri() . 'css/main.css' );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// Add Google Tag Manager Code after opening body tag
// add_action( 'wpex_outer_wrap_before', function() {  } );

// Add Google Tag Manager Code after opening head tag
// function add_in_head() { }
// add_action('wp_head', 'add_in_head');
// add google analytics to footer
function add_google_analytics() {

}
add_action('wp_footer', 'add_google_analytics');

// Remove WordPress Version Number
function wpb_remove_version() {
    return '';
}
add_filter('the_generator', 'wpb_remove_version');

//Add a Custom Dashboard Logo
function wpb_custom_logo() {
    echo '
        <style type="text/css">
			#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
				background-image: url(' . get_bloginfo('stylesheet_directory') . '/images/logo-Fotograf-Iasi-Daniel-Condurachi---patrat-60x60.jpg) !important;
				background-position: 0 0;
				color:rgba(0, 0, 0, 0);
			}
			#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
				background-position: 0 0;
			}
        </style>
    ';
}
//hook into the administrative header output
add_action('wp_before_admin_bar_render', 'wpb_custom_logo');

// disable all widget areas
function disable_all_widgets($sidebars_widgets) {
	//if (is_home())
		$sidebars_widgets = array(false);
	return $sidebars_widgets;
}
add_filter('sidebars_widgets', 'disable_all_widgets');

// add a dynamic copyright date in WordPress footer using  echo wpb_copyright()
function wpb_copyright() {
	global $wpdb;
	$copyright_dates = $wpdb->get_results("
		SELECT
			YEAR(min(post_date_gmt)) AS firstdate,
			YEAR(max(post_date_gmt)) AS lastdate
		FROM
			$wpdb->posts
		WHERE
			post_status = 'publish'
	");
	$output = '';
	if($copyright_dates) {
		$copyright = "© " . $copyright_dates[0]->firstdate;
		if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
			$copyright .= '-' . $copyright_dates[0]->lastdate;
		}
		$output = $copyright;
	}
	return $output;
}

// Add Additional Image Sizes in WordPress
add_image_size( 'mobil', 667, 99999 ); 
add_image_size( 'laptop', 1366, 99999 ); 
add_image_size( 'desktop', 1920, 99999 ); 
?>