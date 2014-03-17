<?php
/*
DbManagerクラス
*/

class DbManager{
	protected $connections = array();

	public function connect($name,$params){
		$params = array_merge(array(
			'dsn'		=> null,
			'user'		=> '',
			'password'	=> '',
			'options'	=> array(),
		),$params);

		$con = new PDO(
			$params['dsn'],
			$params['user'],
			$params['password'],
			$params['options']
		);
		$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$this->connections[$name] = $con;
	}

	public function getConnection($name = null){
		if(is_null($name)){
			return current($this->connections);
		}
		return $this->connections[$name];
	}
}
/*出力テスト
$test_array = array();
$dbmanager = new DbManager();
echo $dbmanager->connect('name',$test_array);
*/
$db_manager = new DbManager();
$db_manager->connect('master',array(
	'dsn' =>'mysql:dbname=naiteikadai;host=localhost',
	'user'=>'numa',
	'password'=>'naiteikadaidatabase',
));
$db_manager->getConnection('master');
 var_dump($db_manager->getConnection());
