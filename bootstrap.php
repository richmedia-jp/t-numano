<?php
/*
bootstrap = アプリケーションを立ち上げる
*/
//オートローダーを読み込む
require 'core/ClassLoader.php';

$loader = new ClassLoader();
$loader->registerDir(dirname(__File__.'/core'));
$loader->registerDir(dirname(__File__.'/models'));
$loader->register();

/*
dirname(__File__.'/core')はディレクトリまでのフルパス
echo  dirname(__File__.'/core');

*/