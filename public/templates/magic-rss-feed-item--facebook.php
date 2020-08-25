<?php

use Palasthotel\WordPress\RssMagic\Model\FeedItem;
use Palasthotel\WordPress\RSSMagic\Render;
/**
 * @var Render $this
 * @var FeedItem $item
 */
echo "<h2>Facebook</h2>";
echo "<p>".$item->get_title()." ".$item->get_permalink()."</p>";