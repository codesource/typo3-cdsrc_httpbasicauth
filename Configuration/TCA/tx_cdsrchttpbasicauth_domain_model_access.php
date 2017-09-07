<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$ll = 'LLL:EXT:cdsrc_httpbasicauth/Resources/Private/Language/locallang_db.xlf:';

return [
    'ctrl' => [
        'title' => $ll . 'tx_cdsrchttpbasicauth_domain_model_access',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'dividers2tabs' => true,
        'sortby' => 'sorting',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'iconfile' => 'EXT:cdsrc_httpbasicauth/Resources/Public/Icons/tx_cdsrchttpbasicauth_domain_model_access.gif',
        'searchFields' => 'name,username',
    ],
    'interface' => [
        'showRecordFieldList' => '',
    ],
    'types' => [
        '0' => [
            'showitem' => '
                    name, 
					--palette--;;paletteData,
					message,
					allow_access_to_everybody,
					allow_propagation,
				    --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.access,
					--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;paletteAccess',
        ],
    ],
    'palettes' => [
        'paletteData' => [
            'showitem' => 'username,password',
            'canNotCollapse' => true,
        ],
        'paletteAccess' => [
            'showitem' => 'hidden, --linebreak--,
                           starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.starttime_formlabel, 
                           endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.endtime_formlabel',
            'canNotCollapse' => true,
        ],
    ],
    'columns' => [
        'pid' => [
            'label' => 'pid',
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'crdate' => [
            'label' => 'crdate',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'readOnly' => 1,
                'eval' => 'datetime',
            ],
        ],
        'tstamp' => [
            'label' => 'tstamp',
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'sorting' => [
            'label' => 'tstamp',
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'default' => 0,
            ],
        ],
        'starttime' => [
            'label' => 'LLL:EXT:cms/locallang_ttc.xlf:starttime_formlabel',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 8,
                'eval' => 'datetime',
                'default' => 0,
            ],
        ],
        'endtime' => [
            'label' => 'LLL:EXT:cms/locallang_ttc.xlf:endtime_formlabel',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 8,
                'eval' => 'datetime',
                'default' => 0,
            ],
        ],
        'sorting' => [
            'label' => 'tstamp',
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'name' => [
            'label' => $ll . 'tx_cdsrchttpbasicauth_domain_model_access.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'required',
            ],
        ],
        'username' => [
            'label' => $ll . 'tx_cdsrchttpbasicauth_domain_model_access.username',
            'config' => [
                'type' => 'input',
                'size' => 30,
            ],
        ],
        'password' => [
            'label' => $ll . 'tx_cdsrchttpbasicauth_domain_model_access.password',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'md5,password',
            ],
        ],
        'message' => [
            'label' => $ll . 'tx_cdsrchttpbasicauth_domain_model_access.message',
            'config' => [
                'type' => 'text',
                'renderType' => 't3editor',
                'format' => 'html',
                'cols' => 60,
                'rows' => 8,
            ],
        ],
        'allow_access_to_everybody' => [
            'label' => $ll . 'tx_cdsrchttpbasicauth_domain_model_access.allowAccessToEverybody',
            'config' => [
                'type' => 'check',
                'default' => 0,
            ],
        ],
        'allow_propagation' => [
            'label' => $ll . 'tx_cdsrchttpbasicauth_domain_model_access.allowPropagation',
            'config' => [
                'type' => 'check',
                'default' => 1,
            ],
        ],
    ],
];