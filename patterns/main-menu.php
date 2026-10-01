<?php
/**
 * Title: Main Menu
 * Slug: juliepr-theme-deneb/main-menu
 * Inserter: no
 *
 * @package Juliepr
 * @subpackage Theme_Deneb
 */

?>

<!-- wp:navigation {"submenuVisibility":"click","overlayMenu":"never","style":{"typography":{"textTransform":"uppercase"},"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","justifyContent":"center"}} -->
	<?php
		echo "<!-- wp:home-link /-->\n";

		$category_taxonomy = get_taxonomy( 'category' );
		$attributes = array(
				'label'       => $category_taxonomy->labels->name,
				'kind'        => 'custom'
		);
		echo "<!-- wp:navigation-submenu ";
		echo wp_json_encode( $attributes, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
		echo " -->\n";

		$categories = get_categories(
			array(
				'orderby'    => 'term_id',
				'order'      => 'ASC',
				'hide_empty' => false,
				'parent'     => 0,
			)
		);

		foreach ( $categories as $category ) {
			if ( ! ( $category instanceof WP_Term ) ) {
				continue;
			}

			if ( 1 === (int) $category->term_id ) {
				continue;
			}

			$category_url = get_term_link( $category );

			if ( is_wp_error( $category_url ) ) {
				continue;
			}

			$attributes = array(
				'label'    => $category->name,
				'type'     => 'category',
				'id'       => (int) $category->term_id,
				'url'      => $category_url,
				'kind'     => 'taxonomy',
				'metadata' => array(
					'bindings' => array(
						'url' => array(
							'source' => 'core/term-data',
							'args'   => array(
								'field' => 'link',
							),
						),
					),
				),
			);
			echo "<!-- wp:navigation-link ";
			echo wp_json_encode( $attributes, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
			echo " /-->\n";
		}

		echo "<!-- /wp:navigation-submenu -->\n";

		foreach ( juliepr_theme_deneb_get_main_menu_page_slugs() as $page_slug ) {
			$page = get_page_by_path( $page_slug );
			if ( $page instanceof WP_Post ) {
				$attributes = array(
					'label' => get_the_title( $page ),
					'type'  => 'page',
					'url'   => get_permalink( $page ),
					'kind'  => 'post-type',
				);
				echo "<!-- wp:navigation-link ";
				echo wp_json_encode( $attributes, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
				echo " /-->\n";
			}
		}
	?>

<!-- /wp:navigation -->
