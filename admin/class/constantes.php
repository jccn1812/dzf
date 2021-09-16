<?php
/*
 * ----------------------------------
 *     Constantes del sistema       *
 *-----------------------------------
 */

// Nombre de la aplicaci�n
define("NombreAplicacion","DZFCertifica :: Portal Web ::  ");// El titulo para las paginas en el navegador

//Mensaje footer
$msg =  '<div id="footer">Creativa Inform&aacute;tica s.a. / Etereus CMS
         <div align="center">Poductos inform&aacute;ticos - Desarrollo web - Asesor&iacute;as</div>
        <div align="center">
        <div align="center"><a href="mailto:jccn1812@gmail.com">Correo electr&oacute;nico:jccn1812@gmail.com</a></div> </div>';

define("msgFooter",$msg);


// Constantes para el manejo de la base de datos mysql

// Desarrollo
define("BDserver","127.0.0.1"); // El servidor de la base de datos
define("BDuser","root" );              // Usuario de la base de datos
define("BDpassword","mishijos");           // Password
//define("BDBase","dzf");            // La base de datos

define("BDBase","certifica");            // La base de datos
define("BDPort","3306");                  // El puerto


/*
// Produccion.
define("BDserver","localhost"); // El servidor de la base de datos
define("BDuser","dzfcerti_dzf@localhost" );              // Usuario de la base de datos
define("BDpassword","dzfcertifica$$");           // Password
define("BDBase","dzfcerti_dzf");                // La base de datos
define("BDPort","3306");               // El puerto
              
*/


// Constantes para los correos electronicos
define("EMAILADMIN","jccn1812@gmail.com");// Cuenta de correos para el envio
define("EMAILTO","jccn1812@gmail.com");// Cuenta de correos para la recepción
define("EMAILADMINPASS","mishijos2021");// Cuenta de correos para el envio
define("EMAILSUBJECT","Contacto desde formulario de contacto");// Cuenta de correos para el envio
define("EMAILHEADERFROM","Formulario de contacto DFZCertifica");// Cuenta de correos para el envio



define("SERVIDORSMTP","smtp.gmail.com");// Servidor de correos




