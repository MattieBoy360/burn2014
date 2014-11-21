$(document).ready(function() {
	
    $('.carousel').carousel({
  		interval: 8000	
  	});
	
	
	$('a').mouseup(function () {
		this.blur();}
	);
	
	updateStats();
	setInterval(updateStats, 5000);
	
	
	
	function updateStats()
		{
			$.getJSON("http://147.188.57.138:8000/stats?sid=1&json=1&callback=?", function(json){
			
				//update song name, decide if its long enough to require scrolling and if so use marquee
				
					$('#live').html(json.songtitle);
					$('#playing').html(json.songtitle);
					});
					
		}
		
		
		showInfo();
		setInterval(showInfo, 60000);
		
	


function showInfo() {
	var data = {
		'action': 'show_info',
		
	};
	// We can also pass the url value separately from ajaxurl for front end AJAX implementations
	jQuery.getJSON("http://burnfm.com/wp-admin/admin-ajax.php", data, function(response) {
		if(response.online == "false") {
			if($('#showinfo').hasClass('online')) {
			$('#showinfo').removeClass('col-md-8 col-sm-6').addClass('col-md-10 col-sm-9 offline');
			$('#showinfo').html('<br><h2>Off Air   <i class="fa fa-microphone-slash"></i></h2> <h2>We&#39;ll be back at 10am tomorrow.</h2>');
			if($('#showimg').length > 0) {
				$('#showimg').remove();
			}
		
		}
	}
		else if(response.online == "true") {
			if($('#showinfo').hasClass('offline')) {
				$('#showinfo').removeClass('col-md-10 col-sm-9 offline').addClass('col-md-8 col-sm-6 online');
			$('#showinfo').html('<h2>On Air   <i class="fa fa-play-circle"></i></h2>\
			                <h1><a id="showname"></a></h1>\
			                <span class="hidden-sm hidden-xs">Now Playing:&nbsp;</span><span id="live" class="playing hidden-sm hidden-xs"></span>\
			                <h1><a id="player" href="#" onclick="">Click to listen</a></h1>');
							
							$('#player').attr('onclick', "window.open('"+response.player+"','','width=340,height=550'); return false;");
							$('#maininfo').append(' <div id="showimg" class="col-md-2 col-sm-3 col-xs-8">\
								                <img src="'+response.image+'">\
												</div>');
			
			}
			else {
				if(!($('#showinfo').hasClass('online'))) {
					$('#showinfo').addClass('online');
				}
			}
		$('#showname').html(response.name);
		$('#showname').attr("href", response.url);
		console.log(response.image);
		$('#showimg').children('img').attr("src", response.image);
		updateStats();
		}
	});
}
});