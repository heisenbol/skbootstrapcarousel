<?php
defined('TYPO3') || die();
$boot = function () {

	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['skbootstrapcarousel_skbootstrapcarousel'] =
	   \Skar\Skbootstrapcarousel\Hooks\PageLayoutView\PreviewRenderer::class;
};

$boot();
unset($boot);