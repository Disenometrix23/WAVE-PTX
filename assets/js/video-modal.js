// Function to reveal lightbox and adding YouTube autoplay
function revealVideo(div,video_id) {
	var video = document.getElementById(video_id).src;
	document.getElementById(video_id).src = video; // adding autoplay to the URL
	document.getElementById(div).style.display = 'block';
}

// Hiding the lightbox and removing YouTube autoplay
function hideVideo(div,video_id) {
	var video = document.getElementById(video_id).src;
	var cleaned = video.replace('&autoplay=1',''); // removing autoplay form url
	document.getElementById(video_id).src = cleaned;
	document.getElementById(div).style.display = 'none';
}

jQuery(document).keydown(function(event) { 
  if (event.keyCode == 27) { 
    hideVideo('video','youtube');
  }
});

jQuery((function($){
	var selector=".u-back-to-top";
	$(selector).hide(),
	$(window).scroll((
		function(){
			if($(this).scrollTop()>100)$(selector).fadeIn().css("display","block");
			else $(selector).fadeOut()}
		))
}));