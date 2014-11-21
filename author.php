<?php get_header(); ?>




					<div id="left-content" class="col-md-11">
			              		<div id="contentbox">
                				
								<?php if (have_posts()) : the_post(); ?>
								
					                   <div id="authorposts">
					                   	<div class="col-sm-16">
										<div class="category-head">
				                   			
					                   	
						               		<h1>Posts by <?php the_author(); ?></h1>
											
											
										</div>
									</div>
										<div id="display-posts">
											<?php rewind_posts(); ?>
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
						 </div>
						  <?php if (have_posts()) : the_post(); ?>
						  <?php $coauthors = get_coauthors();?>
						  
						 
		               	<div id="right-content" class="col-md-5 col-sm-8 col-xs-16">
		                   	<div class="sidebar-head"><h3>About <?php the_author_meta('first_name'); ?></h3></div>
							
	                       <div class="sidebar" style="padding-bottom: 5px;">
							   <?php $authimgurl = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_author_meta('ID')), 'author-thumb'); ?>
							   <!-- url(<?php echo $authimgurl[0] ?>) -->
							   <?php if(empty($authimgurl)) { 
								   $authimgurl[0] = get_template_directory_uri() .'/img/auth_default.png';
							   	 } ?>
								   
							  
							  <div class="author-pic" style="background-image: url(<?php echo $authimgurl[0] ?>);"></div>
							  
	                       	<p><?php $biography = get_the_author_meta('description'); 
								
								if(!empty($biography)) {
									echo $biography;
								}
								else {
									echo the_author_meta('first_name').' is a contributor to Burn FM.';
								}
								?></p>
							
							<?php $twitter = get_the_author_meta('twitter');
							 ?>
							<?php if(!empty($twitter)) {?>
								<div style="margin-top: 5px">
							<i class="fa fa-twitter auth-twit"></i>
							<a href="https://twitter.com/<?php the_author_meta('twitter'); ?>" target="new-window">@<?php the_author_meta('twitter');?></a>
						</div>
                 		   <?php } ?>
	                           
	                       </div>
					   
						
						
					<?php endif; rewind_posts(); ?>
					
<?php get_template_part('sidebar-auth'); ?>
<?php get_footer(); ?>