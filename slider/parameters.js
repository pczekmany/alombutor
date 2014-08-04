$(document).ready(function() {
				$('#slider').rhinoslider({
					effectTime: 2000,
					showTime: 7000,
					controlsMousewheel: false,
					controlsKeyboard: false,
					controlsPrevNext: true,
					controlsPlayPause: false,
					autoPlay: true,
					pauseOnHover: true,
					showBullets: 'always',
					showControls: 'hover',
					showCaptions: 'always',
					captionsOpacity: 1,
					slidePrevDirection: 'toRight',
					slideNextDirection: 'toLeft'
				});
			
					meretez();
	
				  $(window).resize(function(){
					meretez();
				  });
				  
				  jQuery("#slide1").load(function(){
					 
					 meretez();
				  });
  
				
			});

function meretez(){
   var getslidewd= $('.wrapper').width();

	var getslidehi= $('.slide').height();
	

	$('.rhino-container').width(getslidewd);

	$('.rhino-container').height(getslidehi);

	$('.rhino-container #slider li').width(getslidewd);
	$('.rhino-container #slider li').height(getslidehi);
	
	
	
	$(".rhino-prev").css("top", getslidehi/2.5+"px");
	$(".rhino-next").css("top", getslidehi/2.5+"px");
}