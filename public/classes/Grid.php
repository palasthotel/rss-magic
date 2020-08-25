<?php


namespace Palasthotel\WordPress\RSSMagic;


class Grid extends _Component {

	public function onCreate() {
		add_action("grid_load_classes", array($this,"load_classes") );
		add_filter("grid_templates_paths", array($this,"template_paths") );
	}

	/**
	 * load grid box classes
	 */
	public function load_classes() {

		/**
		 * single rss box
		 */
		require_once $this->plugin->path. '/grid/grid_rss_magic_box.php';

	}

	/**
	 * add grid templates suggestion path
	 *
	 * @param $paths
	 *
	 * @return array
	 */
	public function template_paths( $paths ) {
		$paths[] = $this->plugin->path . "/templates";
		return $paths;
	}

}