# [HF-Framework](https://github.com/hanuman6/HF-Framework)
HF-Frameworkはローカル開発環境(Vagrant)とSass(SCSS)、Git(SourceTree)を使った新規サイト用のBoilerplateです。Vagrantfileは[Scotch Box](https://box.scotch.io/)を利用しています。

利用にあたってはこのドキュメントを読み[コーディングガイド一覧](https://github.com/hanuman6/HF-Framework/tree/master/documents)を確認してコーディングをお楽しみください。

## Meta

### name属性
#### キーワード
たくさん指定しても意味がないので3~5程度。  
現在SEO対策として効果はない。  
参考:[SEOの基本中の基本！「titleタグ」「meta description」「h1タグ」の書き方まとめ](http://liginc.co.jp/web/seo/127545)
```html
<meta name="keywords" content="hoge1,hoge2,hoge3">
```

#### サイト説明
検索結果に表示されるので文字数は50～100文字程度。それを超えると文字切りされてしまうので注意。

| 検索エンジン | 文字数 |
|:-----|:-----|
| Google | 全角110文字前後 |
| Yahoo | 全角110文字前後 |
| Googleモバイル | 全角55文字前後 |
| Yahooモバイル |全角30文字以内 |

```html
<meta name="description" content="サイトの説明文">
```

### OGP
各ベンダーのガイドラインに添って記載する。  
コロコロ変わるので注意。  
2015/8/1時点でのよくあるOGP仕様は下記の通り。

| 項目 | 仕様 |
|:-----|:----- |
| OGP image | 最低600 x 315（推奨1200 x 630 px 以上） |
| apple-touch-icon | 180x180 |
| favicon | 32x32 |

### License

The MIT License (MIT)

Copyright (c) 2015 HF-Framwork
