<?php

class TopController extends Controller{
	public function indexAction(){
		$hoge = 'ほげほげ';
		return $this->render(array(
			'hoge'	=> $hoge,
			));
	}
}