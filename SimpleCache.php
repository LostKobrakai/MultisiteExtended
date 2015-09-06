<?php

/*
 * SimpleCache v1.4.1
 *
 * By Gilbert Pellegrom
 * http://dev7studios.com
 *
 * Free to use and abuse under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Modified version by Benjamin Milde
 * http://kobrakai.de
 */
class SimpleCache {

	// Path to cache folder (with trailing /)
	public $cache_path = 'cache/';
	// Length of time to cache a file (in seconds)
	public $cache_time = 3600;
	// Cache file extension
	public $cache_extension = '.cache';

	public function set_cache($label, $data)
	{
		file_put_contents($this->buildPath($label), $data);
	}

	public function get_cache($label)
	{
		if($this->is_cached($label)){
			$filename = $this->buildPath($label);
			return file_get_contents($filename);
		}

		return false;
	}

	public function is_cached($label)
	{
		$filename = $this->buildPath($label);

		if(file_exists($filename)){
			if($this->cache_time === -1) return true;
			if(filemtime($filename) + $this->cache_time >= time()) return true;
		}

		return false;
	}

	public function remove_cache($label)
	{
		$filename = $this->buildPath($label);

		@unlink($filename);
	}

	public function buildPath($label)
	{
		return $this->cache_path . $this->safe_filename($label) . $this->cache_extension;
	}

	//Helper function to validate filenames
	private function safe_filename($filename)
	{
		return preg_replace('/[^0-9a-z\.\_\-]/i','', strtolower($filename));
	}
}