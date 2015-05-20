<?php
	
//コンテンツ幅
if ( ! isset( $content_width ) ) {
  $content_width = 600;
}

//マークダウン
add_action( 'init', 'amimoto_custom_jetpack_markdown_support' );
function amimoto_custom_jetpack_markdown_support() {

	$args = array(
		'public'   => true,
		'_builtin' => false
	);
	$output = 'names'; // names or objects, note names is the default
	$operator = 'and'; // 'and' or 'or'

	$post_types = get_post_types( $args, $output, $operator ); 

	foreach ( $post_types  as $post_type ) {
		add_post_type_support( $post_type, 'wpcom-markdown' );
	}
}

//検索周り
function SearchFilter($query) {
 if ( !is_admin() && $query->is_main_query() && $query->is_search() ) {
  $query->set( 'post_type', 'post' );
 }
}

add_action( 'pre_get_posts','SearchFilter' );

// Widgetボタン
class My_Widget extends WP_Widget{
    /**
     * Widgetを登録する
     */
    function __construct() {
        parent::__construct(
            'my_widget', // Base ID
            'Widgetの名前', // Name
            array( 'description' => 'Widgetの説明', ) // Args
        );
    }
 
    /**
     * 表側の Widget を出力する
     *
     * @param array $args      'register_sidebar'で設定した「before_title, after_title, before_widget, after_widget」が入る
     * @param array $instance  Widgetの設定項目
     */
    public function widget( $args, $instance ) {
        $email = $instance['email'];
        echo $args['before_widget'];
 
        echo "<p>Email: ${email}</p>";
 
        echo $args['after_widget'];
    }
 
    /** Widget管理画面を出力する
     *
     * @param array $instance 設定項目
     * @return string|void
     */
    public function form( $instance ){
        $email = $instance['email'];
        $email_name = $this->get_field_name('email');
        $email_id = $this->get_field_id('email');
        ?>
        <p>
            <label for="<?php echo $email_id; ?>">Email:</label>
            <input class="widefat" id="<?php echo $email_id; ?>" name="<?php echo $email_name; ?>" type="text" value="<?php echo esc_attr( $email ); ?>">
        </p>
        <?php
    }
 
    /** 新しい設定データが適切なデータかどうかをチェックする。
     * 必ず$instanceを返す。さもなければ設定データは保存（更新）されない。
     *
     * @param array $new_instance  form()から入力された新しい設定データ
     * @param array $old_instance  前回の設定データ
     * @return array               保存（更新）する設定データ。falseを返すと更新しない。
     */
    function update($new_instance, $old_instance) {
        if(!filter_var($new_instance['email'],FILTER_VALIDATE_EMAIL)){
            return false;
        }
        return $new_instance;
    }
}
 
add_action( 'widgets_init', function () {
    register_widget( 'My_Widget' );  //WidgetをWordPressに登録する
    register_sidebar( array(  //「サイドバー」を登録する
        'name'          => 'サイドバー',
        'id'            => 'my_sidebar',
        'before_widget' => '<li>',
        'after_widget'  => '</li>',
        'before_title'  => '',
        'after_title'   => '',
    ) );
} );

// カスタムヘッダー
add_theme_support( 'custom-header' );

//カスタムメニュー
register_nav_menus( array(
	'header' => 'グローバルナビ',
) );

//カスタム背景
add_theme_support( 'custom-background' );

/* アイキャッチ画像の機能を有効化 */
add_theme_support( 'post-thumbnails' );

/* 基本サイズを設定 */
set_post_thumbnail_size( 200, 130 );

/* サイズを複数設定 */
add_image_size( 's-size', 200, 130, true );
add_image_size( 'm-size', 233, 233, true );
add_image_size( 'l-size', 580, 348, true );

//read more
function new_excerpt_more($post) {
    return ' <a href="'. esc_url( get_permalink() ) . '">' . 'Read More  >' . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

//検索
function custom_search($search, $wp_query) {
    //サーチページ以外だったら終了
    if (!$wp_query->is_search) return;
    //投稿記事のみ検索
    $search .= " AND post_type = 'post'";
    return $search;
}
add_filter('posts_search','custom_search', 10, 2);

?>