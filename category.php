<?php get_header(); ?>



					<div id="left-content" class="col-md-11">
			              		<div id="contentbox">
                				
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
														                       <div id="articleimg" class="col-md-7 col-sm-6 col-xs-16 aligncenter">
														                       <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail', array('class' => 'aligncenter')); ?></a>
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