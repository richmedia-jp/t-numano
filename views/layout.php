<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<title><?php if(isset($title)):echo $this->escape($title).' - '; endif; ?> beauty ranking</title>
		<link rel="stylesheet" type="text/css" href="<?php echo str_replace('/index.php', '/web', $base_url );?>/css/style.css">
	</head>
	<body>
		<header>
			<h1><a href="<?php echo $base_url; ?>" >Beauty Ranking</a></h1>
		</header>
		<nav>
			<ul>
				<li><a href="<?php echo $base_url; ?>/ranking">ランキング</a></li>
				<li><a href="<?php echo $base_url; ?>/recommend">おすすめ</a></li>
				<li><a href="<?php echo $base_url; ?>/area">エリア</a></li>
				<li><a href="<?php echo $base_url; ?>/freeword">フリーワード検索</a></li>
			</ul>
		</nav>
		<div id="Main">
			<?php echo $_content ?>
		</div>
		<div id="Sidevar">
		</div>	
		<footer>
		</footer>
	</body>
</html>