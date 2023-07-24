<?php

namespace Skar\Skbootstrapcarousel\ViewHelpers;

/**
 * This file was part of the "news" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

/**
 * ViewHelper to include a css/js file
 * Original from Georg Ringers news extension
  */
class IncludeFileViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper
{
    use CompileWithRenderStatic;

    /**
     */
    public function initializeArguments()
    {
        $this->registerArgument('path', 'string', 'Path to the CSS/JS file which should be included', true);
        $this->registerArgument('compress', 'bool', 'Define if file should be compressed', false, false);
        $this->registerArgument('footer', 'bool', 'Define if JS file should be added to footer', false, false);
    }



    /**
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     */
    public static function renderStatic(
        array $arguments,
        \Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ) {
        $path = $arguments['path'];
        $compress = (bool)$arguments['compress'];
        $footer = (bool)$arguments['footer'];
        $pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);
        if (TYPO3_MODE === 'FE') {
            
            $path = $filePath;

            // JS
            if (strtolower(substr($path, -3)) === '.js') {
                if (!$footer) {
                    $pageRenderer->addJsFile($path, null, $compress, false, '', true);
                }
                else {
                    $pageRenderer->addJsFooterFile($path, null, $compress, false, '', true);
                }                

            // CSS
            } elseif (strtolower(substr($path, -4)) === '.css') {
                $pageRenderer->addCssFile($path, 'stylesheet', 'all', '', $compress, false, '', true);
            }
        } else {
            // footer not supported for BE
            // JS
            if (strtolower(substr($path, -3)) === '.js') {
                $pageRenderer->addJsFile($path, null, $compress, false, '', true);

            // CSS
            } elseif (strtolower(substr($path, -4)) === '.css') {
                $pageRenderer->addCssFile($path, 'stylesheet', 'all', '', $compress, false, '', true);
            }
        }
    }

/*
    public static function renderStatic(
        array $arguments,
        \Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ) {

        $path = $arguments['path'];
        $compress = (bool)$arguments['compress'];
        $footer = (bool)$arguments['footer'];
        $pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($path); 
        if (TYPO3_MODE === 'FE') {
            $path = $GLOBALS['TSFE']->tmpl->getFileName($path);
            //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($path); 
            // JS
            if (strtolower(substr($path, -3)) === '.js') {
                if (empty($GLOBALS['EXT']['skslider']['jsAlreadyAdded'])) {
                    $GLOBALS['EXT']['skslider']['jsAlreadyAdded'] = [];
                }
                if (in_array($path, $GLOBALS['EXT']['skslider']['jsAlreadyAdded'])) {
                    return;
                }
                $GLOBALS['EXT']['skslider']['jsAlreadyAdded'][] = $path;
                if (!$footer) {

                    $pageRenderer->addJsFile($path, null, $compress, false, '', true);
                }
                else {
                    $pageRenderer->addJsFooterFile($path, null, $compress, false, '', true);
                }

            // CSS
            } elseif (strtolower(substr($path, -4)) === '.css') {
                $pageRenderer->addCssFile($path, 'stylesheet', 'all', '', $compress, false, '', true);
            }
        } else {
            // footer not supported for BE
            // JS
            if (strtolower(substr($path, -3)) === '.js') {
                $pageRenderer->addJsFile($path, null, $compress, false, '', true);

            // CSS
            } elseif (strtolower(substr($path, -4)) === '.css') {
                $pageRenderer->addCssFile($path, 'stylesheet', 'all', '', $compress, false, '', true);
            }
        }
    }
    */
}
