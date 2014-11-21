<?php 

require_once('wp_bootstrap_navwalker.php');
 

// wp_register_style() example
function load_styles_to_theme() {
	
	wp_enqueue_style('my-bootstrap-extension', get_template_directory_uri() .'/css/bootstrap.min.css');
	if(in_category('news')) {
		wp_register_style('news-style-sheet', get_template_directory_uri() .'/style_news.css');
		wp_enqueue_style('news-style-sheet');
		
	}
	else {
	wp_enqueue_style('theme-style-sheet', get_stylesheet_uri() );
	}
	
}

add_action( 'wp_enqueue_scripts', 'load_styles_to_theme' );

function register_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'footer-menu' => __( 'Footer Menu' )
    )
  );
}

function widgets_init() {
 
    // Sidebar widget area, located in the sidebar. Empty by default.
    register_sidebar( array(
        'name' => 'Sidebar Widget Area',
        'id' => 'sidebar-widget-area',
        'description' => 'The sidebar widget area',
        'before_widget' => '',
        'after_widget' => '</div>',
        'before_title' => '<div class="sidebar-head">
			                       	<h3>',
        'after_title' => '</h3></div><div class="sidebar widget">',
    ) );
 
}

function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">...' . __('Read More', 'your-text-domain') . '</a>';
}

function tweakjp_custom_is_support() {
	$supported = current_theme_supports( 'infinite-scroll' ) && ( is_home() || is_archive() || is_search() );

	return $supported;
}
add_filter( 'infinite_scroll_archive_supported', 'tweakjp_custom_is_support' );

function mytheme_infinite_scroll_init() {
add_theme_support( 'infinite-scroll', array(
    'type'           => 'click',
    'container'      => 'display-posts',
    'wrapper'        => 'article-wrap',
	'render'		 => 'render_infinite_scroll_postsloop',
    'posts_per_page' => false,
) );

}

function filter_jetpack_infinite_scroll_js_settings( $settings ) {
    $settings['text'] = __( 'Load more...', 'l18n' );
 
    return $settings;
}
add_filter( 'infinite_scroll_js_settings', 'filter_jetpack_infinite_scroll_js_settings' );

function base_pagination() {
    global $wp_query;

    $big = 999999999; // This needs to be an unlikely integer

    // For more options and info view the docs for paginate_links()
    // http://codex.wordpress.org/Function_Reference/paginate_links
    $paginate_links = paginate_links( array(
        'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'mid_size' => 5
    ) );

    // Display the pagination if more than one page is found
    if ( $paginate_links ) {
        echo '<div class="pagination">';
        echo $paginate_links;
        echo '</div><!--// end .pagination -->';
    }
}

function render_infinite_scroll_postsloop() {
	get_template_part('loop');
}

function button_shortcode($atts, $content = ""){
	extract( shortcode_atts( array(
	      'link' => '#',
	      'align' => ''
    ), $atts ) );
	return '<div style="text-align:'.$align.';"><a href="' . $link . '" class="button">' . do_shortcode($content) . '</a></div>';
}

function icon_shortcode($atts, $content = ""){
	return '<i class="fa ' . $content . '"></i>';
}

function iconwrap_shortcode($satts, $content = "") {
	return '<div class="iconwrap">'.do_shortcode($content).'</div>';
}

function iconbox_shortcode($atts, $content = ""){
	extract( shortcode_atts( array(
	      'icon' => '',
	      'width' => '50%',
	      'float' => 'left',
    ), $atts ) );
	return '<div class="iconbox" style="width:' . $width . '; float:' . $float . ';"><i class="' . $icon . ' icon-2x"></i>' . wpautop($content) . '</div>';
}

add_filter( 'coauthors_guest_author_fields', 'capx_filter_guest_author_fields', 10, 2 );
function capx_filter_guest_author_fields( $fields_to_return, $groups ) {
 
if ( in_array( 'all', $groups ) || in_array( 'contact-info', $groups ) ) {
$fields_to_return[] = array(
'key' => 'twitter',
'label' => 'Twitter <h6><i>Note: Do not include @ symbol</i></h6>',
'group' => 'contact-info',
);
}
 
return $fields_to_return;
}

