<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/style.css" type="text/css">
  <title>TodoList(追加)</title>
</head>

<body>

  <!-- 内容入力　-->
  <p><a class="Title">ToDoList</a></p>
  <form method="post" action="add_send.php">
    <div>
      <p>タイトル</p>
    </div>
    <input type="text" name="Title" required="required">
    <div>
      <p>内容</p>
    </div>
    <textarea name="Text" cols="30" rows="5" required="required"></textarea>
    <br>
    <input type="submit" value="追加" class="btn_submit">
  </form>
  <button class="btn_back" onclick="location.href='todo_list_page.php'">TodoListへ戻る</button>

</body>

</html>