<?php
class Main{
	public static $url;
	public static $Controller = "Index";
	public static $Path       = "classes/";
	public static $Method     = "construct";
	public static $BASE		  = "https://localhost";
	public static $ctlr;
	public static $param;

	public static function construct(){
		self::getUrl();
		self::loadCtlr();
		self::loadMethod();
	}

	public static function getUrl(){
		self::$url = isset($_GET['url']) ? $_GET['url'] : NULL;
		if(self::$url != NULL){
            self::$url = rtrim(self::$url, "/");
			self::$url = explode('/' , self::$url);
		}
	}
    
	public static function loadCtlr(){
		if(!isset(self::$url[0])){
			require self::$Path.self::$Controller.".php";
		}else{
			self::$Controller = ucfirst(self::$url[0]);
			$fileName = self::$Path.self::$Controller.".php";
			if(file_exists($fileName)){
				require $fileName;
				if(class_exists(self::$Controller)){
					self::$ctlr = self::$Controller;
				}else{
					header("Location: ". self::$BASE );
				}
			}else{
				header("Location: ". self::$BASE );
			}
		}
	}

	public static function loadMethod(){
		self::$Method = isset(self::$url[1]) ? self::$url[1] : self::$Method;

		if(isset(self::$url[2])){
			$type = strtoupper(self::$url[2]);
		}

		if(method_exists(self::$Controller, self::$Method)){

			if(isset(self::$url[4])){

				self::$ctlr::{self::$Method}($type,self::$url[3],self::$url[4]);

			}else if(isset(self::$url[3])){

				self::$ctlr::{self::$Method}($type,self::$url[3]);

			}else if(isset($type)){

				self::$ctlr::{self::$Method}($type);

			}else{

				self::$ctlr::{self::$Method}('GET');

			}

		}else{
			header("Location: ". self::$BASE );
		}
	}

}

?>
