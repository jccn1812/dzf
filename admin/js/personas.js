$(document).ready(function() {

f = document.forms[0];



 $("#agregar").css("cursor","pointer");  
 $("#volverPanel").css("cursor","pointer");
 $("#imprimir").css("cursor","pointer");
 $("#bntSbm").css("cursor","pointer");
 $("#volverAtras,#saveClienteProv,#cancelClienteProv").css("cursor","pointer");


 $("#saveClienteProv").click(function(){  
     if(!validacion(3))                                
        {
         return false;
        }
     
     $.post("creaPersona.php",{cmbTipoPersona:$("#cmbTipoPersona").val(),
    	                       rut:$("#rut").val(),
    	                       nombres:$("#nombres").val(),
    	                       apellido_pat:$("#apellido_pat").val(),
    	                       apellido_mat:$("#apellido_mat").val(),
    	                       fono1:$("#fono1").val(),
    	                       fono2:$("#fono2").val(),
    	                       direccion:$("#direccion").val(),
    	                       comuna:$("#comuna").val()
    	                       },function(data){ 
    	                    	   window.opener.f.rutClienteProv.value=$("#rut").val();
    	                    	   alert("El Cliente/Proveedor fue creado!");
    	                    	   window.opener.f.rutClienteProv.focus();
    	                    	   window.close();
	  	 
	  	
	  	})
    
     
      })
      
 $("#cancelClienteProv").click(function(){  
     window.close();
      })
            
      
 
 
 
 $("#bntSbm").click(function(){  
	                            if(!validacion(3))                                
                                   {
                                    return false;
                                   }
                                
                                
                               
                                // f.perm.value = perm;
                                 f.accion.value ="4";
                                 f.submit();
                              
                                 })

  $("#agregar").click(function(){                                  
                                 f.IdPersona.value="";
                                 f.accion.value ="3";
                                 f.submit();
 				})     




$("#volverAtras").click(function(){       
                                 f.accion.value="";                       
                                 f.action="mantenedorPersonas.php";
                                 f.submit();
                                 })

$("#volverFormulario").click(function(){                                 
                                 f.accion.value ="3";
                                 f.submit();                                                               
                                 })




$("#volverPanel").click(function(){                              
                                 f.action="selector.php";
                                 f.submit();
                                 })


$("#imprimir").click(function(){                              
                                 window.print();
                                 })

$(".btnVer").click(function(x){
                                f.elRut.value=this.value;                                
				                f.accion.value="1";
                                f.action="mantenedorPersonas.php";
                                f.submit();                                                                
                               })


$(".btnEdit").click(function(x){
                                f.elRut.value=this.value;                            
				                f.accion.value="2";
                                f.action="mantenedorPersonas.php";
                                f.submit();                                                                
                               })
                               
$(".btnElim").click(function(x){
                                if(confirm("\u00BFEsta seguro que desea eliminar este Cliente/Proveedor\u003F"))
                                  {
                                   f.elRut.value=this.value;                            
				                   f.accion.value="5";
                                   f.action="mantenedorPersonas.php";
                                   f.submit();
                                  }                                                                
                               })
                               
          
$("#salir").click(function(){
                                f.action="selector.php";
                                f.submit();
                                })
                                                             
                               
   


})
