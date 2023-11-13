<!--タイトル-->
<?php
echo 'ToDo List';
define('HOSTNAME', 'localhost');
define('DATABASE', 'laravel_db');
define('USERNAME', 'root');
define('PASSWORD', '');

try {
  /// DB接続を試みる
  $db  = new PDO('mysql:host='localhost';dbname='laravel_db, root, );
  $msg = "MySQL への接続確認が取れました。";
} catch (PDOException $e) {
  $isConnect = false;
  $msg       = "MySQL への接続に失敗しました。<br>(" . $e->getMessage() . ")";
}
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>MySQL接続確認</title>
  </head>
  <body>
    <h1>MySQL接続確認</h1>
    <p><?php echo $msg; ?></p>
  </body>
</html>


<!-- if(){
$id = 2
} -->
<form action="form_sample1.php" method="post" >
<p> 名前: <input type="text" name="name" value=""></p>
<p>年齢: <input type="text" name="age" value=""></p>
 <input type="submit" >
</form> 



<!-- Mysqlへの接続　
$dsn      = 'mysql:dbname=laravel_db;host=localhost';
$user     = 'root';
$password = '';

 DBへ接続
try{
    $dbh = new PDO($dsn, $user, $password);

     クエリの実行 
    $query = "SELECT * FROM TodoList";
    $stmt = $dbh->query($query);

     表示処理 
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo $row["name"];
    }

}catch(PDOException $e){
    print("データベースの接続に失敗しました".$e->getMessage());
    die();
}

 接続を閉じる 
$dbh = null;
-->