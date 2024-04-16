<?php
// pdo接続、関数ファイルの読み込み
require_once("private/ToDoListDao.php");
require_once("private/functions.php");

//編集したデータを取得
$id  = $_POST['id'];
$title  = $_POST['title'];
$content = $_POST['content'];
$updateDate = date('Y-m-d H:i:s');

//エスケープ処理(入力制限)
$isValidTitle = isValidTitle($title);
$isValidContent = isValidContent($content);

//更新処理の実行
if ($isValidTitle && $isValidContent) {
  $toDoListDao = new toDoListDao();
  $toDoListDao->update($id, $title, $content, $updateDate);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>編集完了</title>
  <link rel="stylesheet" href="/style.css" type="text/css">
</head>

<?php
if (!$isValidTitle) {
?>
  <p>タイトルが20文字を超えている、もしくは使用できない文字を含んでいます。</p>

  <a href="index.php"><span class="btn_a">TodoListへ戻る</span></a>
<?php
  exit();
} else if (!$isValidContent) {
?>
  <p> 内容が200文字を超えている、もしくは使用できない文字を含んでいます。</p>

  <a href="index.php"><span class="btn_a">TodoListへ戻る</span></a>
<?php
  exit();
}
?>

<body>
  <p><a class="title">ToDoList</a></p>
  <p>編集完了</p>
  <p>ID：<?php echo $id ?>を編集しました。</p>
  <a href="index.php"><span class="btn_a">TodoListへ戻る</span></a>
</body>


</html>