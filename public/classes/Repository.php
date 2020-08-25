<?php


namespace Palasthotel\WordPress\RSSMagic;


use Palasthotel\WordPress\RssMagic\Model\Feed;
use Palasthotel\WordPress\RssMagic\Model\FeedItem;

class Repository extends _Component {

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

	/**
	 * @param string $slug
	 *
	 * @return false|Feed
	 */
	public function getFeed( $slug ) {
		$feeds = $this->getFeeds();
		foreach ($feeds as $feed){
			if($feed->slug === $slug) return $feed;
		}
		return false;
	}

	/**
	 * @param Feed $feed
	 */
	public function fetchFeed($feed){

		$simplePie = $this->plugin->di->simplePie();

		$uploads = wp_get_upload_dir();
		$cacheDir = $uploads["basedir"]."/magic-rss-cache";
		if ( ! file_exists( $cacheDir) ) {
			mkdir( $cacheDir );
		}

		$simplePie->set_feed_url($feed->url);
		$simplePie->set_cache_location($cacheDir);
		$simplePie->init();

		return array_map(function($item) use ( $feed ) {
			return new FeedItem($feed, $item);
		},$simplePie->get_items());
	}



}