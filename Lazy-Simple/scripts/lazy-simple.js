
jQuery(document).ready(function()
{
	$(".postcontent:not(:first)").hide();
	$(".postdetails").hide();
	$(".widget ul").hide();
	$(".widget h3").toggle(function()
	{
		$(this).next(".widget ul").show('slow');	
	},function()
	{
		$(this).next(".widget ul").hide('slow');
	}
	);
	
	$("#switch").toggle(function()
	{
		$(".widget ul").show('slow');	
	},function()
	{
		$(".widget ul").hide('slow');	
	});
	
	$(".postname").hover(
		function()
		{
			$(this).addClass("hover");
			$(this).find('.postdetails').animate({opacity:'show'},200);
		},
		function()
		{
				$(this).removeClass("hover");
				$(this).find('.postdetails').animate({opacity:'hide'},200);
		});
	$(".postname").click(function()
		{
			if($(this).next().is(':visible'))
			{
			window.location=$(this).children().children().attr('href');
				$(this).children().children().text('Loading...');
			}
			else
			{
			$(".postcontent:visible").slideUp("slow");
			$(this).next().slideDown("slow");
			}
			return false
		});
		
});

jQuery(document).ready(function($)
{
	var s= $('#shangxia').offset().top;$(window).scroll(function (){$("#shangxia").animate({top : $(window).scrollTop() + s + "px" },{queue:false,duration:500});});
	$body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
	$('#shang').click(function(){$body.animate({scrollTop: '0px'}, 400);});
	$('#xia').click(function(){$body.animate({scrollTop:$('#footer').offset().top}, 800);});
	$('#comt').click(function(){$body.animate({scrollTop:$('#comments h3').offset().top}, 800);});
});
  
  




