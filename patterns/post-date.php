<?php
/**
 * Title: Post Date info field
 * Slug: juliepr-theme-deneb/post-date
 * Inserter: no
 *
 * @package Juliepr
 * @subpackage Theme_Deneb
 */
?>

<!-- wp:group {"className":"deneb-post-tags_row","style":{"spacing":{"blockGap":"var:preset|spacing|tiny"}},"fontSize":"small","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group has-small-font-size deneb-post-tags_row">
    <!-- wp:icon {"icon":"core/calendar","className":"deneb-post-tags_icon"} /-->
    <!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}}} /-->
</div>
<!-- /wp:group -->
