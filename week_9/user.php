<?php
require_once("database.php");

class User extends Database
{
	const KEY = "Tbnds93rbYaherg7";
	private $data;
	
	public function User($id = null)
	{
		parent::Database();
		if($id != null)
		{
			if(is_numeric($id))
			{
				$this->data = $this->getItem("SELECT * FROM `users` WHERE `id` = $id;");
			}
			else
			{
				$this->data = $this->getItem("SELECT * FROM `users` WHERE `username` = '$id';");
			}
			
		}
		else
		{
			$this->data = new StdClass();
		}
	}
	
	public static function checkLogin($username, $pass)
	{
		$user = new User($username);
		$encPass = sha1(self::KEY.$pass);
		if($user->password == $encPass)
		{
			return $user;
		}
		
		return false;
	}
	
	public function save()
	{
		$this->insert("users", $this->data, false);
		$this->data = $this->getItem("SELECT * FROM `users` ORDER BY `id` DESC LIMIT 1;");
	}
	
	public function __get($key)
	{
		switch($key)
		{
			case 'id':
				return $this->data->id;
			break;
			case 'username':
				return $this->data->username;
			break;
			case 'password':
				return $this->data->password;
			break;
			default:
				throw new Exception("$key not available on this object.");
			break;
		}
	}
	
	public function __set($key, $val)
	{
		switch($key)
		{
			case "id":
				throw new Exception("id cannot be set on this object.");
			break;
			case "username":
				$this->data->username = $this->sanitize($val);
			break;
			case "password":
				$this->data->password = sha1(self::KEY.$val);
			break;
		}
	}
}





