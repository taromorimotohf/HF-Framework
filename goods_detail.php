<?php

require_once '../passrate.php';

require_once('lib/LoginGw.php');
require_once('controller/basket/ShoppingCartController.php');
require_once('controller/basket/GoodsDetailController.php');
require_once('controller/basket/ReferenceGoodsController.php');
require_once('controller/basket/GoodsDetailStockListController.php');
require_once('controller/basket/CheckGoodsController.php');
require_once('model/ViewUtil.php');

/**
 * 商品詳細
 *
 * @author shin
 */
$cartController = new ShoppingCartController(false, '/cart.php');
$cartController->execute();
$controller = new GoodsDetailController();
$controller->execute();

if ($controller->goods) {
  $refController = new ReferenceGoodsController($controller->goods->goodsNo);
  $refController->execute();
}

$stockListController = new GoodsDetailStockListController();
$stockListController->execute();
$checkGoodsController = new CheckGoodsController();
$checkGoodsController->execute();


require_once "../conf_buy.php";
require "conf_uniform.php";

?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]> <html class="ie7"> <![endif]-->
<!--[if IE 8 ]> <html class="ie8"> <![endif]-->
<!--[if IE 9 ]> <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html> <!--<![endif]-->
<head>

  <meta charset="utf-8" />
  <title>
    <?php $controller->goods ? Html::printHtml($controller->goods->name) : ''; ?>
    ｜セレッソ大阪公式オンラインショップ
  </title>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/common/inc/meta.php') ?>
  <meta name="description" content="セレッソ大阪オンラインショップ。" />
  <meta name="keywords" content="<?php Html::printHtml($controller->goods->name)?>,<?php Html::printHtml($controller->largeClass->name); ?>,セレッソ大阪,Jリーグ,サッカー,チケット,会員,セレッソクラブ,グッズ,応援,選手" />
  <meta name="viewport" content="width=device-width,user-scalable=no,maximum-scale=1" />
  <meta property="og:title" content="【<?php Html::printHtml($controller->goods->name)?>】セレッソ大阪オンラインショップ">
  <meta property="og:url" content="http://<?=SITE_HOST?>/goods_detail.php?id=<?php Html::printHtml($controller->goods->goodsId) ?>">
  <meta property="og:description" content="<?php Html::printHtml($controller->largeClass->name); ?>【<?php Html::printHtml($controller->goods->name) ?>】こちらの商品はセレッソ大阪オンラインショップにてご購入いただけます。"/>
  <meta property="og:type" content="website" />
  <meta property="og:image" content="http://<?=SITE_HOST?>/php/image/goods/<?php Html::printHtml($controller->goods->goodsId) ?>/1_1.jpg" />
  <meta property="og:site_name" content="セレッソ大阪オンラインショップ" />
  <meta property="fb:app_id" content="686204791426740">
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/common/inc/css.php') ?>
  <link href="/css/test_goods.css" rel="stylesheet" type="text/css" />

  <!--[if lt IE 9]>
  <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <script src="/common/js/respond.js"></script>
  <![endif]-->
</head>

