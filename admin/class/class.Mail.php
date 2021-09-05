<?php

include_once ('../class/class.html.php');

include_once ('../class/class.html.php');
include_once ('IntF.dos.php');
/*------------------------------------------------------
 archivo de clase: class.Mail.php
 -----------------
 Descripción: Implementa la clase Mail para el envio de correos
 Clase de la que hereda : classHtml
 Aplicación : DZF Certifica
               - Módulo de administración -
 Autor : Juan Carlos Campos N.
 Fecha : 30 de julio de 2021
 Nuevo : --
*/

class enviarMail extends classHtml  {

    private $tipoCorreo;
    private $accion;
    private $fromMail;
    private $toMail;
    private $bodyMail;
    private $subjectMail;
    private $toMailArray;
    private $SMTPServer;
    private $isHTMLMail;
    private $additionalText;


	public function setAccion($accion) {
		$this->accion = $accion;
	}

	public function setTipoCorreo($tipoCorreo) {
		$this->tipoCorreo = $tipoCorreo;
	}

    public function setToMail($toMail) {
		$this->toMail = $toMail;
	}

    public function setToMailArray($toMailArray) {
		$this->toMailArray = $toMailArray;
	}

    public function setIsHTMLMail($isHTMLMail) {
		$this->isHTMLMail = $isHTMLMail;
	}

    public function setAdditionalText($additionalText) {
		$this->additionalText = $additionalText;
	}



	public function __construct($tipoCorreo){
		$this->fromMail   = EMAILADMIN;
		$this->SMTPServer = SMTPSERVER;
        $this->tipoCorreo = $tipoCorreo;
       
	}


    public function setBodyMail()
    {
        switch ($this->tipoCorreo) {
            case SENDPASSWORDMAIL:
                $this->bodyMail = SENDPASSWORDSTTL."<br>" .SENDPASSWORDSMSG;
                $this->subjectMail = SENDPASSWORDSUBJ;
                break;            
        }
    }

    public function sendEmail()
	{
        $dest = $this->toEmail;
		$head  = 'MIME-Version: 1.0' . "\r\n";
        $head .= "Content-Type: text/html; charset=UTF-8\r\n";
        $head .= "From:".$this->fromMail . "\r\n";
		$head .= "To: ". $this->toMail ."\r\n";
		// Ahora creamos el cuerpo del mensaje
		
		$msg.= "<p>Importante: Este mensaje ha sido generado autom&aacute;ticamente, por lo que solicitamos no contestar.</p>";
        
		// Finalmente enviamos el mensaje
		mail($dest, 
             $this->subjectMail,
             trim($this->bodyMail).$this->additionalText. ' '. $msg, 
             $head);

	 }





}