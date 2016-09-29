

$(document).ready(function(){
	$('ul.nav > li').click(function(){
		$('li.active').removeClass('active');
		$(this).addClass('active');
		var link_basis = $('li.active').attr('id');

		//传输点击的按钮上的信息
		($.ajax({
			type: "post",	//post给控制器格式"/控制器类名/方法名"
			data: link_basis,
			error: function() {
       			 alert("Connection error");
   			},
    		success: function() {
       			 //alert(link_basis);
   			}
		}))
	})
		
		//ar url = $('li.active').attr("name");
		//window.history.pushState({},0,'http://'+window.location.host+'/knowledge_base/'+ url);		
		//url = 'http://'+window.location.host+'/knowledge_base/'+ url+'#';

})
