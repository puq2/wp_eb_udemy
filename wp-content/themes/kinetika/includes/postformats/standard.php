<?php
if ( has_post_thumbnail() ) {
	echo '<div class="post-format-media">';

	global $mtheme_pagelayout_type;
	$width=MTHEME_MAX_CONTENT_WIDTH;
	$single_height='';
	$posthead_size="gridblock-full-medium";

	$blogpost_style= get_post_meta($post->ID, MTHEME . '_pagestyle', true);
	if ($blogpost_style == "nosidebar") {
		$posthead_size="gridblock-full";
	}

	if ( $mtheme_pagelayout_type=="fullwidth" ) {
		$posthead_size="gridblock-full";
	}

	if ( $mtheme_pagelayout_type=="two-column" ) {
		$posthead_size="gridblock-full-medium";
	}

	if (in_the_loop()) {
		$posthead_size="gridblock-full";
	}

	echo '<a class="postsummaryimage" href="'. esc_url( get_permalink() ) .'">';
	// Show Image	
	echo mtheme_display_post_image (
		$post->ID,
		$have_image_url=false,
		$link=false,
		$type=$posthead_size,
		$post->post_title,
		$class="" 
	);
	echo '</a>';
	echo '</div>';
}
?>