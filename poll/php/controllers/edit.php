<?php
namespace controller\topic\edit;

use db\TopicQuery;
use lib\Auth;
use lib\Msg;
use model\TopicModel;
use model\UserModel;
use Throwable;

function get(){
    Auth::requireLogin();

    $topic = TopicModel::getSessionAndFlush();
// データ保持の流れ
// セッションにデータを格納する。
// セッションはリセットするが、ブラウザ上に値は表示するようにする。
// 過去のデータがsessionに格納され、誤って表示される可能性があるのでgetSessionAndFlushで初期化してあげる。
    if(!empty($topic)){
        \view\topic\edit\index($topic,true);
        return;
    }

    $topic = new TopicModel;
    $topic->id = get_param('topic_id',null,false);

    $user = UserModel::getSession();
    Auth::requirePermission($topic->id,$user);

    $fetchedTpic = TopicQuery::fetchById($topic);
    \view\topic\edit\index($fetchedTpic,true);

}

function post(){
    Auth::requireLogin();

    $topic = new TopicModel;
    $topic->id = get_param('topic_id',null);
    $topic->title = get_param('title',null);
    $topic->published = get_param('published',null);

    $user = UserModel::getSession();
    Auth::requirePermission($topic->id,$user);

    try{

        $is_success = TopicQuery::update($topic);

    }catch(Throwable $e){

        Msg::push(Msg::DEBUG,$e->getMessage());
        $is_success = false;

    }

    if($is_success){

        Msg::push(Msg::INFO,'トピックの更新に成功しました。');
        redirect('topic/archive');

    }else{

        Msg::push(Msg::ERROR,'トピックの更新に失敗しました。');
        TopicModel::setSession($topic);
        redirect(GO_REFERER);

    }
}

?>
