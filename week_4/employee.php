<?php

class Employee
{
	private static $employees = array();
	private $_name;
	private $_title;
	protected $_salary;
	
	public function Employee($name = "", $title = "", $salary = 0)
	{
		self::$employees[] = $this;
		if(!empty($name))
		{
			$this->name = $name;
		}
		if(!empty($title))
		{
			$this->title = $title;
		}
		if(!empty($salary))
		{
			$this->salary = $salary;
		}
	}
	
	public static function getNumEmployees()
	{
		return count(self::$employees);
	}
	
	public static function listEmployees()
	{
		foreach(self::$employees as $employee)
		{
			echo "<p>$employee->name : $employee->title : $employee->salary</p>";
		}
	}
	
	public function __get($key)
	{
		switch($key)
		{
			case "name":
				return $this->_name;
			break;
			case "title":
				return $this->_title;
			break;
			case "salary":
				setlocale(LC_MONETARY, 'en_US');
				return money_format("%.2n",$this->_salary)." per year";
			break;
			default:
				//return $this->$key; //makes __get work like it used to if nothing in the switch statement matches
				throw new Exception("$key does not exist on this object."); //locks out additional variables
			break;
		}
	}
	
	public function __set($key, $val)
	{
		switch($key)
		{
			case "name":
				$this->_name = ucwords($val);
			break;
			case "title":
				$this->_title = ucwords($val);
			break;
			case "salary":
				$this->_salary = (float) $val;
			break;
			default:
				//$this->$key = $val; //makes __set work like it used to if nothing in the switch statement matches
				throw new Exception("$key does not exist on this object."); //locks out additional variables
			break;
		}
	}
}

class HourlyEmployee extends Employee
{
	private $clockTime = null;
	
	public function clockIn()
	{
		if($this->clockTime === null)
		{
			$this->clockTime = time();
			echo "<p>$this->name clocked in on ".date("M d, Y H:i:s", $this->clockTime)."</p>";
		}
		else
		{
			echo "You are already clocked in. Did you clock out last night?";
		}
	}
	
	public function clockOut()
	{
		if($this->clockTime !== null)
		{
			$timeDiff = time() - $this->clockTime;
			echo "<p>$this->name worked for $timeDiff seconds.</p>";
			$this->clockTime = null;
		}
		else
		{
			echo "You are not clocked in.";
		}
	}
	
	public function __get($key)
	{
		switch($key)
		{
			case "notHere":
				return $this->clockTime === null;
			break;
			case "salary":
				setlocale(LC_MONETARY, 'en_US');
				return money_format("%.2n",$this->_salary)." per hour";
			break;
			default:
				return parent::__get($key); //runs Employee's __get()
			break;
		}
	}
}

?>




