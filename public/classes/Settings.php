<?php


namespace Palasthotel\WordPress\RSSMagic;


class Settings extends _Component {

	public function onCreate() {
		add_action( 'admin_menu', array( $this, 'admin_init' ) );
	}

	public function admin_init() {
		add_submenu_page(
			"tools.php",
			__( 'RSS Magic', Plugin::DOMAIN ),
			__( 'RSS Magic', Plugin::DOMAIN ),
			"manage_options",
			Plugin::MENU_SLUG,
			[ $this, 'render' ],
			70
		);
		if($this->isSettingsPage()){

		}
	}

	public function isSettingsPage() {
		return isset( $_GET["page"] ) && Plugin::MENU_SLUG == $_GET["page"];
	}

	public function render() {
		echo "<p>hi</p>";
	}

}