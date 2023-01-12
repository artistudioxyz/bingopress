<?php

namespace BingoPress\Controller;

!defined('WPINC ') or exit;

/*
* Theme hooks in a backend
*setComponent
* @package    BingoPress
* @subpackage BingoPress/Controller
*/

use BingoPress\Controller;
use BingoPress\WordPress\Hook\Action;

class Tgmpa extends Controller
{
	/**
	 * Admin constructor.
	 *
	 * @return void
	 *
	 * @var object Theme configuration
	 * @pattern prototype
	 */
	public function __construct($theme)
	{
		parent::__construct($theme);

		/** @backend - Eneque scripts */
		$action = new Action();
		$action->setComponent($this);
		$action->setHook('tgmpa_register');
		$action->setCallback('tgmpa_register');
		$action->setAcceptedArgs(0);
		$action->setMandatory(true);
		$action->setDescription(__('Require plugin tgmpa', 'bingopress'));
		$this->hooks[] = $action;
	}

	/**
	 * Register the required framework for this theme.
	 *
	 *  <snip />
	 *
	 * This function is hooked into tgmpa_init, which is fired within the
	 * TGM_Theme_Activation class constructor.
	 */
	public function tgmpa_register()
	{
		/**
		 * Array of theme arrays. Required keys are name and slug.
		 * If the source is NOT from the .org repo, then source is also required.
		 */
		$themes = $this->must_use_framework();

		/**
		 * Array of configuration settings. Amend each line as needed.
		 *
		 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
		 * strings available, please help us make TGMPA even better by giving us access to these translations or by
		 * sending in a pull-request with .po file(s) with the translations.
		 *
		 * Only uncomment the strings in the config array if you want to customize the strings.
		 */
		$config = [
			'id' => 'bingopress',                 // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to bundled plugins.
			'menu' => 'tgmpa-install-plugins', // Menu slug.
			'parent_slug' => 'themes.php',            // Parent menu slug.
			'capability' => 'edit_theme_options',    // Capability needed to view theme install page, should be a capability associated with the parent menu used.
			'has_notices' => true,                    // Show admin notices or not.
			'dismissable' => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg' => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                   // Automatically activate plugins after installation or not.
			'message' => '',                      // Message to output right before the plugins table.
		];

		tgmpa($themes, $config);
	}

	/**
	 * Lists all of must use framework
	 * Array of theme arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 *
	 * @return array
	 */
	private function must_use_framework()
	{
		return [
			// Include a theme from the WordPress Theme Repository.
			[
				'name' => __('Elementor', 'bingopress'),
				'slug' => 'elementor',
			],
			[
				'name' => __('Floating Awesome Button', 'bingopress'),
				'slug' => 'floating-awesome-button',
			],
		];
	}
}
