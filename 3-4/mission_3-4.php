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
  if(isset($_POST['edit']) === true){
    $fileName = "mission_3-4.txt";
    $textData = file($fileName);
    $editNum = $_POST['editNum'];
    for($i = 0 ; $i < count($textData) ; $i++){
    $speciNum = explode("<>",$textData[$i]);
    if($speciNum[0] == $editNum){
      $willEditName=$speciNum[1];
      $willEditComment=$speciNum[2];
    }
  }
 } 
?>

  <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
    <div class = "bs">名前：
      <span class ="bbr">
        <input type="text" name="name" size="30" placeholder="匿名希望" value=
          "<?php
            if(isset($_POST['edit']) === true&&!empty($willEditName)){
              echo $willEditName;
            }
          ?>"
        >
      </span>
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
    echo "<br>";
    ?>

    <div class = "bs">コメント：
      <span class ="bbr">
        <input type="text" name="comment" size="30"  placeholder="コメント" value=
          "<?php
            if(isset($_POST['edit']) === true&&!empty($willEditComment)){
              echo $willEditComment;
            }
          ?>"
        >
      </span>
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
    <div class = "bs">
    <input type="submit" name="send" value="送信">
    </div>

    <div class = "bs">
      <label>削除する番号:<input type="number" value="1" name="delNum" min="1"></label>
      <input type="submit" name = "delete" value="削除">
    </div>

    <div class = "bs">
      <label>編集する番号:<input type="number" value="1" name="editNum" min="1"></label>
      <input type="submit" name = "edit" value="編集">
    </div>

<!--    <div class = "bs">
      <label>パスワード:<input type="text" value="1" name="password"></label>
      <input type="submit" name = "edit" value="編集">
-->    </div>

    <div class = "bs">
      <input type="hidden" name="editNumber" size="2" col = "2" value="<?php
        if(isset($_POST['edit']) === true){
          echo $_POST['editNum'];
        }
        ?>"
      >
    </div>

    <?php
    $fileName = "mission_3-4.txt";
    $fp = fopen($fileName ,"a");
    $textData = file($fileName);
    $sendComment = "特になし";
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

      if(!empty($_POST['editNumber'])){
        $var=false;
        $editNumber = $_POST['editNumber'];
        for($i = 0 ; $i < count($textData) ; $i++){
          $speciNum = explode("<>",$textData[$i]);
          if($speciNum[0] == $editNumber){
            $speciNum[1] = $sendName;
            $speciNum[2] = $sendComment;
            $textData[$i] = $speciNum[0]."<>".$speciNum[1]."<>".$speciNum[2]."<>".$time."\r\n";
            $var = true;
          }
        }
        if($var===false){
          echo "----------------------------------"."<br>";
          echo "!この編集は無効です!"."<br>";
          echo "----------------------------------"."<br>";
        }
        file_put_contents($fileName, $textData);
        $count = count($textData);
      }else{
        $endTextData = end($textData);
        $explodedEndTextData = explode("<>", $endTextData);
        $num = (int)$explodedEndTextData[0]+1;
        $type = $num."<>".$sendName."<>".$sendComment."<>".$time."\r\n";
        fwrite($fp ,$type);
        $count = count($textData)+1;
      }
    }elseif(isset($_POST['delete']) === true){
      $var=false;
      $delNum = $_POST['delNum'];
      for($i = 0 ; $i < count($textData) ; $i++){
        $speciNum = explode("<>",$textData[$i]);
        if($speciNum[0] == $delNum){
          array_splice($textData,$i,1);
          file_put_contents($fileName,$textData);
          $var = true;
        }
      }
      if($var===false){
        echo "----------------------------------"."<br>";
        echo "!この削除は無効です!"."<br>";
        echo "----------------------------------"."<br>";
      }
      $count = count($textData);
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