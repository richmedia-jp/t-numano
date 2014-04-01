<?php $this->setLayoutVar('title','管理画面トップ');?>
<h2>管理画面トップ</h2>
<p>
	ようこそ: <strong><?php echo $this->escape($user['login_name']); ?></strong>さん
</p>
<p>
	<a href="<?php echo $base_url; ?>/admin/logout">ログアウト</a>
</p>

<form action="<?php echo $base_url; ?>/admin/prefregister" method="post">
	<input type="hidden" name="_token" value="<?php echo $this->escape($_token); ?>"/>
	<?php if(isset($errors) && count($errors) > 0): ?>
	<?php echo $this->render('errors',array('errors'=>$errors)); ?>
	<ul class="error_list">
		<?php foreach($errors as $error):?>
		<li><?php echo $this->escape($error); ?></li>
		<?php endforeach; ?>
	</ul>
	<?php endif;?>
<ul class="insertTest">
	<li>県名：<input type="text" name="prefecture" value="<?php echo $this->escape($login_name);?>"/> </li>
</ul>	
	<p>
		<input type="submit" value="登録">
	</p>
</form>
