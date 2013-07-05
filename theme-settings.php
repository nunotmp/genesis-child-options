<?php 
/**
 * Child Theme Settings
 * 
 * @package Theme Name
 * @author Juan Rangel <jrnangel87@yahoo.com>
 * @since 1.0
 *
 */

/**
 * Registers a new admin page, providing content and corresponding menu item
 * for the child Settings page.
 * @since 1.0
 */

class Child_Theme_settings extends Genesis_Admin_boxes {
	
	function __construct() {
		
		//Specify a unique page ID.
		$page_id = 'child-settings';

		// Set it as a child to genesis, and define the menu and page titles
		$menu_ops = array(
			'submenu' => array(
				'parent_slug' => 'genesis',
				'page_title'  => 'Child Settings - Theme Options',
				'menu_title'  => 'Child Settings',
				'capability'  => 'edit_theme_options'
			)
		);

		// Set up page options. These are optional
		$page_ops = array(
        
        );

        //Give it a unique settings field.
        $settings_field = CHILD_SETTINGS_FIELD;

        // Place all settings default values here
        $default_settings = array(
        	
        );

        // Create the Admin Page
        $this->create( $page_id, $menu_ops, $page_ops, $settings_field, $default_settings );

        add_action( 'genesis_settings_sanitizer_init', array( $this, 'sanitization_filters' ) );


	} // END construct method

	/**
	 * Set up the Sanitization Filters
	 * See /lib/classes/sanitization.php for all available filters.
	 *
	 * @since 1.0.0
	 */

	function sanitization_filters() {
		genesis_add_option_filter( 
			'no_html', 
			$this->settings_field, 
			array(
				
			) 
		);

		genesis_add_option_filter( 
			'one_zero', 
			$this->settings_field, 
			array(
				
			) 
		);

		genesis_add_option_filter( 
			'url', 
			$this->settings_field, 
			array(
				
			) 
		);	
	} // END sanitization method

	/**
	 * Register metaboxes on child Settings page.
	 * 
	 * @since 1.0.0
	 *
 	 */

	function metaboxes() {
		
		add_meta_box( 'examples', 'Metabox - Example', array( $this, 'examples' ), $this->pagehook, 'main', 'high' );

	} // END metaboxes method

	/**
	 * All callback will be here
	 *
	 * @since 1.0.0
	 *
	 * @see child_Theme_Settings::metaboxes()
	 */

	function examples() { ?>
		<p>
			Text Input:<br>
			<input type="text" name="<?php echo $this->get_field_name('text_input'); ?>" id="<?php echo $this->get_field_id( 'text_input' ); ?>" 
			value="<?php echo esc_attr( $this->get_field_value( 'text_input' ) ) ?>" size="50" />
		</p>
		
		<p>Text Area:<br></p>
		<p>
			<textarea name="<?php echo $this->get_field_name( 'text_area' ); ?>" id="<?php echo $this->get_field_id( 'text_area' ) ?>" cols="78" rows="8"><?php echo esc_textarea( $this->get_field_value( 'text_area' ) ); ?></textarea>
		</p>
	<?php }

} // END class

/**
 * Add the Theme Settings Page
 *
 * @since 1.0.0
 */
function child_add_child_theme_settings() {
	global $_child_theme_settings;
	$_child_theme_settings = new Child_Theme_Settings;
}
add_action( 'admin_menu', 'child_add_child_theme_settings', 5 );