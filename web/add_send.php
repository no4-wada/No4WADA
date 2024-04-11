<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/style.css" type="text/css">
  <title>TodoList</title>
</head>

<body>
  <?php

  // PDO接続、関数ファイルの読み込み
  require_once("connect.php");
  require_once("security.php");
  #<!-- DBへ接続-->
  try {
    #  <!-- クエリの実行 (Mysqlからのデータの抽出)-->
    $Query = "SELECT * FROM TodoList";
    $Stmt = $PDO->query($Query);
  } catch (PDOException $e) {
    print($e->getMessage());
    die();
  }
  $Title = $_POST['Title'];
  $Text = $_POST['Text'];
  $Created = date('Y-m-d H:i:s');

  //バリテーション処理(入力制限)
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

      // テーブルに登録するINSERT INTO文を変数に格納　VALUESはプレースフォルダーで空の値を入れとく            
      $Sql = "INSERT INTO TodoList (Id, Title, Text, Created) VALUES (:Id, :Title, :Text, :Created)";

      //値が空のままSQL文をセット
      $Stmt = $PDO->prepare($Sql);

      // 挿入する値を配列に格納
      $Params = array(':Id' => $Id, ':Title' => $Title, ':Text' => $Text, ':Created' => $Created);

      //挿入する値が入った変数をexecuteにセットしてSQLを実行
      $Stmt->execute($Params);
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
    die();
  }
  ?>

  <!--登録内容確認・メッセージ (エスケープ処理含む)-->

  <p>タイトル: <?php echo escape($Title); ?></p>

  <p>内容: <?php echo escape($Text); ?></p>

  <p>上記の内容をデータベースへ登録しました。</p>

  <a href="todo_list_page.php"><span class="btn_a">TodoListへ戻る</span></a>

</body>

</html>