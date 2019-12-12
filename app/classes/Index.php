<?php
class Index{
    public static function construct(){
        Session::chklogout();
        Route::view('inc/header');
        Route::view('home');
        Route::view('inc/footer');
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
        Route::view('inc/footer');
    }

    public static function signup(){
        Session::chklogin();
        Route::view('inc/header');
        Route::view('signup');
        Route::view('inc/footer');
    }
}
?>