function schedule_shortcode(){
	$schedule = get_schedule();
	$days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
	$html = '';
	if(count($schedule) > 0){
		$html .= '<ul class="nav nav-tabs" role="tablist" id="showSchedule">';
		for($i = 0; $i < 7; $i++) {
			$day = $days[$i];
			
			
			$html .=  '<li'. ($i == 0 ? ' class="active"' : '').'><a href="#'.strtolower($day).'" role="tab" data-toggle="tab">'.$day.'</a></li>';
			
		}
		$html .= '</ul>
				  <div class="tab-content">';
		foreach($schedule as $key => $shows)
		{
			
			$day = $days[$key];
			$count = count($shows);
			
			if($count > 0){
				$html .= '<div class="tab-pane' . ($key == 0 ? ' active"' : '"'). 'id="' .strtolower($day) .'">
							<h3 class="day-title">'.$day.'s on Burn FM</h3>';
				
			}
			$html .= '<ul class="schedule_list">';
			foreach($shows as $show){
				
				$start_time  = date("ga", strtotime(get_field('start_time', $show->ID) . ":00"));
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $show->ID ), 'big-show-thumb' );
				
					
					$html .= '<li class="show-style">';
					$html .= '<h2 class="start">'.$start_time.'</h2>';
					$html .= '<div style="display: inline-block">';
					
					$html .= '<h3 class="show-title"><a href="' . get_permalink($show->ID) . '">' . $show->post_title . '</a></h3><br>';
					$html .= '<div class="showtype '.$show->show_type.' ">'.$show->show_type.'</div>';
					$html .= '</div>';
					$html .= '<img class="alignright" src="'. $image[0]. '" width="100px">';
					$html .= '</li>';
				
			}
			$html .= '</ul>';
			$html .= '</div>';
		}
		
		$html .= '</div>';
	}
	else
	{
		$html = 'There are no shows in the schedule right now.';
	}
	return $html;
}
 
