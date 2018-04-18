<?php

namespace App\Common;


/**
 * Elma Smit, PHP Freelancer.
 *
 * @package  Sample code
 * @author   Elma Smit <e.smit@creativemediaminds.nl>
 * @version	 1.0
*/
class Assignment
{
	
	public $description;
	
	public $briefing;
	public $client;
	public $users = [];

	/**
	 * Set the specified value.
	 *
	 * @param  mixed  $key
	 * @param  mixed  $value
	 * @return void
	*/
	public function set($key, $value = NULL)
	{
		$keys = is_array($key) ? $key : [$key => $value];

		foreach ($keys as $k => $v)
		{
			$this->{$k} = $v;
		}
	}
	
	/**
	 * Get the specified value.
	 *
	 * @param  string  $key
	 * @param  mixed   $default
	 * @return mixed
	*/
	public function get($key)
	{
		return $this->{$key};
	}
	
	/**
	 * Creates a Briefing
	 * 
	 * @param	<#param#>
	 * @return	void
	*/
	public function setBriefing($briefing)//Briefing $briefing
	{
		$this->briefing = $briefing;
	}
	
	/**
	 * Creates a Company 
	 * 
	 * @param	Company $client
	 * @return	<#return#>
	*/
	public function setClient(Company $client)
	{
		$this->client = $client;
	}
	
	/**
	 * Assign a user
	 * 
	 * @param	Person $user
	 * @return	<#return#>
	*/
	public function assignUser(Person $user)
	{
		
		array_push($this->users, $user);
	
	}
	

	 
}