<!doctype html>
<head>
<meta charset="utf-8">
<title>practice</title>
<style>
  body { 
  font-family: Meiryo;
  }

  .bs {
  margin-bottom: 2em;
  }

  .ss {
  margin-bottom: 0.5em;
  }

  .bbr::before {
    content: "\A" ;
    white-space: pre ;
  }

  .abr::after {
    content: "\A" ;
    white-space: pre ;
  }

</style>
</head>

<body>

<?php
  $fileName = "mission_3-5.txt";
  $textData = file($fileName);
  if(!empty($_POST['edit'])){
    $editNum = $_POST['editNum'];
    $editPassword = $_POST['editPassword'];
    $var = false;
    for($i = 0 ; $i < count($textData) ; $i++){
      $speciNum = explode("<>",$textData[$i]);
      if($speciNum[0] == $editNum  && $speciNum[4] == $editPassword){
        $willEditName=$speciNum[1];
        $willEditComment=$speciNum[2];
        $var=true;
      }
    }
    if($var==false){
      echo "+--------------------------------+"."<br>";
      echo "|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;!この編集は無効です!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|"."<br>";
      echo "+--------------------------------+"."<br>";
    }else{
      echo "+--------------------------------------------------------+"."<br>";
      echo "|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;!どう変更する？決まったらここの送信押してね!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|"."<br>";
      echo "+--------------------------------------------------------+"."<br>";
    }
  }elseif(!empty($_POST['delete'])){
    $var=false;
    $delNum = $_POST['delNum'];
    $delPassword = $_POST['delPassword'];
    for($i = 0 ; $i < count($textData) ; $i++){
      $speciNum = explode("<>",$textData[$i]);
      if($speciNum[0] == $delNum && $speciNum[4] == $delPassword){
        array_splice($textData,$i,1);
        file_put_contents($fileName,$textData);
        $var = true;
      }
    }
    if($var===false){
      echo "+--------------------------------+"."<br>";
      echo "|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;!この削除は無効です!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|"."<br>";
      echo "+--------------------------------+"."<br>";
    }
    $count = count($textData);
  }

?>



<form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
  <div>【投稿フォーム】</div>
  <div>名前：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="name" placeholder="匿名希望" value=
      "<?php
        if(isset($_POST['edit']) === true&&!empty($willEditName)){
          echo $willEditName;
        }
      ?>"
    >  
  </div>

  <?php
  if(!empty($_POST["name"]) && empty($_POST['edit']) === true){
    $name =  $_POST['name'];
    if(!empty($_POST["editNumber"])){
      echo "名前を「".$name."」に変換します";
    }else{
      echo "名前「".$name."」を受け取りました。" ;
    }
  }else{
    if(isset($_POST['edit']) === false && !empty($_POST['send']) === true){
      echo "空白か、よしテンプレに変換するね。";
    }
  }
  ?>

  <div>コメント：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="comment" placeholder="コメント" value=
      "<?php
        if(isset($_POST['edit']) === true&&!empty($willEditComment)){
          echo $willEditComment;
        }
      ?>"
    >
  </div>

  <?php
  if(!empty($_POST['comment']) && empty($_POST['edit']) === true){
    $comment =  $_POST['comment'];
    if(!empty($_POST["editNumber"])){
      echo "コメントを「".$comment."」に変換します";
    }else{
      echo "コメント「".$comment."」を受け取りました。";
    }
  }else{
    if(isset($_POST['edit']) === false && !empty($_POST['send']) === true){
      echo "空白か、よしテンプレに変換するね。";
    }
  }
  echo "<br>";
  ?>

  <div>
    <label>パスワード:&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="password" name="pass" placeholder="パスワード">
    </label>
  </div>

  <?php
  if(!empty($_POST['send'])){
    if(!empty($_POST["pass"])){
      $password =  $_POST['pass'];
      echo "passwordを受け取りました。";
    }else{
      echo "password未記入。よってこのコメントは削除、編集が出来ません。";
    }
  }
  ?>
  <input type="submit" name="send" value="送信">
  <br>
 --------------------------------------------------

  <div>【削除フォーム】</div>
  <div>
    <label>削除する番号:&nbsp;&nbsp;<input type="number" value="1" name="delNum" min="1"></label>
  </div>
  <div>
    <label>パスワード:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="delPassword" placeholder="パスワード"></label>
  </div>
  <input type="submit" name = "delete" value="削除">
  <br>

  --------------------------------------------------

  <div>【編集フォーム】</div>
  <div>
    <label>編集する番号:&nbsp;&nbsp;<input type="number" value="1" name="editNum" min="1"></label>
  </div>
  <div>
    <label>パスワード:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="editPassword" placeholder="パスワード"></label>
  </div>
  <input type="submit" name = "edit" value="編集">
  <br>

  --------------------------------------------------

  <div class = "bs">
    <input type="hidden" name="editNumber" size="2" col = "2" value=
      "<?php
        if(isset($_POST['edit']) === true){
          echo $_POST['editNum'];
        }
      ?>"
    >
  </div>

  <?php
  $fileName = "mission_3-5.txt";
  $fp = fopen($fileName ,"a");
  $textData = file($fileName);
  $sendComment = "特になし";
  $sendPassword = "No_password";
  $sendName = "匿名希望";
  $count = count($textData);

  if(isset($_POST['send']) === true){
    $time = date("Y/m/d H:i:s");
    if(!empty($comment)){
      $sendComment = $comment;
    }
    if(!empty($name)){
      $sendName = $name;
    }
    if(!empty($password)){
      $sendPassword = $password;
    }

    if(!empty($_POST['editNumber'])){
      $var=false;
      $editNumber = $_POST['editNumber'];
      for($i = 0 ; $i < count($textData) ; $i++){
        $speciNum = explode("<>",$textData[$i]);
        if($speciNum[0] == $editNumber){
          $speciNum[1] = $sendName;
          $speciNum[2] = $sendComment;
          $speciNum[3] = $sendPassword;
          $textData[$i] = $speciNum[0]."<>".$speciNum[1]."<>".$speciNum[2]."<>".$time."<>".$speciNum[3]."<>"."\r\n";
          $var = true;
        }
      }
      if($var===false){
        echo "+--------------------------------+"."<br>";
        echo "|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;!この編集は無効です!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|"."<br>";
        echo "+--------------------------------+"."<br>";
      }
      file_put_contents($fileName, $textData);
      $count = count($textData);
    }else{
      $endTextData = end($textData);
      $explodedEndTextData = explode("<>", $endTextData);
      $num = (int)$explodedEndTextData[0]+1;
      $type = $num."<>".$sendName."<>".$sendComment."<>".$time."<>".$sendPassword."<>"."\r\n";
      fwrite($fp ,$type);
      $count = count($textData)+1;
    }
  }


  fclose($fp);
  $bord_array = [];
  $fp = fopen($fileName, "r");
  
  for ($i = 0 ; $i < $count ; $i++) {
    $line = fgets($fp);
    $temp = explode("<>", $line);
    $temp_array = [
      "num" => $temp[0],
      "name" => $temp[1],
      "comment" => $temp[2],
      "time" => $temp[3]
    ];
    $bord_array[] = $temp_array;
  }
  fclose($fp);
  
  foreach($bord_array as $data){
    echo $data["num"]." ".$data["name"]." ".$data["comment"]." ".$data["time"]."<br>";
  }
  ?>
</form>
</body>
</html>