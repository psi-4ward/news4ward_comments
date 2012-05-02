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

class News4wardComments extends System
{

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

		$this->import('Database');
		$this->import('BackendUser','User');

		$objNews4wardArticle = $this->Database->prepare('SELECT pid FROM tl_news4ward_article WHERE id=?')->execute($intParent);
		if(!$objNews4wardArticle->numRows) return;

		return (is_array($this->User->news4ward) && in_array($objNews4wardArticle->pid,$this->User->news4ward));
	}
}

?>