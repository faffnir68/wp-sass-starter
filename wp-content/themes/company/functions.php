<?php
// include the css file
$cssFilePath = glob( get_template_directory() . '/css/build/main.min.*' );
$cssFileURI = get_template_directory_uri() . '/css/build/' . basename($cssFilePath[0]);
wp_enqueue_style( 'site_main_css', $cssFileURI );
// include the javascript file
$jsFilePath = glob( get_template_directory() . '/js/build/app.min.*.js' );
$jsFileURI = get_template_directory_uri() . '/js/build/' . basename($jsFilePath[0]);
wp_enqueue_script( 'site_main_js', $jsFileURI , null , null , true );




function mitsuboshi_supports() {
    add_theme_support('title-tag');
    add_theme_support( "menus" );

    add_theme_support('post-thumbnails');
    // add_image_size('post-thumbnail', 350, 215, true);
    
    register_nav_menu( "Header", "ヘッダーのメニュー" );
}
add_action( "after_setup_theme", "mitsuboshi_supports" );

function mitsuboshi_nav_menu_link_attributes($atts) {
    $atts['class'] = 'nav__list__itm';
    return $atts;
}
add_filter('nav_menu_link_attributes', 'mitsuboshi_nav_menu_link_attributes');

function mitsuboshi_nav_menu_css_class($classes) {
    $classes[] = 'nav__list__itm';
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
      }
    return $classes;
}
add_filter("nav_menu_css_class", "mitsuboshi_nav_menu_css_class");

function mitsuboshi_make_link_relative( $link ) {
    return preg_replace( '|^(https?:)?//[^/]+(/?.*)|i', '$2', $link );
}
add_filter('the_permalink', 'mitsuboshi_make_link_relative');



