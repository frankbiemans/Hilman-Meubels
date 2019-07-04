<?php

$countries = return_all_countries();
$api_key = get_option( 'gm_api_key' );

$address_array = [
get_option( 'gm_streetname' ),
get_option( 'gm_zip' ),
get_option( 'gm_city' ),
$countries[get_option( 'gm_country' )]
];
$address = implode(', ', array_filter($address_array));

if(isset($api_key, $address) && trim($api_key) != '' && trim($address) != '' ){

		// Build the iframe url
	$url = 'https://www.google.com/maps/embed/v1/place';
	$url .= '?key='. $api_key;
	$url .= '&q='. $address;
	$url .= '&zoom='. get_option( 'gm_zoom' );
	$url .= '&maptype='. get_option( 'gm_maptype' );

	?>

	<section class="google-map">
		<div class="iframe-wrapper">
			<iframe
			width="<?php echo get_option( 'gm_width' ); ?>"
			height="<?php echo get_option( 'gm_height' ); ?>"
			frameborder="0" style="border:0"
			src="<?php echo $url; ?>" allowfullscreen>
		</iframe>
	</div>
</section>

<?php } else { ?>
<section class="google-map error">
	<p><?php _e('Sorry, you have not filled in a proper Google Maps API key and/or address.'); ?></p>
</section>
<?php } ?>