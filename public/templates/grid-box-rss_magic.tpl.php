<?php

use Palasthotel\WordPress\RssMagic\Model\Feed;
use Palasthotel\WordPress\RssMagic\Model\FeedItem;
use Palasthotel\WordPress\RSSMagic\Plugin;

/**
 * @var grid_rss_magic_box $this
 * @var object $content
 * @var Feed|false $feed
 * @var FeedItem[] $feedList
 */
$feed = $content->feed;
$feedList = $content->feedList;

?>
<div class="grid-box">
	<?php
    do_action(Plugin::ACTION_RENDER_FEED, $feed, $feedList);
	?>
</div>