# [HF-Framework](https://github.com/hanuman6/HF-Framework)
HF-Framework is a responsive front-end framework. You can quickly prototype and build sites or apps that work on any kind of device, more elements, tips and best practices.

<a href="http://www.w3.org/html/logo/">
<img src="http://www.w3.org/html/logo/badge/html5-badge-h-css3-semantics.png" width="165" height="64" alt="HTML5 Powered with CSS3 / Styling, and Semantics" title="HTML5 Powered with CSS3 / Styling, and Semantics">
</a>

At First, learn [Coding Guide](#Coding Guide)

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
