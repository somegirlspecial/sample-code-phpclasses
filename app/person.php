<?php

namespace App\Common;


/**
 * Elma Smit, PHP Freelancer.
 *
 * @package  Sample code
 * @author   Elma Smit <e.smit@creativemediaminds.nl>
 * @version	 1.0
*/
abstract class Person
{

	private $name = '';
	private $function = '';

	private $currently_available = true;

	private $address 			= '';
	private $address_number 	= '';
	private $zip 			= '';
	private $city 			= '';
	private $country 		= '';

	private $mobile 	= '';
	private $email 		= '';
   	
	
	/**
	 * 
	 * @param	$name string
	 * @return	void
	*/
	public function __construct($name = "", $attr = array())
	{
		$this->set('name', $name);
		foreach($attr as $a => $value)
		{
			$this->set($a, $value);
		}
	
	
	}
	
	/**
	 *	__set overrule
	 *
	 * @return string
	*/
	public function __set($name, $value)
	{
		throw new \BadMethodCallException('Please use getters and setter');
	}
	
	
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
	 *	Get contact info
	 *
	 * @return string
	*/
	public function getContactInfo()
	{
		 return sprintf("%s, %s", $this->mobile, $this->email);
    }
    
   
    
    //abstract public function someAbstractFunction();

}