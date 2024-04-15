<?php

// pdo接続、関数ファイルの読み込み
$id = $_GET['id'];
require_once("private/ToDoListDao.php");
require_once("private/functions.php");

//DB接続クラスの実行
$ToDoListDao = new ToDoListDao();
$stmt = $ToDoListDao->findById($id);
foreach ($stmt as $dataArray) {
}
$title = $dataArray['title'];
$content = $dataArray['content'];
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
  <p>本当に削除してよろしいですか？</p>

  <form action="delete_action.php?id=<?php echo $id; ?>" method="post">
    <p> タイトル: <?php echo escape($title); ?></p>
    <p> 内容: <?php echo escape($content); ?></p>
    <!-- 削除　-->
    <input type="submit" name="remove" value="削除" class="btn_submit">
  </form>

  <!-- リストへ戻るボタン -->
  <a href="index.php"><span class="btn_a">TodoListへ戻る</span></a>
</body>

</html>