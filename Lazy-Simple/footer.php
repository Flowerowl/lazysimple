	<div class="nav">
		<h3><?php wp_nav_menu( array('theme_location' => 'footer_nav') ); ?></h3>
	</div>
	<div id="footer" class="textcenter">
		<div id="search">
			<?php get_search_form(); ?>
		</div>
		<div id="rss">
			<a href="http://feed.feedsky.com/lazynight" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/rss.png"></a>
			<a href="http://weibo.com/u/1959230741" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/sina.png"></a>
			<a href="http://t.qq.com/flowerowl" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/tencent.png"></a>
		</div>
		<div id="footer-copyright">
		2011 Lazynight | 夜阑 版权所有
		<p>Designed By <a href="http://lazynight.me" >Lazynight</a></p>
		<p><a href="http://lazynight.me/sitemap.html" target="_blank">网站地图 </a>|<a href="http://lazynight.me/sitemap_baidu.xml" target="_blank"> XML</a></p>
		</div>
	<?php if (!is_single()) { ?>
	<div id="shangxia"><div id="shang"></div><div id="xia"></div></div>
	<?php } else { ?>
	<div id="shangxia"><div id="shang"></div><div id="comt"></div><div id="xia"></div></div>
	<?php } ?>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/lazy-simple.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/comments-ajax.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/jquery.history.js"></script>
	
	<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_url' ); ?>/jquery.lightbox-0.5.css" media="screen" />
	<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/scripts/jquery.lightbox-0.5.min.js"></script>
	<script type="text/javascript">
    $(function() {
        $(".entry a:has(img)").lightBox({
        imageBlank:"<?php bloginfo( 'template_url' ); ?>/images/lightbox-blank.gif",
        imageLoading:"<?php bloginfo( 'template_url' ); ?>/images/lightbox-ico-loading.gif",
        imageBtnClose:"<?php bloginfo( 'template_url' ); ?>/images/lightbox-btn-close.gif",
        imageBtnPrev:"<?php bloginfo( 'template_url' ); ?>/images/lightbox-btn-prev.gif",
        imageBtnNext:"<?php bloginfo( 'template_url' ); ?>/images/lightbox-btn-next.gif"    
        });
    });
</script>


    </div>
</div>
</body>
</html>