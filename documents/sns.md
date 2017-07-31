# [HF-Framework](https://github.com/hanuman6/HF-Framework)
HF-Framework is a responsive front-end framework. You can quickly prototype and build sites or apps that work on any kind of device, more elements, tips and best practices.

<a href="http://www.w3.org/html/logo/">
<img src="http://www.w3.org/html/logo/badge/html5-badge-h-css3-semantics.png" width="165" height="64" alt="HTML5 Powered with CSS3 / Styling, and Semantics" title="HTML5 Powered with CSS3 / Styling, and Semantics">
</a>

At First, learn [Coding Guide](#Coding Guide)

## SNS

### Facebook

* サイト名、ページタイトル、説明文、URL、OGイメージ、コンテンツタイプを指定してください。
* タイトルについてはtitleタグのものを、要約文については、metaタグのdescriptionと同じ内容を記載してください。
* 公開前のテスト時は、公開前の情報がシェアされないように十分に注意してください。
* 公開後は必ず意図した形でシェアできるかどうかFacebookデバッガーで確認してください。

 [Facebookシェアデバッガー](https://developers.facebook.com/tools/debug/)

```
<meta property="og:type" content="website">
<meta property="og:site_name" content="サイト名">
<meta property="og:title" content="ページタイトル | サイト名">
<meta property="og:description" content="説明文">
<meta property="og:url" content="URL">
<meta property="og:image" content="URL/assets/img/ogp.png">
```

#### ボタン埋め込み方法

Facebookはシェアボタンを基本的に配置してください。

```
<a onclick="window.open(this.href, 'fb-news', 'width=640, height=500, menubar=no, toolbar=no, scrollbars=yes'); return false;" href="https://www.facebook.com/sharer/sharer.php?u=URL" target="_blank">***リンクさせる要素***</a>
```

### Twitterカード

* サイト名、ページタイトル、説明文、URL、OGイメージ、コンテンツタイプを指定してください。
* タイトルについてはtitleタグのものを、要約文については、metaタグのdescriptionと同じ内容を記載してください。
* 公開前のテスト時は、公開前の情報がシェアされないように十分に注意してください。
* 公開後は必ず意図した形でシェアできるかどうかTwitter カードバリデーターで確認してください。

 [Twitter Card validator](https://cards-dev.twitter.com/validator)


```
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="TWITTERアカウント名">
<meta name="twitter:creator" content="TWITTERアカウント名">
<meta name="twitter:title" content="ページタイトル | サイト名">
<meta name="twitter:image" content="画像URL（絶対パス）">
<meta name="twitter:description" content="説明文">
```

#### ボタン埋め込み方法

```
<a href="https://twitter.com/intent/tweet?url=URL&text=ページタイトル | サイト名" target="_blank">***リンクさせる要素***</a>
```

### YOUTUBE埋め込み


## 

### License

The MIT License (MIT)

Copyright (c) 2015 HF-Framwork
