<?php
/**
 * Title: Contact Email
 * Slug: juliepr-theme-deneb/contact-email
 * Inserter: no
 *
 * @package Juliepr
 * @subpackage Theme_Deneb
 */

$email = juliepr_theme_deneb_get_settings()['contact_email'];

if ( ! is_email( $email ) ) {
	return;
}

list( $mailbox, $domain ) = explode( '@', $email, 2 );
?>

<!-- wp:group {"className":"deneb-contact-email","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group deneb-contact-email" style="margin-top:0;margin-bottom:0">
	<!-- wp:paragraph {"style":{"typography":{"fontSize":"medium"}}} -->
	<p style="font-size:var(--wp--preset--font-size--medium)"><?php echo esc_html( $mailbox ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:icon {"icon":"core/at-symbol","style":{"dimensions":{"width":"20px"}}} /-->

	<!-- wp:paragraph {"style":{"typography":{"fontSize":"medium"}}} -->
	<p style="font-size:var(--wp--preset--font-size--medium)"><?php echo esc_html( $domain ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
