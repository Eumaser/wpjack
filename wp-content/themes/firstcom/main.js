jQuery(document).ready(function($){
	$('#menu-item-434 > a').attr("href", "javascript:void(0);");

	$(".bukit").click(function() {
		$('html,body').animate({
		scrollTop: $(".bukit_div").offset().top -30},    'slow');
	});
	$(".katong").click(function() {
		$('html,body').animate({
		scrollTop: $(".katong_div").offset().top},    'slow');
	});
	$(".hougang").click(function() {
		$('html,body').animate({
		scrollTop: $(".hougang_div").offset().top},    'slow');
	});
	$(".yishun").click(function() {
		$('html,body').animate({
		scrollTop: $(".yishun_div").offset().top},    'slow');
	});
	$(".malaysia").click(function() {
		$('html,body').animate({
		scrollTop: $(".malaysia_div").offset().top},    'slow');
	});
	var slider = new MasterSlider();


	slider.control('lightbox');
	slider.control('thumblist' , {arrows:true, autohide:false ,dir:'h',align:'bottom', width:130, height:85, margin:5, space:5 , hideUnder:400});

	slider.setup('masterslider' , {
		width:750,
		height:580,
		space:5,
		loop:true,
		view:'fade'
	});

	$(document).ready(function(){
		$("a[rel^='prettyPhoto']").prettyPhoto();
	});

	$('#nav-toggle').click(function(event) {
		$(this).toggleClass('active');
		if ($('#nav-toggle').hasClass('active')) {
			$('#nav').show();
		}
		else{
			$('#nav').hide();
		};
	});

	jQuery(function($){
		$( '.menu-btn' ).click(function(){
			$('.responsive-menu').addClass('expand')
			$('.menu-btn').addClass('btn-none')
		})

		$( '.close-btn' ).click(function(){
			$('.responsive-menu').removeClass('expand')
			$('.menu-btn').removeClass('btn-none')
		})
	})
});

