<?php

namespace App\Controllers;

/**
 * UserController class
 */
class UserController
{
	/**
	 * Show the requested user
	 *
	 * @param  string $id
	 *
	 * @return string
	 */
	public function show()
	{
        \Kint::dump($GLOBALS, $_SERVER);
		$response = __FUNCTION__.' triggerd in '.__CLASS__.' argument value: ';

		return $response;
	}
}