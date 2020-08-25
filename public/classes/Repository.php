<?php


namespace Palasthotel\WordPress\RSSMagic;


use Palasthotel\WordPress\RssMagic\Model\Feed;

class Repository {

	/**
	 * @return false|Feed[]
	 */
	public function getFeeds(){
		return get_option(Plugin::OPTION_FEEDS, []);
	}

	/**
	 * @param Feed[] $feeds
	 *
	 * @return bool
	 */
	public function setFeeds($feeds){
		return update_option(Plugin::OPTION_FEEDS, $feeds);
	}

}