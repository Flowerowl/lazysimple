<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/"  onsubmit="window.location='?s='+jQuery('#s').val();return false;">
	<p>
		<input type="text" value="夜阑帮您搜索" onclick="value=''" onblur="if(value=='') value='夜阑帮您搜索'" name="s" id="s" />
		<input type="submit" id="searchsubmit" value="搜索" style="display:none" />
	</p>
	
</form>