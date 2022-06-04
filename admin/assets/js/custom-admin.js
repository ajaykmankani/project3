// $(document).ready(function(){
//  $('li.main-li a').click(function(){
//  	$('#drop-ul').stop().toggle();
// });
//  $('li.under-li').click(function(){
//   $(this).show();
//   $(this).parents('#drop-ul').hide();
//  });
// });
$(function(){
	$('.list-group li').click(function(){
		$('.list-group li ul').hide();
		$(this).children('.list-group li ul').toggle();
	});
	 	$('li.under-li').click(function(){
     	$(this).show();
    	$(this).parents('#drop-ul').hide();
 	});
});