# [HF-Framework](https://github.com/hanuman6/HF-Framework)
HF-Framework is a responsive front-end framework. You can quickly prototype and build sites or apps that work on any kind of device, more elements, tips and best practices.

<a href="http://www.w3.org/html/logo/">
<img src="http://www.w3.org/html/logo/badge/html5-badge-h-css3-semantics.png" width="165" height="64" alt="HTML5 Powered with CSS3 / Styling, and Semantics" title="HTML5 Powered with CSS3 / Styling, and Semantics">
</a>

At First, learn [Coding Guide](https://github.com/hanuman6/HF-Framework#coding-guide)

## HTML

### 構造
HTML5を採用し、原則としてスタイルと構造を分離したWeb標準に沿った記述でコーディングします。
HTML(構造)とCSS(スタイル)とScript(動き)は独立させて、3つの相互関係はなるべく最小限に。
必要であれば下記のツールなどでバリデーション確認します。
+ [W3C HTML validator](http://validator.w3.org/nu/)
+ [Another HTML-lint ](http://www.htmllint.net/html-lint/htmllint.html)
+ [HTML5 Validator Bookmarklet](http://fotis.co/projects/html5-validator-bookmarklet/)

### スタイル
CSS2.1/CSS3を使用します。
プログレッシブ・エンハンスメントにもとづいてブラウザ対応をします。
詳細は[CSS](https://github.com/hanuman6/HF-Framework/blob/master/documents/css.md)の項目を確認ください。

### 文字コード
エンコードはUTF-8(no BOM)を基本的には使用します。
ただし採用するバックエンドによってはこの限りではない

### タイトル要素
指定がない場合は下記の内容で表示

+ トップページ ⇒ 『サイト名』
+ カテゴリートップ ⇒ 『カテゴリー名 | サイト名』
+ 個別ページ ⇒ 『ページ名 - カテゴリー名 | サイト名』
+ 文字数が60文字を超える場合は『ページ名(カテゴリー名) | サイト名』

### Type属性
stylesheetとscriptのtype属性は省略する。

### script要素
詳細は[javascript](https://github.com/hanuman6/HF-Framework/blob/master/documents/js.md)の項目を確認ください。

### 改行コード
  + LF(UNIX)
  + CR+LF(Windows)

## 属性値の囲み
ダブルクォーテーション『"』を使用します。

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

### PHPインクルード
環境が対応しているのであれば、できるだけ共通パーツをインクルード可して再利用する
[よく使うインクルードについて](https://github.com/hanuman6/HF-Framework/blob/master/documents/php.md/)

### 対応OSと対応ブラウザ
ユーザー環境を参照してください。
- [ユーザー環境](https://github.com/hanuman6/HF-Framework/blob/master/documents/user.md/)

### 外部ファイル参照
imageやmedia、scriptなどを指定するときに、http:,https:は省略する。
```html
<script src="//www.google.com/js/gweb/analytics/autotrack.js"></script>
```
```css
.example {
  background: url(//www.google.com/images/example);
}
```
### 命名規則
理解しやすく、一般的なネーミングにする。

| 属性  | 命名法  | サンプル  | 
|---|---|---|
| ID | キャメルケース | pageTop, gNav |
| CLASS  | ハイフン  | contents-top, side-wrap |
| IMAGES  | アンダーバー  | bnr_top001.png, main_title.png |

またID以外では原則大文字は使用しない
詳しくは下記命名サンプル表を参照
  + [画像](https://github.com/hanuman6/HF-Framework/blob/master/documents/images.md/)
  + [ID/Class名](https://github.com/hanuman6/HF-Framework/blob/master/documents/shortname.md/)

### パスの記述
サイト内のリンク・画像などは原則サイトルートパスで記述します。  
Wordpressのテーマ作成の場合は、```<?php bloginfo('template_url'); ?>/```などで一括置換してください。  
OK  ```<a href="/mypage/page.html">```  
NG  ```<a href="../mypage/page.html">```

## Links
- [HTML/CSSを爆速コーディング Emmet入門](http://www.adobe.com/jp/jos/pinchin/article/learning-Emmet/why-emmet.html)
- [Sublime Text入門](http://www.buildinsider.net/small/sublimetext)

### License

The MIT License (MIT)

Copyright (c) 2015 HF-Framwork
