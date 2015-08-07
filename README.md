# [HF-Framework](https://github.com/hanuman6/HF-Framework)
HF-Framework is a responsive front-end framework. You can quickly prototype and build sites or apps that work on any kind of device, more elements, tips and best practices.

<a href="http://www.w3.org/html/logo/">
<img src="http://www.w3.org/html/logo/badge/html5-badge-h-css3-semantics.png" width="165" height="64" alt="HTML5 Powered with CSS3 / Styling, and Semantics" title="HTML5 Powered with CSS3 / Styling, and Semantics">
</a>

まず最初に[Coding Guide](https://github.com/hanuman6/HF-Framework#coding-guide)をお読みください。

## Quickstart

#### 1. すぐに使う

フレームワーク本体をダウンロードして利用します。

  * [Download the latest release](https://github.com/hanuman6/HF-Framework/archive/master.zip): `HF-Framework`

#### 2. Sassを使って利用する

[フレームワーク本体](https://github.com/hanuman6/HF-Framework/archive/master.zip)とSassコンパイルアプリケーションの[prepros](https://prepros.io/)をインストールして利用します。preprosの設定ファイルが入っているので簡単に利用できます。

  * [Install prepros](https://prepros.io/): `prepros`


#### 3. 開発する(上級)

[Node.js](http://nodejs.org/)をインストール  
  * [Install Nodejs](http://nodejs.org/): `Nodejs`  
  
npmでGulp本体と必要なモジュールをインストール  
```
sudo npm install -g gulp
```
作業ディレクトリ移動し、必要なモジュールをインストール
```
npm install --save-dev gulp gulp-watch gulp-ruby-sass
```
実行してみる  
```
# scss のコンパイル ( gulp-ruby-sass )
gulp rubysass
 
# scss に変更があったら自動的にコンパイル
gulp watch 
```

## Documents
### Coding Guide
* [HTML](https://github.com/hanuman6/HF-Framework/blob/master/_documents/html.md/)
* [Meta](https://github.com/hanuman6/HF-Framework/blob/master/_documents/meta.md/)
* [Short Name](https://github.com/hanuman6/HF-Framework/blob/master/_documents/shortname.md/)
* [CSS](https://github.com/hanuman6/HF-Framework/blob/master/_documents/css.md/)
* [Image Elements](https://github.com/hanuman6/HF-Framework/blob/master/_documents/images.md/)
* [javascript](https://github.com/hanuman6/HF-Framework/blob/master/_documents/js.md/)
* [php](https://github.com/hanuman6/HF-Framework/blob/master/_documents/php.md/)
* [Sass(SCSS) Usage](https://github.com/hanuman6/HF-Framework/blob/master/_documents/sass.md/)

### Framework
* [Introduction](https://github.com/hanuman6/HF-Framework/blob/master/_documents/intro.md/)
* [Basic Usage](https://github.com/hanuman6/HF-Framework/blob/master/_documents/usage.md/)
* [Use Mixin/Protocol](https://github.com/hanuman6/HF-Framework/blob/master/_documents/mixin.md/)
* [Development](https://github.com/hanuman6/HF-Framework/blob/master/_documents/dev.md/)

#### Directory
```
HF-Framework/ ...................... ルート・ディレクトリ
├── common/
│    ├── css/ ...................... 出力CSS
│    │    ├── common.css
│    │    └── ie.css
│    ├── fonts/
│    ├── img/
│    │    └── libs/  ............... アイコンやサムネイルなど固定素材
│    ├── inc/
│    ├── js/
│    │    ├── libs/  ............... jQueryなどのライブラリ
│    │    ├── app.js ............... jQueryプラグイン (基本触らない)
│    │    └── common.js ............ メインスクリプト
│    └── sass/
│         ├── addon/ ............... 追加用Sassパーシャル
│         │    ├── _bxslider.scss
│         │    ├── _print.scss
│         │    └── _wp.scss
│         ├── components/ .......... コンテンツ用Sassパーシャル
│         │    ├── _base.scss
│         │    ├── _mixin.scss
│         │    ├── _normalize.scss
│         │    └── _reset.scss
│         ├── _setting.scss ........ 基本設定Sassパーシャル
│         ├── common.scss .......... メインSCSS
│         └── ie.scss
├─── index.php ..................... ルートファイル
├─── screenshot.php
└─── style.css ..................... 上書き編集用CSS
```

#### Other documentation
##### Library
- JS:   [html5shiv](https://github.com/afarkas/html5shiv)
- JS:   [css3-mediaqueries-js](https://github.com/livingston/css3-mediaqueries-js)
- JS:   [jquery-match-height](https://github.com/liabru/jquery-match-height)
- JS:   [bxslider-4](https://github.com/stevenwanderski/bxslider-4)

##### Links
- [SASS（SCSS）とcompassとPreprosの、初心者にも優しいお付き合い](http://satohmsys.info/sass-compass-prepros/)
- [HTMLHint](http://htmlhint.com/)
- [SASS](http://sass-lang.com/)

### History
* 0.3.1 - ドキュメントを整備
* 0.3.0 - グループで使えるように変更
* 0.0.1 - 個人で使ってたのを移植

### License

The MIT License (MIT)

Copyright (c) 2015 HF-Framwork
