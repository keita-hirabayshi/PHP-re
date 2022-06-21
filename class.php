<?php
// クラスは概念。オブジェクトを生成するための雛形。
// 雛形オブジェクトから新たにオブジェクトを生成していくような流れ。
// 関数　→ メソッド 値　→ プロパティ    と表現する。
// privateで設定されたプロパティやメソッドはクラス外から直接アクセスすることはできない

// declare(strict_types=1);     データ型を厳密に指定したい場合には、左記のコードをそのまま入力することでモードが切り替わる
class camp 
{
    public $gear;
    public $food;
    public $dish;
    private $person;
    public static $fire = '焚き火';

    function __construct($gear,$food,$dish,$person){
        $this->gear = $gear;
        $this->food = $food;
        $this->dish = $dish;
        $this->person = $person;
    }

    function go_camping(){
        echo "<br>{$this->gear}を使い、{$this->food}を調理し{$this->dish}を作るのはやっぱりキャンプの定番。</br>";
        return $this;
    }
    
    function left_camping(){
        echo "<br>もちろん、後片付けを{$this->person}でしっかりするのはキャンパーとしての礼儀</br>";
        static::bye();
        // 自クラス内でstaticを呼び出す場合にはクラス名ではなく staticもしくはselfと記載して呼び出す。($thisと同じような考え方)
    }

    // staticメソッドはクラスで共通して使う要素に対して使われるもの。そのためメソッドはクラス内でのみ保持され、$thisはもちろん使えない。
    public static function bye(){
        $cfire = static::$fire;
        echo "<br>最後は{$cfire}を囲んで物思いに耽る</br>";
        echo self::$fire;
        // selfとstaticの違いは参照の検索具合。selfは当クラスのみだが、staticは大元から順に参照していく。
    }



}

// オーバーライト   継承先のクラスにて、プロパティやメソッドを変更すること
// final    最終盤変更不可      abstract    継承先にて定義することを示す


class idealcamp extends camp{
    public static $fire = 'キャンプファイヤー';
    public $cfire;

    function __construct($gear,$food,$dish,$person){
        parent::__construct($gear,$food,$dish,$person);
    }

    function go_camping(){
        $cfire = parent::$fire;
        echo "<br>車でアメリカを横断しつつ、{$this->dish}を食らい{$cfire}を眺め凍えながら眠る。</br>";
        return $this;
    }

    function true(){
        echo '<br>これこそキャンプの醍醐味</br>';
        return $this;
    }

}


// $camp = new camp('キレット','魚介類','アヒージョ','大人数');
// $camp->go_camping()->left_camping();
// 返り値に生成されたインスタンスを持ってくることで、連続して処理を実行できるようになる。　→ チェーンメソッド
// camp::bye();
// staticは呼び出す時、クラスから呼び出すのが一般的。
// var_dump($camp);
// 生成されたオブジェクトはインスタンスと呼ぶ

$camp = new idealcamp('キレット','魚介類','スモア','大人数');
$camp->go_camping()->true()->bye();