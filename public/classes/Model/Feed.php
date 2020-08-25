<?php


namespace Palasthotel\WordPress\RssMagic\Model;


class Feed {

	public $slug;
	public $url;

	public function __construct($slug, $url){
		$this->slug = $slug;
		$this->url = $url;
	}

	public function asArray(){
		return json_encode(["slug" => $this->slug, "url" => $this->url]);
	}
}