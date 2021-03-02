<?php


    class user{

        public $id ;
        public $username ;
        public $pass ;
        public $firstname ;
        public $lastname;



        public static function find_all_user(){
                return self::find_this_query("SELECT *FROM user") ;
        }



        public static function find_user_by_id($id){

            $result_set = self::find_this_query("SELECT *FROM user WHERE user_id= $id") ;
            $row = mysqli_fetch_array($result_set) ;
            return $row ;
        }


        public static function find_this_query($sql){
            global $db  ;

            $result_set = $db->query($sql) ;
            return $result_set ;
        }

        public static function instantation($result_set){

            $the_object = new self() ;

            $the_object->id = $result_set['user_id'] ;
            $the_object->username = $result_set['user_name'] ;
            $the_object->pass     = $result_set['pass'] ;
            $the_object->lastname = $result_set['last_name'] ;
            $the_object->firstname= $result_set['first_name'] ;

            return $the_object ;
        }

     }

?>