<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

define('BASE_FOLDER', dirname(dirname(__FILE__)) . '/');
define('DATA', BASE_FOLDER . 'data/');
define('PUBLIC', BASE_FOLDER . 'public/');
define('TEMPLATES', BASE_FOLDER . 'templates/');
define('VENDORS', BASE_FOLDER . 'vendors/');

set_include_path(implode(PATH_SEPARATOR, array_merge(glob(VENDORS . '*/lib'), array(get_include_path()))));

require 'sfYaml.php';
require 'Twig/Autoloader.php';

Twig_Autoloader::register();

if (isset($argv) and count($argv) == 2) {
	$url = $argv[1];
}
else if (isset($_GET['url'])) {
	$url = $_GET['url'];
}
else {
	$url = '';
}

if (empty($url)) {
	$url = 'index';
}

$url = trim($url, '/');

if (is_dir(TEMPLATES . $url)) {
	$url .= '/index';
}
$url = str_replace('.html', '', $url);
$url .= '.html';

$loader = new Twig_Loader_Filesystem(TEMPLATES);
$twig = new Twig_Environment($loader, array(
	'debug' => true,
));

$data = array();

foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator(DATA), RecursiveIteratorIterator::LEAVES_ONLY) as $file) {
	if (preg_match('/\.ya?ml$/', $file)) {
		if ($loaded = sfYaml::load($file->getRealPath())) {
			$data = array_merge($data, $loaded);
		}
	}
}

$template = $twig->loadTemplate($url);
$template->display($data);