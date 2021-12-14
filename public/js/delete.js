
   

   $(function(e)
   {
       $("#chkCheckAll").click(function(){
           $(".checkBoxClass").prop('checked', $(this).prop('checked'));
   
       });
   
   $("#deleteAllSelectedRecord").click(function(e){
   
    e.preventDefault();
    var allids = [];  
      $("input:checkbox[name=ids]:checked").each(function(){
   
       allids.push($(this).val());
      });
      $.ajax({
   
       url:"{{route('item.delete')}}",
       type:"DELETE",
       data:{
           _token:$("input[name=_token]").val(),
        ids:allids
       },
       success:function(response){
           $.each(allids, function(key,val){
            $("#sids"+val).remove();  
            location.reload()
            
           })
       }
      });
   
   })
   
   
       });
   
        
   
   
   
   
       
   
