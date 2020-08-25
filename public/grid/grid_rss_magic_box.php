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

		return "RSS Magic Box";
	}

	public function contentStructure() {
		$cs = parent::contentStructure();

		return array_merge( $cs, array(
			array(
				'key'   => 'slug',
				'label' => _x( 'RSS Feed', 'grid_box', Plugin::DOMAIN ),
				'type'  => 'select',
				'selections' => array(
//					array(
//						'key'  => 'feed1',
//						'text' => _x( 'Feed 1', 'grid box' ),
//					),
//					array(
//						'key'  => 'feed2',
//						'text' => t( 'Feed 2' ),
//					),
				)
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