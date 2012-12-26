$(document).ready(function(){

var path = '/book-myshow/ajax_validations/';
var submit_array = new Array();

submit_array['username']=false;
submit_array['firstname']=false;
submit_array['lastname']=false;
submit_array['password']=false;
submit_array['confirm-password']=false;
submit_array['email']=false;
submit_array['mobileno']=false;

	$(".field-error").css("display","none");
	
	$("input").focus(function(){
		$("input").css("background-color","#FFFFCC");
		var  focus_var = $(this).attr('id');
    
	submit_array[focus_var]=true;
	
	});
  
	$("#username").blur(function(){
		$("#username").css("background-color","#D6D6FF");
		var username = $("#username").val();
		pathArray = window.location.pathname.split( '/' );
			host = pathArray[0]; 	
			$.ajax({
				url:host+path+'ajax_field_username_validate.php?username='+username,
				success:function(data){
					$('#field-error-username').html(data);
					$('#field-error-username').css('display', 'block');
					submit_array['username']=false;
					if(data==""){
						submit_array['username']=true;
					}
				}
			});
	});
	
	function validate(){
	// Verify that both passwords put in match.
		if ( ( document.getElementById("password").value != document.getElementById("confirm-password").value ) ||
				document.getElementById("password").value.length == 0 ){
			//if ( ( $("#password").val() != $("#confirm-password").val() ) || ($("#password").value.length == 0) ){
			//$("#field-error-password").css("display","block");
			$("#field-error-confirm-password").css("display","block");
			submit_array['password']=false;
			// return false;
		}
		else {
			//$("#field-error-password").css("display","none");
			$("#field-error-confirm-password").css("display","none");
			submit_array['password']=true;
		}		
	}
	
	$("#password").blur(function(){
		$("#password").css("background-color","#D6D6FF");
		validate();
		/*var password = $("password").val();
		alert(password);
		var ck_password = /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;	
		if(!ck_password.test(password)) 
			$("#field-error-password").css("display","block");
		else 
			$("#field-error-password").css("display","none");*/
	});
  	
	$("#confirm-password").blur(function(){
		$("#confirm-password").css("background-color","#D6D6FF");
		validate();
		/*var password = $("password").val();
		var confirm-password = $("password").val();
		alert(confirm-password);
		var ck_confirm-password = /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;	
		if((!ck_confirm-password.test(confirm-password)) && (password != confirm-password)) 
		if($("#confirm-password").val(); != confirm-password) 
			$("#field-error-confirm-password").css("display","block");
		else 
			$("#field-error-confirm-password").css("display","none");*/
		
	});

	$("#firstname").blur(function(){
		$("#firstname").css("background-color","#D6D6FF");
		var firstname = $("#firstname").val();
		var ck_firstname = /^[A-Za-z0-9]{4,20}$/;
		if(!ck_firstname.test(firstname)){ 
			$("#field-error-firstname").css("display","block");		
			submit_array['firstname']=false;
			//$("#firstname").css("border","1px solid red");
			
			}
		else {
			$("#field-error-firstname").css("display","none");
			submit_array['firstname']=true;
			
			}
	});
  
	$("#lastname").blur(function(){
		$("#lastname").css("background-color","#D6D6FF");
		var lastname = $("#lastname").val();
		var ck_lastname = /^[A-Za-z0-9]{4,20}$/;
		if(!ck_lastname.test(lastname)){ 
			$("#field-error-lastname").css("display","block");
			submit_array['lastname']=false;
			}
		else {
			$("#field-error-lastname").css("display","none");
			submit_array['lastname']=true;
			}
	});
  
	$("#email").blur(function(){
		$("#email").css("background-color","#D6D6FF");
		var email = $("#email").val();
		pathArray = window.location.pathname.split( '/' );
			host = pathArray[0]; 	
			$.ajax({
				url:host+path+'ajax_field_email_validate.php?email='+email,
				success:function(data){
					$('#field-error-email').html(data);
					$('#field-error-email').css('display', 'block');
					submit_array['email']=false;
					if(data==""){
						submit_array['email']=true;
					}
				}
			});
		/*var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i	
		if(!ck_email.test(email)) 
			$("#field-error-email").css("display","block");
		else 
			$("#field-error-email").css("display","none");
		*/
	});
  	
	$("#address").blur(function(){
		$("#address").css("background-color","#D6D6FF");
		var address = $("#address").val();
		var ck_address = /^[A-Za-z0-9 ]{10,40}$/;
		if (!ck_address.test(address))
			$("#field-error-address").css("display","block");        
		else
			$("#field-error-address").css("display","none");
    });
	
	$("#mobileno").blur(function(){
		$("#mobileno").css("background-color","#D6D6FF");
		//var mobile = document.getElementById("mobileno").value;
		var mobile = $("#mobileno").val();
		var ck_mobileno = /^\d{10}$/;
		if (!ck_mobileno.test(mobile)){
			$("#field-error-mobileno").css("display","block");
			submit_array['mobileno']=false;
			}
		else{
			$("#field-error-mobileno").css("display","none");
			submit_array['mobileno']=true;
			}
    });

$("#sumit_reg_form").click(function(){
var x;
for(x in submit_array){
if(!submit_array[x])
return false;

}
return true;
});

	
});