function widget_full_search() {
 
    register_sidebar( array(
        'name'          => '完全な条件の検索',
        'id'            => 'custom-header-widget',
        'before_widget' => '<div class="chw-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );
 
}
add_action( 'widgets_init', 'widget_full_search' );

function train_search() {
    register_sidebar( array (
        'name' => '路線・駅から検索',
        'id' => 'main-search__road-form',
        'before_widget' => '<div class="main-search__road-form">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ));
}
add_action( 'widgets_init', 'train_search' );

function widget_word_search() {
 
    register_sidebar( array(
        'name'          => 'フリーワード検索',
        'id'            => 'free-word-widget',
        'before_widget' => '<div class="free-word-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );
 
}
add_action( 'widgets_init', 'widget_word_search' );

/**
 * カスタム投稿
 *
 */
function create_post_type_redetail() {
	// $labels = array(
	// 	'name'=> 'スタッフブログ',
	// 	'all_items' => 'スタッフブログの一覧',
	// );
	// $args = array(
	// 	'labels' => $labels,
	// 	'supports' => array('title','editor','excerpt','thumbnail'),
	// 	'public' => true, // 公開するかどうか
	// 	'show_ui' => true, // メニューに表示するかどうか
	// 	'menu_position' => 6, // メニューの表示位置
	// 	'has_archive' => true, // アーカイブページの作成
    //     'rewrite' => true,
	// 	'query_var' => false,
	// 	'hierarchical' => false,
    //     'taxonomies' => array('mitsuboshinews-category'),
    //     'menu_icon' => 'dashicons-clipboard',
	// );
    // register_post_type( 'post', $args );
    
    $labelsOph = array(
		'name'=> 'オープンハウス',
		'all_items' => 'オープンハウスの一覧',
	);
	$argsOph = array(
		'labels' => $labelsOph,
		'supports' => array('title','editor','excerpt','thumbnail'),
		'public' => true, // 公開するかどうか
		'show_ui' => true, // メニューに表示するかどうか
		'menu_position' => 6, // メニューの表示位置
		'has_archive' => true, // アーカイブページの作成
        'rewrite' => true,
		'query_var' => false,
		'hierarchical' => false,
        'taxonomies' => array('openhouse-category'),
        'menu_icon' => 'dashicons-admin-home',
	);
    register_post_type( 'openhouse', $argsOph );

    $labelsStaff = array(
		'name'=> 'スタッフ一員',
		'all_items' => 'スタッフ一員の一覧',
	);
	$argsStaff = array(
		'labels' => $labelsStaff,
		'supports' => array('title','editor','excerpt','thumbnail'),
		'public' => true, // 公開するかどうか
		'show_ui' => true, // メニューに表示するかどうか
		'menu_position' => 6, // メニューの表示位置
		'has_archive' => true, // アーカイブページの作成
        'rewrite' => true,
		'query_var' => false,
		'hierarchical' => false,
        'taxonomies' => array('staff_member-category'),
        'menu_icon' => 'dashicons-id-alt',
	);
    register_post_type( 'staff_member', $argsStaff );
    
}
add_action( 'init', 'create_post_type_redetail', 0 );



// function mitsuboshi_pagination()
// {
//     $pages = paginate_links(['type' => 'array']);
//     if ($pages === null) {
//         return;
//     }
//     echo '<nav aria-label="Pagination" class="my-4">';
//     echo '<ul class="pagination">';
//     foreach ($pages as $page) {
//         $active = strpos($page, 'current') !== false;
//         $class = 'page-item';
//         if ($active) {
//             $class .= ' active';
//         }
//         echo '<li class="' . $class . '">';
//         echo str_replace('page-numbers', 'page-link', $page);
//         echo '</li>';
//     }
//     echo '</ul>';
//     echo '</nav>';
// }

// get the first parent category only
// function get_the_first_parent_category_only($id)
// {
// 	$categories = get_the_category($id);
// 	$parent_categories = array();
// 	if($categories){
// 		foreach($categories as $category) {
// 			if ($category->parent == 0)
// 			{
// 				$parent_categories[] = $category;
// 			}
// 		}
// 	}
// 	return (isset($parent_categories[0])) ? $parent_categories[0] : false;
// }



// function mitsuboshi_custom_post_type() {
//     register_post_type('organizations', 
//     array(
//         'rewrite' => array('slug' => 'support'),
//         'labels' => array(
//             'name' => '支援企業・団体',
//             'singular_name' => '支援企業・団体',
//             'add_new_item' => '支援企業・団体を追加する',
//             'edit_item' => '支援企業・団体を編集する',
//             // 'all_items'           => __( 'Toutes les séries TV'),
//             'view_item'           => __( '支援企業・団体を見る'),
//             // 'add_new_item'        => __( 'Ajouter une nouvelle série TV'),
//             // 'add_new'             => __( 'Ajouter'),
//             // 'edit_item'           => __( 'Editer la séries TV'),
//             'update_item'         => __( '情報をアップデートする'),
//             'search_items'        => __( 'アイテムを検索する'),
//             'not_found'           => __( '見つけませんでした'),
//             'not_found_in_trash'  => __( 'ビンに見つけませんでした'),
//         ),
//         'menu_icon' => 'dashicons-clipboard',
//         'public' => true,
//         'has_archive' => true,
//         'supports' => array(
//             'title', 'thumbnail', 'editor', 'custom-fields'
//         ),
//     )
// );
// }
// add_action('init', 'mitsuboshi_custom_post_type');


/***************************** SEARCH SECTION ******************************/

/* SELECT OPTIONS GETTER */
// function mitsuboshi_qvs($qv) {
//     $qv[] = 'kenmei';
//     $qv[] = 'alphabetize';
//     $qv[] = 'posts_per_page';
//     return $qv;
// }
// add_filter('query_vars', 'mitsuboshi_qvs');

// /* SEARCH LAUNCHER */
// function search_filter($query) {
//     global $wp_query;



//     if($query->is_search()) {
//         $query->set('post-type', array('organizations'));
//         if(isset($wp_query->query_vars['posts_per_page'])) {
//             $query->set('posts_per_page', $wp_query->query_vars['posts_per_page']);
//         } 
//         else {
//             $query->set('posts_per_page', 1);
//         }

//         if (isset($wp_query->query_vars['alphabetize']) && ($wp_query->query_vars['kenmei'] != "指定しない")) {
//             $query->set('order', $wp_query->query_vars['alphabetize']);
//         }
//         else {
//             $query->set('order', 'desc');
//         }

//         if(isset($wp_query->query_vars['kenmei']) && ($wp_query->query_vars['kenmei'] != "指定しない")) {
//             $query->set('meta_query',
//                 array(
//                     array(
//                         // 'key' => 'acf-field_5f2b8fd6413f5',
//                         'key' => 'kenmei',
//                         'value' => $wp_query->query_vars['kenmei'],
//                         'compare' => 'LIKE',
//                     )
//                 )
//             );
//         } else {
//             $query->set('meta_query',
//             array(
//                 array(
//                     'key' => 'kenmei',
//                     'value' => '',
//                     'compare' => 'LIKE',
//                 )
//             )
//         );
//         }

//     }
// }
// add_filter( 'pre_get_posts', 'search_filter' );


// add_action('admin_head', 'my_custom_fonts');
// function my_custom_fonts() {
//   echo '<style>
//     .wp-tag-cloud li a {
//       font-size: 14px !important;
//     } 
//     #tagcloud-post_tag {
//         display: block !important;
//     }
//     #link-post_tag[aria-expanded="false"] {
//         display: block !important;
//     }

//   </style>'  ;

// }

// function my_custom_admin_head() {
//     echo '  
//         <script type="text/javascript">
//             var title = document.querySelectorAll("h2");
//             for (var i = 0; i < title.length; i++) {
//                 if (title[i].innerText == "タグ")　{
//                     title[i].innerText = "カテゴリータグ"
//                 }
//             }
           
//             var tagLink = document.getElementById("link-post_tag");

//             tagLink.setAttribute("aria-expanded", true)
//             tagLink.innerHTML = "タグ一覧"

//             if (tagLink.getAttribute("aria-expanded") == false) {
//                 tagLink.setAttribute("aria-expanded", true)
//                 document.getElementById(tagcloud-post_tag).style.display = "block";
//             }
//         </script>
//   ';
// }
// add_action( 'admin_footer', 'my_custom_admin_head' );


// add_filter( 'wpcf7_validate_email*', 'custom_email_confirmation_validation_filter', 20, 2 );
// function custom_email_confirmation_validation_filter( $result, $tag ) {
//   if ( 'your-email-confirm' == $tag->name ) {
//     $your_email = isset( $_POST['your-email'] ) ? trim( $_POST['your-email'] ) : '';
//     $your_email_confirm = isset( $_POST['your-email-confirm'] ) ? trim( $_POST['your-email-confirm'] ) : '';
  
//     if ( $your_email != $your_email_confirm ) {
//       $result->invalidate( $tag, "確認用メールアドレスが一致しません" );
//     }
//   }
  
//   return $result;
// }

// //contact form7　カナ　チェック
// function wpcf7_validate_kana($result,$tag){ 
//     $tag = new WPCF7_Shortcode($tag);
//     $name = $tag->name;
//     $value = isset($_POST[$name]) ? trim(wp_unslash(strtr((string) $_POST[$name], "\n", " "))) : "";
//     if ($name === "furigana") {
//       if(!preg_match("/^[ァ-ヾ]+$/u", $value)) {
//         $result->invalidate($tag, "全角カタカナで入力してください。");
//       }
//     }
//     return $result;
//   }
//   add_filter('wpcf7_validate_text',  'wpcf7_validate_kana', 11, 2);
//   add_filter('wpcf7_validate_text*', 'wpcf7_validate_kana', 11, 2);







