<?php
class grid_rss_magic_timeline_box extends grid_list_box {

	const TRANSIENT = "grid_facebook_feed_box_";

	public function type() {
		return 'rss_magic_timeline';
	}
}