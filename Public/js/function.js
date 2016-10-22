
$(document).ready(function(){
	$('ul.nav > li').click(function(){
		$('li.active').removeClass('active');
		$(this).addClass('active');
	})
})

