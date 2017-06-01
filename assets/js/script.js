var main = function(){
	$('.pull-right>li').click(function(){
		$('.active').removeClass('active');
		$(this).addClass('active');
		
		if ($(this).hasClass('home')){
			$('.slide.active-slide').fadeOut(200);
			$('.active-slide').removeClass('active-slide');
			$('.slide.home').fadeIn(700);
			$('.slide.home').addClass('active-slide');
			$('.slide.home').load('contents.html .slide.home .container');
		}
		else if ($(this).hasClass('terms')){
			$('.slide.active-slide').fadeOut(200);
			$('.active-slide').removeClass('active-slide');
			$('.slide.terms').fadeIn(700);
			$('.slide.terms').addClass('active-slide');
			$('.slide.terms').load('contents.html .slide.terms .container');
		}
		else if ($(this).hasClass('category')){
			$('.slide.active-slide').fadeOut(200);
			$('.active-slide').removeClass('active-slide');
			$('.slide.category').fadeIn(700);
			$('.slide.category').addClass('active-slide');
			$('.slide.category').load('contents.html .slide.category .container');
		}
		else if ($(this).hasClass('download')){
			$('.slide.active-slide').fadeOut(200);
			$('.active-slide').removeClass('active-slide');
			$('.slide.download').fadeIn(700);
			$('.slide.download').addClass('active-slide');
			$('.slide.download').load('contents.html .slide.download .container');
		}
	});
	
	$('.nav-refresh').click(function(){
		document.location.reload();
	});
}

$(document).ready(function(){
	$('.slide.home').load('contents.html .slide.home .container');
	//$('.slide.terms').load('contents.html .slide.terms .container');
	//$('.slide.category').load('contents.html .slide.category .container');
	//$('.slide.download').load('contents.html .slide.download .container');
});
main();