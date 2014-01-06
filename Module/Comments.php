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

namespace Psi\News4ward\Module;

class Comments extends \Module
{

	/**
	* Template
	* @var string
	*/
	protected $strTemplate = 'mod_news4wardComments';
	
	
		public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### News4wardComments ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = $this->Environment->script.'?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		// Read the alias from the url
		if(!preg_match("~.*".preg_quote($GLOBALS['objPage']->alias)."/([a-z0-9\._-]+).*~i",$this->Environment->request,$erg))
		{
			return '';
		}
		// strip suffix
		if(substr($erg[1],-strlen($GLOBALS['TL_CONFIG']['urlSuffix'])) == $GLOBALS['TL_CONFIG']['urlSuffix'])
		{
			$erg[1] = substr($erg[1],0,-strlen($GLOBALS['TL_CONFIG']['urlSuffix']));
		}

		$this->alias = $erg[1];

		// fetch news4ward archive
		$where = array();
		$time = time();
		if(!BE_USER_LOGGED_IN)
		{
			$where[] = "(tl_news4ward_article.start='' OR tl_news4ward_article.start<".$time.") AND (tl_news4ward_article.stop='' OR tl_news4ward_article.stop>".$time.") AND tl_news4ward_article.status='published'";
		}
		$where[] = 'tl_news4ward_article.alias = "'.mysql_real_escape_string($this->alias).'"';

		$this->objArchive = $this->Database->execute('SELECT tl_news4ward.*, tl_news4ward_article.noComments, tl_news4ward_article.id as articleID, tl_news4ward_article.author as authorID
												FROM tl_news4ward_article
												LEFT JOIN tl_news4ward ON (tl_news4ward_article.pid = tl_news4ward.id)
												WHERE '.implode(' AND ',$where));


		if(!$this->objArchive->numRows) return '';

		if($this->objArchive->allowComments != '1' || $this->objArchive->noComments) return '';
		
		return parent::generate();
	}
	
	
	protected function compile()
	{

		$this->import('\Comments','Comments');
		$arrNotifies = array();

		// Notify system administrator
		if ($this->objArchive->notify != 'notify_author')
		{
			$arrNotifies[] = $GLOBALS['TL_ADMIN_EMAIL'];
		}

		// Notify author
		if ($this->objArchive->notify != 'notify_admin')
		{
			$objAuthor = $this->Database->prepare("SELECT email FROM tl_user WHERE id=?")
										->limit(1)
										->execute($this->objArchive->->authorID);

			if ($objAuthor->numRows)
			{
				$arrNotifies[] = $objAuthor->email;
			}
		}

		$objConfig = new \stdClass();

		$objConfig->perPage = $this->objArchive->perPage;
		$objConfig->order = $this->objArchive->sortOrder;
		$objConfig->template = $this->objArchive->com_template;
		$objConfig->requireLogin = $this->objArchive->requireLogin;
		$objConfig->disableCaptcha = $this->objArchive->disableCaptcha;
		$objConfig->bbcode = $this->objArchive->bbcode;
		$objConfig->moderate = $this->objArchive->moderate;

		$this->Comments->addCommentsToTemplate($this->Template, $objConfig, 'tl_news4ward_article', $this->objArchive->articleID, $arrNotifies);

	}
}

