/**
   --------------------------------------------------------------
    Libreria suplementaria para las validaciones del formulario               
                       validaciones.js 2.0
   --------------------------------------------------------------
   Autor : Juan Carlos Campos N.
   -----   Enero 2009
           Ministerio Secretaria General de Gobierno (MSGG)
           
    
    Descripci?n
    -----------               
    Esta libreria realiza las validaciones de un formulario HTML  por el lado del cliente.
    Es suplementaria a la libreria validacion.js.
    Controla el ingreso de los datos seg?n su tipo (num?rico,   fecha, tipo email, etc.),
    asi como la obligatoriedad del ingreso de los datos. 
    
    
    Modo de empleo 
    --------------    
    1. Crear el div contenedor de los mensajes de error, en la posici?n que 
       se desee. El id de este DIV debe ser "errores".
       
                          <div id="errores"></div>
                          
    2. Asignar el siguiente estilo css
    
					      #errores {  	
						         	width:50%;  	
							        display:none;  	
									padding-left:5px;  	
									padding-right:5px;
									padding-top:10px;
									padding-bottom:10px;
									border:2px solid #FADDA9;  	
									background-color:#FDF4E1;  
									text-align:left;
									}
    
    3. Incluir dentro del tag head, los includes a las librerias validacion.js
       y validaciones.js, tal como lo indica el siguiente ejemplo:
       
       <script language="JavaScript" src="ruta valida/validacion.js" type="text/javascript"></script>
       <script language="JavaScript" src="ruta valida//validaciones.js" type="text/javascript"></script>
       
    4. Incluir dentro del tag head la funci?n asignaValidacion() especificando los
       elementos a validar tal como lo indica el siguiente ejemplo:
       
       <script language="JavaScript">
        function asignaValidacion()
	     {
	      defineObjetoValidacion("[nombre del objeto]","[Mensaje a desplegar]",[Tipo],[IndicaCampoObligatorio]);
	      ...
	      ...	               
         }
         </script>
      
      donde:
      -----
      nombre del objeto : es el nombre del objeto HTML (select, input) asignado en
                          la propiedad name.
                          
      Mensaje a desplegar: Es el mensaje a desplegar en la informaci?n entregada al
                           usuario en el detalle del error.
                           
      Tipo : Indica el tipo de dato a validar. Considere la siguiente tabla que detalla
             los tipos de datos soportados para la validaci?n.
             
                               ------------------------------------
                               | Nombre de la Constante  |  Valor |
                               ------------------------------------
					           | TYPE_STRING   			 |    0   | 
					           | TYPE_NUMBER      		 |    1   |
					           | TYPE_DATE               |    4   |
					           | TYPE_EMAIL              |    5   |
					           | TYPE_RUT                |    8   |
					           | TYPE_COMBO              |    9   |
					           | TYPE_RADIO              |   10   |					           
							   ------------------------------------
							   		                                      
      IndicaCampoObligatorio: Indica si el campo a validar es obligatorio, es decir,
             si debe ser ingresado antes de enviar el formulario. Considere el uso 
             de las siguientes constantes.
             
                               ------------------------------------
                               | Nombre de la Constante  |  Valor |
                               ------------------------------------
					           | OBLIGATORIO   			 |    0   | 
					           | OPCIONAL        		 |    1   |					           
							   ------------------------------------
							   
	5. Cuando existan campos de password a comparar, incluya... 						   
	
	5. Relacione la funci?n asignaValidacion() a la carga del formulario
	
            	    <body onload="asignaValidacion()"> 					
    
    6. Dispare la validaci?n con un comportamiento javascript (onclick, onsubmit, etc).
       Relacione este con una funci?n javascript, como en el ejemplo:
       
        function valida()
         {
          if(!validacion(3)) return false;            
         }


    Como utilizar la funci?n "validacion(TipoRespuesta)" 
    ----------------------------------------------------
	El par?metro "TipoRespuesta" indica la forma en que la funci?n 	devuelve al 
	resultado de las validaciones posibles. Puede tener 3 valores posibles: 1,2,3.
	
	1.Com?n : Indica que el resultado de la validaci?n aparecer? en un aviso de
	          javascript (alert).
	
	2.Avanzada : El resultado de la validaci?n aparece en el div "errores" definido. 
	
	3.Inline : Act?a de igual forma que la validaci?n avanzada destacando los objetos
	           que no cumplen la validaci?n con un color de fondo.
	           
	Esta funci?n devuelve un valor l?gico (true/false) dependiendo 	de si los objetos
	superaron el proceso de validaci?n. Esto controla el envi? del formulario.

*/                                  
var msgError = "";
var elemento = 0;
var indice   = 0;
var arrOpcionesValidar = new Array();
var arrOpcionesPass = new Array();

