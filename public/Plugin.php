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
 * @property string path
 * @property string url
 * @property Settings settings
 * @property Assets assets
 * @property Grid grid
 */
class Plugin {

	const DOMAIN = "rss-magic";

	const MENU_SLUG = "rss-magic";

	const HANDLE_MENU_SCRIPT = "rss-magic-menu";

	public function __construct(){

		$this->path = plugin_dir_path(__FILE__);
		$this->url = plugin_dir_url(__FILE__);

		require_once dirname(__FILE__)."/vendor/autoload.php";

		load_plugin_textdomain(
			self::DOMAIN,
			false,
			plugin_basename( dirname( __FILE__ ) ) . '/languages'
		);

		$this->settings = new Settings($this);
		$this->assets = new Assets($this);
		$this->grid = new Grid($this);

	}
}

new Plugin();