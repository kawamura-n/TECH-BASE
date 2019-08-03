<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>practice</title>
</head>
<body>
<form action="mission_3-1.php" method="post">
  名前：<br />
  <input type="text" name="name" size="30" value="匿名希望" /><br />
  <?php
    if(!empty($_POST["name"])){ 
      $name =  $_POST['name'];
      echo "名前「".$name."」を受け取りました。" ;
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

  <input type="submit" name="send" value="送信" />
</form>

<?php

  $filename = "mission_3-1.txt";
  $fp = fopen($filename ,"a");
  $sendComment = "特になし";
  $sendName = "匿名希望";
  $time = date("Y/m/d H:i:s");
  $num = count(file($filename))+1;

  
  if(isset($_POST['send']) === true){
    if(!empty($comment)){ 
      $sendComment = $comment; 
    }
    if(!empty($name)){  
      $sendName = $name; 
    }

    fwrite($fp ,$num."<>".$sendName."<>".$sendComment."<>".$time."\r\n");
  }

?>


</body>
</html>