<?php
get_template_part('header-light');
?>
<div id="left-content" class="col-md-16">
<div id="contentbox">
	<div id="article-wrap" class="col-sm-16">
	<?php while ( have_posts() ) : the_post(); ?>
	<?php
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
	?>
	<div class="headline">
		<h1><?php the_title(); ?></h1>
	</div>
		<audio controls="controls" autoplay="true" src="http://147.188.57.138:8000/;"></audio>
		<p class="no-box-title">
			<?php $results = get_current(); ?>
			<?php
			$shows = $results->get_posts();
			foreach($shows as $current)
			{
				$show_title = $current->post_title;
			}
			?>
			<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.burnfm.com" data-text="I'm listening to <?php echo $show_title; ?> on BURN FM. Listen at" data-via="burn_fm" data-size="large" data-count="none">Tweet</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
		</p>
	</div>
	<?php endwhile; ?>
</div>
</div>
</div>
<?php
get_footer();
?>