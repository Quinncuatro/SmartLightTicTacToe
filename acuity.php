<?php

$lights = array( array("007F4E47","007F4E52","007F4D60"),
		 array("007F4E3E","007F4320","007F4E44"),
		 array("0085D4D4","008984BC","007F4D5B")
	       );

for($m=0;$m<3;$m++){
	for($n=0;$n<3;$n++){
			
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL,"http://fwf01-pc:8080/api.ashx?".$lights[$m][$n]."/on/");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, array());
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$server_output = curl_exec ($ch);
	curl_close ($ch);
	
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL,"http://fwf01-pc:8080/api.ashx?".$lights[$m][$n]."/dim/100/");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, array());
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$server_output = curl_exec ($ch);
	curl_close ($ch);
	}
}

$grid = array( array("","",""),
	       array("","",""),
	       array("","","")
	     );

function fuckWithTheLights($x, $y, $z) {

	$lights = array( array("007F4E47","007F4E52","007F4D60"),
		 	 array("007F4E3E","007F4320","007F4E44"),
		 	 array("0085D4D4","008984BC","007F4D5B")
	          );

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL,"http://fwf01-pc:8080/api.ashx?".$lights[$x][$y]."/dim/".$z."/");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, array());
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$server_output = curl_exec ($ch);
	curl_close ($ch);
}

$turn = 1;

for($i=0;$i<10;$i++){

	$turnDim = null;

	if($turn % 2 === 0) {
		$turnDim = 1;
		echo "Hey Player 1! \n";
	} else {
		$turnDim = 50;
		echo "Hey Player 2! \n";
	}

	echo "What's your next x coordinate? (1-3)";
	$xcoord = null;
	
	$handle = fopen ("php://stdin", "r");
	$line = fgets($handle);
	switch(trim($line)){
		case 1:
			$xcoord = (trim($line) - 1);
			fclose($handle);
			break;
		case 2:
			$xcoord = (trim($line) - 1);
			fclose($handle);
			break;
		case 3:
			$xcoord = (trim($line) - 1);
			fclose($handle);
			break;
	}
		

	echo "What's your next y coordinate? (1-3)";
	$ycoord = null;

	$handle2 = fopen ("php://stdin", "r");
	$line2 = fgets($handle2);
	switch(trim($line2)){
		case 1:
			$ycoord = (trim($line2) - 1);
			fclose($handle2);
			break;
		case 2:
			$ycoord = (trim($line2) - 1);
			fclose($handle2);
			break;
		case 3:
			$ycoord = (trim($line2) - 1);
			fclose($handle2);
			break;
	}

	$turn++;

	$lights[$xcoord][$ycoord] = "X";

	fuckWithTheLights($xcoord, $ycoord, $turnDim);
}

?>
