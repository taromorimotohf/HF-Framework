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
変数が利用できるということは、もちろん算術演算子を利用した演算もできます。  
複雑な演算はもちろんRGB値の演算など捗ります。  
個人的には明度の調節（lighten / darken）がとても便利です。  
```scss
//かんたんな演算
$base_width: 650px;  
#contents {  
    $pd: 10px;  
    width: $base_width - ($pd * 2);  
    padding: $pd;  
}  
```
```scss
//変数bg-colorに変base-colorを15%明度を下げたプロパティに代入（指定）
$bg-color: darken( $base-color, 15% );
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
上記２つの出力結果を見るとわかりますが、ネストされた親子関係にはスペースが入って出力されます。  
スペースを入れずに出力したい場合は&を使います。  
&をセレクタの前に書くことで親セレクタを参照し、スペースをはさまず出力されます。  
&連結は&:hoverなどめちゃめちゃ使うし、BEM記法とも相性がよいです。
```scss
//SASS
a{
  &:link{
  color:#f90;
  }
  &:hover{
  color:#000;
  }
  &:visited{
  color:#999;
  }
}
.box{
  width:200px;
  height:200px;

  &.red{
  background:#f00;
  }
}
```
```scss
//CSS(コンパイル後)
a:link{
  color:#f90;
}
a:hover{
  color:#000;
}
a:visited{
  color:#999;
}
.box{
  width:200px;
  height:200px;
}
.box.red{
  background:#f00;
}
```
ネームスペースのネストもできるので、個別プロパティの記述が捗ります。  
めんどくさいborder指定とはおさらばです。  
```scss
.sample {
	border: {
		top: 5px solid #ccc;
		bottom: {
			width: 3px;
			style: dotted;
			color: black;
		}
	}
}
```
```css
.sample {
	border-top: 5px solid #ccc;
	border-bottom-width: 3px;
	border-bottom-style: dotted;
	border-bottom-color: black;
}
```

### partial
SassではCSSのように「@import」が利用できる。
ただCSSと違い、完全に1つのCSSファイルにまとまってコンパイルされるので、HTTPリクエストを減らす効果があります。   

分轄されたSassファイルはpartial（パーシャル）と呼び、ファイル名の最初に_(アンダーバー)を付けます。  
呼び出し時は下記のように_(アンダーバー)と拡張子は省略できます。

基本的にはSassで編集時には細かくパーツごとにをpartialを切って、最終CSSは1枚で運用するのがSassっぽいですね。  
```scss
@import "components/reset";  //リセットスタイルを選ぶ
@import "components/font";  //カスタムフォントを使う
@import "setting";  //基本設定
@import "components/mixin";  //便利なmixinを読み込む
@import "components/base";  //プロトコル系
```

### extend
定義しているスタイルを継承する。  
コンパイルすると、セレクタがグループ化される。  
```scss
.box {
  margin-top: 15px;
  padding: 10px;
  background-color: #ccc;

  p {
    line-height: 1.3;
  }
}
.contentsBox {
  @extend .box;
  background-color: #eee;
}
```
```css
.box, .contentsBox {
  margin-top: 15px;
  padding: 10px;
  background-color: #ccc;
}

.box p, .contentsBox p {
  line-height: 1.3;
}

.contentsBox {
  background-color: #eee;
}
```
extendする元のスタイルをCSSに出したくないとき、プレイスホルダーセレクタを使う。  
なんだかmixinぽくなるのであまり使わないパターン
```scss
%box {
  margin-top: 15px;
  padding: 10px;
  background-color: #ccc;
}
.contenteBox {
  @extend %box;
  p {
    line-height: 1.3;
  }
}
.noteBox {
  @extend %box;
}
```
```css
.contenteBox, .noteBox {
  margin-top: 15px;
  padding: 10px;
  background-color: #ccc;
}
.contenteBox p {
  line-height: 1.3;
}
```

### mixin
引数を使うことができ、初期値を設定しておくことも可能。  
使いこなせばsassの超重要な要素。  
@mixinで指定する。  
定義しても、@includeで呼び出さないと使えない。  
開発時に触るよりは予めmixin（関数）を用意しておくのがよい。  
compassやburbonなども乱暴に言うとmixin集のようなものだし、奥が深い。  
ぶっちゃけもはや関数(function)。  
hoge() →　@mixin hoge

HF-frameworkではmixin.scssにあらかたまとめている。
```scss
//簡単なborderのmixin
@mixin border($color:#666) {
  border-bottom: 1px solid $color;
}
#header {
  @include border(#999);//引数を入れて呼び出し
  #gnav {
    overflow: hidden;
    @include border;//引数無しで呼び出し
  }
}
```
```css
#header {
  border-bottom: 1px solid #999999;
}
#header #gnav {
  overflow: hidden;
  border-bottom: 1px solid #666666;
}
```
引数の初期値を入れたい場合は、「:」の後に値を入れる。
```scss
@mixin border($color: #666) {
  border-bottom: 1px solid $color;
}
```
引数を複数指定したい場合は、「,」で区切る。
```scss
@mixin box($color: #666, $width: 300px, $height: 300px) {
  border: 1px solid $color;
  width: $width;
  height: $height;
}
```
引数使わないときは以下の書き方でOK。()なくて良い
```scss
@mixin border {
  border-bottom: 1px solid #999;
}
```
どうみてもfunctionでした。ありがとうございました

### その他
他にもいろんな昨日はありますが、基本はこれだけ。  
mixin、ネストと演算、変数を利用して、ごりごりコーディングしましょう。

### License

The MIT License (MIT)

Copyright (c) 2015 HF-Framwork
