# [HF-Framework](https://github.com/hanuman6/HF-Framework)
HF-Frameworkはローカル開発環境(Vagrant)とnode.js(Gulp)を利用した新規サイト用のBoilerplateです。Vagrantfileは[Scotch Box](https://box.scotch.io/)を利用しています。
<br>
![workflow](http://create.hot-factory.jp/framework/img/img01.png)

利用にあたってはこのドキュメントを読み[コーディングガイド一覧](https://github.com/hanuman6/HF-Framework/tree/master/documents)を確認してコーディングをお楽しみください。

## History
* 1.0.0 - 2xを別系統として作成するため1.0に
* 0.8.0 - Sassのコンパイルでエラー終了しないように調整
* 0.7.1 - betaリリース(common.jsをM本さん作へ暫定で変更)
* 0.5.6 - cssnextを導入
* 0.5.2 - preprosによるコンパイルを基本廃止
* 0.5.0 - SASSソースマップ出力に対応
* 0.4.5 - gulpによるjsの圧縮機能を追加
* 0.4.4 - Flexboxを導入。Polyfillは[flexibility.js](https://github.com/10up/flexibility)を採用。
* 0.4.3 - sass.mdを作成
* 0.4.2 - README.mdを作成
* 0.4.0 - 簡易リリース
* 0.3.6 - Vagrant環境を統合
* 0.3.1 - ドキュメントを整備し始める
* 0.3.0 - グループで使えるように変更
* 0.0.1 - 個人で使ってたのを移植

## 用意するもの
* **[Node.js](https://nodejs.org/)** : Gulpを利用することでcssやjsのコンパイルをします。
* **[Vagrant](https://www.vagrantup.com/downloads.html)**: ローカル環境を構築するツール
* **[VirtualBox](https://www.virtualbox.org/wiki/Downloads)**: 仮想環境構築ツール
* ターミナル/コマンドライン : 標準でもよいが[iTerm](https://www.iterm2.com/)や[ConEmu](https://osdn.jp/projects/conemu/)があると捗る
* SSHクライアント : [TeraTerm](https://osdn.jp/projects/ttssh2/)や[iTerm](https://www.iterm2.com/)

## タスクランナー
node.jsを導入しnpmから諸々パッケージをインストールします。  
npmとかnode.jsについては[コチラ](http://qiita.com/megane42/items/2ab6ffd866c3f2fda066)なんかを参照。  
node.jsがインストール済みを前提とします。  
フレームワークにはpackage.jsonが入っているので、諸々一括でインストールが可能。

適時gulpfile.jsの出力パスやらを変更してください。

### STEP1
npmでGulp本体をグローバルにインストールする。  
この工程はアンインストールしない限りは初回のみです。
```sh
$ npm install -g gulp
```

### STEP2
package.json記載の諸々パッケージをinstall

```sh
# npmの場合
$ npm install
# yarnでも可能
$ yarn
```

### STEP3
実行してみる(gulpfile.jsのあるディレクトリで実行)
```sh
# scssのコンパイル(devモード:ソースマップ、圧縮)
$ gulp

# scssのコンパイル(ブラウザsyncモード:devにブラウザシンクを追加)
$ gulp reload

# scssのコンパイル(productionモード:ソースマップ削除、expanded)
$ gulp pro

# 画像の圧縮
$ gulp img

# javascriptの圧縮
$ gulp js
```

## ローカル開発環境(Vagrant)

[Vagrant](https://www.vagrantup.com/downloads.html)と[VirtualBox](https://www.virtualbox.org/wiki/Downloads) がインストール済みを前提とします。

### STEP1
HF-Framework、もしくはプロジェクトをClone
```sh
$ git clone https://github.com/hanuman6/HF-Framework.git
```
### STEP2
Vagrantを立ち上げる
```sh
$ vagrant up
```
### STEP3
192.168.33.11にアクセスする。  
デフォルトではpublicフォルダがドキュメントルートになります。


### よく使うVagrantコマンド

```sh
# Vagrantの立ち上げ
$ vagrant up

# Vagrantの終了
$ vagrant halt

# Vagrantの再起動
$ vagrant reload

# Vagrantの一時停止
$ vagrant suspend

# Vagrantの再開
$ vagrant resume

# Vagrantの再起動
$ vagrant reload

# Vagrantの消去
$ vagrant destroy
```

### ローカルURLを変更する

* step1: **[Vagrantfile](https://raw.githubusercontent.com/hanuman6/HF-Framework/master/Vagrantfile)**をテキストエディタで開く。
* step2: 4行目`ip: "192.168.33.10"`の部分を変更する。
* step3: vagrantを立ち上げている場合は再起動`vagrant reload`

### ドキュメントルートを変更する

* step1: **[Vagrantfile](https://raw.githubusercontent.com/hanuman6/HF-Framework/master/Vagrantfile)**をダウンロードし利用したいディレクトリに設置。
* step2: Vagrantを立ち上げる。
* step3: SSHで接続してルートフォルダの変更する。ID/PASSは「vagrant」「vagrant」で鍵なしで接続できる。下記コマンドからVimで設定ファイルを変更する。
```ssh
sudo vim /etc/apache2/sites-available/000-default.conf
```

* step4: Vagrantの再起動

### よく使用するVim コマンド

```vim
# インサートモード
i

# インサートモードの終了
Esc

# 保存して終了
:wq
```

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

## ディレクトリ構成
```
  public/ ...................... サイトルート・ディレクトリ
  ├── common/
  │    ├── css/ ...................... 出力CSS
  │    │    ├── common.css
  │    │    ├── static.css ........... 静的記述ファイル
  │    │    └── polyfill.css
  │    ├── fonts/*
  │    ├── img/
  │    │    └── libs/* ............... アイコンやサムネイルなど固定素材
  │    ├── inc/ ...................... 各種インクルードPHP
  │    ├── js/
  │    │    ├── libs/  ............... jQueryなどのライブラリ
  │    │    ├── app.js ............... jQueryプラグイン (基本触らない)
  │    │    └── common.js ............ メインスクリプト
  │    └── sass/
  │         ├── addon/* .............. 追加用Sassパーシャル
  │         ├── components/* ......... コンテンツ用Sassパーシャル
  │         ├── _setting.scss ........ 基本設定Sassパーシャル
  │         ├── common.scss .......... メインSCSS
  │         └── polyfill.scss ........ モダンブラウザ以外の対応用SCSS
  ├─── index.php ..................... ルートファイル
  └─── gulpfile.js ................... Gulp設定ファイル
```

### Powerd by
- [SASS](http://sass-lang.com/)
- [Vagrant](https://www.vagrantup.com/)
- [Node.js](https://nodejs.org/)
- [Scotch Box](https://box.scotch.io/)
- [gulp.js](http://gulpjs.com/)

### License

The MIT License (MIT)

Copyright (c) 2015 HF-Framwork
Copyright (c) 2014-2015 Nicholas Cerminara, scotch.io, LLC

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
