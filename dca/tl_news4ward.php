<?php

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


// fields
$GLOBALS['TL_DCA']['tl_news4ward']['fields']['allowComments'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_news4ward']['allowComments'],
	'exclude'                 => true,
	'filter'                  => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true)
);

$GLOBALS['TL_DCA']['tl_news4ward']['fields']['notify'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_news4ward']['notify'],
	'default'                 => 'notify_admin',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('notify_admin', 'notify_author', 'notify_both'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_news4ward'],
	'eval'                    => array('includeBlankOption'=>true)
 );

$GLOBALS['TL_DCA']['tl_news4ward']['fields']['sortOrder'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_news4ward']['sortOrder'],
	'default'                 => 'ascending',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('ascending', 'descending'),
	'reference'               => &$GLOBALS['TL_LANG']['MSC'],
	'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_news4ward']['fields']['perPage'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_news4ward']['perPage'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'digit', 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_news4ward']['fields']['moderate'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_news4ward']['moderate'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_news4ward']['fields']['bbcode'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_news4ward']['bbcode'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_news4ward']['fields']['requireLogin'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_news4ward']['requireLogin'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_news4ward']['fields']['disableCaptcha'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_news4ward']['disableCaptcha'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50')
);
$GLOBALS['TL_DCA']['tl_news4ward']['fields']['com_template'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_news4ward']['com_template'],
	'default'                 => 'com_default',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_news4ward_comments', 'getCommentsTemplates'),
	'eval'                    => array('tl_class'=>'w50')

);


// alter the palettes
$GLOBALS['TL_DCA']['tl_news4ward']['subpalettes']['allowComments'] = 'notify,sortOrder,perPage,moderate,bbcode,requireLogin,disableCaptcha,com_template';
$GLOBALS['TL_DCA']['tl_news4ward']['palettes']['default'] = str_replace(';{protected',';{comments_legend:hide},allowComments;{protected',$GLOBALS['TL_DCA']['tl_news4ward']['palettes']['default']);


/**
 * Class tl_news4ward_comments
 * @package    news4ward_comments
 */
class tl_news4ward_comments extends Backend
{

	/**
	 * Return all comments templates as array
	 * @param DataContainer
	 * @return array
	 */
	public function getCommentsTemplates(DataContainer $dc)
	{
		// Return all gallery templates
		return $this->getTemplateGroup('com_');
	}
}

?>