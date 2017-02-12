
$(document).ready(function()
{
	$(document).on('submit', '#form', function()
	{
		var data = $(this).serialize();
		
		
		$.ajax({
		
		type : 'POST',
		url  : 'submit.php',
		data : data,
		success :  function(data)
				   {						
						 var array = $.parseJSON(data);
                         console.log('successs',array);
        
                   $('tr:last').before('<tr>'+'<td>'+ array.id +' </td> <td>'+ array.note +' </td>'+'</tr>').fadeOut(500).delay(500).fadeIn(1000);

						
				   }
		});
		
		
		$("#note").click(function() {
            
               this.value = '';
         });
		

		return false;
	});
});