<?php
get_header();
?>
 
<div id="left-content" class="col-md-11">
			              		<div id="contentbox">
									
									
				                   	<div id="article-wrap" class="col-sm-16">
				                   	<?php if(display_burnshows()) { ?>
									<div class="headline">
		<h1><?php the_title(); ?></h1>
	</div>
	
	<?php $query = new WP_Query(array('post_type' => 'show', 'posts_per_page' => -1));
		  while ( $query->have_posts() ) : $query->the_post();
		  create_day_num($post);
	  	  endwhile;
		  wp_reset_postdata();
		  ?>
			
		
			<?php 
			$args = array('post_type' => 'show', 
						  'tax_query' => array(
							  array(
							  		 'taxonomy' => 'show_category',
									 'field' => 'slug', 
									 'terms' => 'mornings'
							  )
						  ),
						  'meta_key' => 'show_day_num',
						  'orderby' => 'meta_value_num',
						  'order' => 'ASC'
						  );
			$query = new WP_Query($args); ?>
			<h2 class="show-section">Morning Shows 09:00 - 12:00</h2>
			<div class="card-wrap">
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
	
		<div class="show-card">
			<div class="show-text">
				<a class="show-title" href="<?php the_permalink() ?>"><h4><?php the_title(); ?></h4></a>
				<h6><?php get_show_day($post); ?>s at <?php get_show_time($post); ?></h6>
			</div>
			<div class="show-image alignright">
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); ?>
				<img height="80px" src="http://placehold.it/100x80" />
			</div>
		</div>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		</div>
		
		
			<?php 
			$args = array('post_type' => 'show', 
						  'tax_query' => array(
							  array(
							  		 'taxonomy' => 'show_category',
									 'field' => 'slug', 
									 'terms' => 'daytime'
							  )
						  ),
						  'meta_key' => 'show_day_num',
						  'orderby' => 'meta_value_num',
						  'order' => 'ASC'
						  );
			$query = new WP_Query($args); ?>
			<h2 class="show-section">Daytime Shows 12:00 - 17:00</h2>
			<div class="card-wrap">
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
	
		<div class="show-card">
			<div class="show-text">
				<a class="show-title" href="<?php the_permalink() ?>"><h4><?php the_title(); ?></h4></a>
			
				<h6><?php get_show_day($post); ?>s at <?php get_show_time($post); ?></h6>
			</div>
			<div class="show-image alignright">
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); ?>
				<img height="80px" src="http://placehold.it/100x80" />
			</div>
		</div>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		</div>
		
			<?php 
			$args = array('post_type' => 'show', 
						  'tax_query' => array(
							  array(
							  		 'taxonomy' => 'show_category',
									 'field' => 'slug', 
									 'terms' => 'primetime'
							  )
						  ),
							  'meta_key' => 'show_day_num',
							  'orderby' => 'meta_value_num',
							  'order' => 'ASC'
						  );
			$query = new WP_Query($args); ?>
			<h2 class="show-section">Primetime Shows 17:00 - 19:00</h2>
			<div class="card-wrap">
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
	
			<div class="show-card primetime">
				<div class="show-text">
					<a class="show-title" href="<?php the_permalink() ?>"><h4><?php the_title(); ?></h4></a>
					<h6><?php get_show_hosts($post); ?></h6>
					<h6><?php get_show_day($post); ?>s at <?php get_show_time($post); ?></h6>
					
				</div>
				<div class="show-image alignright">
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); ?>
					<img height="80px" src="http://placehold.it/100x80" />
				</div>
			</div>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		</div>
		
		
			<?php 
			$args = array('post_type' => 'show', 
						  'tax_query' => array(
							  array(
							  		 'taxonomy' => 'show_category',
									 'field' => 'slug', 
									 'terms' => 'specialist'
							  )
						  ),
						  'meta_key' => 'show_day_num',
						  'orderby' => 'meta_value_num',
						  'order' => 'ASC'
						  );
			$query = new WP_Query($args); ?>
			<h2 class="show-section">Specialist Shows 19:00 - 23:00</h2>
			<div class="card-wrap">
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
	
			<div class="show-card">
				<div class="show-text">
					<a class="show-title" href="<?php the_permalink() ?>"><h4><?php the_title(); ?></h4></a>
					<h6><?php get_show_day($post); ?>s at <?php get_show_time($post); ?></h6>
				</div>
				<div class="show-image alignright">
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); ?>
					<img height="80px" src="http://placehold.it/100x80" />
				</div>
			</div>
			
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</div>
		<?php } else { ?>
												<div class="headline" style="border-bottom: 0px">
					<h1><?php the_title(); ?></h1>
				</div>
				<div class="page-content">
					<h2 style="text-align: center;"><strong>Coming soon!</strong></h2>
						<p>The schedule is currently being devised by the programme controllers of Burn FM. Try and bend their arm by applying for your own show <a href="#">here</a>.</p>
				</div>
		
				<? }?>
		
		
		
		
	</div>
	
</div>
 <?php twitter_tab(); ?>
</div>

<?php get_sidebar(); ?>
<?php
get_footer();
?>