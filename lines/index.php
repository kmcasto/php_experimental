<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<title>circle</title>
<style type="text/css">
.output_layer  {

}
</style>

</head>
<body>
<form action="index.php" method="get">
circle text here: <input type="text" name="circle"/>
radius in px: <input type="text" name="radius" value="100" />
<input type="submit" />
</form>

<?php

//input string

$string = $_GET["circle"];
//echo "original string: $string <br>";

//$word_array = explode(" ", $string);
$word_array = str_split($string);
$num = count($word_array);

//echo "number of words: $num <br>" ;
//print_r ($word_array);

// Make a circle

// radius
$r = $_GET["radius"];

$angle_offset = (360 / $num);
//echo $angle_offset;
$count = 0;
// hack until i setup the below while to output to array and take last $x and $y as margins (?)
// very ugly but works
echo "<div style=\"\">";
while ($count <= $num) {
$y = round($r * cos(deg2rad($angle_offset * $count - 90)) + $r*3, 3);
$x = round($r * sin(deg2rad($angle_offset * $count - 90)) + $r*3, 3);
//move -90 to ($count-1)) -90 for box mode
//$y_0 = round($r * cos(deg2rad($angle_offset * ($count-1)) - 90), 3);
$y_0 = round($r * cos(deg2rad($angle_offset * ($count-1) -90)), 3);
$x_0 = round($r * sin(deg2rad($angle_offset * ($count-1) -90)), 3);

$y_1 = round($r * cos(deg2rad($angle_offset * ($count+1) - 90)), 3);
$x_1 = round($r * sin(deg2rad($angle_offset * ($count+1) - 90)), 3);
//$transform_ang = atan2(($y_1 - $y_0)/($x_1 - $x_0));
// subtract 90 for sun mode
// ))); for normal
$transform_ang = rad2deg(atan2(($x_1 - $x_0), ($y_1 - $y_0)))-90;
//echo $angle_offset * $count;
//echo "<br>";
//echo "$x,$y<br>";
$px = "px";
$deg = "deg";
$color_count1 = rand(0,255);
$color_count2 = rand(0,255);
$color_count3 = rand(0,255);
echo "<div style=\"
/*background-color: rgb($color_count1,$color_count2,$color_count3);
color: white;
padding: 7px;
font-size: 30px;*/
position: absolute; left: $y$px;top: $x$px;
-webkit-transform: rotate($transform_ang$deg);
-moz-transform: rotate($transform_ang$deg);
-ms-transform: rotate($transform_ang$deg);
-o-transform: rotate($transform_ang$deg);
transform: rotate($transform_ang$deg);\">$word_array[$count]
</div> \n";
$count++;
}


?>
</div>



</body>
</html>
