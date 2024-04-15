<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/style.css" type="text/css">
  <title>TodoList(更新)</title>
</head>

<body>
  <?php

  // pdo接続、関数ファイルの読み込み
  $id = $_GET['id'];
  require_once("private/ToDoListDao.php");
  require_once("private/functions.php");

  //DB接続クラスの実行
  $ToDoListDao = new ToDoListDao();
  $stmt = $ToDoListDao->findById($id);
  foreach ($stmt as $dateArray) {
  }

  $title = $dateArray['title'];
  $content = $dateArray['content'];

  ?>
  <p><a class="title">ToDoList</a></p>
  <form action="edit_done.php" method="post">
    <p> タイトル: <br><input type="text" class="input-area" name="title" placeholder="title" required="required" value="<?php echo $title; ?>"> </p>
    <p> 内容: <br><input type="text" class="input-area" name="content" placeholder="text" required="required" value="<?php echo $content; ?>"> </p>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="submit" value="更新" class="btn_submit">
  </form>
  <a href="index.php"><span class="btn_a">TodoListへ戻る</span></a>
</body>

</html>