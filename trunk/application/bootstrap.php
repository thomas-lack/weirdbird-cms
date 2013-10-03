<?php defined('SYSPATH') or die('No direct script access.');

// -- Environment setup --------------------------------------------------------

// Load the core Kohana class
require SYSPATH.'classes/Kohana/Core'.EXT;

if (is_file(APPPATH.'classes/Kohana'.EXT))
{
	// Application extends the core
	require APPPATH.'classes/Kohana'.EXT;
}
else
{
	// Load empty core extension
	require SYSPATH.'classes/Kohana'.EXT;
}

// Load the chrome php logger
// usage: 
// ChromePhp::log($obj, 'test');
require_once MODPATH.'chromephp/chromephp.php';

/**
 * Set the default time zone.
 *
 * @link http://kohanaframework.org/guide/using.configuration
 * @link http://www.php.net/manual/timezones
 */
date_default_timezone_set('Europe/Berlin');

/**
 * Set the default locale.
 *
 * @link http://kohanaframework.org/guide/using.configuration
 * @link http://www.php.net/manual/function.setlocale
 */
setlocale(LC_ALL, 'de_DE');

/**
 * Enable the Kohana auto-loader.
 *
 * @link http://kohanaframework.org/guide/using.autoloading
 * @link http://www.php.net/manual/function.spl-autoload-register
 */
spl_autoload_register(array('Kohana', 'auto_load'));

/**
 * Optionally, you can enable a compatibility auto-loader for use with
 * older modules that have not been updated for PSR-0.
 *
 * It is recommended to not enable this unless absolutely necessary.
 */
//spl_autoload_register(array('Kohana', 'auto_load_lowercase'));

/**
 * Enable the Kohana auto-loader for unserialization.
 *
 * @link http://www.php.net/manual/function.spl-autoload-call
 * @link http://www.php.net/manual/var.configuration#unserialize-callback-func
 */
ini_set('unserialize_callback_func', 'spl_autoload_call');

// -- Configuration and initialization -----------------------------------------

/**
 * Set the default kohana framework language
 */
I18n::lang('en-us');

/**
 * Set Kohana::$environment if a 'KOHANA_ENV' environment variable has been supplied.
 *
 * Note: If you supply an invalid environment name, a PHP warning will be thrown
 * saying "Couldn't find constant Kohana::<INVALID_ENV_NAME>"
 */
if (isset($_SERVER['KOHANA_ENV']))
{
	Kohana::$environment = constant('Kohana::'.strtoupper($_SERVER['KOHANA_ENV']));
}

/**
 * Initialize Kohana, setting the default options.
 *
 * The following options are available:
 *
 * - string   base_url    path, and optionally domain, of your application   NULL
 * - string   index_file  name of your index file, usually "index.php"       index.php
 * - string   charset     internal character set used for input and output   utf-8
 * - string   cache_dir   set the internal cache directory                   APPPATH/cache
 * - integer  cache_life  lifetime, in seconds, of items cached              60
 * - boolean  errors      enable or disable error handling                   TRUE
 * - boolean  profile     enable or disable internal profiling               TRUE
 * - boolean  caching     enable or disable internal caching                 FALSE
 * - boolean  expose      set the X-Powered-By header                        FALSE
 */
Kohana::init(array(
	'base_url'   => '/',
));

/**
 * Attach the file write to logging. Multiple writers are supported.
 */
Kohana::$log->attach(new Log_File(APPPATH.'logs'));

/**
 * Attach a file reader to config. Multiple readers are supported.
 */
Kohana::$config->attach(new Config_File);

/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */
Kohana::modules(array(
	 'auth'       => MODPATH.'auth',       // Basic authentication
	// 'cache'      => MODPATH.'cache',      // Caching with multiple backends
	// 'codebench'  => MODPATH.'codebench',  // Benchmarking tool
	 'database'   => MODPATH.'database',   // Database access
	// 'image'      => MODPATH.'image',      // Image manipulation
	// 'minion'     => MODPATH.'minion',     // CLI Tasks
	 'orm'        => MODPATH.'orm',        // Object Relationship Mapping
	// 'unittest'   => MODPATH.'unittest',   // Unit testing
	// 'userguide'  => MODPATH.'userguide',  // User guide and API documentation
	));

/**
 * Set a salt for cookie handling.
 */
Cookie::$salt = 'e8e6cea3c92f843c227bb73a2c9853d6';

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */
Route::set('cms', 'cms(/<controller>(/<action>(/<id>)))')
	->defaults(array(
		'directory'		=> 'cms',
		'controller'	=> 'main',
		'action'		=> 'index',
	));

Route::set('mail', 'mail(/<action>(/<id>))')
	->defaults(array(
		'directory'		=> '',
		'controller'	=> 'mail',
		'action'		=> 'index'
	));

// sitemap routing (enables dynamically generated sitemap)
Route::set('sitemap',  '(<language>/)<sitemap>', 
	array(
		'language'		=> 'de|DE|De|en|EN|En',
		'sitemap'		=> 'sitemap.xml|sitemap|SITEMAP'
	))
	->defaults(array(
		'directory'		=> 'frontend',
		'controller' 	=> 'sitemap',
		'action'     	=> 'index'
	));

// robots.txt routing (enables dynamically generated robots.txt)
Route::set('robots',  '(<language>/)robots.txt')
	->defaults(array(
		'directory'		=> 'frontend',
		'controller' 	=> 'robots',
		'action'     	=> 'index'
	));
 

// standard "/" route (frontend)	
Route::set('default',  '(<language>)(/)', 
	array(
		'language'		=> 'de|DE|De|en|EN|En',
	))
	->defaults(array(
		'directory'		=> 'frontend',
		'controller' 	=> 'main',
		'action'     	=> 'index'
	));

// route to load template structures
Route::set('tplstruct', '(<language>/)<structure>',
	array(
		'structure'		=> '[a-zA-Z0-9_äöüÄÖÜß]+',
		'language'		=> 'de|DE|De|en|EN|En',
	))
	->defaults(array(
		'directory'		=> 'frontend',
		'controller' 	=> 'structure',
		'action'		=> 'index',
	));

// route to load template structures with subpages
// (e.g. to print the transition from teaser to article pages)
Route::set('tpldirectarticle', '(<language>/)<structure>(/<article>(/<id>))',
	array(
		'structure'		=> '[a-zA-Z0-9_]+',
		'article'		=> '[a-zA-Z0-9_]+',
		'id'			=> '[0-9]+',
		'language'		=> 'de|DE|De|en|EN|En',
	))
	->defaults(array(
		'directory'		=> 'frontend',
		'controller' 	=> 'directarticle',
		'action'		=> 'index'
	));
