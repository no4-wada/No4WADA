<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/style.css" type="text/css">
  <title>TodoList</title>
</head>

<body>
  <?php
  //エスケープ処理の関数
  function change($s)
  {
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
  }
  try {
    //DB名、ユーザー名、パスワードを変数に格納
    $Dsn = "mysql:dbname=TodoListSystem;host=host.docker.internal";
    $User = 'root';
    $Password = '';

    //PDOでMySQLのデータベースに接続
    $PDO = new PDO($Dsn, $User, $Password);

    //PDOのエラーレポートを表示
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $Title = $_POST['Title'];
    $Text = $_POST['Text'];
    $Created = date('Y-m-d H:i:s');

    //バリテーション処理(入力制限)
    $CheckTitle = preg_match('/\A[[:^cntrl:]]{1,20}+\z/u', $Title);

    $CheckText = preg_match('/\A[[:^cntrl:]]{1,200}+\z/u', $Text);

    if ($CheckTitle == 0 || $CheckText == 0) {

      echo '入力文字数制限を超えています。';
      exit();
  ?>
      <div class="btn-back"><button onclick="location.href='index.php'">TodoListへ戻る</button></div>

  <?php
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

    exit('データベースに接続できませんでした。' . $e->getMessage());
  }
  ?>

  <!--登録内容確認・メッセージ (エスケープ処理含む)-->

  <p>タイトル: <?php echo change($Title); ?></p>

  <p>内容: <?php echo change($Text); ?></p>

  <p>上記の内容をデータベースへ登録しました。</p>

  <div class="btn-back"><button onclick="location.href='index.php'">TodoListへ戻る</button></div>

</body>

</html>