define("mensajeFormularioContactos","Gracias por su interes en contactarse con nosotros.
                                     Estamos muy interesados en conocer su opini&oacute;n por lo
                                     que le solicitamos llenar los datos de este formulario y hacer clic
                                     en el bot&oacute;n env&iacute;ar.");// Servidor de correos

define("mensajeValidaInforme","Estimado cliente. Utilice este formulario para validar su informe");


                                     define("SENDPASSWORDMAIL","1"); // Envio de correo con la password generada para el cliente
define("SENDPASSWORDSTTL","Estimado cliente");
define("SENDPASSWORDSMSG","<p>Tenemos el agrado de informarle su contraseña para el ingreso
                           al espacio que hemos preparado para usted en el portal de 
                           DFZ Certifica.&nbsp;En el encontrar&aacute; el detalle de los Informes que
                           ha contratado con nosotros.<p>");
define("SENDPASSWORDSUBJ","Envío de clave de acceso DZF Certifica");

define("consBiblioMSG","Estimado cliente, el siguiente es el detalle de los informes
                        registrados para su empresa en nuestro sistema administrativo."); //Mensaje para el formulario de contacto

define("PERMITTED_CHARS","#%&.,$%()=0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"); //Caracteres para la generación de password



define("mensajeFormularioenviado","Su envío est&aacute; siendo procesado. Le contestaremos a la brevedad. ");// Servidor de correos

define("mensajeEmailAdmin","Señor Administrador:". "\n". " El siguiente es un mensaje enviado a través del sitio web:". "\n");// Cuerpo del mensaje al administrador

//Id de usuarios por Perfil
define("consIdUsuarioDirector","3");// Id de perfil de los usuarios Directores
define("consIdUsuarioInspector","2");// Id de perfil de los usuarios Inspectores

//Numero de filas definidas para paginadores
define("consFilasPagina",10);

//Numero de filas definidas para paginadores, para mostrar la pagina completa
define("consFilasPaginaTotal",10000);


//Numero de dias para que informe sea considerado por vencer
define("consDiasPorVencer",5); 


define("mensajeMailSuscEnviado","Hemos enviado un mail de confirmaci&oacute;n de suscripci&oacute;n  a la cuenta de correo electr&oacute;nico indicado. ");//
define("mensajeCuerpoMailSusc","Esta es una confirmaci&oacute;n de la suscripci&oacute;n al sistema autom&aacute;tico de informaci&oacute;n de be-web.cl.  ");//
define("mensajeConfirmaSusc","Gracias por la suscripci&oacute;n. A partir de ahora recibir&aacute; notificaciones de las actualizaciones que se hagan en nuestro sitio web. ");//




// Constantes para los uploads de los documentos
define("uploadFolder_csv","../upload/csv/");   // La carpeta para los upload de archivos desde SII
define("ExisteRestriccionPorTipoArchivoDoc","0");// Indica si hay restriccion para el tipo de dcto. 1: Existe 0: Sin restricci�n
define("fileTypeDocUpload","application/pdf");   // Tipo de archivo a subir cuando hay restriccion.
define("fileTypeMsgError","El tipo de archivo es incorrecto.<br> Solo debe subir archivos PDF.");// Tipo de archivo a subir.

define("fileTypeDocWord","application/msword");// Tipo de archivo Microsoft Word.
define("fileTypeDocPDF","application/pdf");    // Tipo de archivo PDF
define("fileTypeDocXLS","application/vnd.ms-excel");    // Tipo de archivo Microsoft Excel
//define("fileTypeDocXLS","text/plain");         // Archivo TXT
define("fileTypeFlv","application/octet-stream");    // Tipo de archivo FLV


define("fileFileMsgError","El archivo no tiene extensi&oacute;n de documento v&aacute;lido.");// Tipo de archivo a subir.

// Constantes para los uploads de los planillas excel. Para las estadisticas de las votaciones
define("uploadFolder_xls","../upload/xls/");   // La carpeta para los upload de las planillas
define("ExisteRestriccionPorTipoArchivoXls","1");// Indica si hay restriccion para el tipo de dcto. 1: Existe 0: Sin restricci�n
define("fileTypeXlsUpload","application/vnd.ms-excel");   // Tipo de archivo a subir cuando hay restriccion.


// Constantes para los uploads de las imagenes
define("uploadFolder_images","../upload/images/");// La carpeta para los upload de images
define("ExisteRestriccionPorTipoArchivoImg","0");// Indica si hay restriccion para el tipo de Imagen. 1: Existe 0: Sin restricci�n
define("fileTypeImgUpload","image/jpeg");        // Tipo de archivo a subir cuando hay restriccion.
define("fileTypeIMGMsgError","El tipo de archivo imagen es incorrecto.<br> Solo debe subir imagenes JPG.");// Tipo de archivo a subir.

define("fileTypeImgJPG","image/jpeg");// Tipo de imagen JPG
define("fileTypeImgBMP","image/bmp"); // Tipo de imagen BMP
define("fileTypeImgGIF","image/gif"); // Tipo de imagen GIF
define("fileTypeImgPNG","image/png"); // Tipo de imagen PNG
define("fileTypeImgOtro","image/pjpeg"); // Otro tipo de imagen

define("fileFileIMGMsgError","El archivo no tiene extensi&oacute;n de imagen v&aacute;lido.");// Tipo de archivo a subir.



define("ImgHeightThumbnail",80); // La altura para los thumbnails
define("ImgWidthThumbnail",110);  // La anchura para los thumbnails

define("ImgHeight",160); // La altura para las imagenes del detalle de las noticias
define("ImgWidth",220);  // La anchura para las imagenes del detalle de las noticias








?>
