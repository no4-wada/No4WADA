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
        $Dsn = "mysql:dbname=TodoListSystem;host=host.docker.internal";
        $User = 'root';
        $Password = '';

        $PDO = new PDO($Dsn, $User, $Password); //PDOでMySQLのデータベースに接続
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示

        $Title = $_POST['Title'];
        $Text = $_POST['Text'];
        $Created = date('Y-m-d H:i:s');
        //インサートでデータの新規追加
        $Sql = "INSERT INTO TodoList (Id, Title, Text, Created) VALUES (:Id, :Title, :Text, :Created)"; // テーブルに登録するINSERT INTO文を変数に格納　VALUESはプレースフォルダーで空の値を入れとく
        $Stmt = $PDO->prepare($Sql); //値が空のままSQL文をセット
        $Params = array(':Id' => $Id, ':Title' => $Title, ':Text' => $Text, ':Created' => $Created); // 挿入する値を配列に格納
        $Stmt->execute($Params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
    } catch (PDOException $e) {
        exit('データベースに接続できませんでした。' . $e->getMessage());
    }
    ?>
    <!--登録内容確認・メッセージ -->
    <p>タイトル: <?php echo $Title; ?></p>
    <p>内容: <?php echo $Text; ?></p>
    <p>上記の内容をデータベースへ登録しました。</p>

    <div class="btn-back"><button onclick="location.href='index.php'">TodoListへ戻る</button></div>
</body>

</html>