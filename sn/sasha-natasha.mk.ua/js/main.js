$(document).ready(function(){
	
	
		
	
	//tables style
	$(".table1 tr").mouseover(function() {$(this).addClass("over");}).mouseout(function() {$(this).removeClass("over");});
	$(".table1 tr:even").addClass("alt");
	
	//photo Gallery
	$('.img_link').hover(function(){$(this).find('img').animate({opacity:'0.5'},100).animate({opacity:'1'},300)},function(){})

	// img style
	$('.content>img,.content>p>img').addClass('cont_img')

	//background anim
	$('.top_menu_bg a')
		.css({backgroundPosition: "50% -40px"})
		.mouseover(function(){$(this).stop().animate({backgroundPosition:"(50% 0)"},{duration:300})})
		.mouseout(function(){
			$(this).stop().animate({backgroundPosition:"(50% -40px)"}, {duration:200, complete:function(){
				$(this).css({backgroundPosition: "50% -40px"})
			}})
		})
	$('.top_menu_bg a.cur').css({backgroundPosition: "0 -10px"}).mouseout(function(){$(this).stop()})
	
	/*-----------------------*/
	$(window).load(function(){
		//code	
	})
});

function change_pager(){
    $('.paginator').css('margin','0');
    $('.paginator table , .paginator_pages').css('width','852');
    var text = [];
    text[0] = $(".paginator td span:eq(0)").html().length;
    text[1] = $(".paginator td span:eq(1)").html().length;
    text[2] = $(".paginator td span:eq(2)").html().length;
    text[3] = $(".paginator td span:eq(3)").html().length;

    var name = [];
    name[0]='Тамада';
    name[1]='День Рождения';
    name[2]='Новый Год';
    name[3]='Украшение шарами';

    var i=0;
    var select='';
    var left=0;
    for(i = 0; i <=3; i++){
        if(text[i] == 18) {
            select = '.paginator td span:eq(' + i +') strong';
            left = 213*i;
        } else select = '.paginator td span:eq(' + i +') a';

        $(select).html(name[i]);
    }
    $('.current_page_mark').css('width',213).css('left',left);
}