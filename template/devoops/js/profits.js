$( document ).ready(function() {

  
  $(document).on("click","#import_seller_items",function()
  {
      var userID = $("#userID").val();
        importListings(userID,8);
      
    /*  else
      for(i=0;i<length;i++)
                  {
                      if(i>=page && i<=page+2)
                      {
                        $.ajax({
                                url: ajax_url+"profit/import",
                                type:'POST',
                                dataType: 'json',
                                data: {userID:userID,page:i},
                                success: function(response) 
                                {
                                   alert("block "+i);
                                }  

                              });    
                      }
                        
                  }*/
  });
});
function importListings(userID,page)
{
  var currentPage = page;
 
  $.ajax({
    url: ajax_url+"profit/import",
    type:'POST',
    dataType: 'json',
    data: {userID:userID,page:page},
    success: function(response) 
    {
      $('.status-importing').append('<div>Importing page #<b>'+page+'<b><span> de <b>'+currentPage<response.totalPages+'<b></span></div>');
      currentPage++;
      if(currentPage<response.totalPages)
      {
        
        importListings(userID,currentPage);
        
      }
      if(currentPage==response.totalPages)
      {
        location.reload(); 
      }
       console.log(response)
    }  

  }); 
}