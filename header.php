<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title("|", true, "right"); ?> <?php bloginfo('title'); ?></title>

    <!-- Bootstrap -->
    
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,800,700,300' rel='stylesheet' type='text/css'>
	
	
	<?php wp_head(); ?>
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	  
	  <div class="container shadow">
		
		  <header>
		  <div id="topbar" class="row">
			  
			  <div id="topbar_links" class="col-md-11 col-sm-9 hidden-xs">
  					<a href="http://facebook.com/burnfmradio" target="new-window">	
        			<i class="fa fa-facebook-square fa-2x"></i>
            		facebook.com/burnfmradio</a>
                           <a href="https://twitter.com/Burn_FM" style="margin-left:20px;" target="new-window"><i class="fa fa-twitter-square fa-2x" ></i>  @burn_fm</a> 
            	</div>
				<div id="searchbar" class="col-md-5 col-sm-7 col-xs-16">
	               <?php get_search_form(); ?>
					</div>
					 </div>
			        <div id="maininfo" class="row">
						
			        	<div id="logo" class="col-md-6 col-sm-7 col-xs-16">
							<?php if(is_category('news')) { ?>
							<a href="<?php bloginfo('url'); ?>"><img src="http://burnfm.com/wp-content/themes/burn2014/img/burn-news.png"></a>
							<?php } else {?>
								<a href="<?php bloginfo('url'); ?>"><img src="http://burnfm.com/wp-content/themes/burn2013/images/inline-logo.png"></a>
								<?php }?>
			        		
			                <h3 class="tagline">Birmingham University Radio Network</h3>
			               	<h3 class="tagline">Contact the studio @burn_fm</h3>
			        	</div>
          
			           <?php if(display_burnshows())
					   {?>
							
							<?php $results = get_current(); 
							
							if ($results->found_posts == 0) { ?>
								 <div id="showinfo" class="col-md-10 col-sm-9 col-xs-16 offline">
							<br><h2>Off Air   <i class="fa fa-microphone-slash"></i></h2> <h2>We'll be back at 10am tomorrow!</h2></div>
							<?php } 
							
							
								else { 
									
									$shows = $results->get_posts();
											foreach($shows as $current)
											{
			
												$name = $current->post_title;
												$url = get_permalink($current->ID);
												
												$image = wp_get_attachment_image_src( get_post_thumbnail_id( $current->ID ), 'big-show-thumb' ); 
												if($image[0] == "") {
													$image[0] = "http://burnfm.com/wp-content/uploads/2014/10/burn-show.png";
												}
				
											}?>
							 <div id="showinfo" class="col-md-8 col-sm-6 col-xs-8">
			            	<h2>On Air   <i class="fa fa-play-circle"></i></h2>
			                <h1><a id="showname" href="<?php echo $url ?>"><?php echo $name; ?></a></h1>
			                <span class="hidden-sm hidden-xs">Now Playing:&nbsp;</span><span id="live" class="playing hidden-sm hidden-xs"></span>
			                <h1><a href="#" onclick="window.open('<?php bloginfo('url')?>/?page_id=93','','width=340,height=550'); return false;">Click to listen</a></h1>
			               </div> 
			               <div id="showimg" class="col-md-2 col-sm-3 col-xs-8">
            
			                <img src="<?php echo $image[0] ?>">
							</div>
							<?php } ?>
			           		<?php } else { ?>
									 <div id="showinfo" class="col-md-10 col-sm-9 col-xs-16">
								<br><h2>Off Air   <i class="fa fa-microphone-slash"></i></h2> <h2>We'll be back in September!</h2></div>
								<?php } ?>
			        </div><!--main info!-->
					
			       
			        	
			            	<div id="nav" class="row">
								
										<div id="mobile-nav" class="visible-xs navbar-header">	
											<span class="toggle-text">Toggle Navigation</span>
							               <button class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" type="button">
							                   <i class="fa fa-bars"></i>
							               </button>
									   </div>
									   <div class="navbar-collapse collapse">
										   <div class="visible-xs">
				   	                    	<ul class="nav navbar-nav nav-pills nav-stacked">
					   	                        <?php wp_nav_menu( array(
												  'menu' => 'header-menu',
												  'depth' => 2,
												  'container' => false,
												  'menu_class' => 'nav',
												  //Process nav menu using our custom nav walker
												  'walker' => new wp_bootstrap_navwalker())
												); ?>
      
				   	                    	</ul>
										</div>
									</div>
									
					   <nav class="hidden-xs col-sm-16">
			                    <ul>
		   	                        <?php wp_nav_menu( array(
									  'menu' => 'header-menu',
									  'depth' => 2,
									  'container' => false,
									  'menu_class' => 'navbar',
									  //Process nav menu using our custom nav walker
									  'walker' => new wp_bootstrap_navwalker())
									); ?>
              
			                    </ul>
						</nav> 
						
	                   
			                </div> <!-- nav wrap !-->
                
			                
			            
		                
			        
					   
		
					   
					   
					   
					   <?php 
					   if (display_burnshows()) {
					   if ($results->found_posts == "0") { 
						   
					   } else {?>
						   
						   
						<div id="playwrap" class="row">
		                <div id="nowplaying" class="col-md-16 col-sm-16 hidden-md hidden-lg">
		                    <span>Now Playing:&nbsp;</span>
		                    <span id="playing"></span>
		                </div><!--nowplaying !-->
					</div>
					<?php } } ?>
					
		           <div id="ticker-wrap" class="row">
		           	<div id="ticker" class="col-md-16 col-sm-16">
						 <h2>Latest: </h2>
					<?php $tickers = get_headlines(); 
					
					$headlines = $tickers->get_posts(); 
					$count = 1;
			              
						   foreach ($headlines as $ticker) {
							   
							   $headline = $ticker->ticker_title;
							  
							   $url = get_permalink($ticker->ID);  ?>
						   
						   <a class="ticker-headline" href="<?php echo $url ?>"><p><?php echo $headline;?></p></a>
						    <?php $count++; } ?>
			               </div><!-- ticker!-->	
       					  
			           </div><!-- ticker-wrap!-->
					   <?php rewind_posts();?>
					   
					   
					   <?php if(!(is_home() || is_404())) { ?>
					   <div class="breadcrumbs row">
						   <div class="col-md-16">
					       <?php if(function_exists('bcn_display'))
					       {
					           bcn_display();
					       }?>
					   </div>
					   </div>
					   <?php } ?>
			       </header>
				   
				   
				   
			       
			       	<div id="content-wrap" class="row">
						