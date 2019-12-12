<?php
class User{

    public static function Auth($method){
        if($_SERVER['REQUEST_METHOD'] == $method){

            validation::post($_POST,'username')::xss()::length('Username',3,32)::isempty();
            validation::post($_POST,'email')::xss()::length('Email',3,32)::isempty()::email();
            validation::post($_POST,'password')::xss()::length('Password',3,64)::isempty()::password();

            if( validation::submit() ){
                $name  = validation::$value['username'];
                $email = validation::$value['email'];
                $pass  = validation::$value['password'];

                $data = array(
                    'table'			 => array('table' => 'users'),
                    'selectcond' => array('select' => '*'),
                    'limit' 	   => array('start' => 1),
                    'query'      => array('query' => 'username=:username OR email=:email'),
                    'wherecond'  => array('where' =>array('username' => $name, 'email' => $email))
                    );

                $query = DB::fetch($data);

                if($query){
                    foreach($query as $value){
                    $username = $value['username'];
                    $dbemail  = $value['email'];
                    }
                }

                if( !validation::verify(isset($dbemail),$email) ){

                    if( !validation::verify(isset($username),$name) ){

                        $data = array(
                            'username' => $name,
                            'email'    => $email,
                            'password' => validation::encrypt($pass)
                        );

                        $table ="users";
                        $registration = DB::insertdata($data,$table);

                        if( $registration ){

                            echo '{"message": "<div class=\\"alert alert-success\\">Success!User Registration Successfull</div>"}';

                        } else {
                            echo '{"message": "<div class=\\"alert alert-danger\\">Error!Something Went Wrong</div>"}';
                        }

                    } else {
                        echo '{"message": "<div class=\\"alert alert-danger \\">Error!Username Already In Use</div>"}';
                    } 

                } else {
                    echo '{"message": "<div class=\\"alert alert-danger\\">Email Already Taken</div>"}';
                }
            } else {
                echo '{"message": "'.validation::$error.'"}';
            }
            //echo '{"message": "working"}';
        }else{
            http_response_code(405);
        }
    }

    public static function login($method){
        if($_SERVER['REQUEST_METHOD'] == $method){

            validation::post($_POST,'username')::xss()::length('Username',3,32)::isempty();
            validation::post($_POST,'password')::xss()::length('Password',3,64)::isempty()::password();

            if( validation::submit() ){
                $name  = validation::$value['username'];
                $pass  = validation::$value['password'];

                $data = array(
                    'table'			 => array('table' => 'users'),
                    'selectcond' => array('select' => '*'),
                    'limit' 	   => array('start' => 1),
                    'query'      => array('query' => 'username=:username AND password =:password'),
                    'wherecond'  => array('where' =>array('username' => $name , 'password' => validation::encrypt($pass)))
                );
      
              $query = DB::fetch($data);
      
              if( isset($query[0][0]) > 0 ){
                $cstrong = true;
                $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
      
                $table ="login_token";
                $data = array(
                  'user_id'     => $query[0]['id'],
                  'token' => sha1($token),
                );
      
                DB::insertdata($data,$table);
      
                $cookie = setcookie('SNID', $token , time() + 60 * 60 * 24 * 7 , '/' , NULL , NULL , TRUE );
                $cookie = setcookie('SNID_', 1 , time() + 60 * 60 * 24 , '/' , NULL , NULL , TRUE );
      
                if( $cookie ){
                  echo '{"message": "Success"}';
                }
              }else{
                echo '{"message": "Login credential not correct"}';
              }
            } else {
                echo '{"message": "'.validation::$error.'"}';
            }
        }else{
            http_response_code(405);
        }
    }

    public static function profile($method){
        if($_SERVER['REQUEST_METHOD'] == $method){
            if(Session::isloggedin()){
                $data = array(
                    'table'			 => array('table' => 'users'),
                    'selectcond' => array('select' => '*'),
                    'wherecond'=> array('where' =>array('id' => Session::isloggedin()))
                );
    
                $query = DB::fetch($data);
    
                $response = "[";
                    foreach($query as $value){
                        $response .= "{";
                            $response .= '"email" : "'.$value['email'].'"';
                        $response .= "},";
                        
                    }
                    $response  = substr($response, 0, strlen($response)-1);
                echo $response .= "]";
            }else{
                echo '{"message" : "User not logged in"}';
            }  
        }else{
            http_response_code(405);
        }
    }

    public static function updtPfl($method){
        if($_SERVER['REQUEST_METHOD'] == $method){
            if(Session::isloggedin()){
                validation::post($_POST,'email')::xss()::length('Email',3,32)::email()::isempty();

                if( validation::submit() ){
                    $email  = validation::$value['email'];

                    $valdata = array(
                        'table'			 => array('table' => 'users'),
                        'selectcond' => array('select' => '*'),
                        'wherecond'=> array('where' =>array('id' => Session::isloggedin()))
                    );
        
                    $valmail = DB::fetch($valdata)[0]['email'];

                    if( !validation::verify($valmail,$email) ){
                        $requr = array(
                            'table'			 => array('table' => 'users'),
                            'wherecond'=> array('where' =>array('id' => Session::isloggedin()))
                        );
                    
                        $data = array(
                            'email' => $email
                        );
                        $update = DB::update($data,$requr);
                        if($update){
                            echo '{"message" : "Data Updated SuccessFully"}';
                        }else{
                            echo '{"message" : "Something went wrong"}';
                        }
                    }else{
                        echo '{"message" : "Old mail cant be set as new mail"}';
                    }
                    
                } else {
                    echo '{"message" : "'.validation::$error.'"}';
                }
            }else{
                echo '{"message" : "User not logged in"}';
            }
            
        }else{
            http_response_code(405);
        }
    }
    
}

?>
