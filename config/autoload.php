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


// Register the namespace
ClassLoader::addNamespace('Psi');

// Register the classes
ClassLoader::addClasses(array
(
	'Psi\News4ward\Module\Comments'   		=> 'system/modules/news4ward_comments/Module/Comments.php',
	'Psi\News4ward\CommentsHelper'   		=> 'system/modules/news4ward_comments/CommentsHelper.php',
));

// Register the templates
TemplateLoader::addFiles(array
(
	'mod_news4wardComments' 				=> 'system/modules/news4ward_comments/templates',
	'com_gravatar' 							=> 'system/modules/news4ward_comments/templates',
));