function SearchFilter($query) {
	if ($query->is_search) {
	$query->set('post_type', 'post');
	}
	return $query;
	}
	 
	add_filter('pre_get_posts','SearchFilter');
	
	add_filter( 'coauthors_guest_author_manage_cap', 'capx_filter_guest_author_manage_cap' );
	function capx_filter_guest_author_manage_cap( $cap ) {
		return 'edit_others_posts';
	}
	
	function custom_login_css() {
	 echo '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri().'/login/login-styles.css">';
	}
	
	function my_login_logo_url() {
	    return get_bloginfo( 'url' );
	}
	
	function my_login_logo_url_title() {
	    return 'Burn FM - Birmingham University Radio Network';
	}
	
	function get_show_hosts($post) {
		$hosts = get_post_meta($post->ID, 'hosts', true);
		
		if($hosts != " ") {
		 echo 'with ' .$hosts; 
	 	}
	}
	
	function get_hosts_sing($post) {
		$hosts = get_post_meta($post->ID, 'hosts', true);
		
		if($hosts != " ") {
		 echo '<b>Hosted by:</b> ' .$hosts; 
	 	}
	}
	function get_show_day($post) {
		 echo get_post_meta($post->ID, 'show_day', true)[0]; 
												
	}
	
	function get_show_time($post) {
		$start; $stime = get_post_meta($post->ID, 'start_time',true); 
		($stime == 0 ? $stime = 24 : $stime); ($stime > 12 ? $start = $stime-12 :  $start = $stime); echo $start;
		echo ($stime < 12 || $stime == 24 ? 'am' :  'pm'); 
	}
	
	function load_twitter_tablet() {
		echo '<div id="twit-wrap" class="row visible-sm col-sm-8">
					                       <div id="twitterfeed" class="sidebar-head">
					                       	<h3><i class="fa fa-twitter"></i> Twitter feed</h3>
					                       </div><!--twitter head!-->
					                       <div id="twitterfeedbody" class="sidebar">
					                       	<a class="twitter-timeline"  href="https://twitter.com/Burn_FM"  data-widget-id="488468035724787712">Tweets by @Burn_FM</a>
					       <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

					                           </div><!-- twitterfeedbody -->
											  </div> ';
	}
	
	function twitter_tab() {
		do_action('load_twit_tab');
	}
	

	function create_day_num($post) {
		
			if(get_post_type($post) == 'show') {
				$showday = get_post_meta($post->ID, 'show_day', true)[0];
				
				switch($showday) {
					case 'Monday' :
					add_post_meta($post->ID, 'show_day_num', '1', true);
					break;
					case 'Tuesday' :
					add_post_meta($post->ID, 'show_day_num', '2', true);
					break;
					case 'Wednesday' :
					add_post_meta($post->ID, 'show_day_num', '3', true);
					break;
					case 'Thursday' :
					add_post_meta($post->ID, 'show_day_num', '4', true);
					break;
					case 'Friday' :
					add_post_meta($post->ID, 'show_day_num', '5', true);
					break;
					case 'Saturday' :
					add_post_meta($post->ID, 'show_day_num', '6', true);
					break;
					case 'Sunday' :
					add_post_meta($post->ID, 'show_day_num', '7', true);
					break;
				}
			
			}
		
	}
	
	
	function authorbio_shortcode($satts, $content = "") {
	
	   $coauthors = get_coauthors();
	   $html = '';
	   		 foreach ($coauthors as $coauthor) { 
	   		 $html .= '<hr><div class="auth-temp">';
             $html .= '<h3>About the author: '.  $coauthor->display_name . '</h3>';

                   
			 $authimgurl = wp_get_attachment_image_src(get_post_thumbnail_id($coauthor->ID)); 
					   
					  
			$html .= '<div class="author-pic" style="background-image: url('. $authimgurl[0].')"></div>';

            $html .= '<p>'. $coauthor->description .'</p>';

			$twitter = $coauthor->twitter;
			
			if(!empty($twitter)) {
				$html .=  '<div style="margin-top: 5px">';
			$html .= '<i class="fa fa-twitter auth-twit"></i>';
			$html .= '&nbsp;<a href="https://twitter.com/'.$twitter.'" target="new-window">@'.$twitter.'</a>';
		$html .= '</div>';
 		   	} 
               		
		
				  
				  
		    $html .= '</div>';
		  }
			return $html;	
		
	}
	
	function ajax_show_name() {
		global $wpdb;
		
		
		 $results = get_current(); 
		 $burl = get_bloginfo('url');
		 $tdir = get_template_directory_uri();
		if ($results->found_posts == "0") {
			echo json_encode(array("online"=>"false"));
		}
			else { 
				
				$shows = $results->get_posts();
						foreach($shows as $current)
						{

							$name = $current->post_title;
							$url = get_permalink($current->ID);
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $current->ID ), 'big-show-thumb' );
							if($image[0] == "") {
								$image[0] = "http://burnfm.com/wp-content/uploads/2014/10/9ba4573a6c0db1b6766a91f01012378f-132x122.png";
							}

						}
						$returndata = array("url"=>$url, "name"=>$name, "image"=>$image[0], "online"=>"true", "player"=>$burl."/?page_id=93", "tdir"=>$tdir);
						echo json_encode($returndata);
						
					}
					die(); 
		
	}
	
	add_filter( 'login_headertitle', 'my_login_logo_url_title' );
	add_filter( 'login_headerurl', 'my_login_logo_url' );
	
	add_action( 'wp_ajax_show_info', 'ajax_show_name' );
	add_action( 'wp_ajax_nopriv_show_info', 'ajax_show_name' );
	add_action('load_twit_tab', 'load_twitter_tablet');
	add_action('login_head', 'custom_login_css');

add_shortcode('iconwrap', 'iconwrap_shortcode');
add_shortcode('authorbio', 'authorbio_shortcode');
add_shortcode('icon', 'icon_shortcode');
add_shortcode('button', 'button_shortcode');
add_shortcode('iconbox', 'iconbox_shortcode');
add_shortcode('schedule', 'schedule_shortcode');

add_action( 'init', 'mytheme_infinite_scroll_init');

add_filter( 'excerpt_more', 'new_excerpt_more' );

add_action( 'widgets_init', 'widgets_init' );



add_action('init', 'register_menus');
add_theme_support('post-thumbnails');
add_image_size( 'carousel-thumb-desk', 640, 271, true ); 
add_image_size( 'carousel-thumb-tab', 800, 301, true ); 
add_image_size( 'carousel-thumb-mob', 640, 319, true ); 
add_image_size( 'carousel-thumb-mob-land', 800, 301, true ); 
add_image_size( 'author-thumb', 300, 400, true ); 
add_image_size( 'show-thumb', 122, 95, true ); 
add_image_size( 'big-show-thumb', 132, 122, array ('center', 'top') ); 
add_image_size( 'small-show-thumb', 100, 70, false ); 
add_image_size( 'page-show-thumb', 130, 80, array('center', 'top'));

?>