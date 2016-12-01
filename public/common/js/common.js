// ============================================================
// ATTENTION & COMMON RULE!!
// 関数を実装のみ（処理の実行は下部で実行する）
// 関数名には振る舞いを表す英語プラスFuncを付ける
// ============================================================


// レスポンシブ判定 & デバイス判定関数（PC,SP共通処理）
// タブレットはiPad のみ判定しているが、別途判定が必要な場合はUAをclass名を追加する
//-------------------------------------------------------------
function checkDeviceAndWidthFunc(){

  var desktop,smartphone;
  var egwidth = $(window).width();
  var ua = navigator.userAgent;

  // iPad 判定
  if(ua.indexOf('iPad') > 0){
      document.getElementsByTagName("body")[0].setAttribute("class","tablet");
  }
  // PC or SP
  if (egwidth <= 767) {
    desktop = true;
    smartphone = false;
    $('body').removeClass('desktop').addClass('smartphone');
  } else {
    desktop = false;
    smartphone = true;
    $('body').addClass('desktop').removeClass('smartphone');
  }

}


// load判定関数（PC,SP共通処理）
//-------------------------------------------------------------
function loadedPageFunc (){

  var $pageBody = $('body');
  $pageBody.addClass('loaded');

}



// アコーディオン処理（個別処理、PC,SP共通処理）
// （class名を指定するとその次の要素がアコーディオン処理をする）
//-------------------------------------------------------------
function showAccordionFunc($accodionClassName){

  var $accodionClassName = $($accodionClassName);
  $accodionClassName.next('*').hide();
  $accodionClassName.click(function() {
    if($(this).hasClass('show-accordion')){
      $(this).removeClass('show-accordion').next('*').slideUp();
    } else {
      $(this).addClass('show-accordion').next('*').slideDown();
    }
  });

}


// アコーディオン処理（一括処理、PC,SP共通処理）
// （dl > dt dd での処理を想定とする　dtをクリックした時にddをアコーディオン処理）
//-------------------------------------------------------------
function showAllAccordionFunc($accodionAllClassName){

  var $accodionAllClassName = $($accodionAllClassName + ' dt');

  $accodionAllClassName.click(function() {
    if($(this).hasClass('show')){
      $(this).removeClass('show').parent('dl').children('dd').slideUp('fast');
    } else {
      // 常に一つだけの処理
      $(this).addClass('show').parent('dl').children('dd').slideUp('fast');
      $(this).next('dd').slideDown('fast');
      // 個別に処理する場合（デフォルトコメントアウト）
      // $(this).addClass('show').next('dd').slideDown('fast');
    }
  });

}


// TAB処理（PC,SP共通処理）
// タブリストとタブコンテンツが必要
// 引数で タブリストのclass名とタブコンテンツのclass名が必須となる。
//-------------------------------------------------------------
function showTabFunc($tabChooseClassName,$tabContentsClassName){

  var $tabChooseClassName = $($tabChooseClassName + '> *');
  var $tabContentsClassName = $($tabContentsClassName + '> *');

  var tab = $tabChooseClassName,
      tabChild = $tabContentsClassName,
      url = location.href,
      hash = [];
      hash = new Array();
      hash = url.split('#');

  if(hash[1]){
    var indexId = tab.index($('.' + hash[1]));
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

}


//page top関数（PC,SP共通処理）
//-------------------------------------------------------------
function goToPageTopFunc($pageTopId){

  var $pageTopId = $($pageTopId);
  $pageTopId.click(function() {
    $("html, body").animate({scrollTop:0}, 500, "swing");
    return false;
  });

}


//ページ内スクロール関数（PC,SP共通処理）
//-------------------------------------------------------------
function smoothScrollMoveFunc($goToClassName){

  var $goToClassName = $($goToClassName);
  $goToClassName.click(function(){
    var speed = 500;
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
  });

}

//TOP PAGE 用関数

//-------------------------------------------------------------
function sohwTopPageSliderFunc(){

  $('#sliderTop').bxSlider({
      nextText: '',
      prevText: ''
    });
  $('#sliderCalender').bxSlider({
    nextText: '次へ',
    prevText: '前へ'
  });

}


//TOP PAGE
//-------------------------------------------------------------


// ============================================================
// ATTENTION & COMMON RULE!!
// まとめて関数実行（※必要に応じて条件分岐を入れる）
// ページ個別に処理をする場合は「ページ固有のID名.lengthで処理を分岐」
// PC、SP、iPadで処理を分ける場合は①の関数を参照して処理を分岐
// ============================================================

// ページの全データを読み込み後
$(window).on('load', function() {

  loadedPageFunc();
  checkDeviceAndWidthFunc();

});

// リサイズが走った場合
$(window).on('resize', function(){

  checkDeviceAndWidthFunc();

});

// DOM生成後
$(function(){

  // 共通処理
  goToPageTopFunc('#pageTop');
  smoothScrollMoveFunc('a.scroll');
  showAccordionFunc('.js-accordion');
  showAllAccordionFunc('.js-all-accordion');
  showTabFunc('.js-tab','.js-tab-child');

  // TOP PAGE
  if($('#topPage').length){
    sohwTopPageSliderFunc();
  }
  // TOP PAGE



});