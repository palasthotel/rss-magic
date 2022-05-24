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

	/**
	 * @param string $format
	 *
	 * @return \DateTime|string
	 */
	public function get_date( $format = null ){
		$date = $this->raw->get_date("Y-m-d H:i:s");
		$time = strtotime($date);
		$dt = new \DateTime($date);
		$dt->setTimezone(new \DateTimeZone(get_option('timezone_string')));
		return ($format) ? $dt->format($format): $dt;
	}

	/**
	 * @return \SimplePie_Author|null
	 */
	public function get_author(){
		return $this->raw->get_author(0);
	}

	/**
	 * @return array|\SimplePie_Author[]|null
	 */
	public function get_authors(){
		return $this->raw->get_authors();
	}

	public function get_media(){
		return $this->raw->get_enclosure(0);
	}

	public function get_thumbnail(){
		return $this->raw->get_thumbnail();
	}

	/**
	 * @return string
	 */
	public function get_source(){
		if(strpos($this->get_permalink(),"https://www.facebook.com/") === 0){
			return Source::FACEBOOK;
		} else if(strpos($this->get_permalink(), "https://twitter.com/") === 0){
			return Source::TWITTER;
		} else if(strpos($this->get_permalink(), "https://www.instagram.com/") === 0){
			return Source::INSTAGRAM;
		} else if(strpos($this->get_permalink(), "https://www.youtube.com/") === 0){
			return Source::YOUTUBE;
		}

		return Source::UNKNOWN;
	}
}