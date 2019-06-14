<?php
namespace Skar\Skbootstrapcarousel\Hooks\PageLayoutView;

use \TYPO3\CMS\Backend\View\PageLayoutViewDrawItemHookInterface;
use \TYPO3\CMS\Backend\View\PageLayoutView;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Contains a preview rendering for the page module of CType="skvideo_skvideo_ce"
 */
class PreviewRenderer implements PageLayoutViewDrawItemHookInterface
{

   /**
    * Preprocesses the preview rendering of a content element of type "My new content element"
    *
    * @param \TYPO3\CMS\Backend\View\PageLayoutView $parentObject Calling parent object
    * @param bool $drawItem Whether to draw the item using the default functionality
    * @param string $headerContent Header content
    * @param string $itemContent Item content
    * @param array $row Record row of tt_content
    *
    * @return void
    */
   public function preProcess(
      PageLayoutView &$parentObject,
      &$drawItem,
      &$headerContent,
      &$itemContent,
      array &$row
   )
   {
      if ($row['CType'] === 'skbootstrapcarousel') {
        $drawItem = false;
        $flexformService = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Service\FlexFormService::class);
        $settings = $flexformService->convertFlexFormContentToArray($row['pi_flexform'])['settings']??NULL;

        if (!$settings) {
          $itemContent = 'Missing plugin settings';
          return;
        }

        $displaymode = $settings['displaymode'] ?? null;

        $fluidTmplFilePath = GeneralUtility::getFileAbsFileName('typo3conf/ext/skbootstrapcarousel/Resources/Private/Templates/BePreviewTemplate.html');
        $fluidTmpl = GeneralUtility::makeInstance('TYPO3\CMS\Fluid\View\StandaloneView');
        $fluidTmpl->setTemplatePathAndFilename($fluidTmplFilePath);
        $fluidTmpl->assign('displaymode', $displaymode);


        $itemContent = $parentObject->linkEditContent($fluidTmpl->render(), $row);
      }
   }
}