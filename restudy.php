<?php
// 連想配列　
// パターン1
$youjo = [
    ['舞台','1900年代'],['主人公','現世で死に転生したエリート'],['声優','早見沙織']
];
$spot = $youjo[0][0];
$year = $youjo[0][1];
echo '<div>'.$spot.'</div>';
// パターン２
$character = [
    'age' => 1,
    'name' => 'an',
    'likes' => ['summer','trip']
];
unset ($character['age']) ;
// unsetで削除可能
echo $character['likes'][0];
// var_dump($character);

if(empty($t)){    echo'true';
}else{    echo'false';}



// 練習問題
$products = [
    'table' => [1000, 2], 
    'chair' => [500, 4],
    'bed' => [10000, 1],
    'light' => [5000, 1]
];

foreach ($products as $key => $product){
    $name = $key;
    $price = $product[0];
    $unit = $product[1];
    echo "{$name}は{$price}円で{$unit}個存在する。";
}

echo '<div>商品購入</div>';
foreach ($cart as $name => $unit){
    $p_name = $name;
    $p_unit = $unit;
    echo "{$p_name}を{$p_unit}ください";
    $stock = $products[$p_name][1];
    if($p_unit < $stock){
        echo '<div>はいありがとうございます。</div>';
    }else{
        echo "すみません。{$p_name}は{$stock}しかありません。";
    }
}

/**
 * php専用のコメント枠(doc comment)
 * 
 * @author keita
 * @since 1.0.0
 */


/**
 * 条件分岐の省略表記   三項演算子とnull合体演算子
 */
$figure['key'] = isset($figure['key']) ? $figure['key'] *6 : 1;
$figure['key'] = $figure['key'] ?? 2;

/**
 * 定数の定義
 * constとdefineがある
 * 違いは、constの場合関数内で定義できない点。
 * if(!define($tex)){define($tax,0.1)}      定数を定義する時、重複しないようにするよく使うやり方
 * define(定数名,代入したい値) 
 */

 /**
 * funcitonの定義。定義されているか確認して定義するのが良い
 * if(!function_exists('fns')){
    function fns(){
        echo 'fn指名です';
    }
}
 */

/**
 * includeとrequire
 * includeはエラーあっても一通り読み込む。requireはエラーで止まる
 * include → テンプレなどミスってもまあいいもの。 require → 関数など重要度の高いもの
 */

 /**
 * 名前空間
 * 名前空間のことなる場の関数や定数などを呼び出す時は、 \名前 にて空間を指定してあげる。
 * グローバル空間に対して指定が必要なのは、クラスが設定されている場合のみ
 */
// namespace  lib;
// const lib = 4;
// // 階層にできる
// namespace lib\sub;
// const sub = 3;
// // 呼び出し方は下の２パターン
// use const \lib\lib;
// $sums = \lib\sub\sub;
// echo $sums;

/**
 * データ型の宣言
 * 
 * function add (int $val): int{
 * return (int) ($val + 1);}
 * 引数だけでなく、関数の中身に対しても : int としてやることで処理内容にもデータ型を指定することができる。
 */

 
/**Webサーバー
 * apacheについて
 * webサーバーの一種で、情報をモジュール単位で追加・削除可能
 * 設定については、http.conf,.htaccessにてディレクティブごとに変更が可能
 * 
 * ディレクティブにはさまざまな種類がある。それらを記載可能な場所をコンテキストと呼ぶ
 * httpd.conf , virtualhost , .htaccess , Directory
 * 
 * alias → サーバー設定ファイルやヴァーチャルホスト     パスを置き換えショートカットできるようになる
 * ↓ 　適用範囲はディレクトリ以下の下位層に適用される
 * directory → ディレクトリ、サブディレクトリに対し、読み込みたいファイルや表示形式を指定できる
 * .htaccess → override all を有効にして使う。ディレクトリ、サブディレクトリに対し、.htaccesファイルを作成して適用する。(昨日はdirectoryと同様)
 * 
 * redirect(転送処理のこと)
 * redirect /apache/redirect /apache  指定のパスが該当すれば別のパスへ転送しり処理のこと(ブラウザのlocationでパスを伝える。)
 * 301と302リダイレクト　(301永続的で、一度リダイレクトするとブラウザ内に転送先をキャッシュとして保持する。ブラウザのキャッシュをクリアしない限り、サーバにて設定を変更しても反映されない。302一次的な引っ越しで有効)
 * 301 Redirect
 */

/**
 * apache  ログの出力
 * Loglevel,ErrorLog,CustomLog,LogFormat
 * Loglevel → エラー出力の詳細度を指定　error > warn > debug
 * ErrorLog → エラーログの出力先パス
 * LogFormat → ログの出力内容について指定できる。
 * CustomLog → LogFormatで設定した内容を特定のログファイルにパスを用いて適用させる。
 * 
 * Rewriterule (ディレクトリ)
 * RewriteEngine を Onに設定してあげる必要がある。
 * redirectではブラウザとサーバー間でやりとりがあったが、こちらではapache内部で処理を行うのでパスの表記は変わらん
 * RewriteRule rewrite-test/index.html - [F]    → 対象のディレクトリに設定だけ追記することも可能。(Forbiddenでアクセスを禁止)
 * 
 * RewriteCond  RewriteRuleの検索範囲の詳細度を高めたもの(直下のRewriteRuleにのみ適用される。)
 * その１
 * RewriteCond %{HTTTP_HOST} localhost
 * RewriteRule rewrite-test/imgs/(\d{3}).jpg imgs/$1.png
 * その２
 * ReriteEngine On
 * RewriteBase apache/rewrite-test/
 * RewriteCond %{QUERY_STRING}} P=(.+)
 * RewriteRule rewrite-test/sub1 sub1/%1?
 * queryはURLの末尾に?から始めることで付与できる。
 * また、後方参照で読み込んだでのURLはそのままだと末尾にqueryが付き無限ループしてしまうので、文末に?を置き最終盤URLと認識させる
 * 
 */