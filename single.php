<?php get_header(); ?>



					<div id="left-content" class="col-md-11">
			              		<div id="contentbox">
                				
								<?php while ( have_posts() ) : the_post(); ?>
								
					                   	<div id="article-wrap" class="col-sm-16">
					                   	
										<div class="headline">
				                   			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					                   	
						               		<h1><?php the_title(); ?></h1>
											<h2>By <?php if(function_exists('coauthors_posts_links') )
												
												coauthors_posts_links();  else 
													the_author();
												
												?> | Published <?php the_date(); ?></h2>
											
										</div>
										
									
											<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
											
													if($image[0] != "")
													{
														//Image, show
														?>
														
														<img src="<?php echo $image[0]; ?>" class="visible-xs aligncenter" width="100%" style="max-width: 400px"/> 
														<?php the_post_thumbnail(array(400, 300), array('class' => 'aligncenter hidden-xs')); ?>
														
														
														<?php
													}
													?>
										<div class="page-content">
                    					
					                       <?php the_content(); ?>
					                      
									   </div>
									   
									   
									  
												
											
			                  			</article>
										<?php comments_template(); ?>
					                  </div><!--article wrap!-->
									  
					                   
							  		
						   <?php endwhile;?>
			                   </div>
							   <?php twitter_tab();?>
						   </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>