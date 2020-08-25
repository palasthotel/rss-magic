<?php

use Palasthotel\WordPress\RssMagic\Model\FeedItem;
use Palasthotel\WordPress\RSSMagic\Plugin;
use Palasthotel\WordPress\RssMagic\Model\Feed;

/**
 * @var Feed $feed
 * @var FeedItem[] $feedList
 */

foreach ($feedList as $item){
	do_action( Plugin::ACTION_RENDER_FEED, $item);
}
