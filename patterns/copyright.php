<?php
/**
 * Title: Copyright
 * Slug: juliepr-theme-deneb/copyright
 * Inserter: no
 *
 * @package Juliepr
 * @subpackage Theme_Deneb
 */

?>

<!-- wp:paragraph {"className":"wp-block-paragraph","style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center wp-block-paragraph">
    <?php
        $settings = juliepr_theme_deneb_get_settings();
        $copyright = sprintf(
            '%s',
            str_replace( '%Y', wp_date( 'Y' ), $settings['copyright_text'] )
        );
        echo esc_html( $copyright );
    ?>
</p>
<!-- /wp:paragraph -->
