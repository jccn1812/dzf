/**
 * Libreria: Validacion
**/


// Constantes con tipos de campos (cada uno debe tener asociado una funcion de validacion)
var TYPE_STRING      = 0;
var TYPE_NUMBER      = 1;
var TYPE_NUMBERINT   = 2;
var TYPE_NUMBERFLOAT = 3;
var TYPE_DATE        = 4;
var TYPE_EMAIL       = 5;
var TYPE_HTTP        = 6;
var TYPE_TIME        = 7;
var TYPE_RUT         = 8;


// Especificos según tipo de objeto
var TYPE_COMBO      =  9;
var TYPE_RADIO      = 10;
var TYPE_CHECKBOX   = 11;



// Constantes que indican los campos obligatorios en los formularios
var OBLIGATORIO      = 0;
var OPCIONAL         = 1;

// Constantes que indican el comportamiento del mensaje frente a un error
 var enPOPUP           = 1 
 var enCAPA            = 2

// Constantes con separadores de cifras
var VAL_SEPARADOR_MILES     = ".";
var VAL_SEPARADOR_DECIMALES = ",";


// ======================================================================
// Funciones de validacion de tipos
// Obs: vacio, debe ser considerado como invalido, salvo en IsValid_Empty
// que precisamente retorna OK cuando el campo es vacio.
// ======================================================================
function LTrim(s){
  var s2    = "";
  var largo = s.length;

  for (var i = 0; (i<largo) && (s.substr(i,1)==" "); i++ )  ;
  for (         ;  i<largo                         ; i++ )  s2 = s2 + s.substr(i,1);
  return(s2);
}

function RTrim(s){
  var s2    = "";
  var largo = s.length;

  for (var i=largo-1; (i>=0) && (s.substr(i,1)==" "); i-- )  ;
  for (             ;  i>=0                         ; i-- )  s2 = s.substr(i,1) + s2;
  return(s2);
}


function IsValid_Empty( a_objeto ) {

  //"Combo"
  if (a_objeto.type == "select-one") {
    if (a_objeto.selectedIndex < 0)  return( true );
    return( ( RTrim( LTrim( a_objeto.options[a_objeto.selectedIndex].value ) ) == "" ) ? true : false );
  }

  //"Listbox"
  if (a_objeto.type == "select-multiple") {
    if (a_objeto.selectedIndex < 0)  return( true );
    return( ( RTrim( LTrim( a_objeto.options[a_objeto.selectedIndex].text ) ) == "" ) ? true : false );
  }

  //"Editbox"
  return( ( RTrim( LTrim( a_objeto.value ) ) == "" ) ? true : false )
}


function IsValid_String( a_objeto ) {
  return( !IsValid_Empty( a_objeto ) )
}


function IsValid_Number( a_objeto ) {
  //Vacio
  if( IsValid_Empty( a_objeto ) )  return( false );

  //Retorna
  return( IsValid_NumberInt( a_objeto ) || IsValid_NumberFloat( a_objeto ) );
}


function IsValid_NumberInt( a_objeto ) {
  //Vacio
  if( IsValid_Empty( a_objeto ) )  return( false );

  //Strings de expresiones regulares
  var ExpresionRegular_Str = "^(([0-9]+)|([0-9]{1,3}(\\" + VAL_SEPARADOR_MILES + "[0-9][0-9][0-9])*))$"

  //Objetos expresiones regulares
  var ExpresionRegular = new RegExp( ExpresionRegular_Str );

  //Retorna
  if (a_objeto.type == "select-one") {
    return( ExpresionRegular.test( a_objeto.options[a_objeto.selectedIndex].value ) );
  }
  else if (a_objeto.type == "select-multiple") {
    return( ExpresionRegular.test( a_objeto.options[a_objeto.selectedIndex].value ) );
  }
  else
    return( ExpresionRegular.test( a_objeto.value ) );
}


