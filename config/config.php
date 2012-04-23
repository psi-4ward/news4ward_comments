<?php if(!defined('TL_ROOT')) die('You cannot access this file directly!');

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


$GLOBALS['TL_HOOKS']['News4wardReader'][] = array('News4wardComments','insertContent');


$GLOBALS['TL_HOOKS']['isAllowedToEditComment'][] = array('News4wardComments','isAllowedToEditComment');
?>