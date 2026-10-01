<?php
/**
 * Title: 404
 * Slug: juliepr-theme-deneb/404
 * Inserter: no
 *
 * @package Juliepr
 * @subpackage Theme_Deneb
 */

?>

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|regular"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group">
    <!-- wp:group {"fontSize":"small","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
    <div class="wp-block-group has-small-font-size">
        <!-- wp:paragraph -->
            <p>
                &nbsp;
            </p>
            <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:heading {"level":1,"style":{"typography":{"textAlign":"center"}}} -->
    <h1 class="wp-block-heading has-text-align-center">
        <?php echo esc_html_x( 'Page not found', '404 Page not found', 'juliepr-theme-deneb' ); ?>
    </h1>
    <!-- /wp:heading -->

    <!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"}}}} -->
    <div class="wp-block-columns are-vertically-aligned-center" style="margin-top:var(--wp--preset--spacing--large);margin-bottom:var(--wp--preset--spacing--large)">
        <!-- wp:column {"width":"50%"} -->
        <div class="wp-block-column" style="flex-basis:50%">
            <!-- wp:image {"scale":"cover","sizeSlug":"large","linkDestination":"none","className":"deneb-404-image-placeholder","style":{"spacing":{"margin":{"right":"var:preset|spacing|regular","left":"var:preset|spacing|regular"}}}} -->
            <figure class="wp-block-image size-large deneb-404-image-placeholder"
                style="margin-right:var(--wp--preset--spacing--regular);margin-left:var(--wp--preset--spacing--regular)">
                <img
                    src="<?php echo esc_url( get_theme_file_uri( 'assets/images/transparent.png' ) ); ?>"
                    alt=""
                    style="object-fit:cover"
                />
            </figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":""} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"layout":{"type":"default"}} -->
            <div class="wp-block-group">
                <!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:heading -->
                    <h2 class="wp-block-heading">
                        <?php echo esc_html_x( 'Error 404', 'Error 404', 'juliepr-theme-deneb' ); ?>
                    </h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"className":"deneb-justified-text"} -->
                    <p class="deneb-justified-text">
                        <?php echo esc_html_x( 'This page does not exist or has been moved. Check the address or use the site search.', '404 page description', 'juliepr-theme-deneb' ); ?>
                    </p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->
