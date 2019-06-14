<?php
$tca = array(
	'types' => array(
		'skbootstrapcarousel' => array(
			'showitem' => '--palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.general;general,
			header;Name (not shown in frontend),
			pi_flexform;General settings,
		    --div--;Slides,
				tx_skbootstrapcarousel_carousel_item,
		    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
		        --palette--;;hidden,
		        --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
			',
		)
	),
	'columns' => array(
		'CType' => array(
			'config' => array(
				'items' => array(
					'skbootstrapcarousel' => array(
						'SK Bootstrap Carousel', // Name o the content element
						'skbootstrapcarousel', // TCA Name of the content element
						'EXT:skbootstrapcarousel/Resources/Public/Images/Backend/ContentElement/Carousel.png' // Image of content element
					)
				)
			)
		)
	)
);

$GLOBALS['TCA']['tt_content'] = array_replace_recursive($GLOBALS['TCA']['tt_content'], $tca);

$GLOBALS['TCA']['tt_content']['columns']['tx_skbootstrapcarousel_carousel_item'] = [
    'label' => 'Slides',
    'config' => [
        'type' => 'inline',
        'foreign_table' => 'tx_skbootstrapcarousel_carousel_item',
        'foreign_field' => 'tt_content',
        'appearance' => [
            'useSortable' => true,
            'expandSingle' => false,
            'enabledControls' => [
            ]
        ],
        'behaviour' => [
            'mode' => 'select'        
        ]
    ]
];

$fields = [
	'pi_flexform' => [
	    'exclude' => false,
	    'label' => 'Carousel settings',
	    'config' => [
	        'type' => 'flex',
		    'ds' => [
		        'default' => 'FILE:EXT:skbootstrapcarousel/Configuration/FlexForms/Carouselproperties.xml',
		    ],
	    ]
	],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $fields);
/*
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'tt_content',
        'pi_flexform'
);
$fields2 = [
	'pi_flexform' => [
	    'exclude' => false,
	    'label' => 'Carousel settings2',
	    'config' => [
	        'type' => 'flex',
		    'ds' => [
		        'default' => 'FILE:EXT:skbootstrapcarousel/Configuration/FlexForms/Carouselproperties.xml',
		    ],
	    ]
	],
];*/