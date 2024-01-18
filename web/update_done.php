<?php
    $id  = $_POST['id'];
    $title  = $_POST['title'];
    $Text = $_POST['Text'];
    $Updated = date('Y-m-d H:i:s');
    //$submit  = $_POST['submit'];
    try {
    // DB接続
    $pdo = new PDO(
        // ホスト名、データベース名
        'mysql:host=localhost;dbname=TodoListSystem;',
        // ユーザー名
        'root',
        // パスワード
        '',
        // レコード列名をキーとして取得させる
        [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
        );
        $stmt = $pdo->prepare('UPDATE TodoList SET Title = :title, Text = :Text, Updated = :Updated WHERE id = :id');
 
        // 値をセット
        $stmt->bindValue(':id', $id);
        
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':Text', $Text);
        $stmt->bindValue(':Updated', $Updated);
        // SQL実行
        $stmt->execute();
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
        <p>ID：<?php echo $id?>を編集しました。</p>
        <p><a href="index.php">メイン画面に戻ります。</a></p>
    </div>
</body>

</html>