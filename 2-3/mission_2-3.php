<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>practice</title>
</head>
<body>
<form action="mission_2-3.php" method="post">
  チーム名：<br />
  <input type="text" name="teamName" size="30" value="カルピスソーダ" /><br />
  <?php
    if(!empty($_POST["teamName"])){ 
      $teamName =  $_POST['teamName'];
      echo "チーム名「".$teamName."」を受け取りました。" ;
    }
  ?>
  <br /><br />

  ID：<br />
  <input type="text" name="ID" size="30" value="B" /><br />
  <?php
    if(!empty($_POST["ID"])){  
      $ID =  $_POST['ID'];
      echo "ID「".$ID."」を受け取りました。" ;
    }
  ?>
  <br /><br />

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
  <input type="submit" value="登録する" />
</form>

<?php

  $filename = "mission_2-3.txt";
  $fp = fopen($filename ,"w");

  if(!empty($_POST["teamName"])){  
    fwrite( $fp ,  $teamName."\r\n");
  }

  if(!empty($_POST["ID"])){  
    fwrite( $fp ,  $ID."\r\n");
  }

  if(!empty($_POST["comment"])){  
    fwrite( $fp ,  $comment."\r\n");
  }

  fclose( $fp );

?>


</body>
</html>