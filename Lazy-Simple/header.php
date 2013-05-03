<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php wp_title(' - ', true, 'right'); bloginfo('name'); if (!is_single () && !is_404()) echo " - ", bloginfo('description'); if ($paged > 1) echo ' - Page ', $paged; ?></title>
<link rel="shorcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-ico" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />

<?php wp_head();?>

</head>

<body>
<div id="container">

    <div id="header" class="textcenter">
		
    	<div id="title">
			<h1><a href="<?php bloginfo('url'); ?>/"><img src="<?php bloginfo('template_url'); ?>/images/logo.png"></a></h1>
        </div>
    	<div id="dsc">
			<?php  bloginfo('description'); ?>
        </div>
    	<div class="nav">
			<h3><?php wp_nav_menu( array('theme_location' => 'header_nav') ); ?></h3>
        </div>
	
    </div>