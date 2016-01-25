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
	 * @param  int|string $id
	 */
	public function show($id)
	{
		die(__FUNCTION__.' triggerd in '.__CLASS__.' argument value: '.$id);
	}
}