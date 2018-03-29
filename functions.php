<?php
function my_theme_enqueue_styles() {
    $parent_style = 'twentyseventeen-style'; // This is 'twentyseventeen-style' for the Twenty Fifteen theme.
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// Add Google Tag Manager Code after opening body tag
add_action( 'wpex_outer_wrap_before', function() { ?>
    <!-- Google Tag Manager (noscript) -->
	<!-- End Google Tag Manager (noscript) -->
<?php } );


// Add Google Tag Manager Code after opening head tag
function add_in_head(){ ?>
    <!-- Google Tag Manager -->
    <!-- End Google Tag Manager -->
<?php }
add_action('wp_head', 'add_in_head');


?>