function IsValid_NumberFloat( a_objeto ) {
  //Vacio
  if( IsValid_Empty( a_objeto ) )  return( false );

  //Strings de expresiones regulares
  var ExpresionRegular_Str = "^(-)?(([0-9]+)|(([0-9]+)\\" + VAL_SEPARADOR_DECIMALES + "[0-9]+)|([0-9]{1,3}(\\" + VAL_SEPARADOR_MILES + "[0-9][0-9][0-9])*\\" + VAL_SEPARADOR_DECIMALES + "[0-9]+))$"

  //Objetos expresiones regulares
  var ExpresionRegular = new RegExp( ExpresionRegular_Str );

  //Retorna
  if (a_objeto.type == "select-one") {
    return( ExpresionRegular.test( a_objeto.options[a_objeto.selectedIndex].text ) );
  }
  else if (a_objeto.type == "select-multiple") {
    return( ExpresionRegular.test( a_objeto.options[a_objeto.selectedIndex].text ) );
  }
  else
    return( ExpresionRegular.test( a_objeto.value ) );
}


function IsValid_Date( a_objeto ) {
  //Vacio
  if( IsValid_Empty( a_objeto ) )  return( false );

  //Strings de expresiones regulares
  var meses                = "01|02|03|04|05|06|07|08|09|10|11|12";
  var dias                 = "01|02|03|04|05|06|07|08|09|10|11|12|13|14|15|16|17|18|19|20|21|22|23|24|25|26|27|28|29|30|31";
  var ExpresionRegular_Str = "^("+dias+")\\/("+meses+")\\/[0-9][0-9][0-9][0-9]$"

  //Objetos expresiones regulares
  var ExpresionRegular = new RegExp( ExpresionRegular_Str );

  //Evaluar expresiones
  var resultado;
  var valorObjeto;
  var largoObjeto;

  if (a_objeto.type == "select-one") {
    resultado = ExpresionRegular.test( a_objeto.options[a_objeto.selectedIndex].text );
    valorObjeto = a_objeto.options[a_objeto.selectedIndex].text;
    largoObjeto = valorObjeto.length;
  }
  else if (a_objeto.type == "select-multiple") {
    resultado = ExpresionRegular.test( a_objeto.options[a_objeto.selectedIndex].text );
    valorObjeto =a_objeto.options[a_objeto.selectedIndex].text;
    largoObjeto = valorObjeto.length;
  }
  else {
    resultado = ExpresionRegular.test( a_objeto.value );
    valorObjeto = a_objeto.value;
    largoObjeto = valorObjeto.length;
  }

  if ( resultado ){
    var largo= largoObjeto;
    var dia  = valorObjeto.substr(0,2);
    var mes  = valorObjeto.substr(3,2);
    var anno = valorObjeto.substr(largo-4,4);
    if (mes == "02") {
      //Si es divisible por 4 y no por 100 a no ser que
      //          sea div por 400 -> 29 2000 si 1900 no
      var bisiesto = (((anno%4 == 0) & (anno%100 != 0)) | (anno%400 == 0))?true:false;
      resultado = (bisiesto)?(eval(dia+"<30")):(eval(dia+"<29"))
    }
    //Revisa los dias 31 del mes
    else if (dia=="31" && ( (eval(mes+"<8")) && (mes%2==0) || (eval(mes+">7")) && (mes%2==1)))
      resultado = false;
  }
  //Retorna
  return( resultado );
}


function IsValid_EMail( a_objeto ) {
  //Vacio
  if( IsValid_Empty( a_objeto ) )  return( false );

  //Strings de expresiones regulares: username y hostname
  var ExpresionRegular1_Str = "(@.*@)|(\\.\\.)|(@\\.)|(\\.@)|(^\\.)";
  var ExpresionRegular2_Str = "^.+\\@(\\[?)[a-zA-Z0-9\\-\\.]+\\.([a-zA-Z]{2,3}|[0-9]{1,3})(\\]?)$";

  //Objetos expresiones regulares
  var ExpresionRegular1 = new RegExp( ExpresionRegular1_Str );
  var ExpresionRegular2 = new RegExp( ExpresionRegular2_Str );

  //Retorna
  if (a_objeto.type == "select-one") {
    return( !ExpresionRegular1.test( a_objeto.options[a_objeto.selectedIndex].text )  &&
             ExpresionRegular2.test( a_objeto.options[a_objeto.selectedIndex].text ) );
  }
  else if (a_objeto.type == "select-multiple") {
    return( !ExpresionRegular1.test( a_objeto.options[a_objeto.selectedIndex].text )  &&
             ExpresionRegular2.test( a_objeto.options[a_objeto.selectedIndex].text ) );
  }
  else
    return( !ExpresionRegular1.test( a_objeto.value )  &&
             ExpresionRegular2.test( a_objeto.value ) );
}


