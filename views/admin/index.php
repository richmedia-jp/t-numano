<?php $this->setLayoutVar('title','管理画面トップ');?>
<h2>管理画面トップ</h2>
<p>
	ようこそ: <strong><?php echo $this->escape($user['login_name']); ?></strong>さん
</p>
<p>
	<a href="<?php echo $base_url; ?>/admin/logout">ログアウト</a>
</p>