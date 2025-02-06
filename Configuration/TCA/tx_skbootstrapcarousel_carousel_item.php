<?php

return [
    'ctrl' => [
        'label' => 'text1',
        'sortby' => 'sorting',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'title' => 'SK Carousel Slide',
        'delete' => 'deleted',
        'versioningWS' => true,
        'origUid' => 't3_origuid',
        'hideTable' => true,
        'hideAtCopy' => true,
        'prependAtCopy' => 'Copy',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ]
    ],
    'interface' => [
        // 'showRecordFieldList' => '
        //     hidden,
        //     tt_content,
        //     text1,
        //     shadowcolor,
        //     usetexthadow,
        //     background_image,
        //     useframe,
        //     framebordercolor,
        //     framebackgroundcolor,
        //     frameopacity
        // ',
    ],
    'types' => [
        '1' => [
            'showitem' => '
                --palette--;Texts;texts,
                --div--;Background Image,
                    background_image,
                --div--;Properties,
                    --palette--;Text Shadow (only for carousel);shadowposition,
                    --palette--;Framed Text (only for carousel);framed,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.visibility;visibility,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
            '
        ]
    ],
    'palettes' => [
        'texts' => [
            'showitem' => '
                text1,
            '
        ],
        'shadowposition' => [
            'showitem' => '
                usetexthadow,
                shadowcolor,
                position
            '
        ],
        'framed' => [
            'showitem' => '
                useframe,
                framebordercolor,
                framebackgroundcolor,
                frameopacity
                
            '
        ],
        'access' => [
            'showitem' => '
                starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel,
                endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel
            '
        ],
        'general' => [
            'showitem' => '
                tt_content,
                item_type;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:CType_formlabel,
            '
        ],
        'visibility' => [
            'showitem' => '
                hidden;Disable
            '
        ],
    ],
    'columns' => [
        'tt_content' => [
            'exclude' => true,
            'label' => 'x1mnju',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tt_content',
                'foreign_table_where' => 'AND tt_content.pid=###CURRENT_PID### AND tt_content.CType IN ("skbootstrapcarousel")',
                'maxitems' => 1,
                'default' => 0,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    [
                        'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:hidden.I.0',
                        'value' => '0',
                    ]
                ]
            ]
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'start time',
            'config' => [
                'type' => 'datetime',
                'default' => 0
            ],
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly'
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'end time',
            'config' => [
                'type' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ]
            ],
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly'
        ],
        'text1' => [
            'exclude' => true,
            'label' => 'Text',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
            ],
        ],

        'useframe' => [
            'exclude' => true,
            'label' => 'Framed text',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => 'Yes',
                        'value' => '0',
                    ]
                ]
            ]
        ],
        'framebordercolor' => [
            'exclude' => true,
            'label' => 'Frame border color',
            'config' => [
                'type' => 'color',
                'default' => '#cacaca',
            ],
            'l10n_mode' => 'exclude',
        ],
        'framebackgroundcolor' => [
            'exclude' => true,
            'label' => 'Frame background color',
            'config' => [
                'type' => 'color',
                'default' => '#ffffff',
            ],
            'l10n_mode' => 'exclude',
        ],
        'usetexthadow' => [
            'exclude' => true,
            'label' => 'Use text shadow',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => 'Yes',
                        'value' => '0',
                    ]
                ]
            ]
        ],

        'frameopacity' => [
            'label' => 'Background opacity (0-100)',
            'config' => [
                'type' => 'number',
                'size' => 10,
                'eval' => 'trim',
                'default' => 70,
            ],
        ],
        'shadowcolor' => [
            'exclude' => true,
            'label' => 'Shadow color',
            'config' => [
                'type' => 'color',
                'default' => '#000000',
            ],
            'l10n_mode' => 'exclude',
        ],
        // 'background_image' => [
        //     'exclude' => true,
        //     'label' => 'Background image',
        //     'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
        //         'background_image',
        //         [
        //             //'appearance' => [
        //                 //'createNewRelationLinkTitle' => 'fdfdfdfsdfdfd' // koumpi "create new relation" otan pas na theseis thn eikona
        //             //],
        //             'overrideChildTca' => [
        //                 'types' => [
        //                     \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
        //                         'showitem' => '
        //                             --palette--;;filePalette,
        //                             description,--linebreak--,crop
                                    
        //                         '
        //                     ]
        //                 ],
        //                 'columns' => [
        //                     'description' => [
        //                         'exclude' => true,
        //                         'label' => 'Copyright info',
        //                     ],
        //                 ]
        //             ],
        //             'minitems' => 1,
        //             'maxitems' => 1
        //         ],
        //         $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
        //     ),
        //     'l10n_mode' => 'exclude',
        // ]
        'background_image' => [
            'label' => 'Background image',
            'config' => [
                'type' => 'file',
                'minitems' => 1,
                'maxitems' => 1,
                'allowed' => 'common-image-types',
                'overrideChildTca' => [
                    'types' => [
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                                    --palette--;;filePalette,
                                    link,description,--linebreak--,crop
                                    
                                '
                        ]
                    ],
                    'columns' => [
                        'description' => [
                            'exclude' => true,
                            'label' => 'Copyright info',
                        ],
                    ]
                ],
            ],
            'l10n_mode' => 'exclude',

        ],
        /*,
        'background_image_options' => [
            'exclude' => true,
            'label' => 'ssssssssss',
            'config' => [
                'type' => 'flex',
                'ds' => [
                    'default' => 'FILE:EXT:bootstrap_package/Configuration/FlexForms/BackgroundImage.xml',
                ],
            ],
            'l10n_mode' => 'exclude',
        ]*/
    ],
];
