<?php
function sentize($string) {
    return htmlentities(strip_tags($string), ENT_QUOTES, 'UTF-8');
}

/**
 * this class deals with our datatbase configuration
 */

class DB{

    private $host       = 'localhost';
    private $username   = 'root';
    private $password   = '';
    private $database   = 'cheftailor';
    
    protected $Jigo;
    
    public function __construct(){

        if (!isset($this->Jigo)) {
            
            $this->Jigo = new mysqli($this->host, $this->username, $this->password, $this->database);
            
            if (!$this->Jigo) {
                echo '<h3>404 NOT FOUND!</h3>';
                exit;
            }            
        }    
        
        return $this->Jigo;
    }
}
?>