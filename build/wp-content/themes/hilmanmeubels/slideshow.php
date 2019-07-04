<?php
	global $dynamic_featured_image;
	$featured_images = $dynamic_featured_image->get_featured_images();
	$featured_images_header = array();

	foreach($featured_images as $img){
		$add = wp_get_attachment_image( $img['attachment_id'], 'Page Header' );
		array_push($featured_images_header, $add);
	}
?>

<section class="slide-show">
	<?php foreach($featured_images_header as $image){
		print_r($image);
	 } ?>
	<nav class="cycle-pager"></nav>
</section>