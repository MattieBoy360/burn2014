<?php get_header(); 
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
	$query_split = explode("=", $string);
	$search_query[$query_split[0]] = urldecode($query_split[1]);
} // foreach

$search = new WP_Query($search_query);
?>

						<div id="left-content" class="col-md-11">
				              		<div id="contentbox">
                				
									<?php if (have_posts()) : ?>
								
					                   
						                   	<div class="col-sm-16">
											<div class="category-head">
				                   			
					                   	
							               		<h1><?php echo $search->found_posts; ?> results for <em>"<?php echo $s; ?>"</em></h1>
											
											
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
												                   	<div class="col-sm-16">
																	<div class="category-head">
				                   			
					                   	
													               		<h1><?php echo $search->found_posts; ?> results for <em>"<?php echo $s; ?>"</em></h1>
											
											
																	</div>
																</div>
																	
													                   	<div id="article-wrap">
													                   	<div id="articletext" class="col-md-16 col-sm-16 col-xs-16">
																		<p>Sorry, no posts were found. Try searching again: </p>
																		<?php get_search_form();?>
																	</div>
					                   							</div>
							  		
							   <?php endif;?>
				                   </div>
								   <?php twitter_tab(); ?>
							   </div>
				
<?php get_sidebar(); ?>
<?php get_footer(); ?>