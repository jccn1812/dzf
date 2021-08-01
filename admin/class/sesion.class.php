<?php

class sesion {

	function __construct() {
		session_cache_limiter("must-revalidate");
		$estado_session = session_status();
		
		if($estado_session == PHP_SESSION_NONE)
		{
			session_start();
		}
		
	}
	
    public function setSession($nombre,$valor) {
    	$_SESSION[$nombre] = $valor;
    }
    
    public function getSession($nombre) {
    	
        if (isset ($_SESSION[$nombre] )) {
        	 return $_SESSION[$nombre];	
        }
        
        else {
            return false;
        }
    }
    
    public function delVarSession($nombre) {
        unset($_SESSION[$nombre]);
    }
    
    public function closeSession() {
         $_SESSION = array();
         session_destroy();
    }
    
}

?>
