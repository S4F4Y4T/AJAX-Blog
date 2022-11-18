<?php
class Post{
    public static function getPost($page){
        if($_SERVER['REQUEST_METHOD'] == "GET"){

            //pagination

            $per_page = 5;

            $data = array(
                'table'			 => array('table' => 'post'),
                'selectcond' => array('select' => 'COUNT(*)')
            );

            $row = DB::fetch($data)[0][0];

            if($row > 0){
                $last_page = ceil($row/$per_page);
                if($page < 1){
                    $page = 1;
                }
                if($page > $last_page){
                    $page = $last_page;
                }
                $start = ($page-1) * $per_page;

                //pagination

                $data = array(
                    'table'			 => array('table' => 'post'),
                    'pkey'			 => array('pkey' => 'id'),
                    'selectcond' => array('select' => '*'),
                    'orderby'	   => array('order' => 'DESC'),
                    'limit' 	 	 => array('start' => $start, 'limit' => $per_page),
                );

                $query = DB::fetch($data);

                $response = "[";
                foreach($query as $value){
                    $response .= "{";
                    $response .= '"postid" : "'.$value['id'].'",';
                    $response .= '"title" : "'.$value['title'].'",';
                    $response .= '"body" : "'.$value['body'].'",';
                    $response .= '"userid" : "'.$value['user_id'].'",';
                    $response .= '"image" : "'.$value['image'].'",';
                    $response .= '"date" : "'.$value['date'].'"';
                    $response .= "},";

                }
                $response  = substr($response, 0, strlen($response)-1);
                echo $response .= "]";
            }else{
                echo $response = "[{}]";
            }

        }else{
            http_response_code(405);
        }
    }

    public static function home_pagination($page){
        if($_SERVER['REQUEST_METHOD'] == "GET"){
            $data = array(
                'table'			 => array('table' => 'post'),
                'selectcond' => array('select' => 'COUNT(*)')
            );

            $row = DB::fetch($data)[0][0];
            self::pagination($row,$page);
        }else{
            http_response_code(405);
        }
    }

    public static function addPost(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){

            validation::post($_POST,'title')::xss()::length('Title',3,64)::isempty();
            validation::post($_POST,'body')::xss()::isempty();
            validation::extention($_FILES,'image')::size()::image();

            if(validation::submit()){
                $title = validation::$value['title'];
                $body  = validation::$value['body'];
                
                $image = validation::$value['image']['tmp'];
                $uniq = validation::$value['image']['uniq'];

                move_uploaded_file($image, ROOT.'/images/'.$uniq);

                $table = "post";
                $data = array(
                'user_id' => Session::isloggedin(),
                'title'   => $title,
                'body'    => $body,
                'image'   => $uniq
                );

                $inserted = DB::insertdata($data,$table);

                if($inserted){
                    echo '{"message": "data inserted successfully"}';
                }
            }else{
                echo '{"message": "'.validation::$error.'"}';
            }
        }else{
            http_response_code(405);
        }
    }

    public static function delPost($id){
        if($_SERVER['REQUEST_METHOD'] == "DELETE"){
            if(Session::isloggedin()){

                $getImg = array(
                    'table'		 => array('table' => 'post'),
                    'selectcond' => array('select' => 'image'),
                    'wherecond'  => array('where' => array('id' => $id, 'user_id' => Session::isloggedin()))
                );
    
                $delImg = DB::fetch($getImg)[0][0];

                unlink(ROOT.'/images/'.$delImg);

                $data = array(
                    'table'			 => array('table' => 'post'),
                    'wherecond'  => array('where' =>array('id' => $id, 'user_id' => Session::isloggedin()))
                );
                $delete = DB::delete($data);
                if($delete){
                    http_response_code(200);
                    echo '{"message" : "Data Deleted Successfully"}';
                }

            }else{
                echo '{"message" : "User Not Logged in"}';
            }
            
        }else{
            http_response_code(405);
            echo '"error" : "Restricted Method"';
        }
    }

    public static function pagination($row,$page){
        $pagiButton = 5;
        $per_page   = 5;
        $last_page  = ceil($row/$per_page);
        $halfBtn    = floor($pagiButton/2);

        if($page < 1){
            $page = 1;
        }else if($page > $last_page){
            $page = $last_page;
        }
        $pagination = '';

        if($page < $pagiButton AND $last_page  < $pagiButton AND $last_page > 1){

            for($i=1; $i <= $last_page; $i++){
                if($i == $page){
                    $pagination .= '<li><a class="active">'.$i.'</li></a>';
                }else{
                    $pagination .= '<li><a class="pager" id="'.$i.'" class="">'.$i.'</li></a>';
                }
            }

        }else if($page < $pagiButton AND $last_page > 1){
            for($i=1; $i <= $pagiButton; $i++){
                if($i == $page){
                    $pagination .= '<li><a class="active">'.$i.'</li></a>';
                }else{
                    $pagination .= '<li><a class="pager" id="'.$i.'" class="">'.$i.'</li></a>';
                }
            }
            if($last_page > $pagiButton){
                $pagination .= '<li><a class="pager" id="'.($pagiButton+1).'" class="">&raquo</li></a>';
            }
        }else if($page >= $pagiButton AND $last_page > $pagiButton){

            if(($page+$halfBtn) >= $last_page){

                $pagination .= '<li><a class="pager" id="'.($last_page - $pagiButton).'" class="">&laquo;</li></a>';

                for($i=($last_page - $pagiButton) + 1; $i <= $last_page; $i++){
                    if($i == $page){
                        $pagination .= '<li><a class="active">'.$i.'</li></a>';
                    }else{
                        $pagination .= '<li><a class="pager" id="'.$i.'" class="">'.$i.'</li></a>';
                    }
                }

            }else if( ($page+$halfBtn) < $last_page ){

                $pagination .= '<li><a class="pager" id="'.(($page-$halfBtn) - 1).'" class="">&laquo;</li></a>';

                for($i=$page-$halfBtn; $i <= $page+$halfBtn; $i++){
                    if($i == $page){
                        $pagination .= '<li><a class="active">'.$i.'</li></a>';
                    }else{
                        $pagination .= '<li><a class="pager" id="'.$i.'" class="">'.$i.'</li></a>';
                    }
                }

                $pagination .= '<li><a class="pager" id="'.(($page+$halfBtn) + 1).'" class="">&raquo;</li></a>';

            }
            

        }

        echo $pagination;
    }
}
?>