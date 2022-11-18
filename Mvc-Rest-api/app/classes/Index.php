<?php
class Index{
    public static function construct(){
        Session::chklogin();
        Route::view('inc/header');
        Route::view('login');
    }

    public static function work(){
        echo "working";
    }

    public static function home($page = NULL){
        $data = array();
        $data['page'] = $page;

        Session::chklogout();
        Route::view('inc/header');
        Route::view('home',$data);
        Route::view('inc/footer');
    }

    public static function profile(){
        Session::chklogout();
        Route::view('inc/header');
        Route::view('profile');
        Route::view('inc/footer');
    }

    public static function logout(){
        Session::logout();
    }

    public static function login(){
        Session::chklogin();
        Route::view('inc/header');
        Route::view('login');
    }

    public static function signup(){
        Session::chklogin();
        Route::view('inc/header');
        Route::view('signup');
    }
}
?>