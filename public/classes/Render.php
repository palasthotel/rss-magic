<?php


namespace Palasthotel\WordPress\RSSMagic;


use Palasthotel\WordPress\RssMagic\Model\Feed;
use Palasthotel\WordPress\RssMagic\Model\FeedItem;

class Render extends _Component {

	public function onCreate() {
		add_action(Plugin::ACTION_RENDER_FEED, [$this, 'render_feed'], 10 , 2);
		add_action(Plugin::ACTION_RENDER_FEED_ITEM, [$this, 'render_feed_item'], 10 , 1);
	}

	/**
	 * @param Feed $feed
	 * @param FeedItem[]|null $feedList
	 */
	public function render_feed($feed, $feedList = null){

		if($feedList == null) $feedList = $this->plugin->repo->fetchFeed($feed);

		$templateWithSlug = sprintf(Plugin::TEMPLATE_FEED_WITH_SLUG, $feed->slug);
		$template = $this->plugin->templates->get_template_path($templateWithSlug);
		if(!empty($template)){
			include $template;
			return;
		}

		include $this->plugin->templates->get_template_path(Plugin::TEMPLATE_FEED);
	}

	/**
	 * @param FeedItem $item
	 */
	public function render_feed_item($item){

		$templateWithSlugAndType = sprintf(Plugin::TEMPLATE_FEED_ITEM_WITH_SLUG_AND_TYPE, $item->feed->slug, $item->get_source());
		$template = $this->plugin->templates->get_template_path($templateWithSlugAndType);
		if(!empty($template)){
			include $template;
			return;
		}

		$templateWithSlug = sprintf(Plugin::TEMPLATE_FEED_ITEM_WITH_SLUG, $item->feed->slug);
		$template = $this->plugin->templates->get_template_path($templateWithSlug);
		if(!empty($template)){
			include $template;
			return;
		}

		$templateWithType = sprintf(Plugin::TEMPLATE_FEED_ITEM_WITH_TYPE, $item->get_source());
		$template = $this->plugin->templates->get_template_path($templateWithType);
		if(!empty($template)){
			include $template;
			return;
		}

		include $this->plugin->templates->get_template_path(Plugin::TEMPLATE_FEED_ITEM);
	}

}