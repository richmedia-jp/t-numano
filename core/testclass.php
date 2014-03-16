<?php
	class Employee{
		public $name;
		private $state ="働いている";

		public function getState(){
			return $this->state;
		}

		public function setState($in_state){
			$this->state = $in_state;
		}

		public function work(){
			echo '働いています';
		}
	}

$yamada = new Employee();
$yamada->name ='山田';
echo $yamada->getState();
$yamada->setState('休んでいます');
echo $yamada->getState();

$yamada->work();


class Employee2{
	public $name;
	public static $company ="技術評論社";
}
//newしなくてもstaticは呼び出せる
echo Employee2::$company;



class Employee3{
	const WORKER = 0x01;
	const OWNER = 0x02;
	const DISPENSER = 0x03;

	private $name;
	private $type;
	
	public function __construct($name,$type){
		$this->name = $name;
		$this->type = $type;
	}

	public function getname(){
		$this->addname();
		return $this->name;

	}

	private function addname(){
		$this->name = $this->name.'add name';
	}

}

$tarou = new Employee3('tarou',Employee3::WORKER);
echo '<br>';
echo $tarou->getname(); 