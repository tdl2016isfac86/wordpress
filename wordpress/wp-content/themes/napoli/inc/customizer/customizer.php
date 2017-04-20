<?php
/**
 * Implement theme options in the Customizer
 *
 * @package Napoli
 */

// Load Customizer Helper Functions.
require( get_template_directory() . '/inc/customizer/functions/custom-controls.php' );
require( get_template_directory() . '/inc/customizer/functions/sanitize-functions.php' );
require( get_template_directory() . '/inc/customizer/functions/callback-functions.php' );

// Load Customizer Section Files.
require( get_template_directory() . '/inc/customizer/sections/customizer-general.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-post.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-slider.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-upgrade.php' );

/**
 * Registers Theme Options panel and sets up some WordPress core settings
 *
 * @param object $wp_customize / Customizer Object.
 */
function napoli_customize_register_options( $wp_customize ) {

	// Add Theme Options Panel.
	$wp_customize->add_panel( 'napoli_options_panel', array(
		'priority'       => 180,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__( 'Theme Options', 'napoli' ),
		'description'    => napoli_customize_theme_links(),
	) );

	// Change default background section.
	$wp_customize->get_control( 'background_color' )->section   = 'background_image';
	$wp_customize->get_section( 'background_image' )->title     = esc_html__( 'Background', 'napoli' );

	// Add postMessage support for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	// Add selective refresh for site title and description.
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector'        => '.site-title a',
		'render_callback' => 'napoli_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector'        => '.site-description',
		'render_callback' => 'napoli_customize_partial_blogdescription',
	) );

	// Add Display Site Title Setting.
	$wp_customize->add_setting( 'napoli_theme_options[site_title]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'napoli_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'napoli_theme_options[site_title]', array(
		'label'    => esc_html__( 'Display Site Title', 'napoli' ),
		'section'  => 'title_tagline',
		'settings' => 'napoli_theme_options[site_title]',
		'type'     => 'checkbox',
		'priority' => 10,
		)
	);

	// Add Display Tagline Setting.
	$wp_customize->add_setting( 'napoli_theme_options[site_description]', array(
		'default'           => false,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'napoli_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'napoli_theme_options[site_description]', array(
		'label'    => esc_html__( 'Display Tagline', 'napoli' ),
		'section'  => 'title_tagline',
		'settings' => 'napoli_theme_options[site_description]',
		'type'     => 'checkbox',
		'priority' => 11,
		)
	);

} // napoli_customize_register_options()
add_action( 'customize_register', 'napoli_customize_register_options' );


/**
 * Render the site title for the selective refresh partial.
 */
function napoli_customize_partial_blogname() {
	bloginfo( 'name' );
}


/**
 * Render the site tagline for the selective refresh partial.
 */
function napoli_customize_partial_blogdescription() {
	bloginfo( 'description' );
}


/**
 * Embed JS file to make Theme Customizer preview reload changes asynchronously.
 */
function napoli_customize_preview_js() {
	wp_enqueue_script( 'napoli-customizer-preview', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20161214', true );
}
add_action( 'customize_preview_init', 'napoli_customize_preview_js' );


/**
 * Embed CSS styles for the theme options in the Customizer
 */
function napoli_customize_preview_css() {
	wp_enqueue_style( 'napoli-customizer-css', get_template_directory_uri() . '/css/customizer.css', array(), '20161214' );
}
add_action( 'customize_controls_print_styles', 'napoli_customize_preview_css' );

/**
 * Returns Theme Links
 */
function napoli_customize_theme_links() {

	ob_start();
	?>

		<div class="theme-links">

			<span class="customize-control-title"><?php esc_html_e( 'Theme Links', 'napoli' ); ?></span>

			<p>
				<a href="<?php echo esc_url( __( 'https://themezee.com/themes/napoli/', 'napoli' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=napoli&utm_content=theme-page" target="_blank">
					<?php esc_html_e( 'Theme Page', 'napoli' ); ?>
				</a>
			</p>

			<p>
				<a href="http://preview.themezee.com/?demo=napoli&utm_source=customizer&utm_campaign=napoli" target="_blank">
					<?php esc_html_e( 'Theme Demo', 'napoli' ); ?>
				</a>
			</p>

			<p>
				<a href="<?php echo esc_url( __( 'https://themezee.com/docs/napoli-documentation/', 'napoli' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=napoli&utm_content=documentation" target="_blank">
					<?php esc_html_e( 'Theme Documentation', 'napoli' ); ?>
				</a>
			</p>

			<p>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/support/theme/napoli/reviews/?filter=5', 'napoli' ) ); ?>" target="_blank">
					<?php esc_html_e( 'Rate this theme', 'napoli' ); ?>
				</a>
			</p>

		</div>

	<?php
	$theme_links = ob_get_contents();
	ob_end_clean();

	return $theme_links;
}
