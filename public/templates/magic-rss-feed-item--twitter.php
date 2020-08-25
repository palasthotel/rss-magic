<?php
use Palasthotel\WordPress\RssMagic\Model\FeedItem;
use Palasthotel\WordPress\RSSMagic\Render;
/**
 * @var Render $this
 * @var FeedItem $item
 */
?>
<div class="timeline__block">

	<p>Titel <?php echo $item->get_title(); ?></p>
	<p>Description <?php echo $item->get_description(); ?></p>

    <div class="timeline__content">
        <p><?php echo (isset($item->content->full_text))? $item->content->full_text: $item->content->text; ?></p>
        <a href="<?php echo $item->content->user->url; ?>" class="timeline__readmore">weiterlesen</a>

        <span class="timeline__date"><?php echo $item->datetime->format("H:i - d.m.Y"); ?></span>
    </div>
</div>