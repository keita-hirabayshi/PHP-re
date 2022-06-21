<?php
/**
 * ブラウザとはIPアドレスを人にもわかりやすくしたもの
 * 
 * ①ブラウザ上でのデータ保持　  サーバーからのデータresponse header内に返却され、ブランザ上のcookieに保持
 * setcookie('名前',値) $_COOKIE[]にて呼び出し可能だが、値の上書きはsetcookieからのみ有効。
 */
setcookie('visit_count',1,[
    'expires' => time() + 60 * 60 * 24 * 30,
// 有効期限　秒　* 分　* 時間　＊　日数 
    'path' => '/'
// 通常はcookieを作成したファイルのみcookie値はとぶが、/として全てのファイルからアクセス可能にもできる
// HttpOnlyはjs上での操作が無効となる   Secureはhttps(やり取り自体が暗号化されているもの)でのみのやり取り
]);

$spy = $_COOKIE['spy_family'];
echo $spy;

setcookie('visit_count',$_COOKIE['visit_count']+1);

/**
 * ②sessionでのやり取り
 * sessionIDをサーバー側で発行し、ブラウザ側に返却。sessionIDごとに値を格納する。ブラウザ側はsessionIDしか保持されない。
 */
session_start();
$_SESSION['hero'] = '僕の名前はピーナッツ';
$_SESSION['num'] += 1;
echo $_SESSION['hero'];
// $visit_count = 1;
// if(isset($_COOKIE['visit_count'])){
//     $visit_count = $_COOKIE['visit_count'] + 1;
// }else{
//     setcookie('visit_count',$visit_count);
// }
// $num = $_COOKIE['visit_count'];
// echo '<br>';
// echo "訪問回数は{$num}です。";



// ログイン機能
// if(isset($_POST['user']) && isset($_POST['pwd']) 
// && $_POST['user'] === 'text' && $_POST['pwd'] === 'pwd'){
//     $_SESSION['user'] = [
//         'name' => $_POST['user'],
//         'pwd' => $_POST['pwd']
//     ];
// }

// if(!empty($_SESSION['user'])){
//     echo 'ログイン中';
// }else{
//     echo 'ログアウト中';
// }

// ?>
<!-- // <form action="cookie.php" method="GET">
//     <input type="text" name="user">
//     <input type="pwd" name="pwd">
//     <input type="sbumit">
// </form> -->