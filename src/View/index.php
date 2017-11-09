<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Test</title>
	<link rel="stylesheet" href="/css/style.css"/>
</head>
<body>
	<div class="wrapper">
		<div class="caption">List of request</div>
		<div id="table_head">
			<div class="table_row">
				<div class="table_cell">Name subject</div>
				<div class="table_cell">January</div>
				<div class="table_cell">February</div>
				<div class="table_cell">March</div>
				<div class="table_cell">April</div>
				<div class="table_cell">May</div>
				<div class="table_cell">June</div>
				<div class="table_cell">July</div>
				<div class="table_cell">August</div>
				<div class="table_cell">September</div>
				<div class="table_cell">October</div>
				<div class="table_cell">November</div>
				<div class="table_cell">December</div>
			</div>
		</div>
		<div id="table_body">
		    <?php foreach ($data->Rows AS $subject => $requests) { ?>
		        <div class="table_row">
		        	<div class="table_cell"><?=$subject;?></div>
		        	<?php foreach ($requests AS $countRequest) { ?>
		        	    <div class="table_cell"><?=$countRequest;?></div>
		        	<?php } ?>
		        </div>
		    <?php } ?>
		</div>
	</div>
	<br><br>
	<div class="wrapper">
	    <div class="caption">Chart</div>
	    <?php require_once('chart.php'); ?>
	</div>
</body>
</html>