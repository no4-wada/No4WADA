<!DOCTYPE html>
    <html lang="ja">
 
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/style.css" type="text/css">
    <title>TodoList(追加)</title>
</head>

<body>
    <!-- 内容入力　-->
    <form method="post" action="send.php">
    <div><h2>タイトル</h2></div>
    <input type="text" name="title">
    <div><h2> 本文</h2></div>
    <textarea name="text"></textarea>   
    <div class="btn-back">
        <input type="submit" value="追加">
    </div>
    </form>
</body>

</html>