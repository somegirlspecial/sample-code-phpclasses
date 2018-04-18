<?php

namespace App\Common;

use App\Common\Assignment;
use App\Assignment\Briefing;


/**
 * Elma Smit, PHP Freelancer.
 *
 * @package  Sample code
 * @author   Elma Smit <e.smit@creativemediaminds.nl>
 * @version	 1.0
*/
class App
{
	
	public $assignment;

	
	/**
	 * Build
	 * 
	 * @param	<#param#>
	 * @return	void
	 */
	protected function build()
	{
		
		
		/*
		 * Setup the  assignment 
		 */
		$this->assignment = new Assignment();
		
			$client 		= new Company("Bravouxe");
			$client->setAddress("Oosteinde 23", "1017 WT", "Amsterdam");
			
			// Create the briefing 
			$goal 			= "Realise something out of the box to show of your code skills.";
			$vars 			= [
								'foo' => 'bar'
							];
		
		$briefing = new Briefing("Show your code skills", ['goal' => $goal, 'config' => $vars]);
		
		
		/*
		 * Assign user(s)
		 */
		$freelancer = new Freelancer("Elma Smit", [
										'role'=>'PHP developer (freelancer)',
										'rate'=>'75',
										'hours_available'=>'24',
										'email'=>'e.smit@creativemediaminds.nl',
										'mobile'=>'+31 (0)6 181 94 601'
									]);

		$this->assignment->description = "These two tables display a problem and the solution. The first tables
										has non matchings text colors and the cells names are not correct. This
										script rearange the cells and brings back the correct colors, also
										orders the colors from light to dark. ";
		$this->assignment->setClient($client);
		$this->assignment->setBriefing($briefing);
		$this->assignment->assignUser($freelancer);		

	
	}
	
	
	/**
	 * Run the challenge
	 * 
	 * @param	<#param#>
	 * @return	<#return#>
	 */
	public function run()
	{
		
		$app = $this->build();
	
	}
	
}