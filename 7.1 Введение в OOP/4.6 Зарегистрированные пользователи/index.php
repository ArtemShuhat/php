<?php

class User
{
	protected $login;
	protected $password;

	public function __construct($login = "", $password = "")
	{
		$this->login = $login;
		$this->password = $password;
	}

	/**
	 * Get the value of login
	 */
	public function getLogin()
	{
		return $this->login;
	}

	/**
	 * Set the value of login
	 *
	 * @return  self
	 */
	public function setLogin($login)
	{
		$this->login = $login;

		return $this;
	}

	/**
	 * Get the value of password
	 */
	public function getPassword()
	{
		return $this->password;
	}

	public function isValid($login, $password)
	{
		return $this->login === $login && $this->password === $password;
	}
}

$user = new User("John", "qwerty");

if ($user->isValid("John", "qwerty")) {
	echo "OK";
} else {
	echo "Error";
}
;