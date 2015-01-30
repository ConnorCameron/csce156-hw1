<?php
$file = fopen($argv[1], "r");

$letters = fgets($file);

$words = array();
while(!feof($file)){
	$word = fgets($file);
	$words[] = $word;
}

$arrayletters = explode(" ",$letters);

function Comparator($a, $b){
	global $arrayletters;
	$keya = 0;
	$keyb = 0;
	$boo = 0;
	$i = 0;
	$lettera = $a[0];
	$letterb = $b[0];
	while ($boo == 0){
		if($lettera == $arrayletters[$i]){
			$keya = $i;
			$boo = 1;
		}
		$i++;
	}
	$boo = 0;
	$i = 0;
	while ($boo == 0){
		if($letterb == $arrayletters[$i]){
			$keyb = $i;
			$boo = 1;
		}
		$i++;
	}

	return ($keya - $keyb);
}

usort($words,"Comparator");
print_r($words);
?>