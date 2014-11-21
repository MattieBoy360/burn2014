<?php get_header(); 

?>



					<div id="left-content" class="col-md-11">
						
						<div id="featureCarousel" class="carousel slide"><!-- class of slide for animation -->
							<ol class="carousel-indicators">
								<li class="active" data-slide-to="0" data-target="#featureCarousel"></li>
								<li data-slide-to="1" data-target="#featureCarousel"></li>
								<li data-slide-to="2" data-target="#featureCarousel"></li>

							</ol>
						  <div class="carousel-inner">
						   	 
              				<?php 
							$args = array('cat' => 5, 'posts_per_page' => 3);
							$query_news = new WP_Query($args); ?>
							<?php if ( $query_news->have_posts() ) : while ( $query_news->have_posts() ) : $query_news->the_post();?>
								
							<?php if( $query_news->current_post == 0 && !is_paged() ) { 
								echo '<div class="item active">';
								}
								else {
								echo '<div class="item">';
								} ?>
								
								<!-- class of active since it's the first item -->
			                       <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'carousel-thumb-desk' ); ?>
								   <?php $imagetab = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'carousel-thumb-tab' ); ?>
								   <?php $imagemob = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'carousel-thumb-mob' ); ?>
								   <?php $imageland = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'carousel-thumb-mob-land' ); ?>
								   <a href="<?php the_permalink(); ?>">
								   <div class="carousel-image hidden-sm hidden-xs"><img src="<?php echo $image[0] ?>"/></div>
								    <div class="carousel-image hidden-lg hidden-md hidden-xs"><img src="<?php echo $imagetab[0] ?>"/></div>
									 <div class="carousel-image hidden-lg  hidden-md hidden-sm hidden-land"><img src="<?php echo $imagemob[0] ?>"/></div>
									 <div class="carousel-image hidden-lg visible-land" style="background-image: url('<?php echo $imageland[0] ?>');
										 background-position: 50% 50%; height: 150px; background-size: 100% 100%; background-repeat: no-repeat;"></div>
										 
									 <div class="carousel-caption">
										
										 <h3><?php the_title(); ?></h3></a>
										 <p><?php echo $post->carousel_byline; ?></p>
									</div>
								</div>
						   <?php endwhile; ?>
					   <?php endif; ?>
						  </div><!-- /.carousel-inner -->

						  <a class="left carousel-control" data-slide="prev" href="#featureCarousel"><span class="icon-prev"></span></a>
						  <a class="right carousel-control" data-slide="next" href="#featureCarousel"><span class="icon-next"></span></a>

						</div><!-- /.carousel -->
     				
						<?php wp_reset_postdata();?>
						
						
			              		<div id="contentbox">
									
									
									
									<?php global $query_string; query_posts($query_string . '&offset=3'); ?>
                				
								<?php if (have_posts()) : ?>
								
					                   
					                   	<div class="col-sm-16">
										<div class="category-head">
				                   			
					                   	
						               		<h1><?php single_cat_title(); ?> on Burn FM</h1>
											
											
										</div>
									</div>
									
									
									
									
									
									
									
										<div id="display-posts">
									<?php while ( have_posts() ) : the_post(); ?>
								
														                   	<div id="article-wrap">
														                   	<div id="articletext" class="col-md-9 col-sm-10 col-xs-16">
												                   			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
														                   
														               		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                   
                    
														                       <p><?php the_excerpt(); ?></p>
														                       </div>
														                       <div id="articleimg" class="col-md-7 col-sm-6 col-xs-16">
														                       <?php the_post_thumbnail('thumbnail'); ?>
														                       </div>
                    
												                  			</article>
														                  </div><!--article wrap!-->
									  
														                   <hr>
							  
															   <?php endwhile;  ?> 
															 </div>  
															  
														   <?php else:?>
														   <p>Sorry, no posts matched your criteria.</p>
			                  		
										
					                   
							  		
						   <?php endif;?>
			                   </div>
							   <?php twitter_tab(); ?>
						   </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>