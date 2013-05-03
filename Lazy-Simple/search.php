<?php if(!isset($_GET['do']) && !$_GET['do']=='ajax') 
	{ get_header();  } ?>
<div id="content">
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	<div class="postname" id="p-<?php the_ID(); ?>">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<span class="postdetails"><?php the_time('y-m-d') ?> | <?php comments_number('&nbsp;','+1','+%'); ?></span>
	</div>
	<div class="postcontent">
		<?php the_content(); ?>
	</div>

	<?php endwhile; endif; ?>
<?php get_sidebar();?>
<?php if(!isset($GET['do']) && !$_GET['do']=='ajax') 
{ get_footer(); } ?>