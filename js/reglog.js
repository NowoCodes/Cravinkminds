$(document).ready(function(){
var h = $(document).height();
var w = $(document).width();
var hh= h-($('.for').outerHeight());
var ww= w-($('.for').outerWidth());
$('.for').css({'visibility':'visible','marginTop':(hh/2)+'px','marginLeft':(ww/2)+'px'}).show(100);	


$('.pim').click(function(){
	var vis= $(this).attr('src');
	if (vis=='icons/visibility.png') {
		$(this).attr('src','icons/hidden.png');
		$(this).siblings('.pass').attr('type','text');
	}
	else{
		$(this).attr('src','icons/visibility.png');
		$(this).siblings('.pass').attr('type','password');
	}
	
})
$('.fi').keyup(function(){
	if($(this).val().length>7){
		$('.re').removeAttr('disabled'); $(this).css('borderBottom','1px solid lime');
	}else{$('.re').attr('disabled',''); $(this).css('borderBottom','1px solid red')}
})

$('.re').keyup(function(){
	var pass= $('.pass').val();
	var repass= $(this).val();
	if(pass==repass){
		$('.reg').removeAttr('disabled'); $(this).css('borderBottom','1px solid lime');
	}else{$('.reg').attr('disabled',''); $(this).css('borderBottom','1px solid red')}
})
})

$(window).resize(function(){
var h = $(document).height();
var w = $(document).width();
var hh= h-($('.for').outerHeight());
var ww= w-($('.for').outerWidth());
$('.for').css({'marginTop':(hh/2)+'px','marginLeft':(ww/2)+'px'});	
})