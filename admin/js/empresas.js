$(document).ready(function() {

f = document.forms[0];



 $("#agregar").css("cursor","pointer");  
 $("#volverPanel").css("cursor","pointer");
 $("#imprimir").css("cursor","pointer");
 $("#bntSbm").css("cursor","pointer");
 $(".Boton").css("cursor","pointer");
 $("#volverAtras").css("cursor","pointer");
 
 $("#annoNuevo").hide();
 
 if(f.IdEmpresa.value=="")
	 $("#bntYear,#trAnno").hide();
 
 

$("#bntSbm").click(function(){  
	                            if(!validacion(3))                                
                                   {
                                    return false;
                                   }
                                
                                
                               
                                // f.perm.value = perm;
                                 f.accion.value ="4";
                                // f.name_sesion.disabled=false;
                                 f.submit();
                              
                                 })

  $("#agregar").click(function(){                                  
                                 f.IdEmpresa.value="";
                                 f.accion.value ="3";
                                 f.submit();
 				})     




$("#volverAtras").click(function(){       
                                 f.accion.value="";                       
                                 f.action="mantenedorEmpresas.php";
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
                                f.action = "";
                                f.IdEmpresa.value=this.value;                                
				                        f.accion.value="";
                                f.action="mantenedorInformes.php";
                                f.submit();                                                                
                               })


$(".btnEdit").click(function(x){
                                f.IdEmpresa.value=this.value;                            
				                f.accion.value="2";
                                f.action="mantenedorEmpresas.php";
                                f.submit();                                                                
                               })
                               
$(".btnElim").click(function(x){
                                if(confirm("\u00BFEsta seguro que desea eliminar esta Empresa\u003F"))
                                  {
                                   f.IdEmpresa.value=this.value;                            
				                   f.accion.value="5";
                                   f.action="mantenedorEmpresas.php";
                                   f.submit();
                                  }                                                                
                               })
                               

$("#salir").click(function(){
                                f.action="selector.php";
                                f.submit();
                                })
                    
                               
                               
          
$("#btnResend").click(function(){
                                if(confirm("Se enviara una nueva password a la cuenta de correo registrada por el usuario\n\n \u00BFDesea continuar\u003F"))
                                {
                                  f.accion.value = "6"; 
                                  f.action="mantenedorEmpresas.php";
                                  f.submit();
                                }
                                return false;
                                })
                                                             
                               
   


})
