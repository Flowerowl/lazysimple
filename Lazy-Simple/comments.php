<?php 
if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('夜阑提示:请不要直接加载该页面,谢谢.');
if (post_password_required()) 
	{ ?>
	<p class="nocomments">
		<?php _e('夜阑提示:此文需密码,请输入密码后访问.'); ?>
	</p> 
<?php
	return;}
?>

<?php if(have_comments()):?>
	<h3 id="comments">
		<?php comments_number('赶快变身夜猫子!','一人成功变身!','%人成功变身!');?>
	</h3>
	<ol class="commentlist">
		<?php wp_list_comments();?>
	</ol>
<?php else: ?>
<?php if('open'==$post->comment_status):?>
<?php else:?>
<p class="nocomments">夜阑提示:评论已经关闭.</p>
<?php endif;?>
<?php endif;?>

<?php if('open'==$post->comment_status):?>
<div id="respond">
	<h3><?php comment_form_title('评论');?><h3>

<div class="cancel_comment_reply">
	<?php cancel_comment_reply_link();?>
</div>

<?php if(get_option('comments_registration') && !$user_ID):?>
<p>
请<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">登录</a>再变身!
</p>
<?php else:?>

<form action="<?php echo get_option('siteurl');?>/wp-comments-post.php" method="post" id="commentform">
<?php if($user_ID):?>
<p>
	HI！<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.感谢你的支持!
	 <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="登出">登出.</a>
</p>

<?php else : ?>
<div class="visitors">
	<p>
		<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1"<?php if($req) echo "aria-required='true'";?>/>
		<label for="author"><small>您的大名</small></label>
		<?php if($req) echo"*";?>
	</p>
	<p>
		<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2"<?php if ($req) echo "aria-required='true'"; ?> />
		<label for="email"><small>邮箱</small></label>
		<?php if ($req) echo "*"; ?>
	</p>
	<p>
		<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
		<label for="url"><small>地址</small></label>
	</p>
</div>
<?php endif;?>

<?php $smiley = get_option('T_smiley'); if($smiley == "On") { include (TEMPLATEPATH . '/smiley.php'); } ?>
<p>
<textarea name="comment" id="comment"  tabindex="4" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};"> </textarea>
</p>
<p>
	<input name="submit" type="submit" id="submit" tabindex="5" value="!"/>
	<?php comment_id_fields(); ?>
</p>
</form>
<?php endif;?>
</div>
<?php endif;?>