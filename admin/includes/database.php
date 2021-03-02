<?php
       require_once ("config.php") ;


class database{

        public $connection ;


    function __construct(){
          $this->open_db_connection();
    }


    public function open_db_connection(){
          $this->connection = new mysqli(db_host , db_user , db_pass , db_name) ;

         if ($this->connection->connect_errno){
                die("no config" .$this->connection->connect_error);
            }
    }


    public  function query($sql){
          $result  = $this->connection->query($sql) ;
          $this->confirm_query($result);

          return $result ;
    }


    private function confirm_query($result){
        if (!$result){
            die("query faild". $this->connection->error);
        }
    }

    public function escape_string($string){
        $escape_string = $this->connection->mysqli_real_escape_string($string) ;
        return $escape_string  ;
    }


    public function the_insert_id(){

        return $this->connection->insert_id ;
    }

}

$db = new database() ;

?>