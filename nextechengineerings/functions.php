<?php

/**
 * nextechengineerings functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package nextechengineerings
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nextechengineerings_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on nextechengineerings, use a find and replace
		* to change 'nextechengineerings' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('nextechengineerings', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'nextechengineerings'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
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

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'nextechengineerings_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
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
add_action('after_setup_theme', 'nextechengineerings_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nextechengineerings_content_width()
{
	$GLOBALS['content_width'] = apply_filters('nextechengineerings_content_width', 640);
}
add_action('after_setup_theme', 'nextechengineerings_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nextechengineerings_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'nextechengineerings'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'nextechengineerings'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'nextechengineerings_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function nextechengineerings_scripts()
{
	wp_enqueue_style('nextechengineerings-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('nextechengineerings-style', 'rtl', 'replace');

	wp_enqueue_script('nextechengineerings-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'nextechengineerings_scripts');

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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// ajax handler 
add_action('wp_ajax_save_booking_data', 'save_booking_data');
add_action('wp_ajax_nopriv_save_booking_data', 'save_booking_data');

function save_booking_data()
{
	// Check if the request came from a valid source
	// check_ajax_referer('my_nonce_action', 'nonce');

	parse_str($_POST['form_data'], $form_data);

	// Perform validation on form data if needed

	// Create a new user
	$user_data = array(
		'user_login'    => $form_data['user_email'],
		'user_email'    => $form_data['user_email'],
		'user_pass'     => wp_generate_password(),
		'display_name'  => $form_data['user_name'],
		'role'          => 'subscriber', // Set the user role as needed
	);

	$user_id = wp_insert_user($user_data); // Assuming you have user data to insert

	if (is_wp_error($user_id)) {
		$response = array('status' => 'error', 'message' => $user_id->get_error_message());
	} else {
		// Update user meta with additional data
		update_user_meta($user_id, 'selected_service', $form_data['selected_service']);
		update_user_meta($user_id, 'contact_number', $form_data['contact_number']);
		update_user_meta($user_id, 'special_request', $form_data['special_request']);

		$to = 'asadcheema8292@gmail.com'; // Replace with the email address where you want to send the email
		$subject = 'Subject of the email';
		$message = 'This is the body of the email. You can include HTML tags as well.';
		$headers = array('Content-Type: text/html; charset=UTF-8');

		// Send the email
		$sent = wp_mail($to, $subject, $message, $headers);

		if ($sent) {
			$response = array('status' => 'success', 'message' => 'User created, and data saved successfully. Email sent.');
		} else {
			$response = array('status' => 'error', 'message' => 'Error sending email.');
		}
	}
	echo json_encode($response);

	wp_die(); // This is required to terminate immediately and return a proper response
}
// enque script
function enqueue_custom_scripts()
{
	wp_enqueue_script('jquery');
	wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/my.js', array('jquery'), null, true);

	// Pass the URL of admin-ajax.php to your script
	wp_localize_script('custom-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

// Add the custom menu page to the admin menu
function add_booking_data_page()
{
	add_menu_page(
		'Booking Data',
		'Booking Data',
		'manage_options',
		'booking_data_page',
		'display_booking_data_page'
	);
}
add_action('admin_menu', 'add_booking_data_page');

// Function to display the contents of the custom admin page
function display_booking_data_page()
{
	global $wpdb;

	// Replace 'your_table_name' with the actual name of your database table
	$table_name = $wpdb->prefix . 'usermeta';

	// Your custom query to retrieve data
	$query = "SELECT * FROM $table_name WHERE meta_key IN ('selected_service', 'contact_number', 'special_request')";
	$results = $wpdb->get_results($query);

	echo '<div class="wrap">';
	echo '<h1>Booking Data</h1>';

	if ($results) {
		echo '<table class="widefat striped">';
		echo '<thead><tr><th>User ID</th><th>Service</th><th>Contact Number</th><th>Special Request</th></tr></thead>';
		echo '<tbody>';
		foreach ($results as $result) {
			$user_id = $result->user_id;
			$service = get_user_meta($user_id, 'selected_service', true);
			$contact_number = get_user_meta($user_id, 'contact_number', true);
			$special_request = get_user_meta($user_id, 'special_request', true);

			echo '<tr>';
			echo '<td>' . esc_html($user_id) . '</td>';
			echo '<td>' . esc_html($service) . '</td>';
			echo '<td>' . esc_html($contact_number) . '</td>';
			echo '<td>' . esc_html($special_request) . '</td>';
			echo '</tr>';
		}
		echo '</tbody>';
		echo '</table>';
	} else {
		echo '<p>No booking data found.</p>';
	}

	echo '</div>';
}
