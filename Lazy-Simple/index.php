<?php if(!isset($_GET['do']) && !$_GET['do']=='ajax') 
	{ get_header();  } 
 ?>
<div id="content" >
 	 <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
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
			
			<?php include(TEMPLATEPATH.'/searhform.php'); ?>
		
	</div>
    <?php endif; ?>
    <div class="pagenavi"class="textcenter">
		<?php pagenavi(); ?>
	</div>
    <?php get_sidebar();?>

<?php if(!isset($_GET['do']) && !$_GET['do']=='ajax') {get_footer();} ?>