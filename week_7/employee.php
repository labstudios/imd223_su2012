<?php
require_once("database.php");

class Employee extends Database
{
	private $data;
	
	public function Employee($id = null)
	{
		parent::Database();
		if(!empty($id))
		{
			$this->data = $this->getItem("SELECT * FROM `employees` WHERE `id` = $id;");
		}
		else
		{
			$this->data = new StdClass();
		}
	}
	
	public static function getEmployees()
	{
		$db = new Database();
		$emps = $db->getArray("SELECT `id` FROM `employees`");
		$ret = array();
		foreach($emps as $emp)
		{
			$ret[] = new Employee($emp->id);
		}
		return $ret;
	}
	
	public function save()
	{
		return $this->insert("employees", $this->data, false);
	}
	
	public function __get($key)
	{
		
		switch($key)
		{
			case "id":
				return $this->data->id;
			break;
			case "first_name":
				return $this->data->first_name;
			break;
			case "last_name":
				return $this->data->last_name;
			break;
			case "user_name":
				return $this->data->user_name;
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
			case "first_name":
				$this->data->first_name = $this->sanitize($val);
			break;
			case "last_name":
				$this->data->last_name = $this->sanitize($val);
			break;
			case "user_name":
				$this->data->user_name = $this->sanitize($val);
			break;
			default:
				throw new Exception("$key can not be set on this object.");
			break;
		}
	}
}












