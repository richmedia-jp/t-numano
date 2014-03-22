# 内定者課題沼野
## 進行度
* フレームワーク完成
* 例題アプリケーションの実装
* gitはsource treeで管理

## 今後の予定
* 例題アプリケーションを元にフロントの実装

### 2014/3/23
* 法事で実家に帰省
* ようやくフレームワークの土台が完成（バグだらけ）
* 例題アプリケーションを軽く実装

### 2014/3/17
* 出社
* データベースに接続するクラスの作成
* mysqlの設定
	* サーバ側のmysqlにログインできなかった
	#/etc/init.d/mysql stop 
	#mysqld_safe --skip-grant-tables
	mysql>update user set password=PASSWORD('###') where user='root' and host='localhost';
    > http://sasuke.main.jp/mysqlrootpass.html
* DB周り，セッション，Application，Controller，Viewの実装

### 2014/3/16
* Response.phpの実装

### 2014/3/15
* HCI研究会３日目
* 翼と黒ちゃんと、１kgのハンバーグを作って食べる

### 2014/3/14
* ホワイトデー
* HCI研究会２日目
* 岩本さん、平山さんと飲み

### 2014/3/13
* 研究会での発表終了
* ER図修正
* Request.phpの実装

### 2014/3/8
* パーフェクトPHPを写経
* virtualhostをいじるも、ドメイン持ってなかったので断念
* ClassLoader.php bootstrap.phpを実装

#### 今日の珍プレー好プレー
* splをsqlと打ち間違える。

### 2014/3/7
* git導入
* 「source tree」でGUIを用いてgitの理解  
> 参考url: <http://www.backlog.jp/git-guide/>
* ２つの異なるローカルリポジトリをリモートリポジトリ同期
* さくらVPSとgithubを連携  
> 参考url: <http://git-scm.com/book/ja/Git-%E3%82%B5%E3%83%BC%E3%83%90%E3%83%BC-SSH-%E5%85%AC%E9%96%8B%E9%8D%B5%E3%81%AE%E4%BD%9C%E6%88%90>

#### テスト
vpsからのコミット
