<?php
/* SVN FILE: $Id$ */
/**
 * [PUBLISH] サイト内検索フォーム
 * 
 * PHP versions 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2008 - 2012, baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			baser.views
 * @since			baserCMS v 0.1.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://basercms.net/license/index.html
 */
if(!empty($this->passedArgs['num'])) {
	$url = array('plugin' => null, 'controller' => 'contents', 'num' => $this->passedArgs['num']);
} else {
	$url = array('plugin' => null, 'controller' => 'contents');
}
?>
<div class="section search-box">
<?php echo $bcForm->create('Content', array('type' => 'get', 'action' => 'search', 'url' => $url)) ?>
<?php if(unserialize($bcBaser->siteConfig['content_categories'])) : ?>
<?php echo $bcForm->input('Content.c', array('type' => 'select', 'options' => unserialize($bcBaser->siteConfig['content_categories']), 'empty' => 'カテゴリ： 指定しない　')) ?>
<?php endif ?>
<?php echo $bcForm->input('Content.q') ?>
<?php echo $bcForm->submit('検索', array('div'=>false)) ?>
<?php echo $bcForm->end() ?>
</div>