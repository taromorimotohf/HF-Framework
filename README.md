# [HF-Framework](https://github.com/hanuman6/HF-Framework)
HF-Frameworkはローカル開発環境(Vagrant)とSass(SCSS)、Git(SourceTree)を使ったフロントエンド開発パッケージです。

<a href="http://www.w3.org/html/logo/">
<img src="http://www.w3.org/html/logo/badge/html5-badge-h-css3-semantics.png" width="165" height="64" alt="HTML5 Powered with CSS3 / Styling, and Semantics" title="HTML5 Powered with CSS3 / Styling, and Semantics">
</a>

利用にあたっては[Coding Guide](https://github.com/hanuman6/HF-Framework#coding-guide)を読み、用法と容量を守って利用ください。

## 用意するもの
#### Sass(SCSS)
* **[Prepros](https://prepros.io/)**: `Sassのコンパイルを簡単にできるGUIアプリケーション。Node.jsやRubyを内蔵していて、これ一本で完結できる。`
* [Node.js](https://nodejs.org/) *(option)*: `サーバーサイドJavaScript環境。Sassや後述するGulpを利用するために必要。`

#### ローカル開発環境(Vagrant)
* **[Vagrant](https://www.vagrantup.com/downloads.html)**: `ローカル環境を構築するツール`
* **[VirtualBox](https://www.virtualbox.org/wiki/Downloads)**: `仮想環境構築ツール`
* ターミナル/コマンドライン: `標準でもよいがiTermやConEmuがあると捗る`
* SSHクライアント: `[Tera Term](https://osdn.jp/projects/ttssh2/)や[iTerm](https://www.iterm2.com/)`

#### Git(SourceTree)
* **[SourceTree](https://www.atlassian.com/ja/software/sourcetree/overview)**: `GitやBitbacketをGUIで使えるアプリケーション`
* [bitbucketアカウント](https://bitbucket.org/) *(option)*: `SourceTreeの開発元の提供するgithub互換バージョン管理ウェブサービス。`

#### Framework
* [HF-Framework](https://github.com/hanuman6/HF-Framework/archive/master.zip) : `フレームワーク本体。後述のファイルも含んだパッケージ。`
* **[Vagrantfile](https://github.com/hanuman6/HF-Framework/blob/master/Vagrantfile)**: `VagrantでのLAMP環境の設定ファイル`
* [gulpfile.js](https://github.com/hanuman6/HF-Framework/blob/master/public/gulpfile.js): `gulpの設定ファイル`

## Sassのコンパイル

### 初級

[このあたり](http://blog.sou-lab.com/prepros/)を参考に[Prepros](https://prepros.io/)を常駐させてコンパイルします。  
Frameworkに同封の**設定ファイル(prepros.cfg)**を利用すると楽ですが、手動で設定する場合は**Auto Compile**と**Auto Prefix CSS**は必須、**Use LibSass**はエラーが出なければ利用した方が早いです。More OptionからCSS→Auto Prefixerを**last 5 versions**に設定しておくとベンダープレフィックスがほぼほぼ自動で付きます。

### 上級

[Node.js](http://nodejs.org/)がインストール済みを前提とします。  

npmでGulp本体をインストール  
```unix
sudo npm install -g gulp
```
作業ディレクトリ移動し、必要なモジュールをインストール
```unix
npm install --save-dev gulp gulp-watch gulp-sass gulp-pleeease gulp-imagemin imagemin-pngquant
```
実行してみる  
```unix
# scss のコンパイル ( gulp-sass )
gulp sass

# scss に変更があったら自動的にコンパイル
gulp watch 

# 画像の圧縮
gulp img 
```

## ローカル開発環境(Vagrant)を立ち上げる

[Vagrant](https://www.vagrantup.com/downloads.html)と[VirtualBox](https://www.virtualbox.org/wiki/Downloads) がインストール済みを前提とします。

### パッケージで使う

* step1: [HF-framwork](https://github.com/hanuman6/HF-Framework/archive/master.zip)をダウンロードし展開する。
* step2: コマンドライン(ターミナル)を立ち上げフォルダのルートに移動しする。
```unix
cd ディレクトリパス
```

* step3: Vagrantを立ち上げる。publicフォルダがサイトルートになります。

### Vagrant コマンド

```unix
# Vagrantの立ち上げ
vagrant up

# Vagrantの終了
vagrant up

# Vagrantの再起動
vagrant reload

# Vagrantの一時停止
vagrant suspend

# Vagrantの再開
vagrant resume

# Vagrantの再起動
vagrant reload

# Vagrantの消去
vagrant destroy
```

### public以外の独自ディレクトリで使う

* step1: **[Vagrantfile](https://github.com/hanuman6/HF-Framework/blob/master/Vagrantfile)**をダウンロードし利用したいディレクトリに設置。
* step2: Vagrantを立ち上げる。
* step3: SSHで接続してルートフォルダの変更する。ID/PASSは「vagrant」「vagrant」で接続できる。下記コマンドからVimで設定ファイルを変更する。
```ssh
sudo vim /etc/apache2/sites-available/000-default.conf (or the editor of your choosing)
```

* step4: Vagrantの再起動

### 使用するVim コマンド

```vim
# インサートモード
i

# インサートモードの終了
Esc

# 保存して終了
;wq
```

## Git(SourceTree)を利用してローカルを共有する

後ほど説明

## Documents
### コーディングガイド
* [HTML](https://github.com/hanuman6/HF-Framework/blob/master/documents/html.md/)
* [Meta](https://github.com/hanuman6/HF-Framework/blob/master/documents/meta.md/)
* [Short Name](https://github.com/hanuman6/HF-Framework/blob/master/documents/shortname.md/)
* [CSS](https://github.com/hanuman6/HF-Framework/blob/master/documents/css.md/)
* [Image Elements](https://github.com/hanuman6/HF-Framework/blob/master/documents/images.md/)
* [javascript](https://github.com/hanuman6/HF-Framework/blob/master/documents/js.md/)
* [php](https://github.com/hanuman6/HF-Framework/blob/master/documents/php.md/)
* [Sass(SCSS) Usage](https://github.com/hanuman6/HF-Framework/blob/master/documents/sass.md/)

### Fフレームワーク
* [Introduction](https://github.com/hanuman6/HF-Framework/blob/master/documents/intro.md/)
* [Basic Usage](https://github.com/hanuman6/HF-Framework/blob/master/documents/usage.md/)
* [Use Mixin/Protocol](https://github.com/hanuman6/HF-Framework/blob/master/documents/mixin.md/)
* [Development](https://github.com/hanuman6/HF-Framework/blob/master/documents/dev.md/)

#### ディレクトリ構成
```
  public/ ...................... サイトルート・ディレクトリ
  ├── common/
  │    ├── css/ ...................... 出力CSS
  │    │    ├── common.css
  │    │    └── ie.css
  │    ├── fonts/
  │    ├── img/
  │    │    └── libs/  ............... アイコンやサムネイルなど固定素材
  │    ├── inc/ ...................... 各種インクルードPHP
  │    ├── js/
  │    │    ├── libs/  ............... jQueryなどのライブラリ
  │    │    ├── app.js ............... jQueryプラグイン (基本触らない)
  │    │    └── common.js ............ メインスクリプト
  │    └── sass/
  │         ├── addon/ ............... 追加用Sassパーシャル
  │         │    ├── _bxslider.scss
  │         │    ├── _form.scss
  │         │    ├── _print.scss
  │         │    └── _wp.scss
  │         ├── components/ .......... コンテンツ用Sassパーシャル
  │         │    ├── _base.scss
  │         │    ├── _mixin.scss
  │         │    ├── _normalize.scss
  │         │    └── _reset.scss
  │         ├── _setting.scss ........ 基本設定Sassパーシャル
  │         ├── common.scss .......... メインSCSS
  │         └── ie.scss .............. IE用のSCSS
  ├─── index.php ..................... ルートファイル
  ├─── screenshot.php ................ Wordpressテーマのサムネイル
  ├─── gulpfile.js ................... Gulp設定ファイル
  ├─── prepros.cfg ................... Prepros設定ファイル
  └─── style.css ..................... 上書き編集用CSS(Wordpressではテーマ説明)
```


##### Links
- [SASS（SCSS）とcompassとPreprosの、初心者にも優しいお付き合い](http://satohmsys.info/sass-compass-prepros/)
- [HTMLHint](http://htmlhint.com/)
- [SASS](http://sass-lang.com/)

### History
* 0.4.0 - 簡易リリース
* 0.3.6 - Vagrant環境を統合
* 0.3.1 - ドキュメントを整備し始める
* 0.3.0 - グループで使えるように変更
* 0.0.1 - 個人で使ってたのを移植

### License

The MIT License (MIT)

Copyright (c) 2015 HF-Framwork
