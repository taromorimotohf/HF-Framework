# [HF-Framework](https://github.com/hanuman6/HF-Framework)
HF-Framework is a responsive front-end framework. You can quickly prototype and build sites or apps that work on any kind of device, more elements, tips and best practices.

<a href="http://www.w3.org/html/logo/">
<img src="http://www.w3.org/html/logo/badge/html5-badge-h-css3-semantics.png" width="165" height="64" alt="HTML5 Powered with CSS3 / Styling, and Semantics" title="HTML5 Powered with CSS3 / Styling, and Semantics">
</a>

At First, learn [Coding Guide](https://github.com/hanuman6/HF-Framework#coding-guide)

## HTML

### 基本
+ HTMLバージョン ⇒ HTML5を利用
+ CSSレベル ⇒ CSS2.1/CSS3 (プログレッシブ・エンハンスメント)
+ 文字コード ⇒ UTF-8[no BOM] (採用するバックエンドによってはこの限りではない)
+ 改行コード
  + LF(UNIX)
  + CR+LF(Windows)
+ タグ及び属性記述 ⇒ 小文字 (大文字を使用しない)
+ 属性値の囲み ⇒ ダブルクォーテーション『"』
+ インデント ⇒ 半角スペース2個
+ PHPインクルード ⇒ 特別な理由がなければ共通パーツをインクルード可して再利用する
+ 対応OS
  + PC ⇒ Windows,Mac
  + SP ⇒ Android,iOS
+ 対応ブラウザ(バージョン指定がないものは最新）
  + IE8〜
  + Chrome
  + Firefox
  + safari
+ バリデーション ⇒ [W3C HTML validator](http://validator.w3.org/nu/)なんか使って標準に沿った記述を心がける

**ただし、案件によりコーディング規約を指定された場合はこの限りではない。**

### 命名規則
理解しやすく、一般的なネーミングにする。
+ ID ⇒ camelcase記法 ex: pageTop,gNav (原則IDは使用しない)
+ CLASS ⇒ ハイフン記法 ex: contents-top,side-wrap
+ IMAGES ⇒ アンダーバー記法 ex: bnr_top001.png,main_title.png

詳しくは下記
  + [画像](https://github.com/hanuman6/HF-Framework/blob/master/_documents/images.md/)
  + [ID/Class名](https://github.com/hanuman6/HF-Framework/blob/master/_documents/shortname.md/)

### PHPインクルード
+ [よく使うインクルード](https://github.com/hanuman6/HF-Framework/blob/master/_documents/php.md/)

### Type属性
stylesheetとscriptのtype属性は省略する。
HTML5ではデフォルトで解釈されるため必要ない。
```html
<!-- 非推奨 -->
<link rel="stylesheet" href="//www.google.com/css/maia.css"
  type="text/css">
<!-- 推奨 -->
<link rel="stylesheet" href="//www.google.com/css/maia.css">
```
```html
<!-- 非推奨 -->
<script src="//www.google.com/js/gweb/analytics/autotrack.js"
  type="text/javascript"></script>
<!-- 推奨 -->
<script src="//www.google.com/js/gweb/analytics/autotrack.js"></script>
```

###引用符
属性値の引用符は、ダブルクオーテーション(")を使用する。
```html
<!-- 非推奨 -->
<a class='maia-button maia-button-secondary'>Sign in</a>
<!-- 推奨 -->
<a class="maia-button maia-button-secondary">Sign in</a>
```

###ヘッダー
すべて記述する事は少ないが、記述順は下記の通り

+ DOCTYPE宣言
+ title要素
+ charaset ⇒ 文字コード
+ meta要素 ⇒[参考](https://github.com/hanuman6/HF-Framework/blob/master/_documents/META.md)
  [OGP](http://l-w-i.net/d/20130316_01.txt)、[Twitter Cards](http://l-w-i.net/d/20130324_01.txt)の設定が必要な場合は上記に追加する。
+ link要素
+ rel属性
  + stylecheet
  + shortcut icon(apple-touch-icon)
  + canonical //URL正規タグ http://web-tan.forum.impressrd.jp/e/2009/03/05/5112
+ script要素
  html5タグを利用するために内蔵の```ie.js``` を利用するか、html5shivの[cdn](https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js)を利用する
+ style要素

### タイトル要素
指定がない場合は下記の内容で表示

+ トップページ ⇒ 『サイト説明文 - サイト名』 または 『サイト名』
+ カテゴリートップ ⇒ 『カテゴリー名 | サイト説明文 - サイト名』 または 『カテゴリー名 | サイト名』
+ 個別ページ ⇒ 『ページ名 - カテゴリー名 | サイト説明文 - サイト名』 または 『ページ名 - カテゴリー名 | サイト名』
+ 文字数が60文字を超える場合は『ページ名(カテゴリー名) | サイト名』

### パスの記述
サイト内のリンク・画像などは原則サイトルートパスで記述します。
Wordpressのテーマ作成の場合は、```<?php bloginfo('template_url'); ?>/```などで一括置換してください。
OK  ```<a href="/mypage/page.html">```
NG  ```<a href="../mypage/page.html">```

CDNなどで絶対パスで書く場合は、http:,https:は省略する。
```html
<!-- 非推奨 -->
<script src="http://www.google.com/js/gweb/analytics/autotrack.js"></script>
<!-- 推奨 -->
<script src="//www.google.com/js/gweb/analytics/autotrack.js"></script>
```
```css
/* 非推奨 */
.example {
  background: url(http://www.google.com/images/example);
}
/* 推奨 */
.example {
  background: url(//www.google.com/images/example);
}
```

### 改行・インデント・コメント
改行とインデントを使って構造を判断しやすいように記述します。

+ インデントは半角スペース2つ
+ タブ文字はエディタによってサイズが変わるのでNG
+ タブ文字と半角スペースを混在させる事もNG

□は半角スペースを表します。
また、```<div>``` の閉じ位置などがわかりづらい時に、タグを閉じた直後にコメントアウト入れます。
コメントアウトはEmmet/Zen Codingでは```|c```を末尾に付けて展開するだけで便利ですね。
```html
<section>
□□<div class="profile">
□□□□<div class="profile-detail">
□□□□□□<div class="profile-img">
□□□□□□□□<img src="icon_photo.jpg" alt="プロフィール画像">
□□□□□□</div>
□□□□□□<p>テキストテキストテキストテキストテキストテキスト<br>
□□□□□□テキストテキストテキストテキストテキストテキスト</p>
□□□□</div><!-- /.profile_detail -->
□□</div><!-- /.profile -->
</section>
```

*キーボードの[tab]を使い、効率よくインデントする方法*
> DWの場合は設定を下記に変更する
> [環境設定] ⇒ [コードフォーマット]
> ⇒ 『インデント』チェック
> ⇒  使用:2スペース
> ⇒  タブサイズ2,『スペースとして挿入』チェック

> sublimeやbracketsはググってください

### License

The MIT License (MIT)

Copyright (c) 2015 HF-Framwork
