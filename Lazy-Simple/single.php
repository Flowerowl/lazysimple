<?php if(!isset($_GET['do']) && !$_GET['do']=='ajax') 
	{ get_header();  } ?>
	
<?php while(have_posts()) : the_post(); ?>
<div id="content" >
	<div class="navigator">
		<span class="tag">
			
				标签&gt;<?php if(get_the_tags())the_tags('');
				else echo '还没有标签呢'; ?>
		</span>
		<ul class="trail">
			<li><a href="<?php bloginfo('url'); ?>/" title="Lazynight" rel="homepage">首页</a>&gt;</li>
			<li><?php the_category( '&gt;</li><li>', 'multiple'); ?>&gt;</li> 
			
		</ul>
		
	</div>
	<div class="postname" id="p-<?php the_ID(); ?>">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<span class="postdetails"><?php the_time('y-m-d') ?> | <?php comments_number('&nbsp;','+1','+%'); ?> | <?php if(function_exists('the_views')) { the_views(); } ?>  </span>
	</div>
	
	<div class="entry">
		<?php the_content(); ?>
	</div>
	
	<div class="alignleft">
		<?php previous_post_link();?>
	</div>
	<div class="alignright">
		<?php next_post_link();?>
	</div>
	
	<div class="share">
		<ul>
			<li><a href="javascript:void(0)" onclick="postToWb();" class="tmblog"><img src="http://v.t.qq.com/share/images/s/weiboicon16.png"></a>  <script type="text/javascript">
		function postToWb(){
		  var _t = encodeURI(document.title);
		  var _url = encodeURIComponent(document.location);
		  var _appkey = encodeURI("20dc6c44ee5144de86c046cd76fdb650");
		  var _pic = encodeURI('');
		  var _site = 'http://lazynight.me/';
		  var _u = 'http://v.t.qq.com/share/share.php?title='+_t+'&url='+_url+'&appkey='+_appkey+'&site='+_site+'&pic='+_pic;
		  window.open( _u,'转播到腾讯微博', 'width=700, height=680, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no' );
		}
		</script>
	 
 
        </li> 
        <li><a href="http://www.follow5.com/f5/discuz/sharelogin.jsp?url=<?php echo urlencode(get_permalink($post->ID));?>&title=<?php echo urlencode($post->post_title);?>&source=&sourceUrl=" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/favicons/follow5.gif" alt="follow5" title="Follow5微博" /></a></li>
        <li><a href="http://v.t.sina.com.cn/share/share.php?url=<?php echo urlencode(get_permalink($post->ID));?>&title=<?php echo urlencode($post->post_title);?>&source=&sourceUrl=" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images//favicons/sina.jpg" alt="sina" title="新浪微博" /></a></li>
        <li><a href="http://share.renren.com/share/buttonshare.do?link=<?php echo urlencode(get_permalink($post->ID));?>&title=<?php echo urlencode($post->post_title);?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/favicons/renren.jpg" alt="人人网" title="人人网" /></a></li>
        <li><a href="http://www.douban.com/recommend/?url=<?php echo urlencode(get_permalink($post->ID));?>&title=<?php echo urlencode($post->post_title);?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/favicons/douban.jpg" alt="豆瓣" title="豆瓣" /></a></li>
        <li><a href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=<?php echo urlencode(get_permalink($post->ID));?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/favicons/qzone.jpg" alt="QQ空间" title="QQ空间" /></a></li>
        <li><a target="_blank" href="http://shuqian.qq.com/post?from=1&jumpback=2&noui=1&title=<?php echo urlencode($post->post_title);?>&description=&uri=<?php echo urlencode(get_permalink($post->ID));?>"><img alt="QQ书签" title="QQ书签" src="<?php bloginfo('template_url'); ?>/images/favicons/qqshuqian.jpg"/></a></li>
        <li><a target="_blank" href="http://www.google.com/bookmarks/mark?op=add&bkmk=<?php echo urlencode(get_permalink($post->ID));?>&labels=louishan"><img alt="Google" title="Google Bookmarks" src="<?php bloginfo('template_url'); ?>/images//favicons/google.jpg"/></a></li>
        <li><a href="http://cang.baidu.com/do/add?it=<?php echo urlencode($post->post_title);?>&iu=<?php echo urlencode(get_permalink($post->ID));?>&dc=" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/favicons/baidu.jpg" alt="百度搜藏" title="百度搜藏" /></a></li>
        <li><a href="http://myweb.cn.yahoo.com/popadd.html?url=<?php echo urlencode(get_permalink($post->ID));?>&title=<?php echo urlencode($post->post_title);?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/favicons/yahoo.jpg" alt="雅虎收藏" title="雅虎收藏" /></a></li>
      
		</ul>
	</div>
	<div class="author">
			<h3>作者:<?php the_author_posts_link();?></h3>
			<div class="author-head">
				<?php echo get_avatar($authordata->ID,'100');?>
			</div>
			<div class="author-des">
				<?php the_author_description(); ?>
			</div>
			<div class="author-link">
				<a href="<?php the_author_url();?>" target="_blank"> ＋关注此人 </a>
			</div>	
	</div>
	<div class="querypost">
		
			<div class="querypost-left">
			<h3>相关</h3>
				<ul>
				<?php
				$post_num = 5; 
				
				$posttags = get_the_tags(); $i = 0;
				if ( $posttags ) { $tags = ''; foreach ( $posttags as $tag ) $tags .= $tag->name . ',';
				$args = array(
					'post_status' => 'publish',
					'tag_slug__in' => explode(',', $tags), 
					'post__not_in' => explode(',', $exclude_id), 
					'caller_get_posts' => 1,  
					'orderby' => 'comment_date', 
					'posts_per_page' => $post_num
				);
				query_posts($args); 
				 while( have_posts() ) { the_post(); ?>
					<li>〇 <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php
					$exclude_id .= ',' . $post->ID; $i ++;
				 } wp_reset_query();
				}
				if ( $i < $post_num ) { 
				$cats = ''; foreach ( get_the_category() as $cat ) $cats .= $cat->cat_ID . ',';
				$args = array(
					'category__in' => explode(',', $cats), 
					'post__not_in' => explode(',', $exclude_id),
					'caller_get_posts' => 1,
					'orderby' => 'comment_date',
					'posts_per_page' => $post_num - $i
				);
				query_posts($args);
				 while( have_posts() ) { the_post(); ?>
					<li>〇 <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php
					$i ++;
				 } wp_reset_query();
				}
				if ( $i  == 0 )  echo '<li>&#9829; 暂无相关文章</li>';
				?>
				</ul>
			</div>
		<div class="querypost-right">
			<h3>热门</h3>
				<ul>
				<?php
				$post_num = 5; 
				$exclude_id = $post->ID;
				$myposts = $wpdb->get_results("
				  SELECT ID, post_title FROM $wpdb->posts
				  WHERE ID != $exclude_id
				  AND post_status = 'publish'
				  AND post_type = 'post'
				  ORDER BY comment_count
				  DESC LIMIT $post_num
				"); 
				  foreach($myposts as $mypost) { ?>
					<li>〇 <a href="<?php echo get_permalink($mypost->ID); ?>"><?php echo $mypost->post_title; ?></a></li>
				<?php
				  $exclude_id .= ',' . $post->ID; 
				  }
				?>
				</ul>
		</div>
	</div>
	
	<div id="comments">
			<?php comments_template(); ?>
	</div>

	<?php endwhile; ?>
<?php get_sidebar(); ?>

<?php if(!isset($GET['do']) && !$_GET['do']=='ajax') 
{ get_footer();}?>