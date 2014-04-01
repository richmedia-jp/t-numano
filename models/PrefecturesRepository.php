<?php

class PrefecturesRepository extends DbRepository{
	public function insert($login_name,$pref_name){
		$now = new DateTime();
		$modifiy_user_id = $this->userIdGetFromUserName($login_name);
		var_dump($modifiy_user_id);
		$sql = "
			INSERT INTO status(modifiy_user_id,pref_name,created,modified)
			VALUES(:modifiy_user_id,:pref_name,:created,modified)
			";

		$stmt = $this->execute($sql,array(
			':modifiy_user_id'		=>  $modifiy_user_id,
			':pref_name'			=>  $pref_name,
			':created'				=>	$now->format('Y-m-d H:i:s'),
			':modified'				=>	$now->format('Y-m-d H:i:s'),
			));
	}

	public function fetchAllPersonalArchivesByUserId($modifiy_user_id){
		$sql = "
			SELECT a.*, u.user_name
				FROM status a 
					LEFT JOIN user u ON a.modifiy_user_id = u.id
				WHERE u.id = :modifiy_user_id
				ORDER BY a.created_at DESC
		";

		return $this->fetchAll($sql,array(':modifiy_user_id' => $modifiy_user_id));
	}

	public function userIdGetFromUserName($login_name){
		$sql = "SELECT id as count FROM users WHERE login_name = :login_name";
		$row = $this->fetch($sql,array(':login_name' => $login_name));
		return $row;
	}

	public function testrecord($login_name){
		$modifiy_user_id = $this->userIdGetFromUserName($login_name);
	}

}