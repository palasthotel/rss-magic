<?php


namespace Palasthotel\WordPress\RssMagic\Model;


/**
 * @property \SimplePie_Item raw
 * @property Feed feed
 */
class FeedItem {

	/**
	 * FeedItem constructor.
	 *
	 * @param Feed $feed
	 * @param \SimplePie_Item $raw
	 */
	public function __construct($feed, $raw){
		$this->feed = $feed;
		$this->raw = $raw;
	}

	public function get_title(){
		return $this->raw->get_title();
	}

	public function get_permalink(){
		return $this->raw->get_permalink();
	}

	public function get_description(){
		return $this->raw->get_description();
	}

	public function get_date(){
		return $this->raw->get_date();
	}

	/**
	 * @return string
	 */
	public function getSourceType(){
		if(strpos($this->get_permalink(),"https://www.facebook.com/") === 0){
			return ItemSource::FACEBOOK;
		} else if(strpos($this->get_permalink(), "https://twitter.com/") === 0){
			return ItemSource::TWITTER;
		} else if(strpos($this->get_permalink(), "https://www.instagram.com/") === 0){
			return ItemSource::INSTAGRAM;
		} else if(strpos($this->get_permalink(), "https://www.youtube.com/") === 0){
			return ItemSource::YOUTUBE;
		}

		return ItemSource::UNKNOWN;
	}
}