<?php

// $student = [
//     '1' =>[
//         'name' => 'trako',
//         'age'  => 15
//     ],
//     '2' =>[
//         'name' => 'trao',
//         'age'  => 1
//     ],
//     '3' =>[
//         'name' => 'trano', 
//         'age'  => 77
//     ]

//     ];

// $id = $_GET['id'] ?? 1;
// $pstudent = $student[$id];
// $name = $pstudent['name'];
// $age = $pstudent['age'];


?>


<!-- <div><
    ?php echo "名前は{$name}で{$age}さいです。";?></div> -->

<!--連想配列形式で値を送信する方法  -->
 <!-- <form action="GET">
    <input type="text" name ="account[id]">
    <input type="text" name ="account[name]">
    <input type="text" name ="account[pqwd]">
    <input type="hidden" name="discount" value="10" >
    <input type="submit">
</form>
$account =$_GET['account'];
$id = $account['id']; --> 

<form action="post.php" method="POST">
    <div class="">
        個数:<input type="number" name="num">
    </div>
    <div class="">
        価格:<input type="number" name="price">
    </div>
    <div class="">
        割引:10%
    </div>
    <input type="hidden" name="discount" value="10">
    <input type="submit">
</form>