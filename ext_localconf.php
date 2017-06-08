<?php
/**
 * @copyright Copyright (c) 2016 Code-Source
 */

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['determineId-PostProc'][] =
    \CDSRC\CdsrcHttpbasicauth\Hooks\HttpBasicAuthenticationHook::class . '->apply';