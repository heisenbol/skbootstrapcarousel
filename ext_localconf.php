<?php
defined('TYPO3_MODE') || die();


$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['skbootstrapcarousel_skbootstrapcarousel'] =
   \Skar\Skbootstrapcarousel\Hooks\PageLayoutView\PreviewRenderer::class;
