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
class Code extends Assignment
{

	private $html_colors  =  [
			'aqua'		=>['r'=>0x00,  'g'=>0xFF,  'b'=>0xFF], 
			'black'		=>['r'=>0x00,  'g'=>0x00,  'b'=>0x00], 
			'blue'		=>['r'=>0x00,  'g'=>0x00,  'b'=>0xFF], 
			'fuchsia'	=>['r'=>0xFF,  'g'=>0x00,  'b'=>0xFF], 
			'gray'		=>['r'=>0x80,  'g'=>0x80,  'b'=>0x80], 
			'green'		=>['r'=>0x00,  'g'=>0x80,  'b'=>0x00], 
			'lime'		=>['r'=>0x00,  'g'=>0xFF,  'b'=>0x00], 
			'maroon'	=>['r'=>0x80,  'g'=>0x00,  'b'=>0x00], 
			'navy'		=>['r'=>0x00,  'g'=>0x00,  'b'=>0x80], 
			'olive'		=>['r'=>0x80,  'g'=>0x80,  'b'=>0x00], 
			'purple'	=>['r'=>0x80,  'g'=>0x00,  'b'=>0x80], 
			'red'		=>['r'=>0xFF,  'g'=>0x00,  'b'=>0x00], 
			'silver'	=>['r'=>0xC0,  'g'=>0xC0,  'b'=>0xC0], 
			'teal'		=>['r'=>0x00,  'g'=>0x80,  'b'=>0x80], 
			'white'		=>['r'=>0xFF,  'g'=>0xFF,  'b'=>0xFF], 
			'yellow'	=>['r'=>0xFF,  'g'=>0xFF,  'b'=>0x00], 
 	];
	private $cell_names = ['A1','B1','C1','A2','B2','C2','A3','B3','C3'];
	private $cell_colors = ["aqua","blue","fuchsia","silver","green","lime","olive","navy","red"];
	
		
	public $input = [];
	public $output = [];

	/**
	 * Constructor
	 * 
	 * @access	<#acces#>
	 * @param	<#param#>
	 * @return	<#return#>
	*/
	public function __construct()
	{ 
		
		$this->input['cell_names'] 			= $this->cell_names;
		$this->input['cell_text_colors'] 	= $this->cell_colors;
		$this->input['cell_colors'] 		= $this->cell_colors;
		
		shuffle($this->input['cell_text_colors'] );
		shuffle($this->input['cell_names'] );
		shuffle($this->input['cell_colors'] );
		
	}
	
	/**
	 * Solve
	 * 
	 * @param	<#param#>
	 * @return	void
	*/
	public function solve()
	{ 
	
		/*
		 * 1. Sort the cells by row name and cell num
		 */
		$this->output['cell_names'] = $this->input['cell_names'];
		sort($this->output['cell_names'], SORT_STRING);
		
		
		/*
		 * 2. Sort the colors. Calculate the luminosity and order colors from light to dark
		 */
		$colors = [];
		
		foreach($this->input['cell_colors'] as $i => $colorname)
		{	
		
			$rgb = $this->html_colors[$colorname];	
			// LUMA calculation for the lightness: https://en.wikipedia.org/wiki/Luma_(video)
			$colors[$colorname] = (0.2126 * $rgb['r'] + 0.7152 * $rgb['g'] + 0.0722 * $rgb['b']) / 255;
		}
		
			// Order and reverse.
			asort($colors, SORT_NUMERIC);
			$colors = array_reverse($colors);

		
		/*
		 * 3. Set the output and create the table array
		 */
		$this->output['colors_luminosity'] = $colors;
		$this->output['colors'] = array_keys($this->output['colors_luminosity']);
		
			$table = [];
			for ($i = 0; $i <= count($this->input['cell_names']); $i++)
			{
				$colorname = $this->output['colors'][$i];
		
				$table[$i]['id'] = $this->output['cell_names'][$i];
				$table[$i]['color'] = $colorname;
				$table[$i]['lightness'] = $this->output['colors_luminosity'][$colorname];
			}
		
		$this->output['table'] = $table;
		
		return $this->output;
	
	}


}