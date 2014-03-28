<?php

class UsersRepository extends DbRepository{
	//データベースに登録する関数
	public function insert($login_name,$pass){
		$pass = $this->hashPassword($pass);
		$now = new DateTime();

		$sql = "INSERT INTO users(login_name,pass,created,modified)
				VALUES(:login_name,:pass,:created,:modified)
				";
		//$this->executeでsqlの中身を実際に入れるだけでなく、PDO::executeも実行するようにしている
		$stmt = $this->execute($sql,array(
			':login_name' 	=> $login_name,
			':pass'			=> $pass,
			':created'		=> $now->format('Y-m-d H:i:s'),
			':modified'		=> $now->format('Y-m-d H:i:s'),
			));
	}

	//パスワードをハッシュ化、追加する文字列は適当
	public function hashPassword($pass){
		return sha1($pass.'hyfdf4i405');
	}

	//AdminControllerで使用する関数、ユーザ名を元にレコードを取得
	public function fetchByUserName($login_name){
		$sql = "SELECT * FROM users WHERE login_name = :login_name";
		return $this->fetch($sql,array(':login_name' => $login_name));
	}

	//真偽値で返る関数はisを前につける。ユーザ名に一致するレコードが無ければtrue
	public function isUniqueUserName($login_name){
		$sql = "SELECT COUNT(id) as count FROM users WHERE login_name = :login_name";
		$row = $this->fetch($sql,array(':login_name' => $login_name));
		if($row['count'] === '0'){
			return true;
		}
		return false;
	}
}

//usersテーブル
/*
+------------+------------------+------+-----+---------+----------------+
| Field      | Type             | Null | Key | Default | Extra          |
+------------+------------------+------+-----+---------+----------------+
| id         | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
| login_name | varchar(255)     | NO   |     | NULL    |                |
| pass       | varchar(255)     | NO   |     | NULL    |                |
| created    | datetime         | YES  |     | NULL    |                |
| modified   | datetime         | YES  |     | NULL    |                |
+------------+------------------+------+-----+---------+----------------+
*/