<body id="detail">
<div id="wrapper">
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/common/inc/sidebar.php') ?>
  <div class="main">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/common/inc/gnav.php') ?>
    <div id="breadcrumbNav">
      <?php ViewUtil::printClassLink($controller) ?> /　<?php $controller->goods ? Html::printHtml($controller->goods->name) : '';?>
    </div>
    <div id="contents">
      <div id="detailBox">

        <h2 class="subTit">
          <span>
            <?php
            isset($controller->largeClass)&&isset($controller->largeClass->name) ? Html::printHtml($controller->largeClass->name) : '';
            ?>
          </span>
        </h2>

        <?php if (empty($controller->goods)): ?>
          <p class="notFound">商品が存在しません。</p>
        <?php else: ?>

          <div class="detailLeft">
            <div id="imgMain">
              <img id="target" alt="" src="<?php ViewUtil::printStockImageUri($controller->stock, 1, IMG_SIZE_PC) ?>" width="500" height="500" />
            </div>
          </div>

        <div class="detailRight">
          <ul id="gallery" class="addClassSome">
            <?php
            $i = 1;
            while(ViewUtil::getStockImage($controller->stock, $i)){
            ?>
              <li>
                <a href="<?php ViewUtil::printStockImageUri($controller->stock, $i, IMG_SIZE_PC) ?>" >
                  <img src="<?php ViewUtil::printStockImageUri($controller->stock, $i, IMG_SIZE_LIST) ?>" width="80" height="80"/>
                </a>
              </li>
            <?php
              $i++;
            }
            ?>
          </ul>

          <form name="main" action="" method="GET" class="detailInfo">
            <h3 class="detailName">
              <?php Html::printHtml($controller->goods->name); ?>
            </h3>
            <ul class="detailPrice">
              <?php if($controller->goods->makerPrice == "0"): ?>
                <?php if($controller->price): ?>
                  <li class="detailPriceIcon font">
                    <span class="priceCate">販売価格</span>  &yen;
                    <?php Html::printNumberHtml($controller->price); ?>
                    <span class="taxin">（税込）</span>
                  </li>
                <?php endif; ?>
                <?php if($controller->fanclubPrice): ?>
                  <li class="detailPriceIcon clubPrice font">
                    <span class="priceCate"><img src="/common/img/icon-detail-club-price.png" alt=""></span>  &yen;
                    <?php Html::printNumberHtml($controller->fanclubPrice) ?>
                    <span class="taxin">（税込）</span>
                  </li>
                <?php endif; ?>
              <?php else: ?>
                <li class="detailPriceIcon sale font"><s>&yen;
                  <?php Html::printNumberHtml($controller->goods->makerPrice); ?>
                  <span class="taxin">（税込）</span></s>
                </li>
                <li>
                  <img src="/img/basket/img_sale_price.gif" width="175" height="19" />
                </li>
                <li class="detailSalePriceIcon font">&yen;
                  <?php Html::printNumberHtml($controller->price); ?>
                  <span class="taxin">（税込）</span>
                </li>
              <?php endif; ?>


              <?php if (!$controller->goods->isSoldout()): ?>



                <li class="itemCode"><span class="grayTxt">商品コード</span>
                  <?php Html::printHtml($controller->goods->goodsNo); ?>
                </li>
                <li class="itemCode">
                  <span class="grayTxt">カタログコード</span>
                  <?php Html::printHtml($controller->stock->catalogCode); ?>
                </li>

                <?php /* ハナサカのとき、後入れ背番号は表示しない */
                if(!$controller->goods->uniformNameStockFlag && !isset($uniformNumberId[$controller->goods->goodsId])):
                ?>
                  <li class="detailOption"><span class="grayTxt">数量：</span>
                    <?php $count = $controller->getValue(COUNT) ? $controller->getValue(COUNT) :"1" ?>
                    <input type="text" size="3" maxlength="3" name="<?= COUNT ?>" value="<?=$count?>" />
                    <?php if(!empty($controller->goods->buyLimitCount)): ?>
                      <br />※お一人様<?=$controller->goods->buyLimitCount?>個までご購入可能です。
                    <?php endif;?>
                  </li>
                <?php
                endif;
                /* ここまで */
                ?>

                <?/*php $controller->printMustParameterHtml(); */?>
                <?php
                if ($controller->optionList):
                  foreach ($controller->optionList as $option) {
                ?>
                    <li class="detailOption">
                      <span class="grayTxt">
                        <?php Html::printHtml($option->name); ?>
                        ：
                      </span>
                      <?php
                        $key = sprintf("%s[%d]", OPTION_NO, $option->optionNo);
                        if ($controller->getOptionItemList($option->optionNo)):
                          Html::printSelect($key, $controller->getOptionItemList($option->optionNo), $controller->getValueInArray(OPTION_NO, $option->optionNo), true, 0, false, "onChange=\"reload()\"");
                        else:
                          printf("<input type=\"hidden\" name=\"%s\" value=\"%d\" />", $key, ITEM_NO_NONE);
                        endif;
                      ?>
                    </li>
                <?php
                  }
                endif;
                ?>

                <?php /* 笠原作業中（ユニフォーム在庫） */
                if($controller->uniformNameList):
                ?>
                  <li class="detailOption">
                    <span class="grayTxt"><?php Html::printHtml($controller->uniformName->name) ?>：</span>
                    <select name="uniform_name_id" onChange="reload()">
                      <?php
                      foreach ($controller->uniformNameList as $u) {
                      ?>
                        <option value="<?=$u->uniformNameId?>" <?php if($controller->getValue(UNIFORM_NAME_ID)==$u->uniformNameId){ ?>selected<?php }?>>
                          <?=$u->number?>&nbsp;<?=$u->playerName?>
                          <?php /* if(!Http::isSmartPhoneUA() ){ ?>
                              <?php if($u->price){ ?>&nbsp;+<?=$u->price?>円<?php }  ?>
                              <?php if($u->fanclubPrice){ ?>&nbsp;FC価格+<?=$u->fanclubPrice?>円<?php }  ?>
                          <?php } */ ?>
                        </option>
                      <?php } ?>
                    </select>
                  </li>
                <?php /* ここまで */
                endif;
                ?>

                <?php if ($controller->textList): ?>
                  <li class="select" style="padding-top:20px;">
                    <style type="text/css">
                      <!--
                      .inputName[maxlength="1"]{
                        width:22px;
                        text-align:center;
                      }

                      .inputName[maxlength="2"]{
                        width:25px;
                        text-align:center;
                      }

                      .inputName{
                          width:95%;
                          border: 1px solid #B0201C;
                          border-radius: 3px 3px 3px 3px;
                          height: 18px;
                          padding: 5px;
                          background:#FFECEE;
                      }
                      .inputName:focus{
                          background:#FFFFFF;
                      }
                      -->
                    </style>
                    <!--<p class="detailBd"><img src="/img/basket/bd_detail.gif" width="285" height="7" /></p>-->
                    <?php
                    if(!$controller->uniformNameList || $controller->uniformNameItem->textFlag):
                      $goodsText = $controller->getValue(GOODS_TEXT);
                      foreach ($controller->textList as $text) {
                    ?>
                        <p class="mgnB05 attention">
                          <?php Html::printHtml($text->name); ?>
                          <br />※<?php if($text->validation){ echo TextValidation::getName($text->validation)." "; } Html::printHtml($text->length) ?>文字以内
                        </p>
                        <?php $key = sprintf("%s[%d]", GOODS_TEXT, $text->textNo); ?>
                        <input class="inputName" type="text" maxlength="<?php Html::printHtml($text->length) ?>" name="<?= $key ?>" value="<?php Html::printHtml(getValueFromArray($goodsText, $text->textNo)) ?>" <?php if($text->validation==VALIDATION_NUMBER) { ?>pattern="^[0-9]+$"<?php } else if($text->validation==VALIDATION_UPPERCASE) { ?>pattern="^[A-Z. ]+$"<?php }?>/>
                    <?php
                      }
                    endif;
                    ?>
                  </li>
                <?php endif; ?>

                <?php
                /* タイマー機能 */
                $today = new DateModel();
                $today->set(date('Y'),date('m'),date('d'),date('H'),date('i'),date('s'));
                if ($controller->goods->goodsSellStartDate->compare($today) <= 0 && ($controller->goods->goodsSellEndDate == null || $controller->goods->goodsSellEndDate->compare($today) == 1)):
                  $selling_flag = true;
                else:
                  $selling_flag = false;
                endif;
                ?>

                <?php if ($selling_flag): ?>
                  <?php /* ハナサカ、後入れ背番号のときは1 */
                  if($controller->goods->uniformNameStockFlag || isset($uniformNumberId[$controller->goods->goodsId])):
                  ?>
                    <input type="hidden" name="<?= COUNT ?>" value="1" />
                  <?php endif; ?>
                  <input type="hidden" name="<?= GOODS_ADD ?><?php Html::printHtml($controller->goods->goodsId) ?>" value="1" />
                  <input type="hidden" name="<?= ID ?>" value="<?php Html::printHtml($controller->goods->goodsId) ?>" />
                  <input type="hidden" name="<?= NO ?>" value="<?php Html::printHtml($controller->no) ?>" />
                  <input type="hidden" name="<?= WWW_REQUEST_CODE ?>" value="<?php $cartController->printValue(WWW_REQUEST_CODE) ?>" />

                   <?php if($controller->uniformChangeFlag === '0'):?>
                     <input type="hidden" name="<?= UNIFORM_ORDER_NO ?>" value="<?php Html::printHtml($controller->uniformOrderNo) ?>" />
                     <input type="hidden" name="<?= UNIFORM_NO ?>" value="<?php Html::printHtml($controller->uniformNo) ?>" />
                   <?php endif; ?>
                <?php endif; ?>


            </ul>

                <!--//////////////////////お届け///////////////////////-->
                <p class="attention mgnB10 txt14">
                  <strong>
                    <?php $controller->goods ? Html::printHtml($controller->goods->catchCopy) : ''; ?>
                  </strong>
                </p>
                <div id="detailToRight"></div>
                <!--//////////////////////お届け///////////////////////-->
                <!--予約販売用script1-->
                <?php
                $item_flag = true;
                //if(
                //  $controller->goods->goodsId == "" ||
                //  $controller->goods->goodsId == ""
                //){
                //
                //  $item_flag = false;
                //  ■「カートに入れる」を消すとき
                //  (1)上記$item_flag = false;のコメントタグをはずす
                //  (2)各商品ID等を変更する
                //  (3)下記の詳細等を書く
                //
                //  ■「カートに入れる」を表示させるとき
                //  上記コメントタグを付けると「カートに入れる」ボタンが復活して、注意書き等が消える。
                //}
                /* タイマー機能 */
                /*
                $today = new DateModel();
                $today->set(date('Y'),date('m'),date('d'),date('H'),date('i'),date('s'));
                */
                if ($selling_flag):
                  if(!empty($item_flag)):
                ?>
                    <?php /* 名入れ在庫0の時 */
                    if($controller->goods->uniformNameStockFlag && !$controller->uniformNameList):
                    ?>
                      <p class="soldout mgnB20">大変申し訳ございません、品切れ中となります。[名入れ]</p>
                    <?php /* 通常商品 or ログイン時 and 種別OK */
                    elseif(!$controller->goodsFanclubClassList || LoginGw::isLogin() && array_key_exists(intval(LoginGw::getLogin()->customer->fanclub_type_code), $controller->goodsFanclubClassList)):
                    ?>
                      <div class="nostock">
                        <?php $cartController->printErrorMessage(); ?>
                      </div>


                      <!--/予約販売用script1-->
                      <div class="detailCart">
                        <?php if($dbuy_flag): ?>
                          <?php if(isset($_GET['id']) && (array_search($_GET['id'],$checkId) !== false)): ?>
                            <p class="onlymember">この商品は同時購入できません。</p>
                          <?php else: ?>
                            <p class="onlymember">同時購入不可商品がカートに入っています。</p>
                          <?php endif; ?>

                        <?php elseif($uniform_buy_flag || $uniform_number_buy_flag): ?>
                          <?php if($uniform_buy_flag == 1 || $uniform_number_buy_flag == 1): ?>
                            <p class="onlymember">この商品は同時購入できません。</p>
                          <?php else: ?>
                            <p class="onlymember">同時購入不可商品がカートに入っています。</p>
                          <?php endif; ?>

                        <?php else: ?>
                          <?php /*背番号加工済みフラグが0だが、ユニフォームに適していない背番号を選択した場合、「カートに入れる」ボタン消す*/
                          if($controller->uniformChangeFlag === '0' && !isset($uniformId[$controller->uniformGoodsId][$controller->goods->goodsId])):
                          ?>
                            <p class="onlymember">この商品は指定されたユニフォームには、加工できません。</p>

                          <?php /*背番号加工済みフラグが0*/
                          elseif($controller->uniformChangeFlag == '0'):
                          ?>
                            <?php /*ユニフォームの背番号がすでにカートに入っていたら、アナウンス文言出す*/
                              if($cartController->isUniformNumberExist):
                            ?>
                              <p class="onlymember">すでに指定されたユニフォームの背番号が、カートに入っています。<br>カートに入れると、すでに入っていた背番号が削除されます。</p>
                            <?php endif;?>

                            <?php if(LoginGw::isLogin() || LoginGw::isLoginFanclub()): ?>
                              <span><input type="submit" value="カートに入れる" /></span>
                            <?php else: ?>
                              <p class="onlymember">この商品はログイン後、お買い求めいただけます。</p>
                              <div class="onlymember-wrap">
                                <p class="btn-login"><a href="/order/login.php?id=<?=$controller->goods->goodsId?>">ログインはこちら</a></p>
                              </div>
                            <?php endif; ?>

                          <?php /*背番号加工済みフラグが1*/
                          elseif($controller->uniformChangeFlag == '1'):
                          ?>
                            <p class="onlymember">指定されたユニフォームの背番号は、すでに購入済みです。</p>

                          <?php /*背番号加工済みフラグがNULL*/
                          else:
                          ?>
                            <?php /*背番号後入れユニフォーム*/
                            if(isset($uniformId[$controller->goods->goodsId])):
                            ?>
                              <?php if(LoginGw::isLogin() || LoginGw::isLoginFanclub()): ?>
                                <span><input type="submit" value="カートに入れる" /></span>
                              <?php else: ?>
                                <p class="onlymember">この商品はログイン後、お買い求めいただけます。</p>
                                <div class="onlymember-wrap">
                                  <p class="btn-login"><a href="/order/login.php?id=<?=$controller->goods->goodsId?>">ログインはこちら</a></p>
                                </div>
                              <?php endif; ?>
                            <?php
                            /*後入れ背番号*/
                            elseif(isset($uniformNumberId[$controller->goods->goodsId])):
                            ?>
                              <?php if(LoginGw::isLogin() || LoginGw::isLoginFanclub()): ?>
                                <p class="onlymember">この商品はユニフォーム購入後、マイページよりお買い求め頂けます。</p>
                              <?php else: ?>
                                <p class="onlymember">この商品はログイン後、お買い求めいただけます。</p>
                                <div class="onlymember-wrap">
                                  <p class="btn-login"><a href="/order/login.php?id=<?=$controller->goods->goodsId?>">ログインはこちら</a></p>
                                </div>
                              <?php endif; ?>
                            <?php else: ?>
                              <?php /*通常商品*/ ?>
                              <span><input type="submit" value="カートに入れる" /></span>
                            <?php endif;?>
                          <?php endif;?>
                        <?php endif; ?>
                      </div>
                    <?php /* 限定商品 未ログイン */
                    elseif(!LoginGw::isLogin()):
                    ?>
                        <p class="onlymember">プライムセレッソ会員様限定商品です。</p>
                        <div class="onlymember-wrap">
                          <p class="btn-login"><a href="/order/login.php?id=<?=$controller->goods->goodsId?>">ログインはこちら</a></p>
                          <p class="btn-about"><a href="http://www.cerezo.co.jp/fanclub_cerezo_prime.asp" target="_blank">プライムセレッソについて</a></p>
                        </div>
                    <?php /* 限定商品 ログイン時（種別NG） */
                    else:
                    ?>
                      <p class="onlymember">ファンクラブ会員様<?=$controller->goodsFanclubClassTxt?>限定商品です。</p>
                      <div class="detailCart">
                        <p class="btnOutsale">カートに入れる</p>
                      </div>
                    <?php
                    endif;
                    ?>
                <?php
                  endif; /*$item_flagここまで*/
                else: /* タイマー機能 時間外 */
                ?>
                  <div class="detailCart"><span class="btnOutsale">カートに入れる</span></div>
                <?php
                endif; /* タイマー機能 時間外ここまで */
                ?>

          </form>

                <div id="cautionBox">
                  <!-- 配送指定不可 // -->
                  <?php
                    if(
                      $controller->goods->goodsId == "504" ||
                      $controller->goods->goodsId == "503" ||
                      $controller->goods->goodsId == "502" ||
                      $controller->goods->goodsId == "415"
                    ){ ?>
                  <p class="no-delivery"><span class="attention">※</span>こちらの商品は<span class="fwb">「配送希望日の指定不可」</span>の対象商品です。配達については<a href="#detailBottom">こちら</a>をご確認ください。</p>
                  <?php }?>
                  <!-- 配送指定不可 // -->

                  <p class="rtTxt listMark"><span>※</span>お客様のご都合による返品はお受けできません。予めご了承ください。</p>
                  <p class="rtDetail">(<a href="/guide/return.php" target="_blank">返品・交換についての詳細はこちら</a>)</p>
                </div>

                <div class="snsBtn">
                  <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2F<?=SITE_HOST?>%2Fgoods_detail.php?id=<?php Html::printHtml($controller->goods->goodsId) ?>&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;font=arial" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe>
                  &nbsp;
                  <a href="https://twitter.com/share" class="twitter-share-button" data-lang="ja">Tweet</a>
                  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>

              <?php
              else:
              ?>

                <li class="soldout mgnB20">
                  <span class="btnSoldout">大変申し訳ございません、<br>
                  品切れ中となります。</span>
                </li>
            </ul>
          </form>

              <?php endif; ?>

        </div>
        <div id="detailBottom">
          <div class="section">
            <?php /*?><h3><img src="/img/basket/st_iteminformation.png" alt="商品詳細" /><img src="/img/basket/sp/st_iteminformation.png" alt="商品詳細" class="" /></h3><?php */?>
            <div class="contents">
              <!--夏季休暇について　スマホカバー以外に表示-->
              <?php /*?>
                      <?php if($controller->goods->goodsId == "189" ){ ?>
                      <?php }elseif($controller->goods->goodsId == "188"){ ?>
                      <?php }elseif($controller->goods->goodsId == "187"){ ?>
                      <?php }elseif($controller->goods->goodsId == "78"){ ?>
                      <?php }elseif($controller->goods->goodsId == "77"){ ?>
                      <?php }elseif($controller->goods->goodsId == "76"){ ?>
                      <?php }elseif($controller->goods->goodsId == "75"){ ?>
                      <?php }elseif($controller->goods->goodsId == "74"){ ?>
                      <?php }elseif($controller->goods->goodsId == "73"){ ?>
                      <?php }else{ ?>
                          <div class="caution mgnB15">夏季休暇に伴うお届けについて</div>
                          <div class="box"><strong class="attention">2013年8月12日(月)〜2013年8月18日(日)</strong>までのご注文分は、夏季休暇に伴い、お届けが1週間ほど遅くなります。予めご了承ください。</div>
                      <?php } ?>
                      <?php */?>
              <!--/夏季休暇について-->
              <?php if ($controller->goods->commentHtmlFlag) {
                          echo $controller->goods->comment;
                      } else {
                          Html::printHtml($controller->goods->comment);
                      }
              ?>
            </div>
          </div>
        </div>
        <?php if (isset($refController) && count($refController->referenceList)) {
              $percent = 100 / REFERENCE_COLUMN_COUNT;
              $resultList =& $refController->referenceListSplit;
            ?>
        <div id="detailRelated">
          <div class="section">
            <h2 class="tit"><span>関連商品</span></h2>
            <ul class="goodsListBox fixHeight">
              <?php foreach ($resultList as $list) { ?>
              <?php foreach ($list as $goods) { ?>
              <?php if ($goods) { ?>
            <li class="boxLink">
              <span class="icn">
              <?php if ($goods->isSoldout()): ?>
              <img src="/img/basket/icn-soldout.png" width="64" height="17" />
              <?php elseif ($goods->goodsSellStatusId == GOODS_SELL_STATUS_ID_NEW): ?>
              <img src="/img/basket/icn-new.png" width="42" height="17" />
              <?php elseif ($goods->goodsSellStatusId == GOODS_SELL_STATUS_ID_RENEW): ?>
              <img src="/img/basket/icn-renew.png" width="42" height="17" />
              <?php endif; ?>
              </span>
              <?php /*?><p class="itemphoto">
              <?php ViewUtil::printDefaultGoodsImageTag($goods, 1, IMG_SIZE_LIST) ?>
              </p><?php */?>
              <a href="goods_detail.php?id=<?php Html::printHtml($goods->goodsId) ?>">
              <p class="itemImg">
                <img src="/php/image/goods/<?php Html::printHtml($goods->goodsId) ?>/1_1.jpg" width="100%"/>
              </p>
              <div class="itemName">
                <p class="goodsName fixHeightChildren1">
                  <?php Html::printHtml($goods->name) ?>
                </p>
                <div class="price-wrap fixHeightChildren2">
                  <?php if($goods->price){ ?>
                  <p class="price font">&yen;<?php Html::printNumberHtml($goods->price) ?><span>(税込)</span></p>
                  <?php } ?>
                  <?php if($goods->fanclubPrice){ ?>
                  <p class="price font">&yen;<?php Html::printNumberHtml($goods->fanclubPrice) ?><span>(税込)</span><span class="club"><img src="/common/img/icon-detail-club-price.png" alt="クラブセレッソ会員価格"></span></p>
                  <?php } ?>
                </div>
              </div>
              </a>
            </li>
              <?php } ?>
              <?php } ?>
              <?php } ?>
            </ul>
          </div>
        </div>
        <?php } ?>
        <?php /*?>
        <?php include('script/check_goods.php') ?>
        <?php */?>
        <?php endif; ?>
        <div id="detailRelated">
          <div class="section">
            <h2 class="tit"><span>最近チェックしたアイテム</span></h2>
            <ul class="goodsListBox fixHeight">
              <?php
              if (!empty($checkGoodsController->checkGoodsList)):
                foreach ($checkGoodsController->checkGoodsList as $goods):
              ?>
            <li class="boxLink">
              <span class="icn">
              <?php if ($goods->isSoldout()): ?>
              <img src="/img/basket/icn-soldout.png" width="64" height="17" />
              <?php elseif ($goods->goodsSellStatusId == GOODS_SELL_STATUS_ID_NEW): ?>
              <img src="/img/basket/icn-new.png" width="42" height="17" />
              <?php elseif ($goods->goodsSellStatusId == GOODS_SELL_STATUS_ID_RENEW): ?>
              <img src="/img/basket/icn-renew.png" width="42" height="17" />
              <?php endif; ?>
              </span>
              <?php /*?><p class="itemphoto">
              <?php ViewUtil::printDefaultGoodsImageTag($goods, 1, IMG_SIZE_LIST) ?>
              </p><?php */?>
              <a href="goods_detail.php?id=<?php Html::printHtml($goods->goodsId) ?>">
              <p class="itemImg">
                <img src="/php/image/goods/<?php Html::printHtml($goods->goodsId) ?>/1_1.jpg" width="100%"/>
              </p>
              <div class="itemName">
                <p class="goodsName fixHeightChildren1">
                  <?php Html::printHtml($goods->name) ?>
                </p>
                <div class="price-wrap fixHeightChildren2">
                  <?php if($goods->price){ ?>
                  <p class="price font">&yen;<?php Html::printNumberHtml($goods->price) ?><span>(税込)</span></p>
                  <?php } ?>
                  <?php if($goods->fanclubPrice){ ?>
                  <p class="price font">&yen;<?php Html::printNumberHtml($goods->fanclubPrice) ?><span>(税込)</span><span class="club"><img src="/common/img/icon-detail-club-price.png" alt="クラブセレッソ会員価格"></span></p>
                  <?php } ?>
                </div>
              </div>
              </a>
            </li>
    <?php
      endforeach;
    endif;
    ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/common/inc/footer.php') ?>
  </div>
  <!--/#container-->
  <!--/.footer-->
</div>
<!--/.wrapper-->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/common/inc/jsin.php') ?>
<!-- <script src="/common/js/fixheight.js"></script> -->
<script>
jQuery(function($){
  $("#imgMain img").bind("load",function(){
    var ImgHeight = $(this).height();
    $('#imgMain').css('height',ImgHeight);
  });

  $('#gallery a').click(function(){
    if($(this).hasClass('over') == false){
      $('#gallery a').removeClass('over');
      $(this).addClass('over');
      $('#imgMain img').hide().attr('src',$(this).attr('href')).fadeIn();
    };
    return false;
  }).filter(':eq(0)').click();
});
</script>
<script>
  $('.detailToRight').clone(true).appendTo('#detailToRight');
</script>
<script>
function reload() {
  document.forms["main"].add16.value = "";
  document.forms["main"].submit();
}
</script>
<script>//システム使用script
function reload() {
  document.forms["main"].<?= GOODS_ADD ?><?php $controller->goods ? Html::printHtml($controller->goods->goodsId) : ''; ?>.value = "";
  document.forms["main"].submit();
}
</script>


</body>
</html>