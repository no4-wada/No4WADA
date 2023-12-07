<!DOCTYPE html>
    <html lang="ja">
 
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/style.css" type="text/css">
    <title>TodoList(更新)</title>
</head>
<body>
<?php
 
 try {
    // DB接続
    $pdo = new PDO(
        // ホスト名、データベース名
        'mysql:host=localhost;dbname=testdb;',
        // ユーザー名
        'root',
        // パスワード
        '',
        // レコード列名をキーとして取得させる
        [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );
 
    // 条件指定したSQL文をセット
    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = :id');
 
    // 「:id」に対して値「1」をセット
    $stmt->bindValue(':id', 1);
 
    // SQL実行
    $stmt->execute();
 
    // 取得したデータを出力
    foreach ($stmt as $row) {
        var_dump($row);
    }
 
 } catch (PDOException $e) {
    // エラー発生
    echo $e->getMessage();
 
 } finally {
    // DBを閉じる
    $pdo = null;
 }
 
 ?>
 <form action="index.php" method="post" >
 <p> タイトル: <input type="text" name="Title" value=""></p>
 <p>内容: <input type="text" name="Text" value=""></p>
 <input type="submit" >
 </form>

</body>

</html>