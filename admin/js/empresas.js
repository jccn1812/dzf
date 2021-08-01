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
$(".btnEstadoAnno").click(function(x){
                                   f.IdAnno.value=this.value;                            
				                   f.accion.value="6";
                                   f.action="mantenedorEmpresas.php";
                                   f.submit();
                                
                               })          
                               
                               
$(".btnActivaAnno").click(function(x){
								   f.IdAnno.value=this.value;                            
				                   f.accion.value="8";
                                   f.action="mantenedorEmpresas.php";
                                   f.submit();
                                   alert("Año contable establecido");
                               })                                   
                               
 
$("#bntYear").click(function(x){
	$("#annoNuevo").show();
	$("#anno").focus();  
	
}) 

$("#okanno").click(function(x){
	if($("#anno").val()=="")
	{
	  alert("Debe indicar el a\U00F1o contable a ingresar.");	
	  return;
	}	
	f.accion.value="7";
	f.submit();
	
	
}) 

                    
                               
                               
          
$("#salir").click(function(){
                                f.action="selector.php";
                                f.submit();
                                })
                                                             
                               
   


})
