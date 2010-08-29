<?php

//get config settings
$config = parse_ini_file('config.ini.php', true);

//check for debug mode, and enable if on
if (isset($config['DEBUG']['DEBUG_MODE']) && $config['DEBUG']['DEBUG_MODE'] == 1){

	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	define('DEBUG', true);

} else define('DEBUG', false);

//get server and port setting. Die if non-existent
isset($config['SERVER']['SERVER'])
	or die('No SERVER configuration setting in the SERVER section of config.ini.');
define('SERVER', $config['SERVER']['SERVER']);

isset($config['SERVER']['PORT'])
	or die('No PORT configuration setting in the SERVER section of config.ini.');
define('PORT', $config['SERVER']['PORT']);

//check for memcache module
$output = shell_exec('php -m');
$output = explode("\n", $output);

in_array('memcache', $output)
	or die('Memcache PHP module doesn\'t appear to be installed. It is needed.');

$MEMCACHE = new Memcache();
$MEMCACHE->pconnect(SERVER, PORT);

//set timezone
date_default_timezone_set(isset($config['MISC']['PHP_TIMEZONE'])
	? $config['MISC']['PHP_TIMEZONE']
	: 'Europe/London');


/*
 * OK, it's time to get the items and add them to our cache array.
 */

require_once('classes/Item.class.php');
require_once('classes/Cache.class.php');

$cache = new Cache();

$slabs = $MEMCACHE->getStats('items');
!empty($slabs['items']) or die('Memcache cache is empty.');

foreach (array_keys($slabs['items']) as $slab_no){
	$items = $MEMCACHE->getStats('cachedump', $slab_no, $slabs['items'][$slab_no]['number']);
	foreach(array_keys($items) as $item_key){
		$cache->addCacheItem(new Item($item_key,
		                              $slab_no,
		                              $items[$item_key][1],
		                              $items[$item_key][0] ));
	}

}


/*
 * Time to display some output.
 */

$cache->itemSort(ASC_TIME);

require_once('classes/TableViewer.class.php');
echo TableViewer::getTableHTML($cache);

?>
