/*
 * jQuery GMenu v 1
 * http://
 *
 * Copyright 2010, Linnik
 * Free to use
 * 
 * September 2010
 */
jQuery.fn.g_menu = function(options){
	var options = jQuery.extend({
		gh: 25 //Высота пунктов меню
	},options);
	return this.each(function() {
		g_menu = jQuery(this).addClass('g_menu');
		jQuery('.g_menu>li:last').addClass('g_last');	
		jQuery('.g_menu>li:first').addClass('g_first');
		jQuery('.g_menu>li>a').bind('mouseenter',function(){ 
			list_item = jQuery(this).parent(); 
			podmenu = jQuery(this).next();
			jQuery('ul',g_menu).hide();
			if ($(window).width() < 768) {
				jQuery(this).addClass('selected').next().width($(window).width());
			}
			jQuery(this).addClass('selected').next().show(0,function(){
				if(podmenu.width() < list_item.width())	{podmenu.width(list_item.width())};
				podmenu.children('li').width(podmenu.width());
			});
			list_item.height(podmenu.height()+options.gh).bind('mouseleave',function(){ 
				list_item.height('auto');
				podmenu.hide() ;
				jQuery('.selected').removeClass('selected') ;
			});
			//Подменю
			link_2 = jQuery('a',podmenu);
			link_2.bind('mouseenter',function(){ 
				jQuery(this).parent().parent().find('ul').hide();
				jQuery(this).parent().parent().find('.selected2').removeClass('selected2');
				jQuery(this).addClass('selected2').next().show(0,function(){
					if ($(window).width()<768){
						jQuery(this).width($(window).width());
					}
					jQuery(this).children('li').width(jQuery(this).width());
				});
				jQuery(this).next().css({left:jQuery(this).parent().parent().width()});
			});
		});
	});
};
