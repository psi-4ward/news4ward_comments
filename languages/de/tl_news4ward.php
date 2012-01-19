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
$GLOBALS['TL_LANG']['tl_news4ward']['allowComments']  = array('Kommentare aktivieren', 'Besuchern das Kommentieren von Nachrichtenbeiträgen erlauben.');
$GLOBALS['TL_LANG']['tl_news4ward']['notify']         = array('Benachrichtigung an', 'Bitte legen Sie fest, wer beim Hinzufügen neuer Kommentare benachrichtigt wird.');
$GLOBALS['TL_LANG']['tl_news4ward']['sortOrder']      = array('Sortierung', 'Standardmäßig werden Kommentare aufsteigend sortiert, beginnend mit dem ältesten.');
$GLOBALS['TL_LANG']['tl_news4ward']['perPage']        = array('Kommentare pro Seite', 'Anzahl an Kommentaren pro Seite. Geben Sie 0 ein, um den automatischen Seitenumbruch zu deaktivieren.');
$GLOBALS['TL_LANG']['tl_news4ward']['moderate']       = array('Kommentare moderieren', 'Kommentare erst nach Bestätigung auf der Webseite veröffentlichen.');
$GLOBALS['TL_LANG']['tl_news4ward']['bbcode']         = array('BBCode erlauben', 'Besuchern das Formatieren ihrer Kommentare mittels BBCode erlauben.');
$GLOBALS['TL_LANG']['tl_news4ward']['requireLogin']   = array('Login zum Kommentieren benötigt', 'Nur angemeldeten Benutzern das Erstellen von Kommentaren erlauben.');
$GLOBALS['TL_LANG']['tl_news4ward']['disableCaptcha'] = array('Sicherheitsfrage deaktivieren', 'Wählen Sie diese Option nur, wenn das Erstellen von Kommentaren auf authentifizierte Benutzer beschränkt ist.');

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_news4ward']['comments_legend']  = 'Kommentare';

$GLOBALS['TL_LANG']['tl_news4ward']['comments']   = array('Kommentare', 'Kommentare des Archivs ID %s anzeigen');

?>