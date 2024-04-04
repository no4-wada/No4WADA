<!DOCTYPE html>
<html lang="ja">
 
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/style.css" type="text/css">
    <title>TodoList</title>
</head>
 
<body>
<?php
try {
  //DB名、ユーザー名、パスワードを変数に格納
    $dsn = "mysql:dbname=TodoListSystem;host=host.docker.internal";
    $user = 'root';
    $password = '';
 
    $PDO = new PDO($dsn, $user, $password); //PDOでMySQLのデータベースに接続
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示
 
    //input.phpの値を取得
    #$Id = lastInsertId() + 1;
    $Id = lastInsertId() + 1;
    $Title = $_POST['title'];
    $Text = $_POST['text'];
    $Created = date('Y-m-d H:i:s');
 
    $sql = "INSERT INTO TodoList (Id, Title, Text, Created) VALUES (:Id, :Title, :Text, :Created)"; // テーブルに登録するINSERT INTO文を変数に格納　VALUESはプレースフォルダーで空の値を入れとく
    $stmt = $PDO->prepare($sql); //値が空のままSQL文をセット
    $params = array(':Id' => $Id, ':Title' => $Title, ':Text' => $Text, ':Created' => $Created); // 挿入する値を配列に格納
    $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
 
    // 登録内容確認・メッセージ
    echo "<p>タイトル: " . $Title . "</p>";
    echo "<p>内容: " . $Text . "</p>";
    echo '<p>上記の内容をデータベースへ登録しました。</p>';
?>
    <div class="btn-back"><button onclick="location.href='index.php'" >TodoListへ戻る</button></div>
<?php
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。' . $e->getMessage());
}
?>

</body>
 
</html>

