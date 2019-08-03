<?php

 $startYear = 2000;
 $thisYear = 2019;
 $olympicPeriod = 4;

for ($i = $startYear; $i <= $thisYear; $i+=$olympicPeriod) {
  echo $i;
  echo "<br />";
}

  echo "------------------------------------"."<br>";

  $shiritori = array("しりとり","リンゴ","ゴリラ","ラッパ","パンダ");
  echo $shiritori[2];
  echo "<br />";
  echo "------------------------------------"."<br>";

  $wordList="";
  foreach($shiritori as $word){
    $wordList = $wordList.$word;
    echo $wordList;
    echo "<br />";
  }
?>