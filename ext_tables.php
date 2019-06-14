<?php
	defined('TYPO3_MODE') || die('Access denied.');




	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('skbootstrapcarousel', 'Configuration/TypoScript', 'SK Bootstrap Carousel');

	/***************
	 * Allow Custom Records on Standard Pages
	 */
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_skbootstrapcarousel_carousel_item');

	$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

	$iconRegistry->registerIcon(
		'skbootstrapcarousel-icon',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		['source' => 'EXT:skbootstrapcarousel/Resources/Public/Images/Backend/ContentElement/Carousel.png']
	);

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
	mod {
	    wizards.newContentElement.wizardItems.special {
	        elements {
	            skbootstrapcarousel {
	                iconIdentifier = skbootstrapcarousel-icon
	                title = SK Bootstrap image and content carousel
	                description = Versatile image and content carousel for Bootstrap 4
	                tt_content_defValues {
	                    CType = skbootstrapcarousel
	                }
	            }
	        }
	        show = *
	    }
	}
	');