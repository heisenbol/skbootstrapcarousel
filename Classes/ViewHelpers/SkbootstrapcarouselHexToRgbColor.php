<?php
namespace Skar\Skbootstrapcarousel\ViewHelpers;


class SkbootstrapcarouselHexToRgbColorViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

    /**
     * Initialize additional argument
     */
    public function initializeArguments()
    {
    	parent::initializeArguments();
        $this->registerArgument('hex', 'string', 'The HTML color in hex format #ffffff', TRUE);
        $this->registerArgument('opacity', 'string', 'Opcacity', TRUE);
    }

	/**
	* @return string
	*/
	public function render() {

		$hex = $this->arguments['hex'];
		$opacity = intval($this->arguments['opacity']);


        
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        

        return "rgba($r, $g, $b, ".($opacity/100).")";
	}

}

