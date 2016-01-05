# [HF-Framework](https://github.com/hanuman6/HF-Framework)
HF-Frameworkはローカル開発環境(Vagrant)とSass(SCSS)、Git(SourceTree)を使った新規サイト用のBoilerplateです。Vagrantfileは[Scotch Box](https://box.scotch.io/)を利用しています。

利用にあたってはこのドキュメントを読み[コーディングガイド一覧](https://github.com/hanuman6/HF-Framework/tree/master/documents)を確認してコーディングをお楽しみください。

## mixinについて

compassやfoundationを導入するともっと便利だけどrubySassのパフォーマンスやファイルパスの文字コードなどもろもろ問題あるので現状はこの形でこつこつmixinを増やしていく方向性。パスは下記に。追加はよしなに。

`/common/sass/components/_mixin.scss`

- - -

### clearfix（クリアフィックス）

##### include
```scss
@include cf
```

##### mixin
```scss
@mixin cf {
    *zoom: 1;
    &:after {
        content: "";
        display: table;
        clear: both;
    }
    &:before {
        content: "";
        display: table;
    }
}
```

##### protocol
```html
<div class="cf">hoge</div> 
```

必須のclearfix。micro型を採用してoverflowは使用していない。  

### License

The MIT License (MIT)

Copyright (c) 2015 HF-Framwork
