<?php
/**
 * Register Class
 *
 * This file contains the definition of the Register class, which is responsible
 * for registering the Easy DragDrop Uploader plugin with Elementor forms.
 *
 * @package    ZIOR\DragDrop
 * @since      1.0.0
 */

namespace ZIOR\DragDrop\Classes;

use ZIOR\DragDrop\Classes\Integrations\ElementorUploader;
use ElementorPro\Modules\Forms\Classes\Fields;
use ElementorPro\Modules\Forms\Registrars\Form_Fields_Registrar;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Handles the registration of DragDrop uploader form fields.
 *
 * @since 1.0.0
 */
class Register {

	/**
	 * Singleton instance of the class.
	 *
	 * @var Register|null
	 */
	private static $instance = null;

	/**
	 * Constructor for the class.
	 *
	 * Hooks into Elementor Pro to register custom form fields.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function __construct() {
		add_action( 'elementor_pro/forms/fields/register', array( $this, 'register_elementor_form_fields' ), 10 );
	}

	/**
	 * Retrieves the singleton instance of the class.
	 *
	 * @since 1.0.0
	 * @return Register The singleton instance.
	 */
	public static function get_instance(): Register {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Registers the DragDrop uploader field with Elementor's form field registry.
	 *
	 * @since 1.0.0
	 * @param ElementorPro\Modules\Forms\Registrars\Form_Fields_Registrar $form Elementor form fields object.
	 * @return void
	 */
	public function register_elementor_form_fields( Form_Fields_Registrar $form ): void {
		$form->register( new ElementorUploader() );
	}
}
