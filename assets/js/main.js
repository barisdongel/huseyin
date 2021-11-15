var path = window.location.pathname.split('/')[2]

if (path === "index.php" || path === "anasayfa" || path === "home") {
	$(document).ready(function() {
		$(window).scroll(function() {
			var scroll = $(window).scrollTop();

	     //>=, not <=
	     if (scroll >= 60) {
	        //clearHeader, not clearheader - caps H
	        $(".navbar").addClass("bg-black");
	    } else {
	    	$(".navbar").removeClass("bg-black");
	    }
	}); //missing );
	});
}
// Portfolio Animation
$(document).ready(function(){
	$(".card-portfolio").hover(function() {
		$('.d-flex-link').addClass('d-none');
		$(this).find(".d-flex-link").removeClass("d-none");
		$('.portfolio-img').removeClass('opacity-5');
		$(this).find(".portfolio-img").addClass('opacity-5');
		$('h4').removeClass('text-dark');
		$(this).find('h4').addClass('text-dark');
	},
	function() {
		$('.d-flex-link').addClass('d-none');
		$('.portfolio-img').removeClass('opacity-5');
		$('h4').removeClass('text-dark');
	});
});

//Blog animation
$(document).ready(function(){
	$(".blog-portfolio").hover(function(){
		$(".blog-img").removeClass("opacity-5");
		$(this).find(".blog-img").addClass("opacity-5");
		$(".card-text").addClass("d-none");
		$(this).find(".card-text").removeClass("d-none");
		$('h1').removeClass('text-dark');
		$(this).find("h1").addClass('text-dark');
		$('.date').removeClass('text-dark');
		$(this).find(".date").addClass('text-dark');
	},
	function() {
		$('.blog-img').removeClass('opacity-5');
		$('h1').removeClass('text-dark');
		$('.date').removeClass('text-dark');
		$('.card-text').addClass('d-none');
	});
});
