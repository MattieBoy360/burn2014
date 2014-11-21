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
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,800,300' rel='stylesheet' type='text/css'>

	
	<?php wp_head(); ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="updateStats(), setInterval(updateStats, 5000)">
	  
	  <div class="container shadow">
		
		  <header>
		  <div id="topbar" class="row">
			  
			  <div id="topbar_links" class="col-md-11 col-sm-9 hidden-xs">
  					<a href="http://facebook.com/burnfmradio" target="new-window">	
        			<i class="fa fa-facebook-square fa-2x"></i>
            		facebook.com/burnfmradio</a>
                           <a href="https://twitter.com/Burn_FM" style="margin-left:20px;" target="new-window"><i class="fa fa-twitter-square fa-2x" ></i>  @burn_fm</a> 
            	</div>
				
					
					 </div>
			        <div id="maininfo" class="row">
						
			        	<div id="logo" class="col-md-6 col-sm-7 col-xs-16">
			        		<a href="<?php bloginfo('url'); ?>"><img src="http://burnfm.com/wp-content/themes/burn2013/images/inline-logo.png"></a>
			                <h3 class="tagline">Birmingham University Radio Network</h3>
			               	<h3 class="tagline">Contact the studio at studio@burnfm.com</h3>
			        	</div>
          
			            <div id="showinfo" class="col-md-8 col-sm-6 col-xs-6">
							
							<?php $results = get_current(); 
							
							if ($results->found_posts == "0") { ?>
							<h2>Off Air   <i class="fa fa-microphone-slash"></i></h2> </br> <h2>We'll be back at 9am tomorrow.</h2> 
							<?php } 
							
							
								else { 
									
									$shows = $results->get_posts();
											foreach($shows as $current)
											{
			
												$name = $current->post_title;
												$url = $current->guid;
				
				
											}?>
			            	<h2>On Air   <i class="fa fa-play-circle"></i></h2>
			                <h1><a href="<?php echo $url ?>"><?php echo $name ?></a></h1>
			                <span class="hidden-sm hidden-xs">Now Playing:&nbsp;</span><span id="live" class="playing hidden-sm hidden-xs"></span>
			                
			               </div> 
			               <div id="showimg" class="col-md-2 col-sm-3 col-xs-10">
            
			                <img src="<?php echo get_template_directory_uri(); ?>/img/show.png">
							<?php } ?>
			           		</div>
							
			        </div><!--main info!-->
					
			       
			        	
			                
			            
		                
			        
					   
		
					   
					   
					   
					   
						
					
			          
				   
				   
				   
			       
			       	<div id="content-wrap" class="row">