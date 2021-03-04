<?php


    class user{

        public $user_id;
        public $user_name ;
        public $pass ;
        public $last_name ;
        public $first_name;
        /**
         * @var mixed
         */
        private $the_attribute;


        public static function find_all_user(){
               return self::find_this_query("SELECT *FROM user") ;
        }





        public static function find_user_by_id($id)
        {
            $the_result_array = self::find_this_query("SELECT *FROM user WHERE user_id= $id");
            return !empty($the_result_array) ? array_shift($the_result_array) : false;

        }




        public static function find_this_query($sql){
            global $db  ;
            $result_set = $db->query($sql) ;
            $the_object_array = array() ;
            while ($row = mysqli_fetch_array($result_set)){
                $the_object_array[] =  self::instantation($row) ;
            }
            return $the_object_array ;
        }





        public static function veryfy_user( $username , $password){
          //  global $db ;
        //    $username = $db->escape_string($username)  ;
          //  $password = $db->escape_string($password)  ;

            $sql  = "SELECT * FROM user WHERE user_name = '{$username}' AND  pass = '{$password}'" ;



            $the_result_array  = self::find_this_query($sql) ;
          //  return $the_result_array ;
            return !empty($the_result_array) ? array_shift($the_result_array)   : false ;

        }




        public static function instantation($the_record){
            $the_object = new self ;
            foreach ($the_record  as $the_attribute => $value){
                if ($the_object->has_the_attribute($the_attribute)){
                    $the_object->$the_attribute = $value ;
                }
            }
            return $the_object ;
        }




        private function has_the_attribute($the_attribute){
               $porpery = get_object_vars($this) ;
               return  array_key_exists($the_attribute , $porpery) ;
        }
     }
?>