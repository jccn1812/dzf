$(document).ready(function() {

    $('#btnSubmitForm').click(function()
    {
        initHtml = $(this).html(); 
        $(this).html('<span class="sr-only">Validando el Informe&nbsp;&nbsp; </span><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');


        setTimeout(function(){
        
            $.ajax({
              url: "validaCert.php",
              type: "POST",
              data: {
                      numero: $("#InputNumber").val(),
                      ot:$("#InputOt").val(),
                      desc:$("#InputDesc").val()
              }, 
              success: (function(result){
                                         $("#contInformes").html(result);  
                                         $('#btnSubmitForm').html(initHtml);

                              
                                          
              })
            });
            
        }, 2000);
    

    });
      
});