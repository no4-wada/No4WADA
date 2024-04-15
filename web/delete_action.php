<?php

//ToDoListDao.phpの読み込み
require_once("private/ToDoListDao.php");

//DB接続クラスの実行
$id = $_GET['id'];
$ToDoListDao = new ToDoListDao();
$stmt = $ToDoListDao->delete($id);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/style.css" type="text/css">
  <title>TodoList</title>
</head>

<body>
  <p><a class="title">ToDoList</a></p>

  <p>削除しました</p>
  <a href="index.php"><span class="btn_a">TodoListへ戻る</span></a>
</body>

</html>