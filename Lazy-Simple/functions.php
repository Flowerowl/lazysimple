<?php
//自定义背景
add_custom_background();
//顶部/页脚导航栏
if (function_exists('add_theme_support')) {
add_theme_support('nav-menus');
register_nav_menus( array( 'header_nav' => __( '顶部导航', 'Lazy-Simple' ) ) );
register_nav_menus( array( 'footer_nav' => __( '页脚导航', 'Lazy-Simple' ) ) );
}
//小工具
	register_sidebar(array(
		'before_widget' => '<div class="widget">', 
		'after_widget' => '</div>', 
		'before_title' => '<h3>', 
		'after_title' => '</h3>' 
	));
?>
<?php
$size = 300;   
$more_link_text = '......';    
add_action('the_content', 'control_content_size');
function control_content_size($content) {
    global $size, $more_link_text;
    if (is_singular()) return $content;
    $content = strip_tags($content);
    $content = cut_str($content, $size);
    $content = '<p>' . $content . '</p><p><a href="' . get_permalink() . "\" class=\"more-link\">$more_link_text</a></p>";
    return $content;
}
function cut_str($str, $len) {
    if (!isset($str[$len])) {
    } else {
        if (seems_utf8($str[$len-1]))
            $str = substr($str, 0, $len); 
        else { 
            if(seems_utf8($str[$len-3].$str[$len-2].$str[$len-1]))
                $str = substr($str, 0, $len-3) . $str[$len-3] . $str[$len-2] . $str[$len-1];
            elseif(seems_utf8($str[$len-2].$str[$len-1].$str[$len]))
                $str = substr($str, 0, $len-2) . $str[$len-2].$str[$len-1].$str[$len];
            elseif(seems_utf8($str[$len-1].$str[$len].$str[$len+1]))
                $str = substr($str, 0, $len-1) . $str[$len-1].$str[$len].$str[$len+1];
            else 
                $str = substr($str, 0, $len);
        }
    }
    return $str;
}


function pagenavi( $p = 2 ) {
if ( is_singular() ) return;
global $wp_query, $paged;
$max_page = $wp_query->max_num_pages;
if ( $max_page == 1 ) return;
if ( empty( $paged ) ) $paged = 1;
echo '<span class="page-numbers">' . $paged . ' / ' . $max_page . ' </span> ';
if ( $paged > 1 ) p_link( $paged - 1, '<<<', '<<<' );
if ( $paged > $p + 1 ) p_link( 1, 'Start' );
if ( $paged > $p + 2 ) echo '<span class="page-numbers">...</span>';
for( $i = $paged - $p; $i <= $paged + $p; $i++ ) {
if ( $i > 0 && $i <= $max_page ) $i == $paged ? print "<span class='page-numbers current'>{$i}</span> " : p_link( $i );
}
if ( $paged < $max_page - $p - 1 ) echo '<span class="page-numbers">...</span>';
if ( $paged < $max_page - $p ) p_link( $max_page, 'End' );
if ( $paged < $max_page ) p_link( $paged + 1,'>>>', '>>>' );
}
function p_link( $i, $title = '', $linktype = '' ) {
if ( $title == '' ) $title = " {$i} ";
if ( $linktype == '' ) { $linktext = $i; } else { $linktext = $linktype; }
echo "<a class='page-numbers' href='", esc_html( get_pagenum_link( $i ) ), "' title='{$title}'>{$linktext}</a> ";
}


function head_meta_desc() {
  global $s, $post;
  $description = '';
  $blog_name = get_bloginfo('name');
  if ( is_singular() ) {
    if( !empty( $post->post_excerpt ) ) {
      $text = $post->post_excerpt;
    } else {
      $text = $post->post_content;
    }
    $description = trim( str_replace( array( "\r\n", "\r", "\n", "　", " "), " ", str_replace( "\"", "'", strip_tags( $text ) ) ) );
    if ( !( $description ) ) $description = $blog_name . " - " . trim( wp_title('', false) );
  } elseif ( is_home () )    { $description = $blog_name . " - "  . "建立于2011年2月,是一个记录个人历程的地方.站长:夜阑.."; // 首頁要自己加
  } elseif ( is_tag() )      { $description = $blog_name . "关于 '" . single_tag_title('', false) . "' 的文章";
  } elseif ( is_category() ) { $description = $blog_name . "关于 '" . single_cat_title('', false) . "' 的文章";
  } elseif ( is_archive() )  { $description = $blog_name . "在: '" . trim( wp_title('', false) ) . "' 的文章";
  } elseif ( is_search() )   { $description = $blog_name . ": '" . esc_html( $s, 1 ) . "' 的搜索結果";
  } else { $description = $blog_name . "关于 '" . trim( wp_title('', false) ) . "' 的文章";
  }
  $description = mb_substr( $description, 0, 97, 'utf-8' ) . '..';
  echo "<meta name=\"description\" content=\"$description\" />\n";
}
add_action('wp_head', 'head_meta_desc');


function comment_mail_notify($comment_id) {
  $comment = get_comment($comment_id);
  $parent_id = $comment->comment_parent ? $comment->comment_parent : '';
  $spam_confirmed = $comment->comment_approved;
  if (($parent_id != '') && ($spam_confirmed != 'spam')) {
    $wp_email = 'no-reply@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME'])); //e-mail 发出点, no-reply 可改为可用的 e-mail.
    $to = trim(get_comment($parent_id)->comment_author_email);
    $subject = '您在 [' . get_option("blogname") . '] 的留言有了回复';
    $message = '
    <div style="background-color:#eef2fa; border:1px solid #d8e3e8; color:#111; padding:0 15px; -moz-border-radius:5px; -webkit-border-radius:5px; -khtml-border-radius:5px;">
      <p>' . trim(get_comment($parent_id)->comment_author) . ', 您好!</p>
      <p>您曾在《' . get_the_title($comment->comment_post_ID) . '》的留言:<br />'
       . trim(get_comment($parent_id)->comment_content) . '</p>
      <p>' . trim($comment->comment_author) . ' 给您的回复:<br />'
       . trim($comment->comment_content) . '<br /></p>
      <p>您可以点击 <a href="' . htmlspecialchars(get_comment_link($parent_id)) . '">查看回复完整內容</a></p>
      <p>欢迎再度光临 <a href="' . get_option('home') . '">' . get_option('blogname') . '</a></p>
      <p>(此邮件由系统自动发送，请勿回复.)</p>
    </div>';
    $from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
    $headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
    wp_mail( $to, $subject, $message, $headers );
    //echo 'mail to ', $to, '<br/> ' , $subject, $message; // for testing
  }
}
add_action('comment_post', 'comment_mail_notify');
// -- END ----------------------------------------
?>
