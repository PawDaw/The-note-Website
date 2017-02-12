

$(function(){

        $.ajax({
        type: 'GET',
        url: 'JSON_Notes.php' ,
        success: function(data) {
        
              var array = $.parseJSON(data);
              console.log('successs',array);

              $.each(array, function(i, notes) {

                  var rows = $('<tr>'+'<td>'+ array[i].id +' </td> <td>'+ array[i].note +' </td>'+'</tr>');
                  rows.hide();
               
                  setTimeout(function(){
               
                     $('tr:last-child').after(rows);
                     rows.delay(1000).fadeIn(1000);
                     }, i * 1500);
               
                
             });
       }
       
     });  
});


 