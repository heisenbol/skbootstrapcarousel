<?php
defined('TYPO3') || die();
$boot = function () {

	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['skbootstrapcarousel_skbootstrapcarousel'] =
	   \Skar\Skbootstrapcarousel\Hooks\PageLayoutView\PreviewRenderer::class;


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
};

$boot();
unset($boot);