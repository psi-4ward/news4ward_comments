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

namespace Psi\News4ward;

class CommentsHelper extends \System
{

	public function __construct()
	{
		parent::__construct();
		$this->import('\Database','Database');
	}

	/**
	 * tl_comments listComments Callback
	 * Adds BE and FE links to the comment listing
	 *
	 * @param $arrRow
	 * @return string
	 */
	public function listComments($arrRow)
	{
		if($arrRow['source'] != 'tl_news4ward_article') return '';

		$objParent = $this->Database->prepare("	SELECT tl_news4ward_article.id, tl_news4ward_article.title, tl_news4ward_article.alias, tl_news4ward.jumpTo AS parentJumpTo
												FROM tl_news4ward_article
												LEFT JOIN tl_news4ward ON (tl_news4ward_article.pid=tl_news4ward.id)
												WHERE tl_news4ward_article.id=?")->execute($arrRow['parent']);

		if ($objParent->numRows)
		{
			$this->import('\News4ward\Helper','News4wardHelper');
			$title = ' (<a href="contao/main.php?do=news4ward&table=tl_news4ward_article&id=' . $objParent->id . '">' . $objParent->title . '</a>)';
			$title .= ' (<a href="'.$this->News4wardHelper->generateUrl($objParent).'" target="_blank">'.$GLOBALS['TL_LANG']['tl_comments']['news4ward_FElink'].'</a>)';
		}

		return $title;
	}


	/**
	 * Check if the user is allowed to handle the comments
	 *
	 * @param $intParent id of the parent element
	 * @param $strSource comment source
	 * @return bool
	 */
	public function isAllowedToEditComment($intParent, $strSource)
	{
		if($strSource != 'tl_news4ward_article') return;

		$this->import('\BackendUser','User');

		$objNews4wardArticle = $this->Database->prepare('SELECT pid FROM tl_news4ward_article WHERE id=?')->execute($intParent);
		if(!$objNews4wardArticle->numRows) return;

		return (is_array($this->User->news4ward) && in_array($objNews4wardArticle->pid,$this->User->news4ward));
	}


	public function addCommentsCount($obj,$objArticles,$objTemplate)
	{
		$objComments = $this->Database->prepare('SELECT count(id) AS anz FROM tl_comments WHERE parent=? AND source="tl_news4ward_article"')
							->execute($objArticles->id);
		$objTemplate->commentCount = $objComments->anz;
	}

}
