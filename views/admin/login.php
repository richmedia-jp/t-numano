<?php $this->setLayoutVar('title','ログイン');?>

<h2>ログイン</h2>
<p>
	<a href="<?php echo $base_url; ?>/admin/signup">新規管理ユーザ登録</a>
</p>
<form action="<?php echo $base_url; ?>/admin/authenticate" method="post">
	<input type="hidden" name="_token" value="<?php echo $this->escape($_token); ?>"/>
	<?php if(isset($errors) && count($errors) > 0) : ?>
	<?php echo $this->render('errors',array('errors' => $errors)); ?>
	<?php endif; ?>

	<?php echo $this->render('admin/inputs',array('login_name'=>$login_name,'pass'=>$pass,)); ?>

	<p>
		<input type="submit" value="ログイン" />
	</p>
</form>