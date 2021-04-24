<?php
include_once('petrol.php');

/**
 * this class deals with must of the task of the project [INSERT | UPDATE | DELETE]
 */
class engine extends DB{

    public function del($table, $id)
    {

        // Delete table by his id
        $sql    = "DELETE FROM `".$table."` WHERE id =".$id;
        $query  = $this->Jigo->query($sql);

        return true;
    }


    public function update($table, $fields, $ky)
    {
        //$id = "";
        $codition = "";
        foreach ($fields as $key => $value) {
            $codition .= "`".$key. "` = '".$value."', ";
        }

        $codition = substr($codition, 0, -2);

        $sql = "UPDATE `".$table."` SET ".$codition." WHERE `id` =".$ky;
        $query  =   $this->Jigo->query($sql);
        if ($query) {
            return true;
        }else{
            return false;
        }
    }

     public function update2($table, $fields, $ky)
    {
        //$id = "";
        $codition = "";
        foreach ($fields as $key => $value) {
            $codition .= "`".$key. "` = '".$value."', ";
        }

        $codition = substr($codition, 0, -2);

        $sql = "UPDATE `".$table."` SET ".$codition." WHERE `id` =".$ky;
        $query  =   $this->Jigo->query($sql);
        if ($query) {
            return true;
        }else{
            return false;
        }
    }

    public function delete($table, $ky)
    {
        $id = "";
        foreach ($ky as $key => $value) {
            $id .= "`".$key ."` = '".$value."'";    
        }

        $sql = "UPDATE `".$table."` SET `status` = '200' WHERE ".$id;
        $query  =   $this->Jigo->query($sql);

        if($query->num_rows > 0){
            if ($query) {
                return true;
            }
        }else{
            return false;
        }
    }
    
    public function Insert($table,$fields){
        $sql    =   "";
        $sql    .=  "INSERT INTO `".$table;
        $sql    .=  "` (`".implode("`,`", array_keys($fields))."`) VALUES ";
        $sql    .=  "('".implode("','", array_values($fields))."')";
        $query  =   $this->Jigo->query($sql);

        if ($query) {
            return true;
        }else{
            false;
        }

    }    

    public function coutTables($table)
    {
        $sql = "SELECT * FROM `".$table;
        $sql .= "` WHERE `status` = '404'";
        $query = $this->Jigo->query($sql);
        $tableCount = $query->num_rows;

        return $tableCount;
    }

    public function view($table)
    {
       $sql = "SELECT * FROM `".$table."`";
        $array = array();
        $query = $this->Jigo->query($sql);
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
