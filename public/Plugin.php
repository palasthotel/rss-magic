<?php

/**
 * Plugin Name:       RSS Magic
 * Description:       Register some rss feeds and use those in different manners
 * Version:           0.1.0
 * Requires at least: 5.0
 * Tested up to:      5.5
 * Author:            PALASTHOTEL by Edward
 * Author URI:        http://www.palasthotel.de
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       rss-magic
 * Domain Path:       /languages
 */

namespace Palasthotel\WordPress\RSSMagic;


/**
 * @property Settings settings
 */
class Plugin {

	const DOMAIN = "rss-magic";

	const MENU_SLUG = "rss-magic";

	public function __construct(){
		require_once dirname(__FILE__)."/vendor/autoload.php";

		load_plugin_textdomain(
			self::DOMAIN,
			false,
			plugin_basename( dirname( __FILE__ ) ) . '/languages'
		);

		$this->settings = new Settings($this);

	}
}

new Plugin();