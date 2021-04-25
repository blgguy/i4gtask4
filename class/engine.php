<?php
include_once('petrol.php');

/**
 * @Aminu MUhammed
 * Twitter - @blg_guy
 * Website - https://blg.com.ng
 * this class deals with must of the task of the project [INSERT | UPDATE | DELETE]
 */
class engine extends DB{

    public function login($username){
        $sql = "SELECT * FROM `users` WHERE `email` = '$username'";
        $array = array(); // assigning an empty array.
        $query = $this->conector->query($sql);
        
        if($query->num_rows > 0){
            while ($row = $query->fetch_array()) {
                $array[] = $row;
            }
            return $array;
        }else{
            return false;
        }
    }

    public function del($table, $id)
    {

        $sql    = "DELETE FROM `$table` WHERE `id` =".$id;
        $query  = $this->conector->query($sql);
            if ($query) {
                return true;
            }else{
                return false;
        }
    }


    public function update($table, $fields, $ky)
    {
        $codition = "";
        foreach ($fields as $key => $value) {
            $codition .= "`".$key. "` = '".$value."', ";
        }

        $codition = substr($codition, 0, -2);

        $sql = "UPDATE `".$table."` SET ".$codition." WHERE `id` =".$ky;
        $query  =   $this->conector->query($sql);
        if ($query) {
            return true;
        }else{
            return false;
        }
    }
    
    public function Insert($table,$fields){
        $sql    =   "";
        $sql    .=  "INSERT INTO `".$table;
        $sql    .=  "` (`".implode("`,`", array_keys($fields))."`) VALUES ";
        $sql    .=  "('".implode("','", array_values($fields))."')";
        $query  =   $this->conector->query($sql);

        if ($query) {
            return true;
        }else{
            false;
        }

    }    

    public function viewById($table, $id)
    {
        $sql = "SELECT * FROM `$table`";
        $sql .= " WHERE `id` = ".$id;
        $array = array();
        $query = $this->conector->query($sql);
         if($query->num_rows > 0){
            while ($row = $query->fetch_array()) {
                $array[] = $row;
            }
            return $array;
        }else{
            return false;
        }
    }

    public function view($table)
    {
       $sql = "SELECT * FROM `".$table."`";
        $array = array();
        $query = $this->conector->query($sql);
         if($query->num_rows > 0){
            while ($row = $query->fetch_array()) {
                $array[] = $row;
            }
            return $array;
        }else{
            return false;
        }
    }


}

?>