function IsValid_HTTP(a_objeto ) {
var re=/^http:\/\/\w+(\.\w+)*\.\w{2,3}$/;
return re.test(a_objeto.value);
} 



function IsValid_HTTP2( a_objeto ) {
  //Vacio
  if( IsValid_Empty( a_objeto ) )  return( false );

  //Strings de expresiones regulares
  var alphadigit = "[A-Za-z0-9]";
  var safe       = "[\\$\\-\\_\\.\\+]";
  var hex        = "[0-9A-F-a-f]";
  var extra      = "[\\!\\*\\'\\(\\)\\,]";
  var reserved   = "[\\;\\/\\?\\:\\@\\&\\=]";
  var escape     = "\\%"+hex+hex;
  var unreserved = "([A-Za-z0-9]|"+safe+"|"+extra+")";
  var uchar      = "("+unreserved+"|"+escape+")";
  var xchar      = "("+unreserved+"|"+reserved+"|"+escape+")";

  var domainlabel = "("+alphadigit+"|("+alphadigit+"("+alphadigit+"|\\-)*"+alphadigit+"))";
  var toplabel    = "([A-Za-z]|([A-Za-z]("+alphadigit+"|\\-)*"+alphadigit+"))";
  var hostname    = "("+domainlabel+"\\.)*"+toplabel;
  var hostnumber  = "[0-9]+\\.[0-9]+\\.[0-9]+\\.[0-9]+";
  var host        = "("+hostname+"|"+hostnumber+")";
  var port        = "[0-9]+";


  var search      = "("+uchar+"|[\\;\\:\\@\\&\\=])*";
  var hsegment    = "("+uchar+"|[\\;\\:\\@\\&\\=])*";
  var hpath       = "("+hsegment+"(\\/"+hsegment+")*)";
  var hostport    = "("+host+"(\\:"+port+")?)";
  var httpurl     = "(http\\:\\/\\/)?"+hostport+"(\\/"+hpath+"(\\?"+search+")?)?";

  var user        = "("+uchar+"|[\\;\\?\\&\\=])*";
  var password    = "("+uchar+"|[\\;\\?\\&\\=])*";
  var login       = "("+user+"(\\:"+password+")?\\@)?";
  var fsegment    = "("+uchar+"|[\\?\\:\\@\\&\\=])*";
  var fpath       = "("+fsegment+"(\\/"+fsegment+")*)";
  var ftptype     = "[AIDaid]";
  var ftpurl      = "ftp\\:\\/\\/"+login+"(\\/"+fpath+"(\\;type\\="+ftptype+")?)?";

  var fileurl     = "file\\:\\/\\/("+host+"|localhost)?\\/"+fpath;

  var url         = "^"+httpurl+"|"+ftpurl+"|"+fileurl+"$";

  var ExpresionRegular_Str = url;

  //Objetos expresiones regulares
  var ExpresionRegular = new RegExp( ExpresionRegular_Str );

  //Retorna
  if (a_objeto.type == "select-one") {
    return( ExpresionRegular.test( a_objeto.options[a_objeto.selectedIndex].text ) );
  }
  else if (a_objeto.type == "select-multiple") {
    return( ExpresionRegular.test( a_objeto.options[a_objeto.selectedIndex].text ) );
  }
  else
    return( ExpresionRegular.test( a_objeto.value ) );
}


