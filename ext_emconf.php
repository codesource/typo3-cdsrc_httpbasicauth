<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "cdsrc_httpbasicauth".
 *
 * Auto generated 04-06-2016 23:56
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
    'title' => 'HTTP Basic Access Authentication',
    'description' => 'Allow to configure HTTP Basic Access Authentication on some pages. Useful for website in development.',
    'category' => 'fe',
    'shy' => false,
    'version' => '1.0.1',
    'dependencies' => '',
    'conflicts' => '',
    'priority' => '',
    'loadOrder' => null,
    'module' => '',
    'state' => 'beta',
    'uploadfolder' => false,
    'createDirs' => '',
    'modify_tables' => '',
    'clearcacheonload' => false,
    'lockType' => '',
    'author' => 'Matthias Toscanelli',
    'author_email' => 'm.toscanelli@code-source.ch',
    'author_company' => 'Code-Source',
    'CGLcompliance' => null,
    'CGLcompliance_note' => null,
    'constraints' => [
        'depends' => [
            'typo3' => '7.0.0-8.7.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];

?>