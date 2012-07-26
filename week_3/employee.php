<?php

class Employee
{
	private static $employees = array();
	private $name;
	private $title;
	private $uniform;
	protected $salary;
	
	public function Employee($name = "", $title = "", $salary = 0)
	{
		self::$employees[] = $this;
		if(!empty($name))
		{
			$this->setName($name);
		}
		if(!empty($title))
		{
			$this->setTitle($title);
		}
		if(!empty($salary))
		{
			$this->setSalary($salary);
		}
	}
	
	public function setName($name)
	{
		$this->name = ucwords($name);
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function setTitle($title)
	{
		$this->title = ucwords($title);
	}
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function setSalary($salary)
	{
		$this->salary = (float) $salary;
	}
	
	public function getSalary()
	{
		setlocale(LC_MONETARY, 'en_US');
		return money_format("%.2n",$this->salary)." per year";
	}
	
	public static function getNumEmployees()
	{
		return count(self::$employees);
	}
	
	public static function listEmployees()
	{
		foreach(self::$employees as $employee)
		{
			echo "<p>".$employee->getName().
			" : ".$employee->getTitle().
			" : ".$employee->getSalary()."</p>";
		}
	}
}

class HourlyEmployee extends Employee
{
	private $clockTime = null;
	
	
	public function getSalary()
	{
		setlocale(LC_MONETARY, 'en_US');
		return money_format("%.2n",$this->salary)." per hour";
	}
	
	public function clockIn()
	{
		if($this->clockTime === null)
		{
			$this->clockTime = time();
			echo "<p>".$this->getName()." clocked in on ".date("M d, Y H:i:s", $this->clockTime)."</p>";
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
			echo "<p>".$this->getName()." worked for $timeDiff seconds.</p>";
			$this->clockTime = null;
		}
		else
		{
			echo "You are not clocked in.";
		}
	}
}

?>




