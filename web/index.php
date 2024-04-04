<!DOCTYPE html>
<html lang="ja">
 
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/style.css" type="text/css">
    <title>TodoList</title>
</head>
 
<body>
    <p>ToDoList</p>
    <div class="btn-wrp">
        <button class="btn_add" onclick="location.href='add.php'" >追加</button>
        <!--DBへ接続<button class="btn_log" onclick="location.href='login.php'" >ログイン</button> -->
    </div>
    <br>
    <br>
    <?php
    #Mysqlへの接続
    $dsn      = 'mysql:dbname=TodoListSystem;host=host.docker.internal';
    $user     = 'root';
    $password = '';
    
    #<!-- DBへ接続-->
    try{
          $dbh = new PDO($dsn, $user, $password);
    
            #  <!-- クエリの実行 -->
            $query = "SELECT * FROM TodoList";
            $stmt = $dbh->query($query);
        }catch(PDOException $e){
            print("データベースの接続に失敗しました".$e->getMessage());
            die();
        }
    ?>
    <!--テーブルの作成-->
    <table bgcolor="#a9a9a9" cellspacing="2px" style="font-size:18px;" >
        <tr bgcolor="#D3D3D3" style="height:36px;" align="center">
        <th width="100px">番号</th>
        <th width="150px">タイトル</th>
        <th width="300px">内容</th>
        <th width="250px">作成日</th>
        <th width="250px">更新日</th>
        <th width="150px"></th>
        </tr>
        <?php
        # <!-- 表示処理 -->
	      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <tr bgcolor="white" style="height:36px;" align="center">
            <td align="center"><?php echo $row["Id"] ?></td>
            <td align="center"><?php echo $row["Title"] ?></td>
            <td align="center"><?php echo $row["Text"] ?></td>
            <td><?php echo $row["Created"]?></td>
            <td><?php echo $row["Updated"]?></td>
            <td>
               <div class="btn-wrp"><button id="btn_upd" onclick="location.href='update.php?Id=<?php echo $row['Id'];?>'" >編集</button>
               <br> <a href="del.php?Id=<?php echo $row['Id'];?>" ><button id="btn_del">削除</button></a></div>
            </td>
            </tr>
		      
        <?php
        }
        #<!-- 接続を閉じる -->
        $dbh = null;
        ?>           
    </table>
</body>
 
</html>