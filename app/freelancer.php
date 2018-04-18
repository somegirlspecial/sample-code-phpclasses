<?php

namespace App\Common;

use App\Common\Person;

/**
 * Elma Smit, PHP Freelancer.
 *
 * @package  Sample code
 * @author   Elma Smit <e.smit@creativemediaminds.nl>
 * @version	 1.0
*/
class Freelancer extends Person
{

    public $role;
	public $rate 			= int;
   	public $hours_available = int;
   	  
     
  
    
    /**
	 *	Get Rate of Freelancer 
	 *
	 * @return string
	*/
	public function getRate()
	{
		 return sprintf("€ %s,-", $this->rate);
    }
    
    /**
	 *	Get Available hours of Freelancer 
	 *
	 * @return string
	*/
    public function getAvailableHours()
	{
		 return sprintf("%s hours a week", $this->hours_available);
    }
}