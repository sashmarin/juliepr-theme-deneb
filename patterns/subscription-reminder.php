<?php
/**
 * Title: Newsletter subscription reminder
 * Slug: juliepr-theme-deneb/subscription-reminder
 * Inserter: no
 *
 * @package Juliepr
 * @subpackage Theme_Deneb
 */

?>

<?php
if ( ! juliepr_theme_deneb_get_settings()['show_newsletter'] ) {
	return;
}
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"},"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"stretch"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)">
        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
        <div class="wp-block-group">
                <!-- wp:icon {"icon":"core/envelope","style":{"dimensions":{"width":"63px"}}} /-->

                <!-- wp:heading {"level":3,"style":{"typography":{"textAlign":"left"}}} -->
                <h3 class="wp-block-heading has-text-align-left">
                    <?php echo esc_html_x( 'Do not miss new posts!', 'Newsletter subscription heading', 'juliepr-theme-deneb' ); ?>
                </h3>
                <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:paragraph {"className":"deneb-justified-text","style":{"border":{"left":{"style":"solid","width":"4px"},"top":[],"right":[],"bottom":[]},"spacing":{"padding":{"right":"var:preset|spacing|small","left":"var:preset|spacing|small"}}}} -->
        <p class="deneb-justified-text"
                style="border-left-style:solid;border-left-width:4px;padding-right:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)">
            <?php echo esc_html_x(
                'Subscribe to receive updates about new blog posts.
                Notifications about new posts will be sent to your email address.
                We do not use reader email addresses for advertising or share them with third parties.',
                'Newsletter subscription description', 'juliepr-theme-deneb'
                );
            ?>
        </p>
        <!-- /wp:paragraph -->

        <!-- wp:spacer {"height":"0px","style":{"layout":{"flexSize":"1px","selfStretch":"fixed"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
        <div style="margin-top:0;margin-bottom:0;height:0px" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->

        <!-- wp:buttons {"style":{"spacing":{"padding":{"right":"var:preset|spacing|small","left":"var:preset|spacing|small"}}},"layout":{"type":"flex","justifyContent":"right"}} -->
        <div class="wp-block-buttons" style="padding-right:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)">
            <!-- wp:button -->
            <div class="wp-block-button">
                <a class="wp-block-button__link wp-element-button"
                    href="/newsletter-subscribe">
                    <?php echo esc_html_x( 'Subscribe', 'Newsletter subscription link', 'juliepr-theme-deneb' ); ?>
                </a>
            </div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
</div>
<!-- /wp:group -->
