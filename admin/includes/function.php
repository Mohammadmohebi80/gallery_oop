<?php


function  classAutoLoader($class){

    $class = strtolower($class) ;
    $the_path = "includes/{$class}.php" ;

    if (file_exists($the_path)){
          require_once ($the_path) ;
    }
    else{
        die("this file name {$the_path}.php was not man....");
    }
}
spl_autoload_register("classAutoLoader") ;



function redirect($location){
    header("location:{$location}");
}



?>
