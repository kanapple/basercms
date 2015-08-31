<?php

/**
 * Favoriteモデルのテスト
 *
 * コンソールから実行する場合、 --stderr フラグをつける必要があります。 
 * そうしないと、セッションが動作しない原因となります。 
 * PHPUnitはデフォルトでは標準出力にテストの進行状況を出力しますが、
 * これによってPHPはヘッダが送信されたと認識するため、セッションの開始が妨害されます。
 * PHPUnitの出力先を標準エラーに切り替えることで、この問題を避けることができます。 
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2015, baserCMS Favorites Community <http://sites.google.com/site/baserFavorites/>
 *
 * @copyright   Copyright 2008 - 2015, baserCMS Favorites Community
 * @link      http://basercms.net baserCMS Project
 * @since     baserCMS v 3.0.0-beta
 * @license     http://basercms.net/license/index.html
 */
App::uses('Favorite', 'Model');
App::uses('SessionComponent', 'Controller/Component');
App::uses('ComponentCollection', 'Controller/Component');
App::uses('CookieComponent', 'Controller/Component');

/**
 * FavoriteTest class
 * 
 * class NonAssosiationFavorite extends Favorite {
 *  public $name = 'Favorite';
 *  public $belongsTo = array();
 *  public $hasMany = array();
 * }
 * 
 * @package Baser.Test.Case.Model
 */
class FavoriteTest extends BaserTestCase {

  public $fixtures = array(
    'baser.Default.User',
    'baser.Default.UserGroup',
    'baser.Default.Favorite',
    'baser.Default.Permission',
  );

  public $components = array("Auth","Cookie","Session");

  public function setUp() {
    parent::setUp();
    $this->Favorite = ClassRegistry::init('Favorite');
  }

  public function tearDown() {
    unset($this->Favorite);
    parent::tearDown();
  }

/**
 * 偽装ログイン処理
 * 
 * @param $id ユーザーIDとユーザーグループID
 * - 1 システム管理者
 * - 2 サイト運営
 */
  public function login($id) {
    $Session =  new SessionComponent(new ComponentCollection());
    $this->Favorite->setSession($Session);
    $this->Favorite->_Session->write('Auth.User.id', $id);
    $this->Favorite->_Session->write('Auth.User.user_group_id', $id);
  }

/**
 * validate
 */
  public function test権限チェック異常系() {
    $this->Favorite->create(array(
      'Favorite' => array(
        'url' => '/admin/hoge',
      )
    ));

    $this->login(2);

    $this->assertFalse($this->Favorite->validates());
    $this->assertArrayHasKey('url', $this->Favorite->validationErrors);
    $this->assertEquals('このURLの登録は許可されていません。', current($this->Favorite->validationErrors['url']));
  }

  public function test権限チェックシステム管理者正常系() {
    $this->Favorite->create(array(
      'Favorite' => array(
        'url' => '/admin/hoge',
      )
    ));

    $this->login(1);

    $this->assertTrue($this->Favorite->validates());
  }

  public function test権限チェックサイト運営者正常系() {
    $this->Favorite->create(array(
      'Favorite' => array(
        'url' => '/hoge',
      )
    ));

    $this->login(2);

    $this->assertTrue($this->Favorite->validates());
  }

}