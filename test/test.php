<?php
$name = 'keita';
// echo '名前は'. $name .'です';
// echo "名前は{$name}です\n";


$b_type = $_GET['b_type'];

// 血液型占い超簡易版
$type = 'AB';
if($b_type === 'A'){
    echo "{$b_type}型のあなたの運勢は凶。あっと驚くことが起こる1日でしょう。\n";
}elseif($b_type === 'B'){
    echo "{$b_type}型の運勢は吉。ラッキーアーテムは粋のいいコンドルです\n";
}elseif($b_type === 'AB'){
    echo "{$b_type}型の運勢は中吉。俯瞰して行動すればいいことが起こること間違いなし\n";
}elseif($b_type === 'O'){
    echo "O型のあなたの運勢はブラック。何をしてもうまくいかないので家に引きこもりましょう\n";
}else{
    echo "該当する血液型はありません。あなたは宇宙人。どうしようもないでしょう。\n";
}


/**
 * 税込み金額計算の関数
 * 
 * @param int $price 価格 
 * @param float $tax_rate 税率
 * 
 * @return int 税込み金額
 * @see
 * 値がない場合はvoid等と記載する
 */
function mc($price,$tax_rate)  {
    $sum = 0;
    $sum = $price + ($price * $tax_rate);
    return $sum;
}

function tc($m,$price,$tax_rate){
    $mc = mc($price,$tax_rate);
    $total = $mc * $m;
    return $total;
}

$result = tc(12,1000,0.1);

$figure = [
    'key' => 7
];

?>
