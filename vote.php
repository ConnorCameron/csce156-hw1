<?php
$file = fopen($argv[1],"r");

function cmp($a, $b) {
    if ($a == $b) {
        return 0;
    }
    return ($b - $a);
}

$name = fgets($file);
$name = trim($name);
$count = 0;
$votes = array();
while(!feof($file)){
	$string = fgets($file);
	$string = trim($string);
	$votes[$count] = $string;
	$count++;
}

$tokens = explode(",", $name);
$addedvotes = array();

$i = 0;
$people = count($tokens);
while ($i<$people){
	$addedvotes[] = 0;
	$i++;
}

$i = 0;
while($i<$count){
	$votetoken=explode(",",$votes[$i]);
	$j = 0;
	while($j<$people){
		$addedvotes[$j] = $addedvotes[$j] + ($people - ($votetoken[$j]-1));
		$j++;
	}
	$i++;
}
uasort($addedvotes, 'cmp');

$i = 0;
foreach($addedvotes as $key => $value){
	if($i == 0){
		printf("%s is the winner!\n",$tokens[$key]);
		$i++;
	}
}

printf("Canidate    Points\n");
foreach($addedvotes as $key => $value){
	printf("%s       %d\n",$tokens[$key],$value);
}


?>

