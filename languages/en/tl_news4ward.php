<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * News4ward
 * a contentelement driven news/blog-system
 *
 * @author Christoph Wiechert <wio@psitrax.de>
 * @copyright 4ward.media GbR <http://www.4wardmedia.de>
 * @package news4ward_comments
 * @filesource
 * @licence LGPL
 */



/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_news4ward']['allowComments']  = array('Enable comments', 'Allow visitors to comment blog entries.');
$GLOBALS['TL_LANG']['tl_news4ward']['notify']         = array('Notify', 'Please choose who to notify when comments are added.');
$GLOBALS['TL_LANG']['tl_news4ward']['sortOrder']      = array('Sort order', 'By default, comments are sorted ascending, starting with the oldest one.');
$GLOBALS['TL_LANG']['tl_news4ward']['perPage']        = array('Comments per page', 'Number of comments per page. Set to 0 to disable pagination.');
$GLOBALS['TL_LANG']['tl_news4ward']['moderate']       = array('Moderate comments', 'Approve comments before they are published on the website.');
$GLOBALS['TL_LANG']['tl_news4ward']['bbcode']         = array('Allow BBCode', 'Allow visitors to format their comments with BBCode.');
$GLOBALS['TL_LANG']['tl_news4ward']['requireLogin']   = array('Require login to comment', 'Allow only authenticated users to create comments.');
$GLOBALS['TL_LANG']['tl_news4ward']['disableCaptcha'] = array('Disable the security question', 'Use this option only if you have limited comments to authenticated users.');
$GLOBALS['TL_LANG']['tl_news4ward']['com_template']   = array('Comments template', 'Here you can select the comments template.');

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_news4ward']['comments_legend']  = 'Comment settings';

$GLOBALS['TL_LANG']['tl_news4ward']['comments']   = array('Comments', 'Show the comments of entry ID %s');

?>