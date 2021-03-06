<?php
/* SVN FILE: $Id$ */
/**
 * [ADMIN] ツールバー
 *
 * PHP versions 4 and 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2008 - 2012, baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			baser.views
 * @since			baserCMS v 2.0.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://basercms.net/license/index.html
 */
$publishTheme = $bcBaser->BcHtml->themeWeb;
if($this->name != 'Installations') {
	$bcBaser->BcHtml->themeWeb = 'themed/'.$bcBaser->siteConfig['admin_theme'].'/';
	$bcBaser->Javascript->themeWeb = 'themed/'.$bcBaser->siteConfig['admin_theme'].'/';
}
$bcBaser->js(array('outerClick','jquery.fixedMenu', 'yuga'));
?>
<script type="text/javascript">
$(function(){
	$('#UserMenu').fixedMenu();
	$('#SystemMenu h2').click(function(){
		if($(this).next().css('display')=='none') {
			$(this).next().slideDown(200);
		} else {
			$(this).next().slideUp(200);
		}
	});
	$('#SystemMenu ul:first').show();
	$("#UserMenu ul li div ul li").each(function(){
		if(!$(this).html()) {
			$(this).remove();
		}
	});
});
</script>

<div id="ToolBar">		
	<div id="ToolbarInner" class="clearfix">
		<div id="ToolMenu">
			<ul>
				<?php if($this->name == 'Installations'): ?>
				<li><?php $bcBaser->link('インストールマニュアル', 'http://basercms.net/manuals/introductions/4.html', array('target' => '_blank')) ?></li>
				<?php elseif(empty($this->params['admin'])): ?>
				<li><?php $bcBaser->link($bcBaser->getImg('admin/btn_logo.png', array('alt' => 'baserCMS管理システム', 'class' => 'btn')), '/admin', array('title' => 'baserCMS管理システム')) ?></li>
				<?php else: ?>
				<li><?php $bcBaser->link($bcBaser->siteConfig['name'], '/') ?></li>
				<?php endif ?>
				<?php if($bcBaser->existsEditLink()): ?>
				<li><?php $bcBaser->editLink() ?></li>
				<?php endif ?>
				<?php if($bcBaser->existsPublishLink()): ?>
				<li><?php $bcBaser->publishLink() ?></li>
				<?php endif ?>
				<?php if(!empty($this->params['admin']) && $this->params['url']['url'] != 'admin/users/login'): ?>
					<?php if(Configure::read('debug') == -1): ?>
				<li>&nbsp;&nbsp;<span class="corner5" id="DebugMode" title="インストールモードです。運営を開始する前にシステム設定よりノーマルモードに戻しましょう。">インストールモード</span>&nbsp;&nbsp;</li>
					<?php elseif(Configure::read('debug') > 0): ?>
				<li>&nbsp;&nbsp;<span class="corner5" id="DebugMode" title="デバッグモードです。運営を開始する前にシステム設定よりノーマルモードに戻しましょう。">デバッグモード<?php echo mb_convert_kana(Configure::read('debug'), 'N') ?></span>&nbsp;&nbsp;</li>
					<?php endif; ?>
				<?php endif ?>
			</ul>
		</div>
		<div id="UserMenu">
			<ul class="clearfix">
				<li>
<?php if(!empty($user)): ?>
					<?php $bcBaser->link($user['real_name_1']." ".$user['real_name_2'].' '.$bcBaser->getImg('admin/btn_dropdown.png', array('width' => 8, 'height' => 11, 'class' => 'btn')), 'javascript:void(0)', array('class' => 'title')) ?>
					<ul>
						<?php if($session->check('AuthAgent')): ?>
						<li><?php $bcBaser->link('元のユーザーに戻る', array('admin' => true, 'plugin' => null, 'controller' => 'users', 'action' => 'back_agent')) ?></li>
						<?php endif ?>
						<li><?php $bcBaser->link('アカウント設定', array('admin' => true, 'plugin' => null, 'controller' => 'users', 'action' => 'edit', $user['id'])) ?></li>
						<li><?php $bcBaser->link('ログアウト', array('admin' => true, 'plugin' => null, 'controller' => 'users', 'action' => 'logout')) ?></li>
					</ul>
<?php elseif($this->name != 'Installations' && $this->params['url']['url'] != 'admin/users/login'): ?>
					<?php $bcBaser->link('ログインしていません '.$bcBaser->getImg('admin/btn_dropdown.png', array('width' => 8, 'height' => 11, 'class' => 'btn')), 'javascript:void(0)', array('class' => 'title')) ?>
					<ul>
						<li><?php $bcBaser->link('ログイン', array('admin' => true, 'plugin' => null, 'controller' => 'users', 'action' => 'login')) ?></li>
					</ul>
<?php endif ?>
				</li>
<?php if(!empty($user)): ?>
				<li>
					<?php $bcBaser->link('システムナビ'.' '.$bcBaser->getImg('admin/btn_dropdown.png', array('width' => 8, 'height' => 11, 'class' => 'btn')), 'javascript:void(0)', array('class' => 'title')) ?>
					<div id="SystemMenu"><div>
<?php $adminSitemap = Configure::read('BcApp.adminNavi') ?>
	<?php foreach($adminSitemap as $key => $package): ?>
		<?php if(empty($package['name'])): ?>
			<?php $package['name'] = $key ?>
		<?php endif ?>
		<h2><?php echo $package['name'] ?></h2>
		<?php if(!empty($package['contents'])): ?>
						<ul class="clearfix">
			<?php foreach($package['contents'] as $contents): ?>
							<li><?php $bcBaser->link($contents['name'], $contents['url'], array('title' => $contents['name'])) ?></li>
			<?php endforeach ?>
						</ul>
		<?php endif ?>
	<?php endforeach ?>
					</div></div>
				</li>
<?php endif ?>
			</ul>
		</div>
	</div>
</div>

<?php $bcBaser->BcHtml->themeWeb = $publishTheme ?>