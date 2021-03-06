<?php
/* SVN FILE: $Id$ */
/**
 * baserCMS設定ファイル
 *
 * PHP versions 4 and 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2008 - 2012, baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			baser.config
 * @since			baserCMS v 0.1.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://basercms.net/license/index.html
 */
/**
 * アプリケーション基本設定
 */
	$config['BcApp'] = array(
		// デフォルトタイトル設定（インストールの際のエラー時等DB接続まえのエラーで利用）
		'title'				=> 'コーポレートサイトにちょうどいいCMS - baserCMS - ',
		// 管理システムテーマ
		'adminTheme'		=> 'baseradmin',
		// テンプレートの基本となる拡張子（.php 推奨）
		'templateExt'		=> '.php',
		// システムナビ
		'adminNavi'		=> array('core' => array(
			'name'		=> 'baserCMSコア',
			'contents'	=> array(
				array('name' => '固定ページ一覧',			'url' => array('admin' => true, 'plugin' => null, 'controller' => 'pages', 'action' => 'index')),
				array('name' => 'ウィジェット管理',		'url' => array('admin' => true, 'plugin' => null, 'controller' => 'widget_areas', 'action' => 'index')),
				array('name' => 'テーマ管理',				'url' => array('admin' => true, 'plugin' => null, 'controller' => 'themes', 'action' => 'index')),
				array('name' => 'プラグイン管理',			'url' => array('admin' => true, 'plugin' => null, 'controller' => 'plugins', 'action' => 'index')),
				array('name' => 'システム設定',			'url' => array('admin' => true, 'plugin' => null, 'controller' => 'site_configs', 'action' => 'form')),
				array('name' => 'ユーザー一覧',			'url' => array('admin' => true, 'plugin' => null, 'controller' => 'users', 'action' => 'index')),
				array('name' => 'ユーザー登録',			'url' => array('admin' => true, 'plugin' => null, 'controller' => 'users', 'action' => 'add')),
				array('name' => 'ユーザーグループ一覧',		'url' => array('admin' => true, 'plugin' => null, 'controller' => 'user_groups', 'action' => 'index')),
				array('name' => 'ユーザーグループ登録',		'url' => array('admin' => true, 'plugin' => null, 'controller' => 'user_groups', 'action' => 'add')),
				array('name' => '検索インデックス管理',		'url' => array('admin' => true, 'plugin' => null, 'controller' => 'contents', 'action' => 'index')),
				array('name' => 'メニュー管理',			'url' => array('admin' => true, 'plugin' => null, 'controller' => 'global_menus', 'action' => 'index')),
				array('name' => 'メニュー登録',			'url' => array('admin' => true, 'plugin' => null, 'controller' => 'global_menus', 'action' => 'add')),
				array('name' => 'サーバーキャッシュ削除',	'url' => array('admin' => true, 'plugin' => null, 'controller' => 'site_configs', 'action' => 'del_cache')),
				array('name' => 'データメンテナンス',		'url' => array('admin' => true, 'plugin' => null, 'controller' => 'tools', 'action' => 'maintenance')),
				array('name' => '環境情報',				'url' => array('admin' => true, 'plugin' => null, 'controller' => 'site_configs', 'action' => 'info')),
				array('name' => 'クレジット',				'url' => 'javascript:credit()')
		)))
	);
/**
 * 環境設定 
 */
	$config['BcEnv'] = array(
		// プラグインDBプレフィックス
		'pluginDbPrefix'	=> 'pg_',
	);
/**
 * 文字コード設定
 */
	$config['BcEncode'] = array(
		// 文字コードの検出順
		'detectOrder'	=> 'ASCII,JIS,UTF-8,SJIS-win,EUC-JP',
	);
/**
 * キャッシュ設定 
 */
	$config['BcCache'] = array(
		// 標準キャッシュ時間
		'defaultCachetime'	=> '1 month',
		// モデルデータキャッシュ時間
		'dataCachetime'		=> '1 month'
	);
