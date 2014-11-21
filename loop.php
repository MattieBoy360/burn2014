<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
								
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
<?php endif;?>