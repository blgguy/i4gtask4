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
    private $database   = 'i4g_training_task';
    
    protected $conector;
    
    public function __construct(){

        if (!isset($this->conector)) {
            
            $this->conector = new mysqli($this->host, $this->username, $this->password, $this->database);
            
            if (!$this->conector) {
                echo '<h3>Error found, please contact your administrator!</h3>';
                exit;
            }            
        }    
        
        return $this->conector;
    }
}
?>