<?php


namespace Palasthotel\WordPress\RSSMagic;


use Palasthotel\WordPress\RssMagic\Model\Feed;

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
			$this->tryHandleFormSubmission();
			$this->plugin->assets->enqueueMenuPage(
				self::DOM_ROOT_ID,
				$this->plugin->repo->getFeeds()
			);
		}
	}

	public function isSettingsPage() {
		return isset( $_GET["page"] ) && Plugin::MENU_SLUG == $_GET["page"];
	}

	private function tryHandleFormSubmission(){
		if(!isset($_POST["rss-magic-slug"]) || !is_array($_POST["rss-magic-slug"])) return;
		if(!isset($_POST["rss-magic-url"]) || !is_array($_POST["rss-magic-url"])) return;
		if(count($_POST["rss-magic-slug"]) != count($_POST["rss-magic-url"])) return;

		$slugs = array_map('sanitize_text_field', $_POST['rss-magic-slug']);
		$urls = array_map('sanitize_text_field', $_POST['rss-magic-url']);

		$feeds = [];
		foreach ($slugs as $index => $slug){
			if(empty($slug) || empty($urls[$index])) continue;
			$feeds[] = new Feed($slug, $urls[$index]);
		}
		$success = $this->plugin->repo->setFeeds($feeds);
		return $success;

	}

	public function render() {
		echo "<form method='POST'>";
		$rootId = self::DOM_ROOT_ID;
		echo "<div class='wrap' id='$rootId' ></div>";
		submit_button(__("Save changes", Plugin::DOMAIN));
		echo "</form>";

	}

}