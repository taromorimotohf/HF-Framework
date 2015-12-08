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

### 基本

### 変数

### ネスト

### extend

### minxin

### License

The MIT License (MIT)

Copyright (c) 2015 HF-Framwork
