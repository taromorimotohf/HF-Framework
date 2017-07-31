# [HF-Framework](https://github.com/hanuman6/HF-Framework)
HF-Framework is a responsive front-end framework. You can quickly prototype and build sites or apps that work on any kind of device, more elements, tips and best practices.

<a href="http://www.w3.org/html/logo/">
<img src="http://www.w3.org/html/logo/badge/html5-badge-h-css3-semantics.png" width="165" height="64" alt="HTML5 Powered with CSS3 / Styling, and Semantics" title="HTML5 Powered with CSS3 / Styling, and Semantics">
</a>

At First, learn [Coding Guide](#Coding Guide)

## Wordpress

Wordpressを使ったサイト構築の場合は、以下のガイドラインに従って実装をお願いします。

### テストアップ

公開後のテストアップについては、新しくテストアップ用の固定ページを非公開で作成して、テストアップの確認に使ってください。
テストアップが本番公開された後は不要なテストアップ用の固定ページは削除してください。

### テーマ作成
* テーマ名はサイト名がわかる名前で半角英数字を使用する。
* screenshot.png は　サイトのキャプチャを使用する。
* style.css はテーマ名の設定のみに使用する。
* テーマフォルダ内に「common」フォルダを置いて、フレームワークに則った、実装とする。
* header.php、footer.phpは使用せずに「common」フォルダ内のheader.php、footer.phpにWPのhead関数、footer関数のみの記述とする。
* function.phpには基本的なアップロード画像サイズカスタマイズや、パーマリンク設定のカスタマイズ等の基本的なカスタマイズの記述とする。
* 管理画面に大幅なカスタマイズを行う場合はテーマフォルダ内に「functions」というフォルダを作成して、その中にカスタマイズファイルを設置してfunction.phpからインクルードさせてください。


### プラグイン

*プラグインを使うにあたって以下の要件を満たした上で利用してください。*

* 更新頻度が6ヶ月以内に更新があるもの。
* 利用する上で脆弱性の情報が出ていないもの。
* Wordpress公式から配布されているもの。

*弊社で推奨するプラグインは以下になります。*

* フォーム [MW WP Form](https://ja.wordpress.org/plugins/mw-wp-form/)
* カスタム投稿生成 [Custom Post Type UI](https://wordpress.org/plugins/custom-post-type-ui/)
* カスタムフィールド生成 [Smart Custom Fields](https://ja.wordpress.org/plugins/smart-custom-fields/)


The MIT License (MIT)

Copyright (c) 2015 HF-Framwork
