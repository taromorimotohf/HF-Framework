# [HF-Framework](https://github.com/hanuman6/HF-Framework)
HF-Frameworkはローカル開発環境(Vagrant)とSass(SCSS)、Git(SourceTree)を使った新規サイト用のBoilerplateです。Vagrantfileは[Scotch Box](https://box.scotch.io/)を利用しています。
<br>
![workflow](http://create.hot-factory.jp/framework/img/img01.png)

利用にあたってはこのドキュメントを読み[コーディングガイド](https://github.com/hanuman6/HF-Framework#coding-guide)に基づいてコーディングしてください。

## 用意するもの
#### Sass(SCSS)
* **[Prepros](https://prepros.io/)**: Sassのコンパイルを簡単にできるGUIアプリケーション。[Node.js](https://nodejs.org/)や[Ruby](http://rubyinstaller.org/)を内蔵していて、これ一本で完結できる。
* [Node.js](https://nodejs.org/) *(option)*: サーバーサイドJavaScript環境。Sassや後述するGulpを利用するために必要。

#### ローカル開発環境(Vagrant)
* **[Vagrant](https://www.vagrantup.com/downloads.html)**: ローカル環境を構築するツール
* **[VirtualBox](https://www.virtualbox.org/wiki/Downloads)**: 仮想環境構築ツール
* ターミナル/コマンドライン *(option)*: 標準でもよいが[iTerm](https://www.iterm2.com/)や[ConEmu](https://osdn.jp/projects/conemu/)があると捗る
* SSHクライアント *(option)*: [TeraTerm](https://osdn.jp/projects/ttssh2/)や[iTerm](https://www.iterm2.com/)

#### Git(SourceTree)
* **[SourceTree](https://www.atlassian.com/ja/software/sourcetree/overview)**: `GitやBitbacketをGUIで使えるアプリケーション`
* [Bitbucket](https://bitbucket.org/) *(option)*: SourceTreeの開発元の提供するgithub互換バージョン管理ウェブサービス。[github](https://github.com/)でも構わないが、private repositryの利用が有料。(Bitbucketは5コミットまで無料)

#### Framework
* [HF-Framework](https://github.com/hanuman6/HF-Framework/archive/master.zip) : フレームワーク本体。後述のファイルも含んだパッケージ。
* [Vagrantfile](https://raw.githubusercontent.com/hanuman6/HF-Framework/master/Vagrantfile): VagrantでのLAMP環境の設定ファイル
* [gulpfile.js](https://raw.githubusercontent.com/hanuman6/HF-Framework/master/public/gulpfile.js): gulpの設定ファイル

## Sassのコンパイル

### Preprosでコンパイル

[Prepros](https://prepros.io/)を起動し、プロジェクトフォルダをドラッグするとSCSS→CSSのコンパイル監視がスタートします。  
出力先があっているか、まずは設定を確認。  
Sass設定は上から3つはチェックを入れておきます。  
手動でコンパイルもできますが、**Auto Compile**にチェックがればSassの保存のタイミングで自動でCSSを生成します。  

![img](http://create.hot-factory.jp/framework/img/img02.png)

**MORE OPTION**→**Project Option**より詳細設定に入ります。  

![img](http://create.hot-factory.jp/framework/img/img03.png)

**Auto Prefixer**(自動でベンダープレフィックスを付加)が上手く動かない場合は、設定を変更します。

![img](http://create.hot-factory.jp/framework/img/img04.png)

コンパイルが成功すると通知がでます。  

![img](http://create.hot-factory.jp/framework/img/img05.png)

失敗する場合ログを見て設定を見直す。だいたいSassの記述ミスの場合はが多い。

![img](http://create.hot-factory.jp/framework/img/img06.png)


### gulp(タスクランナー)でコンパイル

[Node.js](http://nodejs.org/)がインストール済みを前提とします。  

npmでGulp本体をインストール  
```unix
sudo npm install -g gulp
```
作業ディレクトリ移動し、必要なモジュールをインストール。  
使用しているモジュールは

* gulp (タスクランナー)
* gulp-watch (ファイル監視)
* gulp-sass (Sassコンパイル)
* gulp-pleeease (ベンダープレフィックス付加)
* gulp-plumber (エラー停止させない)
* gulp-imagemin (画像の圧縮)
* imagemin-pngquant (画像の圧縮補助)

```unix
npm install --save-dev gulp gulp-watch gulp-sass gulp-pleeease gulp-plumber gulp-imagemin imagemin-pngquant
```
実行してみる  
```unix
# scss のコンパイル
gulp sass

# scss に変更があったら自動的にコンパイル
gulp watch 

# 画像の圧縮（オプション）
gulp img 
```

## ローカル開発環境(Vagrant)を立ち上げる

[Vagrant](https://www.vagrantup.com/downloads.html)と[VirtualBox](https://www.virtualbox.org/wiki/Downloads) がインストール済みを前提とします。

### フレームワークをベースに使う

* step1: [HF-framwork](https://github.com/hanuman6/HF-Framework/archive/master.zip)をダウンロードし展開する。
* step2: コマンドライン(ターミナル)を立ち上げフォルダのルート(vagrantfileのあるディレクトリ)に移動しする。
```unix
cd ディレクトリパス
```

* step3: Vagrantを立ち上げる`vagrant up`。publicフォルダがサイトルートになります。
* step4: [http://192.168.33.10/](http://192.168.33.10/)にアクセスする。デフォルトではpublicフォルダがドキュメントルートになります。

#### よく使うVagrantコマンド

```unix
# Vagrantの立ち上げ
vagrant up

# Vagrantの終了
vagrant halt

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

#### ローカルURLを変更する

* step1: **[Vagrantfile](https://raw.githubusercontent.com/hanuman6/HF-Framework/master/Vagrantfile)**をテキストエディタで開く。
* step2: 4行目`ip: "192.168.33.10"`の部分を変更する。
* step3: vagrantを立ち上げている場合は再起動`vagrant reload`

#### ドキュメントルートを変更する

* step1: **[Vagrantfile](https://raw.githubusercontent.com/hanuman6/HF-Framework/master/Vagrantfile)**をダウンロードし利用したいディレクトリに設置。
* step2: Vagrantを立ち上げる。
* step3: SSHで接続してルートフォルダの変更する。ID/PASSは「vagrant」「vagrant」で鍵なしで接続できる。下記コマンドからVimで設定ファイルを変更する。
```ssh
sudo vim /etc/apache2/sites-available/000-default.conf (or the editor of your choosing)
```

* step4: Vagrantの再起動

#### よく使用するVim コマンド

```vim
# インサートモード
i

# インサートモードの終了
Esc

# 保存して終了
;wq
```

## Git(SourceTree)を利用してローカルを共有する

※githubを利用する場合は管理者に問い合わせてください。   

### Bitbacketにリポジトリを立てて運用する
* step1: [Bitbacket](https://bitbucket.org/)のWebサイトでリポジトリを作成します。その際アクセス管理より共同で作業するユーザーを追加しておきます。

* step2: リポジトリのパスをコピーする。  

![img](http://create.hot-factory.jp/framework/img/img07.png)

* step3: [SourceTree](https://www.atlassian.com/ja/software/sourcetree/overview)でクローンを作成する。

![img](http://create.hot-factory.jp/framework/img/img08.png)

* step4: Gitのワークフローに沿って作業します。  

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

### フレームワークの説明
* [Introduction](https://github.com/hanuman6/HF-Framework/blob/master/README.md)
* [Use Mixin/Protocol](https://github.com/hanuman6/HF-Framework/blob/master/documents/mixin.md/)

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

### History
* 0.4.2 - README.mdを作成
* 0.4.0 - 簡易リリース
* 0.3.6 - Vagrant環境を統合
* 0.3.1 - ドキュメントを整備し始める
* 0.3.0 - グループで使えるように変更
* 0.0.1 - 個人で使ってたのを移植

### Powerd by
- [SASS](http://sass-lang.com/)
- [Vagrant](https://www.vagrantup.com/)
- [Node.js](https://nodejs.org/)
- [Scotch Box](https://box.scotch.io/)
- [gulp.js](http://gulpjs.com/)
- [Prepros](https://prepros.io/)

### License

The MIT License (MIT)

Copyright (c) 2015 HF-Framwork
