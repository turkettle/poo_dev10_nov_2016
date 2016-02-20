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
	public function show($id)
	{
		$response = __FUNCTION__.' triggerd in '.__CLASS__.' argument value: '.$id;

		return $response;
	}
}