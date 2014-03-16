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
		if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
			return true;
		}
		return false;
	}

	public function getRequestUri(){
		return $_SERVER['REQUEST_URI'];
	}

	//追記3/13
	public function getBaseUrl(){
		$script_name = $_SERVER['SCRIPT_NAME'];
		$request_uri = $this->getRequestUri();

		if(0 === strpos($request_uri,dirname($script_name))){
			return $script_name;
		}else if (0 === strpos($request_uri,dirname($script_name))){
			return rtrim(dirname($script_name),'/');
		}

		return '';
	}

	public function getPathInfo(){
		$base_url = $this->getBaseUrl();
		$request_uri = $this->getRequestUri();

		if(false != ($pos = strpos($request_uri,'?'))){
			$request_uri = substr($request_uri,0,$pos);
		}

		$path_info = (string)substr($request_uri,strlen($base_url));

		return $path_info;
	}
}
/*
//出力の確認
$output = new Request();
echo $output->getRequestUri();
echo $output->getHost();
*/
/*
サーバーに対するリクエストを処理する
・$_SERVER['REQUEST_METHOD']でPOSTかどうか判断
・$_SERVER['HTTP_HOST']でホストを判断。リクエストに含まれない場合は$_SERVER['SERVER_NAME']←アパッチ側に設定されてるホスト名
・$_SERVER['REQUEST_URI']でリクエストされたURLのホスト以降の部分が帰ってくる

*/
