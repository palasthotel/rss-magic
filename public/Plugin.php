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
 * @property Repository repo
 * @property Dependency di
 * @property Templates templates
 * @property Render render
 */
class Plugin {

	const DOMAIN = "rss-magic";

	const MENU_SLUG = "rss-magic";

	const HANDLE_MENU_SCRIPT = "rss-magic-menu";

	const OPTION_FEEDS = "_rss-magic-feeds";

	const THEME_FOLDER = "plugin-parts";


	const TEMPLATE_FEED_WITH_SLUG = "magic-rss-feed__%s.php";
	const TEMPLATE_FEED ="magic-rss-feed.php";

	const TEMPLATE_FEED_ITEM_WITH_SLUG_AND_TYPE = "magic-rss-feed-item__%s--%s.php";
	const TEMPLATE_FEED_ITEM_WITH_SLUG = "magic-rss-feed-item__%s.php";
	const TEMPLATE_FEED_ITEM_WITH_TYPE = "magic-rss-feed-item--%s.php";
	const TEMPLATE_FEED_ITEM ="magic-rss-feed-item.php";

	const FILTER_TEMPLATE_PATHS = "rss_magic_template_paths";

	const ACTION_RENDER_FEED = "rss_magic_render_feed";
	const ACTION_RENDER_FEED_ITEM = "rss_magic_render_feed_item";

	private function __construct(){

		$this->path = plugin_dir_path(__FILE__);
		$this->url = plugin_dir_url(__FILE__);

		require_once dirname(__FILE__)."/vendor/autoload.php";

		load_plugin_textdomain(
			self::DOMAIN,
			false,
			plugin_basename( dirname( __FILE__ ) ) . '/languages'
		);

		$this->di = new Dependency($this);
		$this->templates = new Templates($this);
		$this->render = new Render($this);
		$this->settings = new Settings($this);
		$this->assets = new Assets($this);
		$this->repo = new Repository($this);
		$this->grid = new Grid($this);

	}

	private static $instance;

	/**
	 * @return Plugin
	 */
	public static function instance(){
		if(self::$instance == null){
			self::$instance = new Plugin();
		}
		return self::$instance;
	}
}

Plugin::instance();