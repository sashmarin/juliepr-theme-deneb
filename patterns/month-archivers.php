<?php
/**
 * Title: Month Archivers
 * Slug: juliepr-theme-deneb/month-archives
 * Inserter: no
 *
 * @package Juliepr
 * @subpackage Theme_Deneb
 */

?>

<!-- wp:group {"style":{"border":{"top":{"width":"1px"},"bottom":{"width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group"
    style="border-top-width:1px;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-small)">
    <!-- wp:heading {"level":3} -->
    <h3 class="wp-block-heading"><?php echo esc_html_x( 'Monthly archives:', 'Month Archives title', 'juliepr-theme-deneb' ); ?></h3>
    <!-- /wp:heading -->

    <!-- wp:archives {"displayAsDropdown":true,"showLabel":false,"showPostCounts":true} /-->
</div>
<!-- /wp:group -->
