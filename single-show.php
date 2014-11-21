<?php get_header(); ?>



					<div id="left-content" class="col-md-11">
			              		<div id="contentbox">
                				
								<?php while ( have_posts() ) : the_post(); ?>
								
					                   	<div id="article-wrap" class="col-sm-16">
					                   	
										<div class="show-headline">
				                   			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
										<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'big-show-thumb' ); 
										if($image[0] == "") {
											$image[0] = "http://burnfm.com/wp-content/uploads/2014/10/9ba4573a6c0db1b6766a91f01012378f.png";
										}
										
												if($image[0] != "")
												{
													//Image, show
													?>
													<div id="show-img" class="alignright">
													<img src="<?php echo $image[0]; ?>" class="visible-xs alignright" style="max-width: 80px"/> 
													<img src="<?php echo $image[0]; ?>" class="hidden-xs" /> 
												</div>
													
													<?php
												}
												?>
						               		<h1><?php the_title(); ?></h1>
											<h2 style="display:inline-block"><b>On Air:</b> <?php var_dump(is_float(12.5)) ?></h2>
											<h2 style="display:inline-block"><?php echo get_post_meta($post->ID, 'show_day', true)[0]; ?>s at 
												<?php $start = get_post_meta($post->ID, 'start_time',true); 
												($start == 0 ? $start = 24 : $start); ($start > 12 ? $stime = $start-12 :  $stime = $start);  if(is_float($stime)) {
									   $stime = floor($stime);
									   $sdisp = "$stime" . ".30";
									   echo $sdisp;
								   }
								   else {
									   echo "$stime";
								   }
												echo ($start < 12 || $start == 24 ? 'am' :  'pm'); ?></h2>
											<h2><?php get_hosts_sing($post); ?></h2>
											
										</div>
										
								  
									
											
										<div class="page-content">
                    					
					                       <?php the_content(); ?>
										   
										   <?php $twitter = get_post_meta($post->ID, 'show_twitter', true);
										   
										   if($twitter) {?>
											   
											   
											   <div style="text-align: center; font-size: 20px">
											   <i class="icon-twitter"></i>
											   <a href="http://twitter.com/<?php echo $twitter ?>"><p style="display: inline-block">@<?php echo $twitter; ?></p></a>
											   </div>
										   <?php } ?>
										   
										  <?php $facebook = get_post_meta($post->ID, 'facebook_page_url', true);
										  
										   if($facebook) {?>
											   
											   
											   <div style="text-align: center; font-size: 20px">
											   <i class="fa fa-facebook-square"></i>
											   <a href="http://facebook.com/<?php echo $facebook ?>"><p style="display: inline-block">facebook.com/<?php echo $facebook; ?></p></a>
											   </div>
										   <?php } ?>
									  	 		
										   
										   
										   
										   <?php $mixcloud = get_post_meta($post->ID, 'show_mixcloud', true);
										   
										    if($mixcloud) { ?>
												<br>
												<h2>Latest Podcast</h2>
										   <iframe src="//www.mixcloud.com/widget/iframe/?feed=<?php echo urlencode($mixcloud); ?>&amp;mini=1&amp;embed_uuid=9d5eca8f-dc34-4dbd-8de5-9ff42f004f11&amp;replace=0&amp;hide_cover=1&amp;embed_type=widget_standard&amp;hide_tracklist=1" frameborder="0" height="60" width="100%"></iframe><div style="clear: both; height: 3px; width: auto;"></div><p style="display: block; font-size: 11px; font-family: 'Open Sans',Helvetica,Arial,sans-serif; margin: 0px; padding: 3px 4px; color: rgb(153, 153, 153); width: auto;"><a href="<?php echo $mixcloud ?>" target="_blank" style="color:#808080; font-weight:bold;"><?php the_title(); ?> Podcasts</a><span> on </span><a href="http://www.mixcloud.com/?utm_source=widget&amp;utm_medium=web&amp;utm_campaign=base_links&amp;utm_term=homepage_link" target="_blank" style="color:#808080; font-weight:bold;"> Mixcloud</a></p><div style="clear: both; height: 3px; width: auto;"></div>
					                      <?php } ?>
									   </div>
                    
			                  			</article>
										<?php comments_template(); ?>
					                  </div><!--article wrap!-->
									  
					                   
							  		
						   <?php endwhile;?>
			                   </div>
						   
						   				<?php twitter_tab(); ?>
											   
							</div>
											   
<?php get_sidebar(); ?>
<?php get_footer(); ?>