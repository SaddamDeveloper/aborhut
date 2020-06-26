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

$(function(){
  var dtToday = new Date();
  
  var month = dtToday.getMonth() + 1;
  var day = dtToday.getDate();
  var year = dtToday.getFullYear();
  if(month < 10)
      month = '0' + month.toString();
  if(day < 10)
      day = '0' + day.toString();
  
  var maxDate = year + '-' + month + '-' + day;
  $('#v_date').attr('min', maxDate);
});