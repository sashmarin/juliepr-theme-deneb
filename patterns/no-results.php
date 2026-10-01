<?php
/**
 * Title: No Results
 * Slug: juliepr-theme-deneb/no-results
 * Inserter: no
 *
 * @package Juliepr
 * @subpackage Theme_Deneb
 */

?>

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--large);margin-bottom:var(--wp--preset--spacing--large)">
    <!-- wp:columns -->
    <div class="wp-block-columns">
        <!-- wp:column {"width":"50%"} -->
        <div class="wp-block-column" style="flex-basis:50%">
            <!-- wp:image {"scale":"cover","sizeSlug":"large","linkDestination":"none","className":"deneb-empty-image-placeholder","style":{"spacing":{"margin":{"right":"var:preset|spacing|regular","left":"var:preset|spacing|regular"}}}} -->
            <figure class="wp-block-image size-large deneb-empty-image-placeholder" style="margin-right:var(--wp--preset--spacing--regular);margin-left:var(--wp--preset--spacing--regular)">
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
        <div class="wp-block-column is-vertically-aligned-center">
            <!-- wp:group {"layout":{"type":"constrained"}} -->
            <div class="wp-block-group">
                <!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:heading {"level":1} -->
                    <h1 class="wp-block-heading">
                        <?php echo esc_html_x( 'No results', 'No Results', 'juliepr-theme-deneb' ); ?>
                    </h1>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"className":"deneb-justified-text"} -->
                    <p class="deneb-justified-text">
                        <?php echo esc_html_x( 'No results match your search.', 'No posts matching your search criteria', 'juliepr-theme-deneb' ); ?>
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
