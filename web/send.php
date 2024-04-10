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
  try {
    $Title = $_POST['Title'];
    $Text = $_POST['Text'];
    $Created = date('Y-m-d H:i:s');

    //バリテーション処理(入力制限)
    $CheckTitle = check($Title);

    $CheckText = check($Text);

    if ($CheckTitle == 0) {

      echo 'タイトルが20文字を超えている、もしくは使用できない文字を含んでいます。';
      exit();
  ?>
      <div class="btn_back"><button onclick="location.href='index.php'">TodoListへ戻る</button></div>

    <?php
    } else if ($CheckText == 0) {
      echo '内容が200文字を超えている、もしくは使用できない文字を含んでいます。';
      exit();
    ?>
      <div class="btn_back"><button onclick="location.href='index.php'">TodoListへ戻る</button></div>

  <?php
    } else {

      // テーブルに登録するINSERT INTO文を変数に格納　VALUESはプレースフォルダーで空の値を入れとく            
      $Query = "INSERT INTO TodoList (Id, Title, Text, Created) VALUES (:Id, :Title, :Text, :Created)";

      //値が空のままSQL文をセット
      $Stmt = $PDO->prepare($Query);

      // 挿入する値を配列に格納
      $Params = array(':Id' => $Id, ':Title' => $Title, ':Text' => $Text, ':Created' => $Created);

      //挿入する値が入った変数をexecuteにセットしてSQLを実行
      $Stmt->execute($Params);
    }
  } catch (PDOException $e) {

    exit('データベースに接続できませんでした。' . $e->getMessage());
  }
  ?>

  <!--登録内容確認・メッセージ (エスケープ処理含む)-->

  <p>タイトル: <?php echo escape($Title); ?></p>

  <p>内容: <?php echo escape($Text); ?></p>

  <p>上記の内容をデータベースへ登録しました。</p>

  <button onclick="location.href='index.php'">TodoListへ戻る</button>

</body>

</html>