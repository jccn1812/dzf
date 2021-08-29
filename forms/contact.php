<?php

  include_once ("../admin/class/constantes.php");

  $nombre   =   $_POST['nombre'];
  $telefono =   $_POST['telefono'];
  $email    =   $_POST['email'];
  $mensaje  =   $_POST['mensaje'];

  


  $msg = "
  Datos del envío 
  Nombre del remitente: $nombre 
  Teléfono            : $telefono 
  Email               : $email 
  Mensaje: $mensaje";


  $from   = EMAILHEADERFROM;
  $to     = EMAILTO;
  $subject = EMAILSUBJECT;
  $message = $msg;
  $headers = "From:" . EMAILADMIN;
  mail($to,$subject,$message, $headers);
  
  ?>
