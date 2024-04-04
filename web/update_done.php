<?php
$Id  = $_POST['Id'];
$Title  = $_POST['Title'];
$Text = $_POST['Text'];
$Updated = date('Y-m-d H:i:s');
try {
    // DB接続
    $PDO = new PDO(
        // ホスト名、データベース名
        'mysql:host=host.docker.internal;dbname=TodoListSystem;',
        // ユーザー名
        'root',
        // パスワード
        '',
        // レコード列名をキーとして取得させる
        [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );
    $Stmt = $PDO->prepare('UPDATE TodoList SET Title = :Title, Text = :Text, Updated = :Updated WHERE Id = :Id');

    // 値をセット
    $Stmt->bindValue(':Id', $Id);
    $Stmt->bindValue(':Title', $Title);
    $Stmt->bindValue(':Text', $Text);
    $Stmt->bindValue(':Updated', $Updated);
    // SQL実行
    $Stmt->execute();
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編集完了画面</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="title-area">
        <h1>編集完了画面</h1>
    </div>
    <div class="text-area">
        <p>ID：<?php echo $id ?>を編集しました。</p>
        <p><a href="index.php">メイン画面に戻ります。</a></p>
    </div>
</body>

</html>