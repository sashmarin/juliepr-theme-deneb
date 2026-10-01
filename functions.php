<?php
/**
 * Theme functions and definitions.
 *
 * @package Juliepr
 * @subpackage Theme_Deneb
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueues public theme assets.
 *
 * @return void
 */
function juliepr_theme_deneb_enqueue_scripts() {
	$theme_version  = (string) wp_get_theme()->get( 'Version' );
	$style_version  = $theme_version;
	$script_version = $theme_version;

	if ( wp_is_development_mode( 'theme' ) ) {
		$style_version  = (string) filemtime( get_theme_file_path( 'style.css' ) );
		$script_version = (string) filemtime( get_theme_file_path( 'assets/js/color-palette.js' ) );
	}

	wp_enqueue_style(
		'juliepr-theme-deneb-style',
		get_stylesheet_uri(),
		array(),
		$style_version
	);

	wp_enqueue_script(
		'juliepr-theme-deneb-color-palette',
		get_theme_file_uri( 'assets/js/color-palette.js' ),
		array(),
		$script_version,
		false
	);

	wp_localize_script(
		'juliepr-theme-deneb-color-palette',
		'julieprThemeDenebSettings',
		array(
			'paletteToggleLabel' => _x(
				'Toggle color scheme',
				'Color scheme toggle button label',
				'juliepr-theme-deneb'
			),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'juliepr_theme_deneb_enqueue_scripts' );

/**
 * Loads translations for the theme text domain.
 *
 * @return void
 */
function juliepr_theme_deneb_load_textdomain() {
	load_theme_textdomain(
		'juliepr-theme-deneb',
		get_parent_theme_file_path( 'languages' )
	);
}
add_action( 'after_setup_theme', 'juliepr_theme_deneb_load_textdomain' );

/**
 * Allows more tags
 *
 * @param array $metadata Block metadata.
 * @return array Filtered block metadata.
 */
function juliepr_theme_deneb_extend_tag_cloud_limit( $metadata ) {
	if ( 'core/tag-cloud' === ( $metadata['name'] ?? '' ) ) {
		$metadata['attributes']['numberOfTags']['maximum'] = 256;
	}

	return $metadata;
}
add_filter( 'block_type_metadata', 'juliepr_theme_deneb_extend_tag_cloud_limit' );

/**
 * Returns the theme settings with their defaults applied.
 *
 * @return array{min_year: int, show_newsletter: bool, copyright_text: string, home_breadcrumb: string, main_menu_page_slugs: string, social_links: string, contact_email: string} Theme settings.
 */
function juliepr_theme_deneb_get_settings() {
	$defaults = array(
		'min_year'        => 2015,
		'show_newsletter' => true,
		'home_breadcrumb' => '',
		'main_menu_page_slugs' => "about\nsearch",
		'social_links'    => "instagram https://www.instagram.com/julie_pr_life/\nyoutube https://www.youtube.com/c/JuliePR1985\nfacebook https://www.facebook.com/julia.laputina/\ntelegram https://t.me/julie_pr\nvk https://vk.com/julie_pr",
		'contact_email'   => 'info@julie-pr.blog',
		'copyright_text'  => _x(
			'© 2008 – %Y Julia Laputina. Copying and distributing site materials without the author\'s consent is prohibited. This site uses cookies to store preferences and integrate with search engines.',
			'Copyright info',
			'juliepr-theme-deneb'
		),
	);
	$settings = get_option( 'juliepr_theme_deneb_settings', array() );

	if ( ! is_array( $settings ) ) {
		$settings = array();
	}

	$settings = wp_parse_args( $settings, $defaults );

	return array(
		'min_year'        => max( 1, absint( $settings['min_year'] ) ),
		'show_newsletter' => (bool) $settings['show_newsletter'],
		'home_breadcrumb' => trim( sanitize_text_field( $settings['home_breadcrumb'] ) ),
		'main_menu_page_slugs' => juliepr_theme_deneb_sanitize_main_menu_page_slugs( $settings['main_menu_page_slugs'] ),
		'social_links'    => juliepr_theme_deneb_sanitize_social_links( $settings['social_links'] ),
		'contact_email'   => sanitize_email( $settings['contact_email'] ),
		'copyright_text'  => sanitize_textarea_field( $settings['copyright_text'] ),
	);
}

/**
 * Sanitizes the theme settings submitted from the admin page.
 *
 * @param mixed $settings Submitted settings.
 * @return array{min_year: int, show_newsletter: bool, copyright_text: string, home_breadcrumb: string, main_menu_page_slugs: string, social_links: string, contact_email: string} Sanitized settings.
 */
function juliepr_theme_deneb_sanitize_settings( $settings ) {
	$settings = is_array( $settings ) ? $settings : array();

	return array(
		'min_year'        => max( 1, absint( $settings['min_year'] ?? 2015 ) ),
		'show_newsletter' => ! empty( $settings['show_newsletter'] ),
		'home_breadcrumb' => trim( sanitize_text_field( $settings['home_breadcrumb'] ?? '' ) ),
		'main_menu_page_slugs' => juliepr_theme_deneb_sanitize_main_menu_page_slugs( $settings['main_menu_page_slugs'] ?? '' ),
		'social_links'    => juliepr_theme_deneb_sanitize_social_links( $settings['social_links'] ?? '' ),
		'contact_email'   => sanitize_email( $settings['contact_email'] ?? '' ),
		'copyright_text'  => sanitize_textarea_field( $settings['copyright_text'] ?? '' ),
	);
}

/**
 * Sanitizes main-menu page slugs entered one per line.
 *
 * @param mixed $page_slugs Submitted page slugs.
 * @return string Sanitized page slugs, one per line.
 */
function juliepr_theme_deneb_sanitize_main_menu_page_slugs( $page_slugs ) {
	if ( ! is_string( $page_slugs ) ) {
		return '';
	}

	$slugs = array();
	$lines = preg_split( '/\r\n|\r|\n/', $page_slugs );

	foreach ( $lines as $line ) {
		$slug = sanitize_title( trim( $line ) );

		if ( '' !== $slug ) {
			$slugs[] = $slug;
		}
	}

	return implode( "\n", $slugs );
}

/**
 * Returns main-menu page slugs in their configured order.
 *
 * @return string[] Page slugs.
 */
function juliepr_theme_deneb_get_main_menu_page_slugs() {
	$page_slugs = juliepr_theme_deneb_get_settings()['main_menu_page_slugs'];

	return '' === $page_slugs ? array() : explode( "\n", $page_slugs );
}

/**
 * Sanitizes social links entered one per line in the "service URL" format.
 *
 * @param mixed $social_links Submitted social links.
 * @return string Sanitized social links, one per line.
 */
function juliepr_theme_deneb_sanitize_social_links( $social_links ) {
	if ( ! is_string( $social_links ) ) {
		return '';
	}

	$links = array();
	$lines = preg_split( '/\r\n|\r|\n/', $social_links );

	foreach ( $lines as $line ) {
		$parts = preg_split( '/\s+/', trim( $line ), 2 );

		if ( 2 !== count( $parts ) || ! preg_match( '/^[a-z0-9-]+$/', $parts[0] ) ) {
			continue;
		}

		$url = esc_url_raw( $parts[1], array( 'http', 'https' ) );

		if ( '' !== $url ) {
			$links[] = strtolower( $parts[0] ) . ' ' . $url;
		}
	}

	return implode( "\n", $links );
}

/**
 * Returns social links parsed from the theme setting.
 *
 * @return array<int, array{service: string, url: string}> Social link data.
 */
function juliepr_theme_deneb_get_social_links() {
	$links = array();
	$lines = explode( "\n", juliepr_theme_deneb_get_settings()['social_links'] );

	foreach ( $lines as $line ) {
		$parts = preg_split( '/\s+/', trim( $line ), 2 );

		if ( 2 === count( $parts ) ) {
			$links[] = array(
				'service' => $parts[0],
				'url'     => $parts[1],
			);
		}
	}

	return $links;
}

/**
 * Registers the theme settings.
 *
 * @return void
 */
function juliepr_theme_deneb_register_settings() {
	register_setting(
		'juliepr_theme_deneb_settings',
		'juliepr_theme_deneb_settings',
		array(
			'type'              => 'array',
			'sanitize_callback' => 'juliepr_theme_deneb_sanitize_settings',
			'default'           => array(
				'min_year'        => 2015,
				'show_newsletter' => true,
				'home_breadcrumb' => '',
				'main_menu_page_slugs' => "about\nsearch",
				'social_links'    => "instagram https://www.instagram.com/julie_pr_life/\nyoutube https://www.youtube.com/c/JuliePR1985\nfacebook https://www.facebook.com/julia.laputina/\ntelegram https://t.me/julie_pr\nvk https://vk.com/julie_pr",
				'contact_email'   => 'info@julie-pr.blog',
				'copyright_text'  => _x(
					'© 2008 – %Y Julia Laputina. Copying and distributing site materials without the author\'s consent is prohibited. This site uses cookies to store preferences and integrate with search engines.',
					'Copyright info',
					'juliepr-theme-deneb'
				),
			),
		)
	);
}
add_action( 'admin_init', 'juliepr_theme_deneb_register_settings' );

/**
 * Adds the theme settings page under Appearance.
 *
 * @return void
 */
function juliepr_theme_deneb_add_settings_page() {
	add_theme_page(
		__( 'Theme Settings', 'juliepr-theme-deneb' ),
		__( 'Theme Settings', 'juliepr-theme-deneb' ),
		'edit_theme_options',
		'juliepr-theme-deneb-settings',
		'juliepr_theme_deneb_render_settings_page'
	);
}
add_action( 'admin_menu', 'juliepr_theme_deneb_add_settings_page' );

/**
 * Removes the Site Editor shortcut from the admin toolbar.
 *
 * @param WP_Admin_Bar $admin_bar Admin toolbar instance.
 * @return void
 */
function juliepr_theme_deneb_remove_site_editor_toolbar_link( $admin_bar ) {
	$admin_bar->remove_node( 'site-editor' );
}
add_action( 'admin_bar_menu', 'juliepr_theme_deneb_remove_site_editor_toolbar_link', 999 );

/**
 * Renders the theme settings page.
 *
 * @return void
 */
function juliepr_theme_deneb_render_settings_page() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}

	$settings = juliepr_theme_deneb_get_settings();
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Theme Settings', 'juliepr-theme-deneb' ); ?></h1>
		<form action="options.php" method="post">
			<?php settings_fields( 'juliepr_theme_deneb_settings' ); ?>
			<table class="form-table" role="presentation">
				<tr>
					<th scope="row">
						<label for="juliepr-theme-deneb-home-breadcrumb"><?php esc_html_e( 'Home page breadcrumb', 'juliepr-theme-deneb' ); ?></label>
					</th>
					<td>
						<input name="juliepr_theme_deneb_settings[home_breadcrumb]" id="juliepr-theme-deneb-home-breadcrumb" type="text" value="<?php echo esc_attr( $settings['home_breadcrumb'] ); ?>" class="regular-text">
						<p class="description"><?php esc_html_e( 'Leave blank to show the post count.', 'juliepr-theme-deneb' ); ?></p>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="juliepr-theme-deneb-main-menu-page-slugs"><?php esc_html_e( 'Main menu pages', 'juliepr-theme-deneb' ); ?></label>
					</th>
					<td>
						<textarea name="juliepr_theme_deneb_settings[main_menu_page_slugs]" id="juliepr-theme-deneb-main-menu-page-slugs" rows="4" class="large-text code"><?php echo esc_textarea( $settings['main_menu_page_slugs'] ); ?></textarea>
						<p class="description"><?php esc_html_e( 'Enter one page slug per line. Pages appear in this order after the category list.', 'juliepr-theme-deneb' ); ?></p>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="juliepr-theme-deneb-min-year"><?php esc_html_e( 'Earliest year for similar posts', 'juliepr-theme-deneb' ); ?></label>
					</th>
					<td>
						<input name="juliepr_theme_deneb_settings[min_year]" id="juliepr-theme-deneb-min-year" type="number" min="1" step="1" value="<?php echo esc_attr( $settings['min_year'] ); ?>" class="small-text">
						<p class="description"><?php esc_html_e( 'Posts created before this year are excluded from the Similar Posts block.', 'juliepr-theme-deneb' ); ?></p>
						<p class="description">
							<?php esc_html_e( 'Plugin required', 'juliepr-theme-deneb' ); ?>
							<a href="https://github.com/sashmarin/juliepr-similar-posts" target="_blank" rel="noopener noreferrer">Juliepr Similar Posts</a>.
						</p>
					</td>
				</tr>
				<tr>
					<th scope="row"><?php esc_html_e( 'Newsletter subscription', 'juliepr-theme-deneb' ); ?></th>
					<td>
						<label for="juliepr-theme-deneb-show-newsletter">
							<input name="juliepr_theme_deneb_settings[show_newsletter]" id="juliepr-theme-deneb-show-newsletter" type="checkbox" value="1" <?php checked( $settings['show_newsletter'] ); ?>>
							<?php esc_html_e( 'Show the newsletter subscription form', 'juliepr-theme-deneb' ); ?>
						</label>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="juliepr-theme-deneb-copyright-text"><?php esc_html_e( 'Copyright text', 'juliepr-theme-deneb' ); ?></label>
					</th>
					<td>
						<textarea name="juliepr_theme_deneb_settings[copyright_text]" id="juliepr-theme-deneb-copyright-text" rows="4" class="large-text"><?php echo esc_textarea( $settings['copyright_text'] ); ?></textarea>
						<p class="description"><?php esc_html_e( 'Use %Y for the current year.', 'juliepr-theme-deneb' ); ?></p>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="juliepr-theme-deneb-social-links"><?php esc_html_e( 'Social media links', 'juliepr-theme-deneb' ); ?></label>
					</th>
					<td>
						<textarea name="juliepr_theme_deneb_settings[social_links]" id="juliepr-theme-deneb-social-links" rows="6" class="large-text code"><?php echo esc_textarea( $settings['social_links'] ); ?></textarea>
						<p class="description"><?php esc_html_e( 'Enter one link per line in the “service URL” format. For example: instagram https://www.instagram.com/julie_pr_life/', 'juliepr-theme-deneb' ); ?></p>
						<p class="description"><?php esc_html_e( 'See the WordPress Social Icons block documentation for supported service names.', 'juliepr-theme-deneb' ); ?></p>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="juliepr-theme-deneb-contact-email"><?php esc_html_e( 'Contact email', 'juliepr-theme-deneb' ); ?></label>
					</th>
					<td>
						<input name="juliepr_theme_deneb_settings[contact_email]" id="juliepr-theme-deneb-contact-email" type="email" value="<?php echo esc_attr( $settings['contact_email'] ); ?>" class="regular-text" autocomplete="email">
						<p class="description"><?php esc_html_e( 'The address appears in the footer in separate parts, without a direct link.', 'juliepr-theme-deneb' ); ?></p>
					</td>
				</tr>
			</table>
			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}

