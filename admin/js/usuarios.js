$(document).ready(function() {

f = document.forms[0];

if(f.laaccion.value=="2"){     
   f.name_sesion.disabled=true;
  }


 $("#agregar").css("cursor","pointer");  
 $("#volverPanel").css("cursor","pointer");
 $("#imprimir").css("cursor","pointer");
 $("#bntSbm").css("cursor","pointer");
 $("#volverAtras").css("cursor","pointer");

$("#bntSbm").click(function(){  
	                            if(!validacion(3) || !controlpass(f.pass1.value, f.pass_confirm.value))                                
                                   {
                                    return false;
                                   }
                                
                                
                                var cont = 0;
                                var perm ="";
                                for (var x=0; x < document.forms[0].permisos.length; x++) {                             
                                   if (document.forms[0].permisos[x].checked) {
                                       perm +=  document.forms[0].permisos[x].value+',';                                    }
                                 }
                                 f.perm.value = perm;
                                 f.accion.value ="4";
                                 f.name_sesion.disabled=false;
                                 f.submit();
                              
                                 })

  $("#agregar").click(function(){                                  
                                 f.IdUsuario.value="";
                                 f.accion.value ="3";
                                 f.submit();
 				})     




$("#volverAtras").click(function(){       
                                 f.accion.value="";                       
                                 f.action="mantenedorUsuarios.php";
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
                                f.IdUsuario.value=this.value;                                
				                f.accion.value="1";
                                f.action="mantenedorUsuarios.php";
                                f.submit();                                                                
                               })


$(".btnEdit").click(function(x){
                                f.IdUsuario.value=this.value;                            
				                f.accion.value="2";
                                f.action="mantenedorUsuarios.php";
                                f.submit();                                                                
                               })
                               
$(".btnElim").click(function(x){
                                if(confirm("\u00BFEsta seguro que desea eliminar este Usuario\u003F"))
                                  {
                                   f.IdUsuario.value=this.value;                            
				                   f.accion.value="5";
                                   f.action="mantenedorUsuarios.php";
                                   f.submit();
                                  }                                                                
                               })
                               
          
$("#salir").click(function(){
                                f.action="selector.php";
                                f.submit();
                                })
                                                             
                               
                               
function controlpass(passOriginal, passCopia)
 {  
  if(passOriginal=="" && passCopia=="")
    return true;
    
  if(passOriginal!=passCopia)
    {
    alert('Las contrase\u00F1as ingresadas no coinciden.');
    return false;
    }
  
 return true;
    

}



})
