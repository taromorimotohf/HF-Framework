# [HF-Framework](https://github.com/hanuman6/HF-Framework)
HF-Frameworkはローカル開発環境(Vagrant)とSass(SCSS)、Git(SourceTree)を使った新規サイト用のBoilerplateです。Vagrantfileは[Scotch Box](https://box.scotch.io/)を利用しています。

利用にあたってはこのドキュメントを読み[コーディングガイド一覧](https://github.com/hanuman6/HF-Framework/tree/master/documents)を確認してコーディングをお楽しみください。

## SASS
Syntactically Awesome StyleSheet」の略。直訳すると「構文的にすげえスタイルシート」だそうな。  

そのままではブラウザから認識されないので、コンパイルしてCSSを生成する。  
コンパイルには[Prepros](https://prepros.io/)や[Codekit](https://incident57.com/codekit/)などのGUIツール、[Gulp](http://gulpjs.com/)や[Grunt](http://gruntjs.com/)などのタスクランナー、Sublime Textの[プラグイン](https://packagecontrol.io/packages/Sass)を利用する方法などいろいろあります。  

HF-frameworkでは[Prepros](https://prepros.io/)、もしくは[Gulp](http://gulpjs.com/)の利用を前提としています。


### HF-FrameworkにおけるSass
コンパイルは[Prepros](https://prepros.io/)、もしくは[Gulp](http://gulpjs.com/)の利用を前提としています。  
[Compass](http://compass-style.org/)や[Foundation](http://foundation.zurb.com/)は採用せず、できるだけ自前のMixinを使う方向性です。  
Sass記法ではなく、SCSS記法を使用します。  
オリジナルのMixinについては[Mixin](https://github.com/hanuman6/HF-Framework/edit/master/documents/mixin.md)を確認ください。

### 基本
#### 変数
$hogeで変数を利用できます
```scss
//SASS
$width:500px;
$color:#aa443f;
.main {
	width:$width;
	color:$color;
}
```
```scss
//CSS(コンパイル後)
.main {
  width: 500 px;
  color: #aa443f;
}
```
#### CSSの継承をネストでまとめられる
```scss
//SASS
div{
  position:relative;

  p{
    position:absolute;
    top:0;
    left:0

    span{
      color:#000;
    }
  }
}
```
```scss
//CSS(コンパイル後)
div{
  position:relative;
}
div p{
  position:absolute;
  top:0;
  left:0
}
div p span{
  color:#000;
}
```

### License

The MIT License (MIT)

Copyright (c) 2015 HF-Framwork
