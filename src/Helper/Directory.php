<?php

namespace BingoPress\Helper;

!defined('WPINC ') or die();

/**
 * Helper library for BingoPress framework
 *
 * @package    BingoPress
 * @subpackage BingoPress\Includes
 */

trait Directory
{
	/**
	 * Get lists of directories
	 * @return  void
	 * @var     string  $path   Directory path
	 */
	public function getDir($path, $directories = [])
	{
		foreach (glob($path . '/*', GLOB_ONLYDIR) as $dir) {
			$directories[] = basename($dir);
		}
		return $directories;
	}

	/**
	 * Get files within directory
	 * @return  array
	 * @var     string  $dir   framework hooks directory (Api, Controller)
	 */
	public function getDirFiles($dir, &$results = [])
	{
		if (!is_dir($dir)) {
			return $results;
		}
		$files = scandir($dir);
		foreach ($files as $key => $value) {
			$path = sprintf('%s/%s', $dir, $value);
			$path = realpath($path);
			if (!is_dir($path)) {
				$results[] = $path;
			} elseif ($value != '.' && $value != '..') {
				$this->getDirFiles($path, $results);
			}
		}
		return $results;
	}
}
