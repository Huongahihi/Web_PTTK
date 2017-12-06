var mySwiper = new Swiper ('.swiper-container', {
  initialSlide: 0,
  direction: 'horizontal',
  slidesPerView: 'auto',
  grabCursor: true,
  autoplay: 5000,
  loop: true
});

$(document).ready(function(){
	findTallest();
});

function findTallest() {
	var tallest = 0;

	$('.review-text').each(function(key,val) {
		var height = $(this).height();
		if(height >= tallest) tallest = height;
	});
	console.log(tallest);
	$('.review-text').css('min-height',tallest);
	console.log($('.review-text').css('min-height'));
}	