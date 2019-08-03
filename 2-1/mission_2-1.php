<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>practice</title>
</head>
<body>
<form action="mission_2-1.php" method="post">
  チーム名：<br />
  <input type="text" name="teamName" size="30" value="カルピスソーダ" /><br />
  <?php echo $_POST["teamName"] ?>
  <br /><br />

  ID：<br />
  <input type="text" name="ID" size="30" value="B" /><br />
  <?php echo $_POST["ID"] ?>
  <br /><br />

  コメント：<br />
  <textarea name="comment" cols="30" rows="5">コメント</textarea><br />
  <?php echo $_POST["comment"] ?>
  <br /><br />

  <br />
  <input type="submit" value="登録する" />
</form>
</body>
</html>