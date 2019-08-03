<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>practice</title>
</head>
<body>
<form action="mission_2-4.php" method="post">

  コメント：<br />
  <textarea name="comment" cols="30" rows="5">コメント</textarea><br />
  <?php 
    if(!empty($_POST["comment"])){  
      $comment =  $_POST['comment'];
      echo "コメント「".$comment."」を受け取りました。"; 
      if($comment=="コメント"){
         echo "<br>";
         echo "いや、いいんだけどさ、それデフォじゃん。。やっぱり、ちょっと、、変えてよ。。いや、いいんだけどさ。。。";
      }
    }
  ?>
  <br /><br />

  <br />
  <input type="submit" value="コメントする" />
</form>

<?php

  $filename = "mission_2-4.txt";
  $fp = fopen($filename ,"a");
  if(!empty($_POST["comment"])){  
    fwrite( $fp ,  $comment."\r\n");
  }

  fclose( $fp );



  $fp = fopen($filename, "r");
  $array = file($filename);
  if($fp){
    foreach ($array as $line) {
      echo $line."<br>";
    }
  }

?>


</body>
</html>