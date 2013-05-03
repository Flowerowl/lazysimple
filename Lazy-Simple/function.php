<?php

$size = 300;   

add_action('the_content', 'control_content_size');
function control_content_size($content) {
    global $size, $more_link_text;
    if (is_singular()) return $content;
    $content = strip_tags($content);
    $content = cut_str($content, $size);
    $content = '<p>' . $content . '</p>' ;
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


?>