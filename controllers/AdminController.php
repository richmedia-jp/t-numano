<?php

class AdminController extends Controller{
	public function signupAction(){
		return $this->render(array(
			'login_name'	=> '',
			'pass'			=> '',
			'_token'		=> $this->generateCsrfToken('admin/signup'),
			));
	}

	public function registerAction(){
		if(!$this->request->isPost()){
			$this->forward404();
		}

		$token = $this->request->getPost('_token');
		if(!$this->checkCsrfToken('admin/signup',$token)){
			return $this->redirect('signup');
		}

		$login_name = $this->request->getPost('login_name');
		$pass		= $this->request->getPost('pass');

		$errors		= array();

		if(!strlen($login_name)){
			$errors[] = 'ユーザ名を入力してください';
		}else if (!preg_match('/^\w{3,50}$/', $login_name)){
			$errors[] = 'ユーザIDは半角英数字およびアンダースコアを3~50文字で入力してください';
		}else if (!$this->db_manager->get('Users')->isUniqueUserName($login_name)){
			$errors[] = $login_name.' は既に使用されています';
		}

		if(!strlen($pass)){
			$errors[] = 'パスワードを入力してください';
		}else if(4 > strlen($pass) || strlen($pass) > 30){
			$errors[] = 'パスワードは4~30文字以内で入力してください';
		}

		if(count($errors) === 0){
			$this->db_manager->get('Users')->insert($login_name,$pass);
			$this->session->setAuthenticated(true);

			$user = $this->db_manager->get('Users')->fetchByUserName($login_name);
			$this->session->set('user',$user);

			return $this->redirect('/');
		}

		return $this->render(array(
			'login_name'	=> $login_name,
			'pass'			=> $pass,
			'errors'		=> $errors,
			'_token'		=> $this->generateCsrfToken('admin/signup'),
			),
		'signup');
	}

	public function indexAction(){
		$user = $this->session->get('user');
		return $this->render(array('user'=>$user));
	}

	public function loginAction(){
		if($this->session->isAuthenticated()){
			return $this->redirect('/account');
		}
		return $this->render(array(
			'login_name'	=> '',
			'pass'			=> '',
			'_token'		=> $this->generateCsrfToken('admin/login'),
			));
	}

	public function logoutAction(){
		$this->session->clear();
		$this->session->setAuthenticated(false);

		return $this->redirect('login');
	}

	public function authenticateAction(){
		if($this->session->isAuthenticated()){
			return $this->redirect('/admin');
		}

		if(!$this->request->isPost()){
			$this->forward404();
		}

		$token = $this->request->getPost('_token');
		if(!$this->checkCsrfToken('admin/login',$token)){
			return $this->redirect('admin/login');
		}

		$login_name = $this->request->getPost('login_name');
		$pass		= $this->request->getPost('pass');

		$errors = array();

		if(!strlen($login_name)){
			$errors[] = 'ユーザ名を入力してください';
		}

		if(!strlen($pass)){
			$errors[] = 'パスワードを入力してください';
		}
		
		if(count($errors) === 0){
			$user_repository = $this->db_manager->get('Users');
			$user = $user_repository->fetchByUserName($login_name);

			if(!$user || ($user['pass'] !== $user_repository->hashPassword($pass))){
				$errors[] = 'ユーザ名かパスワードが不正です';
			}else{
				$this->session->setAuthenticated(true);
				$this->session->set('user',$user);

				return $this->redirect('/');
			}
		}

		return $this->render(array(
			'login_name' 	=> $login_name,
			'pass'			=> $pass,
			'errors'		=> $errors,
			'_token'		=> $this->generateCsrfToken('admin/login'),
			),'login');
	}

}

/*
ふと思った
cakePHPではリポジトリにアクセスする際に$this->User->read()みたいな感じでアクセスするけど...
その方が良いような気もする．
private $User;
private function setUserDB(){
	$User = $this->db_manager->get('Users');
}
ってやると、必要なところでsetUserDB()を呼んだ後に
$this->User->hashPassword()の様に使える気がした。
そもそもよく使うから「get」みたいな名前の付け方はよくないと思う。（本への不満）
結局getの意味が「得る」ではなく、データベースに接続するという意味っぽいので・・・
*/