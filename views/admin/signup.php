<?php $this->setLayoutVar('title','管理者登録'); ?>
<h2>管理者登録</h2>
<p><a href="<?php echo $base_url; ?>/admin/login">ログイン</a></p>
<form action="<?php echo $base_url; ?>/admin/register" method="post">
	<input type="hidden" name="_token" value="<?php echo $this->escape($_token); ?>"/>
	<?php if(isset($errors) && count($errors) > 0): ?>
	<?php echo $this->render('errors',array('errors'=>$errors)); ?>
	<ul class="error_list">
		<?php foreach($errors as $error):?>
		<li><?php echo $this->escape($error); ?></li>
		<?php endforeach; ?>
	</ul>
	<?php endif;?>
	<?php echo $this->render('admin/inputs',array('login_name'=>$login_name,'pass'=>$pass)); ?>
	<p>
		<input type="submit" value="登録">
	</p>
</form>