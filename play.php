<body style="background-color: gray;">
<?php

//session_unset();

require 'vendor\autoload.php';
session_start();


if(!isset($_SESSION['bees'])) {
	$bee_array = new Game\Beehive();

	$bee_array->addQueen(1);
	$bee_array->addWorker(1);
	$bee_array->addDrone(1);
	
	$_SESSION['bees'] = $bee_array;
	$_SESSION['log'] = array();
	
	print_r($_SESSION['bees']);
	
}

if(isset($_GET['hit']) && $_GET['hit']) {
	
	//$random_bee = $_SESSION['bees']->random_bee(); print_r($random_bee);
	//$random_bee->hit();
	//print_r($_SESSION['bees']);
	$_SESSION['bees']->random_bee()->hit();
}

?>

<?php if(isset($_SESSION['bees'])) { ?>
<table>
	<tr style="border-bottom: 1px solid black;">
		<th style="width: 200px; text-align: center;">Bees</th>
	</tr>
	<?php
	foreach($_SESSION['bees'] as $hive)
	{
		foreach($hive as $bee) 
		{
		?>	
		<tr>
		<td style="width: 200px; text-align: center;">
			<?php
			echo $bee->name . " : " . $bee->current_health;
			?>
		</td>
		</tr>
		<?php 
		}
	}

	?>
</table>
<input type="button" value="Hit random bee" onclick="window.location = '?hit=1'" style="width: 200px;">
<?php } ?>


<?php if(!is_null($_SESSION['log'])) {
	
	foreach($_SESSION['log'] as $msg) {
		?>
		<div><?php echo $msg; ?></div>
		<?php
	}
	
}
?>

</body>
