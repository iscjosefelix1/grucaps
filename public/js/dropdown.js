jQuery(document).ready(function ()
    {
            jQuery('select[name="state"]').on('change',function(){
               var stateID = jQuery(this).val();
               if(stateID)
               {
                  jQuery.ajax({
                     url : 'register/gettowns/' +stateID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="town"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="town"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="town"]').empty();
               }
            });
    });