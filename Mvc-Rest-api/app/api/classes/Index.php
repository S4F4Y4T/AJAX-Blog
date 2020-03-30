<?php
class Index{
    public static function construct(){
        echo json_encode('Method Not Found');
        http_response_code(405);
    }
}
?>