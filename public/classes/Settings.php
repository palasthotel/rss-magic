<?php


namespace Palasthotel\WordPress\RSSMagic;


class Settings extends _Component {

	const DOM_ROOT_ID = "rss-magic-root";

	public function onCreate() {
		add_action( 'admin_menu', array( $this, 'admin_init' ) );
	}

	public function admin_init() {
		add_submenu_page(
			"options-general.php",
			__( 'RSS Magic', Plugin::DOMAIN ),
			__( 'RSS Magic', Plugin::DOMAIN ),
			"manage_options",
			Plugin::MENU_SLUG,
			[ $this, 'render' ],
			70
		);
		if($this->isSettingsPage()){
			$this->plugin->assets->enqueueMenuPage(self::DOM_ROOT_ID);
		}
	}

	public function isSettingsPage() {
		return isset( $_GET["page"] ) && Plugin::MENU_SLUG == $_GET["page"];
	}

	public function render() {
		$rootId = self::DOM_ROOT_ID;
		echo "<div class='wrap' id='$rootId' />";
	}

}