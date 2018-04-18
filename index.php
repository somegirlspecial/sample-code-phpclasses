<?php

/**
 * Elma Smit, PHP Freelancer.
 *
 * @package  Sample code
 * @author   Elma Smit <e.smit@creativemediaminds.nl>
*/
require_once('app/app.php');
require_once('app/assignment.php');
require_once('app/assignment/code.php');
require_once('app/assignment/briefing.php');
require_once('app/person.php');
require_once('app/freelancer.php');
require_once('app/company.php');


// Hello let's go!
$app = new \App\Common\App();
$app->run();

//print_r($app);

?>
<!doctype html>
<html lang="NL-nl">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
    <title>Sample</title>
	<meta name="description" content="">
	
	<link href="app.css" rel="stylesheet">
</head>
<body>
	<!-- Header -->
	<header>
		<h2 class="caption">Sample code</h2>
	</header>
	<section id="briefing" class="row">
		
		<!-- Briefing -->
		<h1 class="subheading">Briefing</h1>
		<div class="col-8">
		
			<h2><?=$app->assignment->briefing->get('name');?></h2>
			<!-- Client -->
			<div id="client">
				<dl>
					<dt>Client:</dt>
					<dd><?=$app->assignment->client->getFullCompany();?></dd>
					<dt>Budget:</dt>
					<dd>Nader te bepalen</dd>
					<dt>Deadline:</dt>
					<dd>Today</dd>
				</dl>
			</div>
			<p class="lead">Goal: <?=$app->assignment->briefing->get('goal');?></p>
			<p><?=nl2br($app->assignment->get('description'));?></p>
		
		</div>
		<div class="col-4">
			<!-- Users -->
			<div id="users">
				<h3 class="subheading">Assigned to:</h3>
				<? foreach($app->assignment->users as $user):?>
				<h2><?=$user->get('name');?></h2>
				<dl>
					<dt>Role:</dt>
					<dd><?=$user->get('role');?></dd>
					<dt>Rate: </dt>
					<dd><?=$user->getRate();?></dd>
					<dt>Hours: </dt>
					<dd><?php echo $user->getAvailableHours();?></dd>
					<dt>Contact: </dt>
					<dd><?=$user->getContactInfo();?> </dd>
				</dl>
				<? endforeach;?>
			</div>
		</div>
			
	</section>

	<section id="app" class="row">
		
		<!-- App -->
		<h1 class="text-center">App</h1>		
		<div class="col-6 problem">
			<div class="box">
			<p>Problem</p>
			<?php
				
				$problem = new \app\assignment\Code();
				$problem->solve();
			?>		
			<table width="100%" class="color-table">
				<? foreach($problem->input['cell_names'] as $i => $c):?>
				<? if($i%3==0): ?>
				<tr>
				<? endif;?>
					<td style="background-color: <?=$problem->input['cell_colors'][$i]?>">
						<h3 style="color: <?=$problem->input['cell_text_colors'][$i]?>;"><?=$c;?></h3>
						<p style="color: <?=$problem->input['cell_text_colors'][$i]?>;">
							- <?=ucfirst($problem->input['cell_text_colors'][$i])?> - 
						</p>
					</td>
				<? if($i%3==2): ?>
				</tr>
				<? endif; ?>
				<? endforeach; ?>
			</table>
			</div>
		</div>
		<div class="col-6 solution">
			<div class="box">
			<p>Solution</p>
			<table width="100%" class="color-table">
				<? foreach($problem->output['table'] as $i => $c): ?>
				<? if($i%3==0): ?>
				<tr>
				<? endif;?>
					<td style="background-color: <?=$c['color']?>">
						<h3 style="color: <?=($c['lightness'] < 0.6) ? 'white': 'black'?>"><?=$c['id'];?></h3>
						<p style="color:  <?=$c['color']?>; background-color: <?=($c['lightness'] < 0.6) ? 'white': 'black'?>">
							<?=ucfirst($c['color'])?>
						</p>
					</td>
				<? if($i%3==2): ?>
				</tr>
				<? endif; ?>
				<? endforeach; ?>
			</table>
			</div>
		</div>
	</section>
	<!-- Footer -->
	<footer>
		<p>- Thnx for analysing -</p>
	</footer>
	
	
<style>
@import url('https://fonts.googleapis.com/css?family=Source+Sans+Pro');
</style>	
</body>
</html>