<?php
if(!defined('TYPO3_MODE')) {
	die('Access denied.');
}

/*
 * PLUGIN
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin($_EXTKEY, 'Skills', 'Skills');


/*
 * TYPOSCRIPT
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'TRB CE Skills');


/*
 * PAGE CONFIG
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="DIR:EXT:'.$_EXTKEY.'/Configuration/Page/">');
