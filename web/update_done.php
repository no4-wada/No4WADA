<?php
// PDO接続、関数ファイルの読み込み
require_once("connect.php");
require_once("functions.php");
$Id  = $_POST['Id'];
$Title  = $_POST['Title'];
$Text = $_POST['Text'];
$UpdateDate = date('Y-m-d H:i:s');
//エスケープ処理(入力制限)
$CheckTitle = check($Title);
$CheckText = check($Text);
try {
    if ($CheckTitle == 0) {

        echo 'タイトルが20文字を超えている、もしくは使用できない文字を含んでいます。';
?>
        <div class="btn_back"><button onclick="location.href='index.php'">TodoListへ戻る</button></div>
    <?php
        exit();
    } else if ($CheckText == 0) {
        echo '内容が200文字を超えている、もしくは使用できない文字を含んでいます。';
        echo 'タイトルが20文字を超えている、もしくは使用できない文字を含んでいます。';
    ?>
        <div class="btn_back"><button onclick="location.href='index.php'">TodoListへ戻る</button></div>
<?php
        exit();
    } else {
        //該当するデータを更新する
        $Stmt = $PDO->prepare('UPDATE TodoList SET Title = :Title, Text = :Text, Updated = :UpdateDate WHERE Id = :Id');

        // 値をセット
        $Stmt->bindValue(':Id', $Id);
        $Stmt->bindValue(':Title', $Title);
        $Stmt->bindValue(':Text', $Text);
        $Stmt->bindValue(':UpdateDate', $UpdateDate);
        // SQL実行
        $Stmt->execute();
    }
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
    <h1>編集完了画面</h1>
    <p>ID：<?php echo $Id ?>を編集しました。</p>
    <p><a href="index.php">メイン画面に戻ります。</a></p>
</body>

</html>