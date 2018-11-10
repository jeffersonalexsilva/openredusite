var topPosition = 0;
jQuery(document).ready(function(){
	
	//scroll 
	jQuery(function() {
	  jQuery('nav.menu-top a[href*="#"]:not([href="#"])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		  var target = jQuery(this.hash);
		  target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
		  if (target.length) {
			jQuery('html, body').animate({
			  scrollTop: target.offset().top
			}, 1000);
			return false;
		  }
		}
	  });
	});
	
		jQuery(window).on('scroll',function(e){
			if(jQuery(window).scrollTop() > topPosition){
				jQuery('header#head-page').addClass('hide');								
				if(jQuery('header#head-page').hasClass('show')){
					jQuery('header#head-page').removeClass('show');								
				}
			}else{
				jQuery('header#head-page').removeClass('hide');								
				if(!jQuery('header#head-page').hasClass('show')){
					jQuery('header#head-page').addClass('show');								
				}
			}
			topPosition = jQuery(window).scrollTop();
				/*console.log(jQuery('section#conheca').offset().top - topPosition);
				jQuery('section#conheca div img.aprendizado').css('top',  (topPosition/100) - 10 +'%');
				jQuery('section#conheca div img.api').css('top',  (topPosition/100) - 15 +'%');
				jQuery('section#conheca div img.mobile').css('top',  (topPosition/100) - 20 +'%');
				jQuery('section#conheca div img.midiasocial').css('top',  (topPosition/100) - 10 +'%');*/
		});
});