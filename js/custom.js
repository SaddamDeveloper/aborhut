 // Menu js for Position fixed
$(window).scroll(function() {
    var window_top = $(window).scrollTop() + 1;
    if (window_top > 180) {
        $('.main-header').addClass('menu_fixed animated fadeInDown');
    } else {
        $('.main-header').removeClass('menu_fixed animated fadeInDown');
    }
});

$(".my-account").click(function(){
  $('.dropDownBox').toggleClass('hidden');
});

$(document).ready(function(){
  $(".navbar-toggle").click(function(){
    if ($(".navbar-toggle").hasClass("collapsed")) {
    	$(".banner-search-box").fadeOut();
    } else {
    	$(".banner-search-box").fadeIn();
    }
  });
});