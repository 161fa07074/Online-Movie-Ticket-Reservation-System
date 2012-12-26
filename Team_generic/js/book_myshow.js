$(document).ready(function(){

	var path = '/book-myshow/ajax_validations/ajax_book_myshow.php';
	/**
	 * Code for Onload, gives the theatres based on the city.
	 */
	/*var city_id = $("#city option:selected").attr('id');
	pathArray = window.location.pathname.split( '/' );
		host = pathArray[0]; 	
			$.ajax({
				url:host+path+'?city_id='+city_id,
				success:function(data){
					$('#theatre').html(data);
				}
			});  
	*/
	
	/**
	 * Code for OnChange of cities
	 */
	$("#city").live('change', function(){	
		 var city_ch_id = $("#city option:selected").attr('value');
		 pathArray = window.location.pathname.split( '/' );
		 host = pathArray[0];
			$.ajax({
				url:host+path+'?city_ch_id='+city_ch_id,
				success:function(data){
					$('#wrapper').html(data);
					
					$("#city option:selected").removeAttr("selected");
					$("#city option[value="+city_ch_id+"]").attr("selected","selected");					
				}
			});
	});  
	
		
 	/**
	 * Code for OnChange of theatres
	 */
	$("#theatre").live('change',function(){
		 var thr_id = $("#theatre option:selected").attr('value');
		 var thr_city_id = $("#city option:selected").attr('value');
		 
		 if(thr_id==0){alert('Please select a Theatre value !');}
		 
		 pathArray = window.location.pathname.split( '/' );
		 host = pathArray[0];
			$.ajax({
				url:host+path+'?thr_id='+thr_id+'&thr_city_id='+thr_city_id,
				success:function(data){
					$('#wrapper').html(data);

					$("#city option:selected").removeAttr("selected");
					$("#city option[value="+thr_city_id+"]").attr("selected","selected");

					$("#theatre option:selected").removeAttr("selected");
					$("#theatre option[value="+thr_id+"]").attr("selected","selected");
				}
			});  
	});
	
	/**
	 * Code for OnChange of movies
	 */
	$("#movie").live('change',function(){
		 var mov_id = $("#movie option:selected").attr('value');
		 var mov_thr_id = $("#theatre option:selected").attr('value');
		 var mov_city_id = $("#city option:selected").attr('value');
		 
		 if(mov_id==0){alert('Please select a Movie value !');}
		 if(mov_thr_id==0){alert('Please select a Theatre value !');}
		 
		 pathArray = window.location.pathname.split( '/' );
		 host = pathArray[0];
			$.ajax({
				url:host+path+'?mov_id='+mov_id+'&mov_thr_id='+mov_thr_id+'&mov_city_id='+mov_city_id,
				success:function(data){
					$('#wrapper').html(data);

					$("#movie option:selected").removeAttr("selected");
					$("#movie option[value="+mov_id+"]").attr("selected","selected");

					$("#theatre option:selected").removeAttr("selected");
					$("#theatre option[value="+mov_thr_id+"]").attr("selected","selected");

					$("#city option:selected").removeAttr("selected");
					$("#city option[value="+mov_city_id+"]").attr("selected","selected");
				}
			});  
	});
	
	/**
	 * Code for OnChange of dates
	 */
	$("#date").live('change',function(){
		 var date_id = $("#date option:selected").attr('value');
		 var date_mov_id = $("#movie option:selected").attr('value');
		 var date_thr_id = $("#theatre option:selected").attr('value');
		 var date_city_id = $("#city option:selected").attr('value');
		 
		 if(date_id==0){alert('Please select a Date !');}
		 if(date_mov_id==0){alert('Please select a Movie value !');}
		 if(date_thr_id==0){alert('Please select a Theatre value !');}
		 
		 pathArray = window.location.pathname.split( '/' );
		 host = pathArray[0];
			$.ajax({
				url:host+path+'?date_id='+date_id+'&date_mov_id='+date_mov_id+'&date_thr_id='+date_thr_id+'&date_city_id='+date_city_id,
				success:function(data){
					$('#wrapper').html(data);
					
					//$("#date option:selected").removeAttr('selected');
					$("#date option[value="+date_id+"]").attr("selected","selected");
					
					$("#movie option:selected").removeAttr('selected');
					$("#movie option[value="+date_mov_id+"]").attr("selected","selected");
					
					$("#theatre option:selected").removeAttr('selected');
					$("#theatre option[value="+date_thr_id+"]").attr("selected","selected");
					
					$("#city option:selected").removeAttr('selected');
					$("#city option[value="+date_city_id+"]").attr("selected","selected");
				}
			});  
	});
	
	/**
	 * Code for OnChange of TicketType
	 */
	$("#ticket-type").live('change',function(){
		 var ticket_type_id = $("#ticket-type option:selected").attr('value');
		 var ticket_type_mov_id = $("#movie option:selected").attr('value');
		 var ticket_type_thr_id = $("#theatre option:selected").attr('value');
		 var ticket_type_city_id = $("#city option:selected").attr('value');
		 var ticket_type_date_id = $("#date option:selected").attr('id');
		 var ticket_type_show_timing_id = $("#show-timing option:selected").attr('value');
		 
		 if(ticket_type_show_timing_id==0){alert('Please select a Show Timing !');}
		 if(ticket_type_id==0){alert('Please select a Ticket Type !');}
		 if(ticket_type_mov_id==0){alert('Please select a Movie value !');}
		 if(ticket_type_thr_id==0){alert('Please select a Theatre value !');}
		 if(ticket_type_date_id==0){alert('Please select a Date !');}
		 
		 pathArray = window.location.pathname.split( '/' );
		 host = pathArray[0];
			$.ajax({
				url:host+path+'?ticket_type_id='+ticket_type_id+'&ticket_type_mov_id='+ticket_type_mov_id+'&ticket_type_thr_id='+ticket_type_thr_id+'&ticket_type_city_id='+ticket_type_city_id+'&ticket_type_date_id='+ticket_type_date_id+'&ticket_type_show_timing_id='+ticket_type_show_timing_id,
				success:function(data){
					$('#details').html(data);
					
					$("#show-timing option:selected").removeAttr("selected");
					$("#show-timing option[value="+ticket_type_show_timing_id+"]").attr("selected","selected");
					
					$("#ticket-type option:selected").removeAttr("selected");
					$("#ticket-type option[value="+ticket_type_id+"]").attr("selected","selected");
				}
			});  
	});
	
	
	/**
	 * Code for OnChange of ShowTiming
	 */
	$("#show-timing").live('change',function(){
		 var show_timing_change_id = $("#show-timing option:selected").attr('value');	 
		 pathArray = window.location.pathname.split( '/' );
		 host = pathArray[0];
			$.ajax({
				url:host+path+'?show_timing_change_id='+show_timing_change_id+'&1=1&2=2&3=3&4=4&5=5&6=6',
				success:function(data){
					$('#details').html(data);
					
					$("#show-timing option:selected").removeAttr("selected");
					$("#show-timing option[value="+show_timing_change_id+"]").attr("selected","selected");
				}
			});  
	});
	
	
	/**
	 * Code for OnChange of NoOfSeats
	 */
	$("#no-of-seats").live('change',function(){
		 var no_of_seats_id = $("#no-of-seats option:selected").attr('value');
		 
		 var no_of_seats_ticket_type_id = $("#ticket-type option:selected").attr('value');
		 var no_of_seats_mov_id = $("#movie option:selected").attr('value');
		 var no_of_seats_thr_id = $("#theatre option:selected").attr('value');
		 var no_of_seats_city_id = $("#city option:selected").attr('value');
		 var no_of_seats_date_id = $("#date option:selected").attr('id');
		 var no_of_seats_show_timing_id = $("#show-timing option:selected").attr('value');
		 	 
		 pathArray = window.location.pathname.split( '/' );
		 host = pathArray[0];
			$.ajax({
				url:host+path+'?no_of_seats_id='+no_of_seats_id+'&no_of_seats_ticket_type_id='+no_of_seats_ticket_type_id+'&no_of_seats_mov_id='+no_of_seats_mov_id+'&no_of_seats_thr_id='+no_of_seats_thr_id+'&no_of_seats_city_id='+no_of_seats_city_id+'&no_of_seats_date_id='+no_of_seats_date_id+'&no_of_seats_show_timing_id='+no_of_seats_show_timing_id+'&8=8',
				success:function(data){
					$('#total-amount-seats-book').html(data);
					
					$("#no-of-seats option:selected").removeAttr("selected");
					$("#no-of-seats option[value="+no_of_seats_id+"]").attr("selected","selected");
				}
			});  
	});
		
	
});

	
	/**
	 * Code for OnClick of available Chairs
	 */
	$(".available").live('click',function(){ 
		
		var sel_id = $(this).attr("id");
		$('#'+sel_id).removeAttr("class");
		$('#'+sel_id).attr("class","your-selection");
		
		$('.your-selection').removeAttr("src");
		$('.your-selection').attr("src","./images/G_chair.gif");

	});
	
	
	/**
	 * Code for OnClick of your selction Chairs
	 */
	$(".your-selection").live('click',function(){ 
		
		var sel_id = $(this).attr("id");
		$('#'+sel_id).removeAttr("class");
		$('#'+sel_id).attr("class","available");
		
		$('#'+sel_id).removeAttr("src");
		$('#'+sel_id).attr("src","./images/W_chair.gif");

	});
	
	
	/**
	 * Code for On mouseover Of Available Chairs
	 */
	$(".available").live('mouseover',function(){
		var sel_id = $(this).attr("id");
				$('#'+sel_id).removeAttr("src");
				$('#'+sel_id).attr("src","./images/G_chair.gif");
	});
	
	/**
	 * Code for On mouseout Of Available Chairs
	 */
	$(".available").live('mouseout',function(){
		var sel_id = $(this).attr("id");
				$('#'+sel_id).removeAttr("src");
				$('#'+sel_id).attr("src","./images/W_chair.gif");
	});
	
	/**
	 * Code for On click of book
	 */
	$("#book-div #book").live('click',function(){
		var selected_chairs_array = [];
		var i=0;
		$(".your-selection").each(function(){
			selected_chairs_array.push(this.id);
			i++;
		});
		
		var path = '/book-myshow/ajax_validations/ajax_book_myshow.php';
		var book_no_of_seats = $("#no-of-seats option:selected").attr('value');
		var book_ticket_type_id = $("#ticket-type option:selected").attr('value');
		var book_mov_id = $("#movie option:selected").attr('value');
		var book_thr_id = $("#theatre option:selected").attr('value');
		var book_city_id = $("#city option:selected").attr('value');
		var book_date_id = $("#date option:selected").attr('id');
		var book_show_timing_id = $("#show-timing option:selected").attr('value');
		var book_total_amount = $("#total-amount-rs").attr('value');
		 
		if(i > book_no_of_seats){ alert('You can\'t select more than '+book_no_of_seats+' seats.'); return false; }
		if(i < book_no_of_seats){ alert('Please Select '+book_no_of_seats+' seats.'); return false; }
		
		pathArray = window.location.pathname.split( '/' );
		host = pathArray[0];
			$.ajax({
				url:host+path+'?book_city_id='+book_city_id+'&book_thr_id='+book_thr_id+'&book_mov_id='+book_mov_id+'&book_date_id='+book_date_id+'&book_show_timing_id='+book_show_timing_id+'&book_ticket_type_id='+book_ticket_type_id+'&book_no_of_seats='+book_no_of_seats+'&book_total_amount='+book_total_amount+'&selected_chairs_array='+selected_chairs_array,
				success:function(data){
					$('#selected-ticket-summary-div').html(data);
					//$('#selected-ticket-summary').leanModal();
					$('#book-div').remove();
				}
			});  

	});
	
	
	
	/**
	 * Code for On click of TicketConfirm
	 */
	$("#ticket-confirm").live('click',function(){
		var city = $("#summary-city-value").attr('class');
		var theatre = $('#summary-theatre-value').attr('class');
		var movie = $('#summary-movie-value').attr('class');
		var booked_date = $('#summary-booked-date-value').attr('class');
		var show_timing = $('#summary-show-timing-value').attr('class');
		var ticket_type = $('#summary-ticket-type-value').attr('class');
		var fare = $('#summary-ticket-fare-value').attr('class');	
		var no_of_seats_booked = $('#summary-no-of-seats-booked-value').attr('class');
		var seat_numbers = $('#summary-seat-numbers-value').attr('class');
		var total_amount = $('#summary-total-amount-value').attr('class');

		var path = '/book-myshow/ajax_validations/ajax_book_myshow.php';
		pathArray = window.location.pathname.split( '/' );
		host = pathArray[0];
			$.ajax({
				url:host+path+'?city='+city+'&theatre='+theatre+'&movie='+movie+'&booked_date='+booked_date+'&show_timing='+show_timing+'&ticket_type='+ticket_type+'&fare='+fare+'&no_of_seats_booked='+no_of_seats_booked+'&seat_numbers='+seat_numbers+'&total_amount='+total_amount,
				success:function(data){
					$('#wrapper').html(data);
				}
			});  

	});
	
	
