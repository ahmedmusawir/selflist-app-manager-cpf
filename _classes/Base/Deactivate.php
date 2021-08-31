<?php

/**
 * PLUGIN DEACTIVATION CLASS
 */
class Deactivate
{
	public function __construct()
	{
		# code...
	}

	public static function deactivate()
	{

		flush_rewrite_rules();

	}

}