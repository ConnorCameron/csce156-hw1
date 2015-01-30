<?php
$atomic = $argv[1];
$name = $argv[2];
$symbol = $argv[3];
$halflife = $argv[4];
$mass = $argv[5];

$left = $mass;
$years = 0;
printf("%s      (%d-%s)\n",$name,$atomic,$symbol);
printf("Elapsed Years   Amount\n");
while($left>=($mass/2)){
	$left = $mass * (pow(.5000735957,$years/$halflife));
	printf ("%d               %f\n",$years,$left);
	$years++;
}

?>