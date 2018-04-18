<?php

namespace App\Assignment;

use App\Common\Assignment;

/**
 * Elma Smit, PHP Freelancer.
 *
 * @package  Sample code
 * @author   Elma Smit <e.smit@creativemediaminds.nl>
 * @version	 1.0
*/
class Briefing extends Assignment
{

	protected $name;
	protected $goal;
	protected $date_deadline;
	protected $date_created;
	protected $date_publish;
	protected $foo;
	protected $bar;
	
	
	/**
	 * Constructor
	 * 
	 * @param	string $name
	 * @param	array $config
	 * @return	void
	*/
	function __construct($name = '', $config = [])
	{
		
		$this->set('name', $name);		
		$this->set($config);

	}
	
	 
}