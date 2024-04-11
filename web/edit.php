<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/style.css" type="text/css">
  <title>TodoList(更新)</title>
</head>

<body>
  <?php
  // PDO接続、関数ファイルの読み込み
  $Id = $_GET['Id'];
  require_once("connect.php");
  require_once("security.php");
  //DB接続クラスの実行
  $pdo_connect = new Connection();
  $PDO = $pdo_connect->Connecter();
  try {

    // Idで選択したカラムを持ってくる
    $Stmt = $PDO->prepare('SELECT * FROM TodoList WHERE Id = :Id');

    // 「:id」に対して値をセット
    $Stmt->bindValue(':Id', $Id);

    // SQL実行
    $Stmt->execute();

    // 取得したデータを出力
    foreach ($Stmt as $row) {
      //var_dump($row);
    }
  } catch (PDOException $e) {
    // エラー発生
    echo $e->getMessage();
  } finally {
    // DBを閉じる
    $PDO = null;
  }
  $Title = $row['Title'];
  $Text = $row['Text'];

  ?>
  <p><a class="Title">ToDoList</a></p>
  <form action="edit_done.php" method="post">
    <p> タイトル: <br><input type="text" class="input-area" name="Title" placeholder="title" required="required" value="<?php echo $Title; ?>"> </p>
    <p> 内容: <br><input type="text" class="input-area" name="Text" placeholder="Text" required="required" value="<?php echo $Text; ?>"> </p>
    <input type="hidden" name="Id" value="<?php echo $Id; ?>">
    <input type="submit" value="更新" class="btn_submit">
  </form>
  <button class="btn_back" onclick="location.href='todo_list_page.php'">TodoListへ戻る</button>
</body>

</html>