function defineObjetoValidacion(objeto,nombre,tipo,esobligatorio)
 { 
  arrOpcionesValidar[elemento]= new Array();
  arrOpcionesValidar[elemento][1] = objeto;
  arrOpcionesValidar[elemento][2] = nombre;
  arrOpcionesValidar[elemento][3] = tipo;
  arrOpcionesValidar[elemento][4] = esobligatorio;
  elemento++;
 }

function defineObjetoPass(objeto,nombre)
 {
  arrOpcionesPass[indice]= new Array();
  arrOpcionesPass[indice][1] = objeto;
  arrOpcionesPass[indice][2] = nombre;
  indice++;
 }



function validacion(TipoRespuesta)
{


  var titulo;  
  msgErrorEsp="";
  msgErrorReq="";
  var mensaje="";
  if(document.getElementById("errores").childNodes){
     while (document.getElementById("errores").firstChild){
        document.getElementById("errores").removeChild(document.getElementById("errores").firstChild);
    }  
  }
  
  for(var x=0;x<elemento;x++)
   {
     objeto      = arrOpcionesValidar[x][1];
     mensaje     = arrOpcionesValidar[x][2];
     tipo        = arrOpcionesValidar[x][3];
     obligatorio = arrOpcionesValidar[x][4];

     var tipoobj = "document.forms[0]."+arrOpcionesValidar[x][1]+".name";
     
     var valor=eval("document.forms[0]."+objeto+".value"); //El valor del objeto    
     // Para las comprobaciones de tipo.
     var miObj = new Object;
     miObj.value = valor;

    //Comprueba los campos obligatorios

     if(obligatorio == OBLIGATORIO)
       {       
        switch(tipo) 
        {
         case TYPE_COMBO:
          {           
           if(eval("RTrim( LTrim(document.forms[0]."+objeto+".options[document.forms[0]."+objeto+".selectedIndex].value ) )")=="")
            {              
             msgError = msgError + mensaje + " : debe seleccionar un dato de la lista.\n";
             msgErrorEsp = msgErrorEsp + mensaje + " : debe seleccionar un dato de la lista.\n ";
            }
           break;           
          }
        
         case TYPE_RADIO:
          {
           var marcados = 0;
           for(i=0;i<eval("document.forms[0]."+objeto+".length");i++)
            {
             if(eval("document.forms[0]."+objeto+"["+i+"].checked")){
               marcados++;
               i = eval("document.forms[0]."+objeto+".length");
              }                   
            }
           if(marcados==0){
              msgError = msgError + mensaje + ": Debe realizar una selecci\u00F3n.\n";
              msgErrorEsp = msgErrorEsp + mensaje + ": Debe realizar una selecci\u00F3n. ";           
             }  
           break; 
          }

         default:
           {           
            if(eval("document.forms[0]."+objeto+".value")==""){              
              if(TipoRespuesta=="3"){
                 eval("document.forms[0]."+objeto+".style.backgroundColor='#FDF4E1'");                                                 
                 eval('document.forms[0].'+objeto+'.onkeypress=function(){document.forms[0].'+objeto+'.style.backgroundColor=""}'); //Agrega la funci?n para recuperar el color
                 }     
                 msgError = msgError + mensaje + " es un dato requerido.\n";
                 msgErrorReq = msgErrorReq + mensaje+', ';                         
            }      
           }
        }        
       }

     switch(tipo)
      {
       // String. Solo la comprobaci?n de existencia del valor es estricta. 

      case 0:
        {	
         break;     
        }        
        

      case TYPE_NUMBER: //Numerico
        {        
         if(!IsValid_Number(miObj) && valor!="")
           {
               msgError = msgError + mensaje + " debe ser un n\u00FAmero.\n";   
               msgErrorEsp = msgErrorEsp + mensaje + " debe ser un n\u00FAmero. ";           
           }

         if(miObj.value.indexOf(",")!=-1 || miObj.value.indexOf(".")!=-1  )
           {
              msgError = msgError + mensaje + " no debe contener separador de miles.\n";    
              msgErrorEsp = msgErrorEsp + mensaje + " no debe contener separador de miles. ";          
           }
         break;   
        }    
        
        
      case TYPE_DATE: //Fecha
        {
         if(!IsValid_Date(miObj) && valor!="")
           {
            msgError = msgError + mensaje + " no es una fecha correcta. Utilice el formato DD/MM/AAAA \n";
            msgErrorEsp = msgErrorEsp + mensaje  + " no es una fecha correcta. Utilice el formato DD/MM/AAAA. ";
           } 
         break;        
        }

        
      case TYPE_EMAIL: //Email
        {
         if(!IsValid_EMail(miObj) && valor!="")
           {
            msgError = msgError + mensaje + " no tiene el formato de correo adecuado.\n";
            msgErrorEsp = msgErrorEsp + mensaje  +  " no tiene el formato de correo adecuado."; 
           }      
         break;                
        }

      case TYPE_HTTP: //Url
      {       	  
       if(!IsValid_HTTP(miObj) && valor!="")
         {
          msgError = msgError + mensaje + " no tiene el formato de URL adecuado.\n";
          msgErrorEsp = msgErrorEsp + mensaje  +  " no tiene el formato de URL adecuado."; 
         }      
       break;                
      }
      
    
        
        
      case TYPE_RUT: //Rut
        {
         if(!IsValid_Rut(miObj) && valor!="")
           {
            msgError = msgError + mensaje + " es incorrecto. \n";
            msgErrorEsp = msgErrorEsp + mensaje  +  " es incorrecto. "; 
           }      
         break;                
        }      
       } // Cierra case
      } //  Cierra for
      
     // Comprueba las password.
     if(indice!=0){
        objPass1      = arrOpcionesPass[0][1];
        mensaje1      = arrOpcionesPass[0][2];
        objPass2      = arrOpcionesPass[1][1];
        mensaje2      = arrOpcionesPass[1][2];
        
        var valor1=eval("document.forms[0]."+objPass1+".value"); 
        var valor2=eval("document.forms[0]."+objPass2+".value"); 
          
        if (valor1!=valor2){
            msgError = msgError + mensaje1 + " y "+ mensaje2 + " no son iguales. \n";
            msgErrorEsp = msgErrorEsp + mensaje1 + " y "+ mensaje2 + " no son iguales. \n";
        
        }     
     }
  
     if(msgErrorReq.length!=0 || msgErrorEsp.length!=0){
		  switch(TipoRespuesta)
		  {
		    case 1: // Validaci?n com?n. Alert de aviso 
		        {
		           if(msgError.length!=0){
		               alert("Se han detectado los siguientes errores: \n"+msgError);
		               msgError="";
		               return false;
		             }
		           break; 
		        }
		    case 2: case 3: // Validacion avanzada. Div encima del primer elemento
		       {	
		          if(msgErrorReq.length!=0 || msgErrorEsp.length!=0 ){		               
		               document.getElementById("errores").appendChild(document.createTextNode(""));
		               if(msgErrorReq.length!=0){
		                  divtxt = document.createElement("div");		                  		                   
		                  texto  = document.createTextNode("Los siguientes son datos requeridos para el envio del formulario ");
		                  divtxt.appendChild(texto);
		                  divtxt.style.textDecoration="underline";		                  
		                  document.getElementById("errores").appendChild(divtxt);
		                  document.getElementById("errores").appendChild(document.createTextNode(msgErrorReq.substring(0,msgErrorReq.length-2)+'.'));
		               }
		                
		               if(msgErrorEsp.length!=0){
		                  divtxt = document.createElement("div");
		                  texto  = document.createTextNode("Ademas, considere lo siguiente:");
		                  divtxt.appendChild(texto);
		                  divtxt.style.textDecoration="underline";		         
		                  document.getElementById("errores").appendChild(divtxt);         
		                  document.getElementById("errores").appendChild(document.createTextNode(msgErrorEsp));		                 
		               }
		               divtxt = document.createElement("div");
		               divtxt.setAttribute('align', 'right');		               
		               link = document.createElement('a');		               
                       link.setAttribute('href', '#');                       
                       link.setAttribute('onclick', 'cerrar()');
                       texto=document.createTextNode("cerrar");
                       link.setAttribute('align', 'right');
                       link.appendChild(texto);
                       divtxt.appendChild(link);
                       document.getElementById("errores").appendChild(divtxt);
		             
		               mostrar();
		               msgError="";
		               msgErrorEsp="";
		               msgErrorReq="";		                              
		               return false;         
		             }     
	              break;	       
		       }  
		   }
		        
     } // End if 
                
     document.getElementById("errores").style.display="none"; //Evita bug     
     return true;     
  }
  
 function mostrar(){
     document.getElementById("errores").style.display="block";       
	};  
			
 function cerrar(){
      document.getElementById("errores").style.display="none";
	};		
		

