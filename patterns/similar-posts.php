<?php
/**
 * Title: Similar Posts
 * Slug: juliepr-theme-deneb/similar-posts
 * Inserter: no
 *
 * @package Juliepr
 * @subpackage Theme_Deneb
 */

if ( WP_Block_Type_Registry::get_instance()->is_registered( 'juliepr/similar-posts' ) ) :
	?>

<!-- wp:juliepr/similar-posts {"minYear":<?php echo esc_attr( (string) juliepr_theme_deneb_get_settings()['min_year'] ); ?>} /-->

<?php endif; ?>
