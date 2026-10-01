<?php
/**
 * Title: Search Page
 * Slug: juliepr-theme-deneb/search
 * Inserter: no
 *
 * @package Juliepr
 * @subpackage Theme_Deneb
 */

?>

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group">
    <!-- wp:search {"label":"Search","showLabel":false,"placeholder":"<?php echo esc_attr_x( 'Search this site', 'Search Field placeholder', 'juliepr-theme-deneb' ); ?>","buttonText":"Search","buttonPosition":"button-inside","buttonUseIcon":true} /-->
</div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small","margin":{"top":"var:preset|spacing|small"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--small)">
    <!-- wp:heading {"level":2} -->
    <h2 class="wp-block-heading"><?php echo esc_html_x( 'Tags to search by', 'Tag Cloud Title', 'juliepr-theme-deneb' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:tag-cloud {"numberOfTags":192,"className":"deneb-justified-text"} /-->
</div>
<!-- /wp:group -->