function IsValid_Time( a_objeto ) {
  //Vacio
  if( IsValid_Empty( a_objeto ) )  return( false );

  //Strings de expresiones regulares
  var horas                = "(00|01|02|03|04|05|06|07|08|09|10|11|12|13|14|15|16|17|18|19|20|21|22|23)";
  var minutos              = "([0-5])[0-9]";
  var segundos             = "([0-5])[0-9]";
  var ExpresionRegular_Str = "^"+horas+":"+minutos+":"+segundos+"$"

  //Objetos expresiones regulares
  var ExpresionRegular = new RegExp( ExpresionRegular_Str );

  //Evaluar expresiones
  var resultado;
  var valorObjeto;
  var largoObjeto;

  if (a_objeto.type == "select-one") {
    resultado = ExpresionRegular.test( a_objeto.options[a_objeto.selectedIndex].text );
    valorObjeto = a_objeto.options[a_objeto.selectedIndex].text;
    largoObjeto = valorObjeto.length;
  }
  else if (a_objeto.type == "select-multiple") {
    resultado = ExpresionRegular.test( a_objeto.options[a_objeto.selectedIndex].text );
    valorObjeto =a_objeto.options[a_objeto.selectedIndex].text;
    largoObjeto = valorObjeto.length;
  }
  else {
    resultado = ExpresionRegular.test( a_objeto.value );
    valorObjeto = a_objeto.value;
    largoObjeto = valorObjeto.length;
  }

  if ( resultado ){
    var largo= largoObjeto;
    var hora  = valorObjeto.substr(0,2);
    var min   = valorObjeto.substr(3,2);
    var seg   = valorObjeto.substr(largo-4,4);
    //resultado = false;
  }
  //Retorna
  
  return( resultado );
  
}

function IsValid_DV( a_objetoRut, a_objetoDV ) {
  if( IsValid_Empty( a_objetoRut ) || IsValid_Empty( a_objetoDV ) )  return( true );
  l_DV = DigitoVerificadorRut( a_objetoRut );
  l_DVCampo = a_objetoDV.value;
  l_DVCampo = l_DVCampo.toUpperCase();

  if ( l_DVCampo != l_DV ) //Si el digito no corresponde retorno false
    return( false );
  //Retorna
  return( true )
}

function DigitoVerificadorRut( a_objeto ) {
  var rut = 0;
  var s = 0;
  var l_dv = "";

  rut = a_objeto.value;
  for (i=2; i< 8; i++){
    s = s + ( rut % 10 ) * i;
    rut = (rut - ( rut % 10 )) / 10;
  }
  s = s + ( rut % 10 ) * 2;
  rut = (rut - ( rut % 10 )) / 10;
  s = s + ( rut % 10 ) * 3;
  rut = (rut - ( rut % 10 )) / 10;
  s = 11 - ( s % 11 );
  if ( s == 10 )
     l_dv = "K";
  else
     if ( s == 11 )
        l_dv = "0"
     else
        l_dv = s + "";   // Se convierte el numero s a string
  return( l_dv );
}

function IsValid_Rut(elrut) {
  
  crut = elrut.value;
  
  largo = crut.length;
  

  if ( largo > 2 )
    rut = crut.substring(0, largo - 2);
  else
    rut = crut.charAt(0);
    
  dv = crut.charAt(largo-1);
  
  
  if ( rut == null || dv == null )
      return 0;

  var dvr = '0';
  suma = 0;
  mul  = 2;
  for (i= rut.length -1 ; i >= 0; i--) {
    suma = suma + rut.charAt(i) * mul;
    if (mul == 7)
      mul = 2;
    else
      mul++;
  }

  res = suma % 11;
  if (res==1)
    dvr = 'k';
  else if (res==0)
    dvr = '0';
  else {
    dvi = 11-res;
    dvr = dvi + "";
  }

  if ( dvr != dv.toLowerCase() )
    return false;
  return true;
}


 function validaFechaPrecedente(fecha1,fecha2){
  if (fecha1=="" && fecha2=="") return true;
  if (fecha1==fecha2) return false;
  fechaIni  = fecha1.replace(/[-]/g, "/");
  fechaTer  = fecha2.replace(/[-]/g, "/");
    
  fecha1 = new Date(parseInt(fechaIni.substring(6,10)),parseInt(fechaIni.substring(3,5))-1,parseInt(fechaIni.substring(0,2)));
  fecha2 = new Date(parseInt(fechaTer.substring(6.10)),parseInt(fechaTer.substring(3,5))-1,parseInt(fechaTer.substring(0,2)));
  
   
  if( fecha1 > fecha2 ){    
    return false;
  }
  return true;
}




   
   




