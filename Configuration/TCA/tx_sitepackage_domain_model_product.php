<?php

$tca = [
    'ctrl' => [
        'title' => 'LLL:EXT:site_package/Resources/Private/Language/locallang_db.xlf:tx_sitepackage_domain_model_product',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'default_sortby' => 'title',
        'iconfile' => 'EXT:site_package/Resources/Public/Icons/Record.svg',
        'searchFields' => 'title, description, price',
    ],
    'types' => [
        '1' => ['showitem' => 'title, description, price, image, categories'],
    ],
    'columns' => [
        'title' => [
            'label' => 'LLL:EXT:site_package/Resources/Private/Language/locallang_db.xlf:tx_sitepackage_domain_model_product.title',
            'config' => [
                'type' => 'input',
                'size' => 40,
                'max' => 255,
                'eval' => 'trim',
                'required' => true,
            ],
        ],
        'description' => [
            'label' => 'LLL:EXT:site_package/Resources/Private/Language/locallang_db.xlf:tx_sitepackage_domain_model_product.description',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'rows' => 8,
                'cols' => 40,
                'max' => 2000,
                'eval' => 'trim',
            ],
        ],
        'price' => [
            'label' => 'LLL:EXT:site_package/Resources/Private/Language/locallang_db.xlf:tx_sitepackage_domain_model_product.price',
            'config' => [
                'type' => 'input',
                'size' => 40,
                'max' => 255,
                'eval' => 'trim',
                'required' => true,
            ],
        ],
        'image' => [
            'label' => 'LLL:EXT:site_package/Resources/Private/Language/locallang_db.xlf:tx_sitepackage_domain_model_product.image',
            'config' => [
                'type' => 'file',
                'maxitems' => 1,
                'appearance' => [
                    'collapseAll' => true,
                    'useSortable' => false,
                    'enabledControls' => [
                        'hide' => false,
                    ],
                ],
                'allowed' => 'common-image-types',
            ],
        ],
        'categories' => [
            'label' => 'LLL:EXT:site_package/Resources/Private/Language/locallang_db.xlf:tx_sitepackage_domain_model_product.categories',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'MM' => 'tx_sitepackage_domain_model_product_category',
                //'foreign_table_where' => ' AND tx_sitepackage_domain_model_category.pid=###CURRENT_PID### ORDER BY tx_sitepackage_domain_model_category.title ',
                'foreign_table' => 'tx_sitepackage_domain_model_category',
                'minitems' => 0,
                'maxitems' => 99,
            ],
        ],
    ],
];

/*
$typo3Version = new \TYPO3\CMS\Core\Information\Typo3Version();
if ($typo3Version->getMajorVersion() < 12) {
    $tca = array_replace_recursive(
        $tca,
        [
            'ctrl' => [
                'cruser_id' => 'cruser_id',
            ],
            'columns' => [
                'title' => [
                    'config' => [
                        'eval' => 'trim,required',
                    ],
                ],
            ],
        ]
    );
    unset($tca['columns']['title']['required']);
    $tca['columns']['image'] = [
        'label' => 'LLL:EXT:site_package/Resources/Private/Language/locallang_db.xlf:tx_sitepackage_domain_model_product.image',
        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
            'image',
            [
                'maxitems' => 1,
                'appearance' => [
                    'collapseAll' => true,
                    'useSortable' => false,
                    'enabledControls' => [
                        'hide' => false,
                    ],
                ],
            ]
        ),
    ];
}
*/

$tca['columns']['image'] = [
    'label' => 'LLL:EXT:site_package/Resources/Private/Language/locallang_db.xlf:tx_sitepackage_domain_model_product.image',
    'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
        'image',
        [
            'maxitems' => 1,
            'appearance' => [
                'collapseAll' => true,
                'useSortable' => false,
                'enabledControls' => [
                    'hide' => false,
                ],
            ],
        ]
    ),
];

return $tca;
