<?php
/**
 * Title: Social Links
 * Slug: juliepr-theme-deneb/social-links
 * Inserter: no
 *
 * @package Juliepr
 * @subpackage Theme_Deneb
 */

$social_links = juliepr_theme_deneb_get_social_links();

if ( empty( $social_links ) ) {
	return;
}
?>

<!-- wp:social-links {"openInNewTab":true,"size":"has-large-icon-size","align":"center","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|x-small"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","orientation":"horizontal","justifyContent":"center"}} -->
<ul class="wp-block-social-links aligncenter has-large-icon-size is-style-logos-only" style="margin-top:0;margin-bottom:0">
	<?php foreach ( $social_links as $social_link ) : ?>
		<!-- wp:social-link <?php echo wp_json_encode( $social_link, JSON_UNESCAPED_SLASHES ); ?> /-->
	<?php endforeach; ?>
</ul>
<!-- /wp:social-links -->
