<?php if(!isset($_GET['do']) && !$_GET['do']=='ajax') 
	{ get_header();  } ?>
<div id="content">
	<h2>抱歉,您查找的内容不存在.随便看点别的吧.</h2>
<?php get_sidebar(); ?>
<?php if(!isset($GET['do']) && !$_GET['do']=='ajax') 
	{ get_footer(); } ?>