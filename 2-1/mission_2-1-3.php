<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>practice</title>
</head>
<body>
<form action="mission_2-1-3.php" method="post">
  チーム名：<br />
  <input type="text" name="teamName" size="30" value="カルピスソーダ" /><br />
  <?php echo "チーム名「".$_POST["teamName"]."」を受け取りました。" ?>
  <br /><br />

  ID：<br />
  <input type="text" name="ID" size="30" value="B" /><br />
  <?php echo "ID「".$_POST["ID"]."」を受け取りました。" ?>
  <br /><br />

  コメント：<br />
  <textarea name="comment" cols="30" rows="5">コメント</textarea><br />
  <?php echo "コメント「".$_POST["comment"]."」を受け取りました。" ?>
  <br /><br />

  <br />
  <input type="submit" value="登録する" />
</form>
</body>
</html>