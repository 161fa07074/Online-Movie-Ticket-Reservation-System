$(document).ready(function(){
	var d_id = $(".field option:selected").attr('id');
	pathArray = window.location.pathname.split( '/' );
		host = pathArray[0]; 	
			$.ajax({
				url:host+'/bhagatproj/ajax_validations/ajax_selectmovie_result.php?d_id='+d_id,
				success:function(data){
					$('#select-theatre').html(data);
					$('#select-theatre').css('display', 'block');
				}
			});
  

	$(".field").change(function(){
		 var d_id = $(".field option:selected").attr('id');
		 pathArray = window.location.pathname.split( '/' );
		 host = pathArray[0];
			$.ajax({
				url:host+'/bhagatproj/ajax_validations/ajax_selectmovie_result.php?d_id='+d_id,
				success:function(data){
					$('#select-theatre').html(data);	
					$('#select-theatre').css('display', 'block');
				}
			});  
	});
	
});
