$(document).ready(function() {
   
   f = document.forms[0];

  // Botones para la administracion del sistema
   $("#usuarios").click(function(){
                                 f.action="mantenedorUsuarios.php";
                                 f.submit();
                                 })

   $("#personas").click(function(){
      f.action="mantenedorPersonas.php";
      f.submit();
      })

                                 
   $("#cuentasContables").click(function(){
                                 f.action="mantenedorCuentas.php";
                                 f.submit();
                                 })
                                 
  $("#empresas").click(function(){
                                 f.action="mantenedorEmpresas.php";
                                 f.submit();
                                 })      
                                 
   $("#vouchers").click(function(){
                                 f.action="mantenedorVouchers.php";
                                 f.submit();
                                 })    
   
   $("#14Ter").click(function(){
                                 f.action="mantenedorLibro14Ter.php";
                                 f.submit();  
                                })    
      
   $("#libroCompraVenta").click(function(){
                                 f.action="infLibroCompraVenta.php";
                                 f.submit();
                                 }) 
                                 
   $("#libroDiario").click(function(){
                                 f.action="infLibroDiario.php";
                                 f.submit();
                                 }) 
                                 
                              
   $("#libroMayor").click(function(){
                                 f.action="infLibroMayor.php";
                                 f.submit();
                                 }) 
                                 
                                 
   $("#balances").click(function(){
                                 f.action="infBalance.php";
                                 f.submit();
                                 }) 
                                 
   $("#foleador").click(function(){
                                 f.action="impFolios.php";
                                 f.submit();
                                 }) 
                                 
   $("#cargasii").click(function(){
                                 f.action="uploadLibros.php";
                                 f.submit();
                                 }) 
                                                               
                                 


  $("#FinSesion").click(function(){ 
 	
       				  f.accion.value="logout";
                                  f.action="index.php";
                                  f.submit();
                                  })                                 

   
 



 /* Botones para los mantenedores del encargado de servicio  */
 
 $("#salir").click(function(){
                                f.accion.value="logout";
                                f.action="../index.php";
                                f.submit();
 
 
 })
 
 
 
                       
                               




})

