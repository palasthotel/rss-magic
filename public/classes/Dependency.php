<?php


namespace Palasthotel\WordPress\RSSMagic;

class Dependency extends _Component {

	public function simplePie(){
		if(!class_exists("\SimplePie")){
			require_once $this->plugin->path."/libs/simplepie-1.5.5/autoloader.php";
		}
		return new \SimplePie();
	}
}