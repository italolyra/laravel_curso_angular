<?php
namespace CodeProject\OAuth;
/**
* Created by PhpStorm.
 * User: Italo
* Date: 30/10/2015
* Time: 15:25
*/
use Auth;


class Verifier
{
	public function verify($username, $password)
	{
		$credentials = [
			'email'    => $username,
			'password' => $password,
		];

		if (Auth::once($credentials)) {
			return Auth::user()->id;
		}

		return false;
	}
}