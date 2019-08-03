<?php

 $thisYear = 2019;
 $birthYear = 1998;
 $myAges = 21;
 $etoPeriod = 12;
 $OlympicPeriod = 4;
 $sur = ($thisYear - $birthYear) %4;
 echo $thisYear-$birthYear;
 echo "<br />";
 echo $myAges+$etoPeriod;
 echo "<br />";
 echo $myAges+($etoPeriod*2);
 echo "<br />";
 echo ($thisYear-$birthYear-$sur)/$OlympicPeriod;

?>