/**
 * 認証プレフィックス設定
 */
	$adminPrefix = Configure::read('Routing.admin');
	$config['BcAuthPrefix'] = array(
		// 管理画面
		'admin' => array(
			'prefix'		=> 'admin',
			'alias'			=> $adminPrefix,
			// 認証後リダイレクト先
			'loginRedirect'	=> '/'.$adminPrefix,
			// ログイン画面タイトル
			'loginTitle'	=> '管理システムログイン',
			'loginAction'	=> '/'.$adminPrefix.'/users/login'
		),
		// マイページ
		/*'mypage' => array(
			'alias'			=> 'mypage',
			'prefix'		=> 'mypage',
			'loginRedirect'=>'/mypage/users/index',
			'loginTitle'=>'マイページログイン',
			'userModel'		=> 'User',
			'loginAction'	=> '/mypage/users/login'
		),*/
		// モバイルマイページ
		/*'mobile_mypage' => array(
			'alias'			=> 'mobile_mypage',
			'prefix'		=> 'mobile_mypage',
			'loginRedirect'=>'/m/mypage/users/index',
			'loginTitle'=>'マイページログイン',
			'userModel'		=> 'User',
			'loginAction'	=> '/m/mypage/users/login',
			'userScope'		=> array('User.user_group_id' => 1)
		)*/
	);
/**
 * Eメール設定
 */
	$config['BcEmail'] = array(
		// 改行コード
		'lfcode' => "\n"
	);
/**
 * エージェント設定
 */
	$config['BcAgent'] = array(
		'mobile'	=> array(
			'alias'	=> 'm',
			'prefix'=> 'mobile',
			'autoRedirect'	=> true,
			'autoLink'		=> true,
			'agents'	=> array(
				'Googlebot-Mobile',
				'Y!J-SRD',
				'Y!J-MBS',
				'DoCoMo',
				'SoftBank',
				'Vodafone',
				'J-PHONE',
				'UP.Browser'
			),
			'sessionId'	=> true
		),
		'smartphone'	=> array(
			'alias'		=> 's',
			'prefix'	=> 'smartphone',
			'autoRedirect'	=> true,
			'agents'	=> array(
				'iPhone',         // Apple iPhone
				'iPod',           // Apple iPod touch
				'Android',        // 1.5+ Android
				'dream',          // Pre 1.5 Android
				'CUPCAKE',        // 1.5+ Android
				'blackberry9500', // Storm
				'blackberry9530', // Storm
				'blackberry9520', // Storm v2
				'blackberry9550', // Storm v2
				'blackberry9800', // Torch
				'webOS',          // Palm Pre Experimental
				'incognito',      // Other iPhone browser
				'webmate'         // Other iPhone browser
			)
		)
	);
/**
 * １系互換用ヘルパ設定 
 * 
 * １系のヘルパをそのまま利用する場合は、下記の定数を１系のヘルパ名に書き換えてください。
 * 但し、１系のヘルパは非推奨となりますので利用箇所のヘルパを全て書き換えた後、下記設定を元に戻して下さい。
 */
	define('BC_BASER_HELPER'		, 'BcBaser');		// （１系：Baser		/ ２系：BcBaser）
	define('BC_BASER_ADMIN_HELPER'	, 'BcAdmin');		// （１系：BaserAdmin	/ ２系：BcAdmin）
	define('BC_ARRAY_HELPER'		, 'BcArray');		// （１系：Array		/ ２系：BcArray）
	define('BC_CKEDITOR_HELPER'		, 'BcCkeditor');	// （１系：Array		/ ２系：BcArray）
	define('BC_CSV_HELPER'			, 'BcCsv');			// （１系：Csv		/ ２系：BcCsv）
	define('BC_FORM_HELPER'			, 'BcForm');		// （１系：FormEx		/ ２系：BcForm）
	define('BC_FREEZE_HELPER'		, 'BcFreeze');		// （１系：Freeze		/ ２系：BcFreeze）
	define('BC_GOOGLEMAPS_HELPER'	, 'BcGooglemaps');	// （１系：Googlemaps	/ ２系：BcGooglemaps）
	define('BC_HTML_HELPER'			, 'BcHtml');		// （１系：HtmlEx		/ ２系：BcHtml）
	define('BC_MOBILE_HELPER'		, 'BcMobile');		// （１系：Mobile		/ ２系：BcMobile）
	define('BC_PAGE_HELPER'			, 'BcPage');		// （１系：Page		/ ２系：BcPage）
	define('BC_TEXT_HELPER'			, 'BcText');		// （１系：TextEx		/ ２系：BcText）
	define('BC_TIME_HELPER'			, 'BcTime');		// （１系：TimeEx		/ ２系：BcTime）
	define('BC_UPLOAD_HELPER'		, 'BcUpload');		// （１系：Upload		/ ２系：BcUpload）
	define('BC_XML_HELPER'			, 'BcXml');			// （１系：XmlEx		/ ２系：BcXml）
	
?>