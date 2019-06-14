<?php
namespace Skar\Skbootstrapcarousel\ViewHelpers;


class SkbootstrapcarouselGroupedarrayViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

    /**
     * Initialize additional argument
     */
    public function initializeArguments()
    {
    	parent::initializeArguments();
        $this->registerArgument('slides', 'array', 'The media items', TRUE);
        $this->registerArgument('groupsof', 'int', 'Number of items in each group', TRUE);
    }

	/**
	* @return string
	*/
	public function render() {

		$slides = $this->arguments['slides'];
		$groupsof = $this->arguments['groupsof'];

        // https://stackoverflow.com/questions/37076789/typo3-returns-array-to-fluid-as-string

        $groupedSlides = [];

        $groupedItems = null;
        foreach($slides as $slide) {
            if ($groupedItems === null) {
                $groupedItems = [];
            }
            $groupedItems[] = $slide;
            if (count($groupedItems) == $groupsof) {
                $groupedSlides[] = $groupedItems;
                $groupedItems = null;
            }
        }
        // add last array
        if ($groupedItems !== null) {
            while (count($groupedItems) < $groupsof) { // fill empty spots
                $groupedItems[] = '';
            }
            $groupedSlides[] = $groupedItems;
        }

        $this->templateVariableContainer->add('groupedSlides', $groupedSlides);
        $output = $this->renderChildren();
        $this->templateVariableContainer->remove('groupedSlides');
        return $output;
	}

}

