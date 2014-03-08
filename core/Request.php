<?php

class Request{
	public function isPost(){
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			return true;
		}
		return false;
	}

	public function getGet($name,$default = null){
		if(isset($_GET[$name])){
			return $_GET[$name];
		}
		return $default;
	}

	public function getPost($name,$default = nul){
		if(isset($_POST[$name])){
			return $_POST[$name];
		}
		return $default;
	}

	public function getHost(){
		if(!empty($_SERVER['HTTP_HOST'])){
			return $_SERVER['HTTP_HOST'];
		}
		return $_SERVER['SERVER_NAME'];
	}

	public function isSsl(){
		if(isset($_SERVER['HTTPS'] && $_SERVER['HTTPS']=='on')){
			return true;
		}
		return false;
	}

	public function getRequestUri(){
		return $_SERVER['REQUEST_URI'];
	}
}

/*
サーバーに対するリクエストを処理する
・$_SERVER['REQUEST_METHOD']でPOSTかどうか判断
・$_SERVER['HTTP_HOST']でホストを判断。リクエストに含まれない場合は$_SERVER['SERVER_NAME']←アパッチ側に設定されてるホスト名
・$_SERVER['REQUEST_URI']でリクエストされたURLのホスト以降の部分が帰ってくる

*/
