<?php

class BeautyrankApplication extends Application{
	public function getRootDir(){
		return dirname(__FILE__);
	}

	protected function registerRoutes(){
		return array(
			'/'			=> array('controller'=>'top','action'=>'index'),

			);
	}

	protected function configure(){
		$this->db_manager->connect('master',array(
			'dsn'		=>	'mysql:dbname=naiteikadai;host=localhost',
			'user'		=>	'numa',
			'password'	=>	'naiteikadaidatabase',
		));
	}
}