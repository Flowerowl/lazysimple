<?php if(!isset($_GET['do']) && !$_GET['do']=='ajax') 
	{ get_header();  } ?>

<div id="content" >
<?php if(have_posts()) : ?>
	<div class="navigator">
		<ul class="trail">
			<li>
				<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
					<?php /* If this is a category */ if (is_category()) { ?>
				<h4 class="query-info">分类：<?php single_cat_title(); ?></h4>
				<?php /* If this is a tag */ } elseif( is_tag() ) { ?>
				<h4 class="query-info">标签：<?php single_tag_title(); ?> </h4>
				<?php /* If this is a daily */ } elseif (is_day()) { ?>
				<h4 class="query-info">归档： <?php the_time('Y年 m月 j日'); ?> </h4>
				<?php /* If this is a monthly */ } elseif (is_month()) { ?>
				<h4 class="query-info">归档： <?php the_time('Y年 m月'); ?> </h4>
				<?php /* If this is a yearly */ } elseif (is_year()) { ?>
				<h4 class="query-info">归档： <?php the_time('Y年'); ?> </h4>
				<?php /* If this is a paged */ } elseif (isset($_GET['paged']) && !empty($_GET['paged']) && !is_search()) { ?>
				<h4 class="query-info">您正在浏览的是以前的文章</h4>
				<?php } ?>
			</li>
		</ul>
		
	</div>
	<?php while(have_posts()) : the_post(); ?>
    <div class="postname" id="p-<?php the_ID(); ?>">
    	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2> 
    	<span class="postdetails"><?php the_time('y-m-d') ?> | <?php comments_number('&nbsp;','+1','+%'); ?> | <?php if(function_exists('the_views')) { the_views(); } ?></span>
    </div>
	<div class="postcontent">
		<?php the_content(); ?>
    </div>
	<?php endwhile; else : ?>
    <div class="post">
		
			<h2>Page Not Found</h2>
			
			<p>Looks like the page you're looking for isn't here anymore. Try browsing the <a href="">categories</a>, <a href="">archives</a>, or using the search box below.</p>
			
			
		
	</div>
    <?php endif; ?>
    <div class="pagenavi"class="textcenter">
		<?php pagenavi(); ?>
	</div>
	<?php get_sidebar();?>

<?php if(!isset($GET['do']) && !$_GET['do']=='ajax') 
{ get_footer();}?>