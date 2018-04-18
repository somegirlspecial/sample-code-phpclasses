<?php

namespace App\Common;


/**
 * Elma Smit, PHP Freelancer.
 *
 * @package  Sample code
 * @author   Elma Smit <e.smit@creativemediaminds.nl>
 * @version	 1.0
*/
class Company
{

	private $name 			= '';
	private $address 		= '';
	private $address_number = '';
	private $zip 			= '';
	private $city 			= '';
	private $country 		= '';

	
	/**
	 * 
	 * @param	$name string
	 * @return	void
	*/
	public function __construct($name = "")
	{		
		$this->set('name', $name);
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
	 * Set the addres
	 * 
	 * @param	$address_line string
	 * @param	$zip string
	 * @param	$city string
	 * @return	void
	*/
	public function setAddress($address_line = '', $zip = '', $city='')
	{	
		$this->address 	= $address_line;
		$this->city 	= $city;
		$this->zip		= $zip;
	}
	
	/**
	 * Get the full address
	 * 
	 * @return	string
	*/
	public function getFormattedAddress()
	{	
		return sprintf(" %s <br/>%s  &nbsp%s", 
					$this->address, $this->zip, $this->city);
	}
	
	/**
	 * Get the full Company
	 * 
	 * @return	string
	*/
	public function getFullCompany()
	{	
		return sprintf("%s<br/> %s", $this->name, $this->getFormattedAddress());
	}
	
	

}