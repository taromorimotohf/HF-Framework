# [HF-Framework](https://github.com/hanuman6/HF-Framework)
HF-Framework is a responsive front-end framework. You can quickly prototype and build sites or apps that work on any kind of device, more elements, tips and best practices.

<a href="http://www.w3.org/html/logo/">
<img src="http://www.w3.org/html/logo/badge/html5-badge-h-css3-semantics.png" width="165" height="64" alt="HTML5 Powered with CSS3 / Styling, and Semantics" title="HTML5 Powered with CSS3 / Styling, and Semantics">
</a>

At First, learn [Coding Guide](#Coding Guide)

## CSS

### 基本
1. リセット
  + セレクタのリセットは慎重に行う。アスタリスク(*)で全セレクタリセットはしない。フレームワークではresetかnormalizeを選択する。
1. インデント
  + インデント ⇒ 半角スペース2個。
1. ID/CLASS
  + IDは極力使わない（Javascriptのアンカーとして利用したいため）。単語をつなげる場合はキャメルケースを用いる
  + CLASS名は小文字。単語をつなげる場合はハイフンを用いる
  1. セレクタ
    + タイプセレクタはできるだけ省略
    + セレクタを複数指定する場合は、カンマ(,)で区切り改行
  1. プロパティ
    + プロパティはショートハンドを使用する
    + 要素同士の空間は極力margin-bottomで設定する ⇒ ページ毎の設定にズレを生じさせないため規則性を持たせる
1. フォント
  + 基本フォントサイズは14px（2017.07.29改定）
  + 最小フォントサイズは10px(Chromeの初期設定値は10px以下を全て10pxで描画する)
1. CSSの読み込み方
  + @importを使わずlinkを使用する
  + できる限り1ファイルに記述をまとめるようにする。ただし、リセット用のスタイルは別ファイルでもOK


### 命名規則
+ BEMを基本とした命名規則を使用します。  
+ Block（塊）Element（要素）Modifier[KeyとValue]（状態変化）を利用しすべてハイフン連結で命名していきます。
+ ただし、下層要素で省略できるクラス名は省略する。

[例]タブでコンテンツ切り替える要素の場合
```css
.item-nav {…}
.state-active {…}

.item-body {…}
.body-state-ative {…}
```

```html
<section>
  <nav class="item-nav">
    <a class="state-active" href="#">タブA</a>
    <a href="#">タブB</a>
    <a href="#">タブC</a>
  </nav>
  <div class="item-body body-state-ative">
    タブAの本文
  </div>
  <div class="item-body">
    タブBの本文
  </div>
  <div class="item-body">
    タブCの本文
  </div>
</section>
```

### その他
+ 推測できる名称をつける
  + 短縮名はなるべく使用しない。どうしても使用する場合は一般的に通じるかを考える(後日対応しても役割が推測できる名称にする) ⇒ [よく使われる短縮名](https://github.com/hanuman6/HF-Framework/blob/master/documents/shortname.md)
  + サイズや色などを具体的に表す名称は避ける ⇒ Viewが変更された場合、名称と実際の表示の整合性がとれなくなるため
    + NG ⇒ ```.w960-box``` (w960pxのボックスの意) ボックスサイズが変更された場合、整合性がとれなくなる
    + NG ⇒ ```.red``` (文字色が赤いため) 色が変更になった場合、整合性がとれなくなる
    + OK ⇒ ```.profile-box``` (プロフィールに使用するボックスの意) ボックスサイズが変更されても、プロフィールに関わる要素である事は変わらない
    + OK ⇒ ```.state-error```  (エラー用の文字色）文字色が変更されても、エラー文字の色設定である事は変わらない
    + OK ⇒ ```.mb10```  (margin-bottom: 10px;) 場合によって使用可。 ただし、規則性がなければならない。『プロトコル』参照
+ jQueryなどjs用のclassにはプレフィックス（接頭辞）```js_``` を付与する

⇒ [よく使われる短縮名](https://github.com/hanuman6/HF-Framework/blob/master/documents/shortname.md)


### 見出し
適時見出しをつける
```css
/*背景をメインカラーに*/
/*--------------------------------------------
  ヘッダー
---------------------------------------------*/
```
###SCSS
下記のような見出しはCSSにコンパイル後、削除されるので、残したい場合は使用を控える
```scss
//============================================================
//    基本部分
//============================================================
```

インデントについて
----------------
インデントは半角スペースを使用します。
下記□は半角スペースを表します。
```css
.alignleft□{
□□margin:□0 4px 4px;
□□float:□left;
□□}
```

*キーボードの[tab]を使い、効率よくインデントする方法*
> DWの場合は設定を下記に変更する
> [環境設定] ⇒ [コードフォーマット]
> ⇒ 『インデント』チェック
> ⇒  使用:2スペース
> ⇒  タブサイズ2,『スペースとして挿入』チェック

### プロトコル
----------------
必要があれば使用します（任意）  

###汎用クラス
```CSS


/*テキストサイズ変更*/
.fz10 {
  font-size: 10px;
}

.fz11 {
  font-size: 11px;
}

.fz12 {
  font-size: 12px;
}

.fz13 {
  font-size: 13px;
}

.fz14 {
  font-size: 14px;
}

.fz15 {
  font-size: 15px;
}

.fz16 {
  font-size: 16px;
}

/*文字の太さ*/
.fwb {
  font-weight: bold;
}

.fwn {
  font-weight: normal !important;
}

/*文字の位置*/
.tac {
  text-align: center;
}

.tal {
  text-align: left;
}

.tar {
  text-align: right;
}

/*画像ホバー*/
.hvop:hover {
  opacity: 0.8;
}

/*画像ホバー(拡大)*/
.hvop:hover {
  -webkit-transform: scale(1.2);
      -ms-transform: scale(1.2);
          transform: scale(1.2);
}

```

#### 汎用クラス命名規則
命名規則はEmmet/Zen Codingの短縮に準じます。　


### License

The MIT License (MIT)

Copyright (c) 2015 HF-Framwork
