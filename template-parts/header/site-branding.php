<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="site-branding">
	<div class="wrap">
		<?php $custom_logo_id = get_theme_mod( 'custom_logo' ); 
		if ( $custom_logo_id ) {
			$custom_logo_attr = array(
				'class'    => 'custom-logo',
				'itemprop' => 'logo',
			);
			$image_alt = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );
			if ( empty( $image_alt ) ) {
				$custom_logo_attr['alt'] = get_bloginfo( 'name', 'display' );
			} ?>
			<a href="<?php echo esc_url( home_url( '/' ) ) ?>" title="" class="custom-logo-link" rel="home" itemprop="url">
				<?php echo wp_get_attachment_image( $custom_logo_id, 'full', false, $custom_logo_attr ) ?>
			</a>
		<?php } ?>

	</div><!-- .wrap -->
</div><!-- .site-branding -->
