<?php
class Route{
    public static function view($load,$data = false){
        if($data == true){
            extract($data);
        }
        require_once 'app/view/'.$load.'.php';
    }
}
?>