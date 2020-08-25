<?php


namespace Palasthotel\WordPress\RSSMagic;


class Assets extends _Component {

	public function enqueueMenuPage($rootId){
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
				"rootId" => $rootId
			]
		);
	}

}