<div class="post-format-media">
<?php
$m4v_file= get_post_meta($post->ID, MTHEME . '_video_m4v_file', true);
$ogv_file= get_post_meta($post->ID, MTHEME . '_video_ogv_file', true);
$poster_file= get_post_meta($post->ID, MTHEME . '_video_poster_file', true);
$video_height= get_post_meta($post->ID, MTHEME . '_video_height', true);
$video_title= get_post_meta($post->ID, MTHEME . '_video_title', true);

$youtube_video_id= get_post_meta($post->ID, MTHEME . '_video_youtube_id', true);
$vimeo_video_id= get_post_meta($post->ID, MTHEME . '_video_vimeo_id', true);
$dailymotion_video_id= get_post_meta($post->ID, MTHEME . '_video_dailymotion_id', true);
$flash_video_url= get_post_meta($post->ID, MTHEME . '_video_flash_url', true);
$embed_video_code= get_post_meta($post->ID, MTHEME . '_video_embed_code', true);
$google_video_id= get_post_meta($post->ID, MTHEME . '_video_google_id', true);

$video_width= MTHEME_MAX_CONTENT_WIDTH;

if ($ogv_file<>"") { $files_used="ogv, m4v"; } else { $files_used="m4v"; };

if ($m4v_file) {
?>
<script type="text/javascript">
//<![CDATA[
jQuery(document).ready(function(){	
	jQuery("#jquery_jplayer_<?php the_ID(); ?>").jPlayer({
		ready: function () {
			jQuery(this).jPlayer("setMedia", {
				m4v: "<?php echo esc_url( $m4v_file ); ?>",
				ogv: "<?php echo esc_url( $ogv_file ); ?>",
				poster: "<?php echo esc_url( $poster_file ); ?>"
			}).jPlayer("stop");
		},
		swfPath: "<?php echo esc_url( get_stylesheet_directory_uri() . '/js/html5player/' ); ?>",
		supplied: "<?php echo esc_js($files_used); ?>",
		size: {
			width: "100%",
			height: "auto",
			cssClass: "jp-video-360p"
		},
		cssSelectorAncestor: "#jp_container_<?php the_ID(); ?>"
	})
	.bind(jQuery.jPlayer.event.play, function() { // Using a jPlayer event to avoid both jPlayers playing together.
			jQuery(this).jPlayer("pauseOthers");
	});
});
//]]>
</script>


<div id="jp_container_<?php the_ID(); ?>" class="jp-video jp-video-360p">
	<div class="jp-type-single">
		<div id="jquery_jplayer_<?php the_ID(); ?>" class="jp-jplayer"></div>
			<div class="jp-video-play"></div>
			<div class="jp-title">
				<ul>
					<li><?php echo $video_title; ?></li>
				</ul>
			</div>
			<div id="jp_interface_<?php the_ID(); ?>" class="jp-gui jp-interface">
				<ul class="jp-controls">
			          <li><a href="#" class="jp-play" tabindex="1">&#xe052;</a></li>
			          <li><a href="#" class="jp-pause" tabindex="1">&#xe053;</a></li>
			          <li><a href="#" class="jp-mute" tabindex="1" title="mute">&#xe098;</a></li>
			          <li><a href="#" class="jp-unmute" tabindex="1" title="unmute">&#xe099;</a></li>
				</ul>
				<div class="jp-progress">
					<div class="jp-seek-bar">
						<div class="jp-play-bar"></div>
					</div>
				</div>
		        <div class="jp-time-holder">
		          <div class="jp-current-time"></div>
		        </div>
		        <div class="jp-volume-bar">
		          <div class="jp-volume-bar-value"></div>
		        </div>
			</div>
	</div>
</div>
<?php	
}

if ($youtube_video_id || $vimeo_video_id || $dailymotion_video_id || $google_video_id || $flash_video_url || $embed_video_code) {

echo '<div class="ajax-video-wrapper">';
echo '<div class="ajax-video-container">';

}	

if ($youtube_video_id) {
		echo do_shortcode('[youtube_video id="' . $youtube_video_id . '" height="' . $video_height . '" width="' . $video_width . '"]');
	}
	
if ($vimeo_video_id) {
		echo do_shortcode('[vimeo_video id="' . $vimeo_video_id . '" height="' . $video_height . '" width="' . $video_width . '"]');
	}
	
if ($dailymotion_video_id) {
		echo do_shortcode('[dailymotion_video id="' . $dailymotion_video_id . '" height="' . $video_height . '" width="' . $video_width . '"]');
	}
	
if ($google_video_id) {
		echo do_shortcode('[google_video id="' . $google_video_id . '" height="' . $video_height . '" width="' . $video_width . '"]');
	}

if ($flash_video_url) {
		echo do_shortcode('[flash_video src="' . $flash_video_url . '" height="' . $video_height . '" width="' . $video_width . '"]');
	}
	
if ($embed_video_code) {
		echo $embed_video_code;
	}
	
if ($youtube_video_id || $vimeo_video_id || $dailymotion_video_id || $google_video_id || $flash_video_url || $embed_video_code) {

echo '</div>';
echo '</div>';

}
?>
</div>