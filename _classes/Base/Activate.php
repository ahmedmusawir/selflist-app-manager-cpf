<?php

/**
 * PLUGIN ACTIVATION CLASS
 */
class Activate
{
	public function __construct()
	{
		# code...
	}

	public static function activate()
	{

		flush_rewrite_rules();

	}
}