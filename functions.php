<?php
/**
 * midland-stairlifts functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package midland-stairlifts
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.1.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function midland_stairlifts_setup() {
	load_theme_textdomain( 'midland-stairlifts', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'midland-stairlifts' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	add_theme_support(
		'custom-background',
		apply_filters(
			'midland_stairlifts_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'midland_stairlifts_setup' );

/**
 * Set the content width in pixels.
 */
function midland_stairlifts_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'midland_stairlifts_content_width', 640 );
}
add_action( 'after_setup_theme', 'midland_stairlifts_content_width', 0 );

/**
 * Register widget area.
 */
function midland_stairlifts_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'midland-stairlifts' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'midland-stairlifts' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'midland_stairlifts_widgets_init' );

/**
 * =========================
 * Font preload (Manrope variable)
 * =========================
 * Пока pre-load TTF. После конвертации на woff2 просто поменяем путь + type.
 */
add_action( 'wp_head', function () {
	$font_rel  = '/assets/fonts/manrope-variable-font_wght.ttf';
	$font_path = get_template_directory() . $font_rel;

	if ( ! file_exists( $font_path ) ) {
		return; 
	}
	?>
	<link rel="preload"
	      href="<?php echo esc_url( get_template_directory_uri() . $font_rel ); ?>"
	      as="font"
	      type="font/ttf"
	      crossorigin>
	<?php
}, 1 );

/**
 * Enqueue scripts and styles.
 */
function midland_stairlifts_scripts() {

	/**
	 * 1) fonts.css
	 *    /assets/css/fonts.css
	 */
	$fonts_rel  = '/assets/css/fonts.css';
	$fonts_path = get_template_directory() . $fonts_rel;
	$fonts_uri  = get_template_directory_uri() . $fonts_rel;

	wp_enqueue_style(
		'midland-fonts',
		$fonts_uri,
		array(),
		file_exists( $fonts_path ) ? filemtime( $fonts_path ) : _S_VERSION
	);

	
	$custom_rel  = '/assets/css/custom.css';
	$custom_path = get_template_directory() . $custom_rel;
	$custom_uri  = get_template_directory_uri() . $custom_rel;

	wp_enqueue_style(
		'midland-custom',
		$custom_uri,
		array( 'midland-fonts' ),
		file_exists( $custom_path ) ? filemtime( $custom_path ) : _S_VERSION
	);

	
	wp_enqueue_style(
		'midland-stairlifts-style',
		get_stylesheet_uri(),
		array( 'midland-custom' ),
		_S_VERSION
	);
	wp_style_add_data( 'midland-stairlifts-style', 'rtl', 'replace' );

	// Swiper (CSS)
	wp_enqueue_style(
		'swiper-css',
		'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
		array(),
		'11.0.0'
	);

	// Navigation (default)
	wp_enqueue_script(
		'midland-stairlifts-navigation',
		get_template_directory_uri() . '/js/navigation.js',
		array(),
		_S_VERSION,
		true
	);

	// Swiper (JS)
	wp_enqueue_script(
		'swiper-js',
		'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
		array(),
		'11.0.0',
		true
	);

	// Swiper init file
	$swiper_init_rel  = '/assets/js/swiper-init.js';
	$swiper_init_path = get_template_directory() . $swiper_init_rel;
	$swiper_init_uri  = get_template_directory_uri() . $swiper_init_rel;

	wp_enqueue_script(
		'midland-stairlifts-swiper-init',
		$swiper_init_uri,
		array( 'swiper-js' ),
		file_exists( $swiper_init_path ) ? filemtime( $swiper_init_path ) : _S_VERSION,
		true
	);

		// AOS (CSS)
	wp_enqueue_style(
		'aos-css',
		'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css',
		array(),
		'2.3.4'
	);

	// AOS (JS)
	wp_enqueue_script(
		'aos-js',
		'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js',
		array(),
		'2.3.4',
		true
	);

	// AOS init
	wp_add_inline_script(
		'aos-js',
		"document.addEventListener('DOMContentLoaded', function () {
			if (typeof AOS !== 'undefined') {
				AOS.init({
					once: true,
					duration: 400,
					easing: 'ease-out',
					offset: 200
				});
			}
		});"
	);

	// Comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'midland_stairlifts_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * =========================
 * ACF JSON sync
 * =========================
 */
add_filter( 'acf/settings/save_json', function () {
	return get_stylesheet_directory() . '/acf-json';
} );

add_filter( 'acf/settings/load_json', function ( $paths ) {
	$paths[] = get_stylesheet_directory() . '/acf-json';
	return $paths;
} );

if ( function_exists('acf_add_options_page') ) {
	acf_add_options_page([
		'page_title' => 'Theme Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug'  => 'theme-settings',
		'redirect'   => false,
	]);

	acf_add_options_sub_page([
		'page_title'  => 'Header',
		'menu_title'  => 'Header',
		'parent_slug' => 'theme-settings',
		'post_id'     => 'header_options',
	]);

	acf_add_options_sub_page([
		'page_title'  => 'Footer',
		'menu_title'  => 'Footer',
		'parent_slug' => 'theme-settings',
		'post_id'     => 'footer_options',
	]);
}

/**
 * =========================
 * SVG upload support (admin only)
 * =========================
 */
add_filter( 'upload_mimes', function ( $mimes ) {
	if ( current_user_can( 'administrator' ) ) {
		$mimes['svg']  = 'image/svg+xml';
		$mimes['svgz'] = 'image/svg+xml';
	}
	return $mimes;
} );

add_filter( 'wp_check_filetype_and_ext', function ( $data, $file, $filename, $mimes, $real_mime = null ) {
	$ext = strtolower( pathinfo( $filename, PATHINFO_EXTENSION ) );
	if ( in_array( $ext, array( 'svg', 'svgz' ), true ) ) {
		$data['ext']             = 'svg';
		$data['type']            = 'image/svg+xml';
		$data['proper_filename'] = $filename;
	}
	return $data;
}, 10, 5 );

add_action('init', function () {

  // Insights
  register_post_type('insights', [
    'label'           => 'Insights',
    'labels'          => [
      'name' => 'Insights', 'singular_name' => 'Insight',
      'add_new' => 'Add Insight', 'add_new_item' => 'Add Insight',
      'edit_item' => 'Edit Insight', 'new_item' => 'New Insight',
      'view_item' => 'View Insight', 'search_items' => 'Search Insights',
      'not_found' => 'No insights found', 'not_found_in_trash' => 'No insights in trash',
      'all_items' => 'All Insights'
    ],
    'public'          => true,
    'has_archive'     => true, 
    'rewrite'         => ['slug' => 'insights'],
    'show_in_rest'    => true,
    'menu_icon'       => 'dashicons-lightbulb',
    'supports'        => ['title','editor','thumbnail','excerpt','revisions'],
    'taxonomies'      => ['category','post_tag'],
  ]);
});
