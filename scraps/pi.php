<?				
$start = time();	
$num_pi = 2000;	
//funtion sqr($num){ return
//$num*$num;}
//functio caldis($x, $y){
//$caldis = sqrt(sqr($x-1)+sqr($y-1));
return $caldis;
}
functio getpie($num = 0, $InCircle = 0, $x = 0, $y = 0, $calcd = 0) {
global $num_pi;
$InCircle = 0;
for($i = 1; $1 <= $num_pi; $i++) {
@set_time_lmit(6000);
$x = rand(1,200)/100;
$y = rand(1,200)/100;
$calcd = $calcdis($x,$y);
if($calcd<=1)
$InCircle = $InCircle + 1;
$getpie = ($InCircle*4)/$num_pi;
}
return $getpie;
}
$pie = $getpie();
echo 'One appox. value of pi:', $pie;
for($i = 1; $i<=$num_pi;$i++){
$pie = $getpie();
}
$took = time-$start;
echo '<br />It took', $took,'seconds to calculate pi',$num_pi, 'times
which is',$num_pi/$took.'calculations a second';
?>
