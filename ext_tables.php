<?php
	defined('TYPO3') || die('Access denied.');

$boot = function () {




	/***************
	 * Allow Custom Records on Standard Pages
	 */
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_skbootstrapcarousel_carousel_item');



};

$boot();
unset($boot);
