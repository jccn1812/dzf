$(document).ready(function() {

f = document.forms[0];




 

$("#btnLogin").click(function(){  
	                            if(!validacion(3))                                
                                   {
                                    return false;
                                   }
                                
                                
                               
                                 f.tp.value = "op";
                                 f.submit();
                              
                                 })

   


})
