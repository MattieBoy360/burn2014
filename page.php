<?php get_header(); ?>


					<div id="left-content" class="col-md-11">
			              		<div id="contentbox">
                				
								<?php while ( have_posts() ) : the_post(); ?>
								
					                   	<div id="article-wrap" class="col-sm-16">
					                   	
										<div class="category-head">
					                   	
						               		<h1><?php the_title(); ?></h1>
											
										</div>
										
									
											<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
											
													if($image[0] != "")
													{
														//Image, show
														?>
														
														<!-- <img src="<?php echo $image[0]; ?>" class="page-image aligncenter"/> -->
														<?php the_post_thumbnail(array(400, 300), array('class' => 'aligncenter hidden-xs')); ?>
														<?php
													}
													?>
										<div class="page-content">
                    					
					                       <?php the_content(); ?>
					                      
									   </div>
                    
			                  			</article>
										
					                  </div><!--article wrap!-->
									  
					                   
							  		
						   <?php endwhile;?>
					   </div>
					    <?php twitter_tab(); ?>
				   </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>