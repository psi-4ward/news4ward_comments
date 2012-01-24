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

// comments button
array_insert($GLOBALS['TL_DCA']['tl_news4ward_article']['list']['operations'],1,array(
	'comments' => array
	(
		'label'               => &$GLOBALS['TL_LANG']['tl_news4ward_article']['commentsButton'],
		'href'                => 'key=showComments',
		'icon'                => 'system/modules/comments/html/icon.gif',
		'button_callback'     => array('tl_news4ward_article_comments', 'showComments')
	),
));


class tl_news4ward_article_comments extends Controller
{


	/**
	 * Generate the "show comments" button and return it as string
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function showComments($row, $href, $label, $title, $icon)
	{
		if ($this->Input->get('key') == 'showComments' && preg_match("~^\d+$~",$this->Input->get('aid')))
		{
			$data = $this->Session->getData();

			$data['filter']['tl_comments']['source'] = 'tl_news4ward_article';
			$data['filter']['tl_comments']['parent'] = $this->Input->get('aid');

			$this->Session->setData($data);

			$this->redirect('contao/main.php?do=comments');
		}

		return '<a href="'.$this->addToUrl($href.'&amp;id='.$row['pid'].'&amp;aid='.$row['id']).'" title="'.specialchars($title).'">'.$this->generateImage($icon, $label).'</a> ';
	}

}
?>