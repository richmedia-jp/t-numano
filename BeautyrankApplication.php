<?php

class BeautyrankApplication extends Application{
	public function getRootDir(){
		return dirname(__FILE__);
	}


	protected function registerRoutes(){
		return array(
			'/'					=> array('controller'=>'top','action'=>'index'),
			'/admin'			=> array('controller'=>'admin','action'=>'index'),
			'/admin/:action'	=> array('controller'=>'admin'),

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