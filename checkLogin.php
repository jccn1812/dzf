<?php
       include_once 'admin/class/sesion.class.php';
       include_once ("admin/class/class.BDempresas.php");

       session_start();

       $rut		    = $_POST ["rut"];
       $password    = $_POST ["password"];
       
       $objEmpresa = new empresas ( );
       $objEmpresa->setRut( $rut );
       $objEmpresa->setPassword( $password );


       try {
         
            $DatosEmpresa = $objEmpresa->datosLoginEmpresa ();
            $rowDatosEmpresa = mysqli_fetch_object ( $DatosEmpresa );

            $IdEmpresa   = $rowDatosEmpresa->IdEmpresa;
            $empresa     = $rowDatosEmpresa->empresa;
            $rut         = $rowDatosEmpresa->rut;
            $razonSocial = $rowDatosEmpresa->razonSocial;
            
            $sesion = new sesion();

            if(is_null($IdEmpresa) || empty($IdEmpresa))
            {
                $sesion->setSession('IS_LOGIN',FALSE);
                echo '0';
            } else {
                $sesion->setSession('ID_EMPRESA',$IdEmpresa);
                $sesion->setSession('RUT',$rut);
                $sesion->setSession('EMPRESA',$empresa);
                $sesion->setSession('IS_LOGIN',TRUE);
                echo '1';

            }
       }
       catch(Exception $e) {
           echo '0';
       } 


?>