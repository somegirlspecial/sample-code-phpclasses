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
		<h2><?php echo $app->assignment->briefing->get('name');?></h2>

		<div class="col-8">
		
			<!-- Client -->
			<div id="client">
				<dl>
					<dt>Client:</dt>
					<dd><?php echo $app->assignment->client->getFullCompany();?></dd>
					<dt>Budget:</dt>
					<dd>Nader te bepalen</dd>
					<dt>Deadline:</dt>
					<dd>Today</dd>
				</dl>
			</div>
			<p class="lead">Goal: <?php echo $app->assignment->briefing->get('goal');?></p>
			<p><?php print nl2br($app->assignment->get('description'));?></p>
		
		</div>
		<div class="col-4">
			<!-- Users -->
			<div id="users">
				<h1 class="subheading">Assigned</h1>
				<?php foreach($app->assignment->users as $user):?>
				<h2><?php echo $user->get('name');?></h2>
				<dl>
					<dt>Role:</dt>
					<dd><?php echo $user->get('role');?></dd>
					<dt>Rate: </dt>
					<dd><?php echo $user->getRate();?></dd>
					<dt>Hours: </dt>
					<dd><?php echo $user->getAvailableHours();?></dd>
					<dt>Contact: </dt>
					<dd><?php echo $user->getContactInfo();?> </dd>
				</dl>
				<?php endforeach;?>
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
				<?php foreach($problem->input['cell_names'] as $i => $c):?>
				<?php if($i%3==0): ?>
				<tr>
				<?php endif;?>
					<td style="background-color: <?php echo $problem->input['cell_colors'][$i]?>">
						<h3 style="color: <?php echo $problem->input['cell_text_colors'][$i]?>;"><?php echo $c;?></h3>
						<p style="color: <?php echo $problem->input['cell_text_colors'][$i]?>;">
							- <?php echo ucfirst($problem->input['cell_text_colors'][$i])?> - 
						</p>
					</td>
				<?php if($i%3==2): ?>
				</tr>
				<?php endif; ?>
				<?php endforeach; ?>
			</table>
			</div>
		</div>
		<div class="col-6 solution">
			<div class="box">
			<p>Solution</p>
			<table width="100%" class="color-table">
				<?php foreach($problem->output['table'] as $i => $c): ?>
				<?php if($i%3==0): ?>
				<tr>
				<?php endif;?>
					<td style="background-color: <?php echo $c['color']?>;">
						<h3 style="color: <?php echo ($c['lightness'] < 0.6) ? 'white': 'black'?>"><?php echo $c['id'];?></h3>
						<p style="color:  <?php echo $c['color']?>; background-color: <?php echo ($c['lightness'] < 0.6) ? 'white': 'black'?>">
							<?php echo ucfirst($c['color'])?>
						</p>
					</td>
				<?php if($i%3==2): ?>
				</tr>
				<?php endif; ?>
				<?php endforeach; ?>
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