/**
 * Uses the site tagline for a single-item home breadcrumb.
 *
 * @param array[] $breadcrumb_items Breadcrumb item data.
 * @return array[] Breadcrumb item data.
 */
function juliepr_theme_deneb_use_tagline_for_home_breadcrumb( $breadcrumb_items ) {
	if ( ! is_front_page() || 1 !== count( $breadcrumb_items ) ) {
		return $breadcrumb_items;
	}

	$breadcrumb_item_key = array_key_first( $breadcrumb_items );
	$settings            = juliepr_theme_deneb_get_settings();
	$breadcrumb_label    = $settings['home_breadcrumb'];

	if ( '' === $breadcrumb_label ) {
		$breadcrumb_label = sprintf(
			'Posts: %d',
			(int) wp_count_posts( 'post' )->publish
		);
	}

	$breadcrumb_items[ $breadcrumb_item_key ]['label'] = $breadcrumb_label;

	return $breadcrumb_items;
}
add_filter( 'block_core_breadcrumbs_items', 'juliepr_theme_deneb_use_tagline_for_home_breadcrumb' );

/**
 * Removes MailPoet service pages from the WordPress sitemap.
 *
 * @see https://kb.mailpoet.com/article/333-removing-mailpoet-pages-from-wordpress-xml-sitemaps
 *
 * @param WP_Post_Type[] $post_types Registered post types.
 * @return WP_Post_Type[] Filtered post types.
 */
function juliepr_theme_deneb_remove_mailpoet_from_wp_sitemap( $post_types ) {
	unset( $post_types['mailpoet_page'] );

	return $post_types;
}
add_filter( 'wp_sitemaps_post_types', 'juliepr_theme_deneb_remove_mailpoet_from_wp_sitemap' );
