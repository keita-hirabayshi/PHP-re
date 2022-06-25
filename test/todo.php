<?php
session_start();

$url = $_SERVER['PHP_SELF'];

if($_POST['submit'] === 'create'){
    $_SESSION['todos'][] = $_POST['list'];
    echo "タスク[{$_POST['list']}]が追加されたよ";
}elseif($_POST['submit'] === 'edit'){
    $_SESSION['todos'][$_POST['id']] =  $_POST['todo'];
    echo "タスク[{$_POST['todo']}]の内容が変更されました。";
}elseif($_POST['submit'] === 'delete'){
    array_splice($_SESSION['todos'],$_POST['id'],1);
    echo"タスク[{$_POST['todo']}]が削除されました";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>TODOリスト</h1>

<form action="<?php  echo $url; ?>" method="POST">
    <div>
        TODO 追加:<input type="text" name="list">
    </div>
    <input type="submit" value="create" name="submit">
</form>

<ul>
    <?php for ($i=0;  $i< count($_SESSION['todos']); $i++) :?>
    <li>
        <form action="<?php  echo $url; ?>" method="POST">
            <input type="text" value="<?php echo $_SESSION['todos'][$i];?>" name="todo">
            <input type="submit" value="delete" name="submit">
            <input type="submit" value="edit" name="submit">
            <input type="hidden" value="<?php echo $i; ?>" name="id">
        </form>
    </li>
    <?php endfor ; ?>
</ul>

</body>
</html>






<?php
if(!isset($_SESSION['todos'])){
    echo 'タスクを追加してね。';
    die();
}