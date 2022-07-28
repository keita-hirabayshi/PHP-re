<?php
function redirect($path){
    if($path === GO_HOME){
        $path = get_url('');
    }elseif($path === GO_REFERER){
        $path = $_SERVER['HTTP_REFERER'];
    }else{
        $path = get_url($path);
    }

    $path = get_url($path);
    header("Location: {$path}");
    die();
}

function get_url($path){
    return BASE_CONTEXT_PATH . trim($path,'/');
}

function route($rpath,$method){
    try{

        throw new Error();

        if($rpath ===''){
        $rpath = 'home';
        }
        $targetFile = SOURCE_BASE . "controllers/{$rpath}.php";

        if(!file_exists($targetFile)){
            require_once SOURCE_BASE . "../views/404.php";
            return;
        }
        require_once $targetFile;

        $fn = "\\controller\\{$rpath}\\{$method}";

        $fn();

    }catch(Throwable $e){
        Msg::push(Msg::DEBUG,$e->getMessage());
        Msg::push(Msg::ERROR,'なんかおかしいみたいです。');
        require_once SOURCE_BASE . "../views/404.php";
    }



}

 ?>
