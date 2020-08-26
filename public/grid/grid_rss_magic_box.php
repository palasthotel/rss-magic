<?php

use Palasthotel\WordPress\RSSMagic\Plugin;

class grid_rss_magic_box extends grid_list_box {

	const TRANSIENT = "grid_rss_magic_box_";

	public function type() {
		return 'rss_magic';
	}

	public function __construct() {
		parent::__construct();
		$this->content->slug = "";
		$this->content->number_of_items = 3;
		$this->content->offset = 0;
	}

	public function build( $editmode ) {
		if ( $editmode ) {
			return $this->content;
		}

		$this->content->feed = Plugin::instance()->repo->getFeed($this->content->slug);
		$this->content->feedList = ($this->content->feed) ? Plugin::instance()->repo->fetchFeed($this->content->feed): [];

		ob_start();
		do_action(Plugin::ACTION_RENDER_FEED, $this->content->feed, $this->content->feedList);
		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}

	public function contentStructure() {
		$cs = parent::contentStructure();

		return array_merge( $cs, array(
			array(
				'key'   => 'slug',
				'label' => _x( 'RSS Feed', 'grid_box', Plugin::DOMAIN ),
				'type'  => 'select',
				'selections' => array_map(function($feed){
					return array(
						"key" => $feed->slug,
						"text" => $feed->slug,
					);
				}, Plugin::instance()->repo->getFeeds())
			),
			array(
				'key'   => 'number_of_items',
				'label' => _x( 'Number of posts', 'grid_box', Plugin::DOMAIN ),
				'type'  => 'number',
			),
			array(
				'key'   => 'offset',
				'label' => _x( 'Offset', 'grid_box', Plugin::DOMAIN ),
				'type'  => 'number',
			),
		) );
	}

}