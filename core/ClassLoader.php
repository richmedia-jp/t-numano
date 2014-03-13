<?php

/*
クラス名：ClassLoader
役割：クラスの読み込みを自動化する処理
参考：http://www.php.net/manual/ja/language.oop5.autoload.php
*/
//以下写経

class ClassLoader{
	protected $dirs;

	public function register(){
		spl_autoload_register(array($this,'loadClass'));
	}

	public function registerDir($dir){
		$this->dirs[] = $dir;
	}

	public function loadClass($class){
		foreach($this->dirs as $dir){
			$file = $dir.'/'.$class.'.php';
			if(is_readable($file)){
				require $file;
				return;
			}
		}
	}
}

/*
暇があれば関数の説明などをメモしておく
オートロードの実装に関してはパーフェクトPHPの147~148に凄く分かりやすく書いてある。
●このファイルの意味：クラスのオートロード
オブジェクト指向アプリケーションを作成する開発者の多くは、 クラス定義毎に一つのPHPソースファイルを作成します。 
最大の問題は、各スクリプトの先頭に、必要な読み込みを行う長いリストを 記述する必要があることです(各クラスについて一つ)。
PHP 5では、これはもう不要です。
未定義のクラス/インターフェイスを使用しようとした時に 自動的にコールされる __autoload() 関数を定義することができます。 
この関数をコールすることにより、 スクリプトエンジンは、PHPがエラーで止まる前にクラスをロードできる。
ヒント：
spl_autoload_register() を使えば、より柔軟にクラスのオートロードができます。 
そのため、今や __autoload() を使うことはおすすめできません。 
将来のバージョンではこの機能が非推奨となり、削除されるかもしれません。

参考：http://www.php.net/manual/ja/language.oop5.autoload.php




*/