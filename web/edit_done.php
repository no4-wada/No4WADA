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
// PDO接続、関数ファイルの読み込み
require_once("connect.php");
require_once("security.php");
$Id  = $_POST['Id'];
$Title  = $_POST['Title'];
$Text = $_POST['Text'];
$UpdateDate = date('Y-m-d H:i:s');
//エスケープ処理(入力制限)
$CheckTitle = check_title($Title);
$CheckText = check_text($Text);
try {
  if ($CheckTitle == 0) {
?>
    <p>タイトルが20文字を超えている、もしくは使用できない文字を含んでいます。</p>

    <a href="todo_list_page.php"><span class="btn_a">TodoListへ戻る</span></a>
  <?php
    exit();
  } else if ($CheckText == 0) {
  ?>
    <p> 内容が200文字を超えている、もしくは使用できない文字を含んでいます。</p>

    <a href="todo_list_page.php"><span class="btn_a">TodoListへ戻る</span></a>
<?php
    exit();
  } else {
    //該当するデータを更新する
    $Stmt = $PDO->prepare('UPDATE TodoList SET Title = :Title, Text = :Text, Updated = :UpdateDate WHERE Id = :Id');

    // 値をセット
    $Stmt->bindValue(':Id', $Id);
    $Stmt->bindValue(':Title', $Title);
    $Stmt->bindValue(':Text', $Text);
    $Stmt->bindValue(':UpdateDate', $UpdateDate);
    // SQL実行
    $Stmt->execute();
  }
} catch (PDOException $e) {
  echo $e->getMessage();
  die();
}
?>

<body>
  <h1>編集完了画面</h1>
  <p>ID：<?php echo $Id ?>を編集しました。</p>
  <a href="todo_list_page.php"><span class="btn_a">TodoListへ戻る</span></a>
</body>

</html>