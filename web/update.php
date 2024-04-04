<!DOCTYPE html>
    <html lang="ja">
 
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/style.css" type="text/css">
    <title>TodoList(更新)</title>
</head>
<body>
<?php
$id = $_GET['Id'];
try {
    // DB接続
    $pdo = new PDO(
        // ホスト名、データベース名
        'mysql:host=host.docker.internal;dbname=TodoListSystem;',
        // ユーザー名
        'root',
        // パスワード
        '',
        // レコード列名をキーとして取得させる
        [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );
 
    // 条件指定したSQL文をセット
    $stmt = $pdo->prepare('SELECT * FROM TodoList WHERE id = :id');
 
    // 「:id」に対して値をセット
    $stmt->bindValue(':id', $id);
 
    // SQL実行
    $stmt->execute();
 
    // 取得したデータを出力
    foreach ($stmt as $row) {
        //var_dump($row);
    }
 
} catch (PDOException $e) {
    // エラー発生
    echo $e->getMessage();
 
} finally {
    // DBを閉じる
    $pdo = null;
}
$Title = $row['Title'];
$Text = $row['Text'];
 
?>
<p>ToDoList</p>
<form action="update_done.php" method="post" >
    <p> タイトル: <br><input type="text" class="input-area" name="title" placeholder="title" required="required" value="<?php echo $Title;?>"> </p>
    <p> 内容: <br><input type="text" class="input-area" name="Text" placeholder="Text" required="required" value="<?php echo $Text;?>"> </p>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="submit" value="更新">
</form>

</body>

</html>