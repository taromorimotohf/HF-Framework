// ============================================================
// jQuery functions
// ============================================================

//UserAgent
var getDevice = (function(){
  //tablet & android2.3
  var ua = navigator.userAgent;
  if(ua.indexOf('iPad') > 0 || ua.indexOf('Android') > 0){
      document.getElementsByTagName("body")[0].setAttribute("class","tablet");
  }
  if( ua.search(/Android 2.3/) != -1 ){
      document.getElementsByTagName("body")[0].setAttribute("class","old-android");
  }
  //PC or SP
  var egwidth = $(window).width();
  if (egwidth <= 767) {
    $('body').removeClass('desktop').addClass('smartphone');
  } else if (egwidth >= 768) {
    $('body').addClass('desktop').removeClass('smartphone');
  }
})();
$(function(){
  //PAGE TOP
  $('#pagetop').click(function() {
    $("html, body").animate({scrollTop:0}, 500, "swing");
    return false;
  });
  //SMOOTH SCROLL (ADD CLASS'scroll')
  $('a.scroll').click(function(){
    var speed = 500;
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
  });
  //ACCORDION
  $('.js-accordion').next('*').hide();
  $('.js-accordion').click(function() {
    if($(this).hasClass('show-accordion')){
      $(this).removeClass('show-accordion').next('*').slideDown();
    } else {
      $(this).addClass('show-accordion').next('*').slideUp();
    }
  });
  //TAB
  var tab = $('.js-tab > *'),
      tabChild = $('.js-tab-child > *'),
      url = location.href,
      hash = [];
      hash = new Array();
      hash = url.split('#');
      console.log(hash);

  if(hash[1]){
    var indexId = tab.index($('#' + hash[1]));
    tab.eq(indexId).addClass('show-tab');
    tabChild.hide().eq(indexId).show().addClass('show-tab-child');
  } else {
    tab.eq(0).addClass('show-tab');
    tabChild.hide().eq(0).show().addClass('show-tab-child');
  }
  tab.click(function() {
    var index = tab.index(this);
    tab.removeClass('show-tab');
    $(this).addClass('show-tab');
    tabChild.hide().removeClass('show-tab-child').eq(index).show().addClass('show-tab-child');
  });

})