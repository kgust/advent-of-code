<?php
$a=file('input.txt')[0];
$x=$y=$h=$f=0;
preg_match_all("#([R|L])(\d+)#",$a,$b);
for($i=0;$i<sizeof($b[1]);$i++){
  $h+=($b[1][$i]=="R")?1:-1;
  if($h>3)$h=0;if($h<0)$h=3;
  for($s=0;$s<$b[2][$i];$s++){
    if($h==0)$y++;
    if($h==1)$x++;
    if($h==2)$y--;
    if($h==3)$x--;
    $v[$x][$y]++;
    if($f===0 && $v[$x][$y]==2)$f=" b:".(abs($x)+abs($y));
  }
}
echo"a:".(abs($x)+abs($y)).$f;
