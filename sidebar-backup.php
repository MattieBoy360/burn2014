			              
							<div id="right-content" class="col-md-5 col-sm-8 col-xs-16">
			                   	
								<?php if(display_burnshows()) {
									?>
									
									<?php $nextshow = coming_up(3); 
									
									$postnum = 1;
										$nextshows = $nextshow->get_posts();
									foreach($nextshows as $show) { 
										
										$name = $show->post_title;
										$showurl = get_permalink($show->ID);
										$stime = $show->start_time;
										$etime = $stime+$show->show_duration;
										$showtype = $show->show_type;
										$endtime =1;
											 ?>
											 <div class="sidebar-head">
												<h3> <?php echo ($postnum == 1 ? 'Up Next on Burn FM' : 'Later on Burn FM'); ?> </h3>
			                       
			                       </div>
                    
			                       <div id="upnext" class="sidebar">
			                       	<h1><a class="show_link" href="<?php echo $showurl?>"><?php echo $name ?></a></h1>
                        
			                           <div class="showtype <?php echo $showtype ?>"><?php echo $showtype ?></div>
                
			                           <h2><?php ($stime > 12 ? $stime = $stime-12 :  $stime);
										   if(is_float($stime)) {
											   $stime = floor($stime);
											   $start = "$stime" . ".30";
											   echo $start;
										   }
										   else {
											   echo "$stime";
										   }
										   
										   ?>-<?php ($etime > 12 ? $endtime = $etime-12 : $endtime = $etime);
										   
										   if(round($etime) != floor($etime) ) {
											   $endtime = floor($endtime);
											   $str = "$endtime" . ".30";
											   echo $str;
										   }
										   else {
											   echo "$endtime";
										   }
										   echo ($etime >= 12 && $etime < 24 ? 'pm' :  'am'); ?></h2>
			                           <br>
			                           <br>
			                           <h4><i class="fa fa-twitter auth-twit"></i> @twitterfeedhere</h4>
                        
			                           <img src="<?php echo get_template_directory_uri(); ?>/img/upnext.png">
									  
			                       </div><!--upnext !-->
                    			   <?php $postnum++; } ?>
								   
								   <?php } 
								   
								   else { ?>
									   
											
								   <?php } ?>
								   <?php if ( is_active_sidebar( 'sidebar-widget-area' ) ) { 
									   			dynamic_sidebar( 'sidebar-widget-area' );
											}
									   ?>
								   
								   
			                       <div id="twitterfeed" class="sidebar-head hidden-xs hidden-sm">
			                       	<h3><i class="fa fa-twitter"></i> Twitter feed</h3>
			                       </div><!--twitter head!-->
			                       <div id="twitterfeedbody" class="sidebar hidden-xs hidden-sm">
			                       	<a class="twitter-timeline" width="280px" data-chrome="noborders nofooter" href="https://twitter.com/Burn_FM"  data-widget-id="488468035724787712">Tweets by @Burn_FM</a>
			       <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

			                           </div><!-- twitterfeedbody -->
			                   </div><!-- right-content!-->