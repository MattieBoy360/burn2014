<?php
get_header();
?>
 
<div id="left-content" class="col-md-11">
			              		<div id="contentbox">
									
									
				                   	<div id="article-wrap" class="col-sm-16">
				                   	
									<?php if(display_schedule()) { ?>
									<div class="headline" style="border-bottom: 0px">
		<h1><?php the_title(); ?></h1>
	</div>
			
		<?php while ( have_posts() ) : the_post(); ?>
	
		<?php do_shortcode(the_content()); ?>
		<?php endwhile; ?>
	</div>
	<? } else { ?>
										<div class="headline" style="border-bottom: 0px">
			<h1><?php the_title(); ?></h1>
		</div>
		<div class="page-content">
			<h2 style="text-align: center;"><strong>Coming soon!</strong></h2>
				<p>The schedule is currently being devised by the programme controllers of Burn FM. Try and bend their arm by applying for your own show <a href="#">here</a>.</p>
		</div>
	</div>
		<? }?>
</div>
 <?php twitter_tab(); ?>
</div>
 
<?php get_sidebar(); ?>
<?php
get_footer();
?>