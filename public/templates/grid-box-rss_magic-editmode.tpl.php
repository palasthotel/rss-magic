<?php
/**
 * @var grid_rss_magic_box $this
 * @var object $content
 */
?>
<div class="grid-box-editmode">
	<?php echo ($this->grid)? "<b>": ""; ?>
	RSS Magic Feed
	<?php
	echo ($this->grid) ? "</b>" : "";
	if($this->grid){
		foreach($content as $field => $c){
			if(!empty($c)){
				echo "<br />".$field.": ".$c;
			}
		}
	}
	?>
</div>