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


// tags field
$GLOBALS['TL_DCA']['tl_news4ward_article']['fields']['noComments'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_news4ward_article']['noComments'],
	'inputType'               => 'checkbox',
	'exclude'                 => true,
	'eval'                    => array('tl_class'=>'w50')
);

// alter the palette
$GLOBALS['TL_DCA']['tl_news4ward_article']['palettes']['default'] = str_replace(',cssID',',cssID,noComments',$GLOBALS['TL_DCA']['tl_news4ward_article']['palettes']['default']);

?>