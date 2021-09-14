$(document).ready(function() {

f = document.forms[0];



 $("#agregar").css("cursor","pointer");  
 $("#volverPanel").css("cursor","pointer");
 $("#imprimir").css("cursor","pointer");
 $("#bntSbm").css("cursor","pointer");
 $(".Boton").css("cursor","pointer");
 $("#volverAtras,#btnExcel").css("cursor","pointer");
 
 


 
   
$("#btnCal1").click(function(){
    displayCalendar(document.forms[0].fechaEmision,'dd/mm/yyyy',this)
  
}) 
  
$("#btnCal2").click(function(){
  displayCalendar(document.forms[0].fechaVencimiento,'dd/mm/yyyy',this)

}) 

$("#bntSbm").click(function(){  
	                            if(!validacion(3))                                
                                   {
                                    return false;
                                   }
                                
                                  var cont = 0;
                                  var perm ="";
                                  for (var x=0; x < document.forms[0].permisos.length; x++) {                             
                                   if (document.forms[0].permisos[x].checked) {
                                       perm +=  document.forms[0].permisos[x].value+',';
                                    }
                                  }
                                 f.perm.value = perm;
                                 f.accion.value ="4";
                                 f.submit();
                              
                                 })

  $("#agregar").click(function(){                                  
                                 f.accion.value ="3";
                                 f.submit();
 				})     

    $("#btnSearch").click(function(){
      f.accion.value = "";
      f.laaccion.value= "1";
      f.submit();

    });


  $("#volverInformes").click(function(){       
          f.accion.value="";  
          f.laaccion.value= "";                     
          f.action="mantenedorInformes.php";
          f.submit();
          })



$("#volverAtras").click(function(){       
                                 f.accion.value="";                       
                                 f.action="mantenedorEmpresas.php";
                                 f.submit();
                                 })

$("#volverFormulario").click(function(){                                 
                                 f.accion.value ="";
                                 f.submit();                                                               
                                 })




$("#volverPanel").click(function(){                              
                                 f.action="mantenedorInformes.php";
                                 f.laaccion.value= "";
                                 f.submit();
                                 })


$("#imprimir").click(function(){                              
                                 window.print();
                                 })

$(".btnVer").click(function(x){
                                f.action = "";
                                f.IdEmpresa.value=this.value;                                
				                        f.accion.value="";
                                f.laaccion.value= "";
                                f.action="mantenedorInformes.php";
                                f.submit();                                                                
                               })


$(".btnEdit").click(function(x){
                                f.IdInforme.value=this.value;                            
				                        f.accion.value="2";
                                f.laaccion.value= "";
                                f.action="mantenedorInformes.php";
                                f.submit();                                                                
                               })
                               
$(".btnElim").click(function(x){
                                if(confirm("\u00BFEsta seguro que desea eliminar este Informe"))
                                  {
                                   f.IdInforme.value=this.value;                            
				                           f.accion.value="5";
                                   f.action="mantenedorInformes.php";
                                   f.submit();
                                  }                                                                
                               })
                               
$("#ImgExcel").click(function(x){
                               f.action="../../biblioexcel.php";
                               f.target="blank";
                               f.submit(); 
                               f.laaccion.value= "1"; 
                               f.action="mantenedorInformes.php";
                               
                                return;
                              })
                                                         
                               
 

                    
                               
                               
          
$("#salir").click(function(){
                                f.action="selector.php";
                                f.submit();
                                })
                                                             
                               
   


})
