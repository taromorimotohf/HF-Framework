<!DOCTYPE html>
<html lang="ja">

<head>
  <title>Home | <?php include($_SERVER[ 'DOCUMENT_ROOT'] . '/common/inc/title.php')/* title */ ?></title>
  <?php include($_SERVER[ 'DOCUMENT_ROOT'] . '/common/inc/meta.php')/* meta */ ?>
  <?php include($_SERVER[ 'DOCUMENT_ROOT'] . '/common/inc/ogp.php')/* ogp */ ?>
  <meta http-equiv="default-style" content="style.css">
  <?php include($_SERVER[ 'DOCUMENT_ROOT'] . '/common/inc/css.php')/* css */ ?>
</head>

<body>
  <?php include($_SERVER[ 'DOCUMENT_ROOT'] . '/common/inc/ga.php')/* analytics */ ?>
  <?php include($_SERVER[ 'DOCUMENT_ROOT'] . '/common/inc/fb.php')/* facebook page plugin */ ?>
  <div class="page">
    <?php include($_SERVER[ 'DOCUMENT_ROOT'] . '/common/inc/header.php')/* header */ ?>
    <div id="contents">
    コンテンツ
    </div>
    <!-- #contents -->
    <?php include($_SERVER[ 'DOCUMENT_ROOT'] . '/common/inc/footer.php')/* footer */ ?>
  </div>
  <!-- /#page -->
  <?php include($_SERVER[ 'DOCUMENT_ROOT'] . '/common/inc/js.php')/* js */ ?>
</body>

</html>
