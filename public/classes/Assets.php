<?php


namespace Palasthotel\WordPress\RSSMagic;


use Palasthotel\WordPress\RssMagic\Model\Feed;

class Assets extends _Component {

	/**
	 * @param string $rootId
	 * @param Feed[] $feeds
	 */
	public function enqueueMenuPage($rootId, $feeds){
		wp_enqueue_script(
			Plugin::HANDLE_MENU_SCRIPT,
			$this->plugin->url."/dist/scripts/menuPage.js",
			["react", "react-dom"],
			filemtime($this->plugin->path."/dist/scripts/menuPage.js"),
			true
		);
		wp_localize_script(
			Plugin::HANDLE_MENU_SCRIPT,
			"RSSMagic",
			[
				"rootId" => $rootId,
				"feeds" => $feeds,
			]
		);
	}

}