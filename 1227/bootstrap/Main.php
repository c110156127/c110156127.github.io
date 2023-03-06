<?php
require_once __DIR__ .'/../vendor/autoload.php';

use Middlewares\AuthMiddleware;
use Vendor\DB;
use Vendor\Router;

class Main{
    static function run(){
        //讀取.env,設定相關config
        $conf = parse_ini_file(__DIR__. '/../vendor/.env');
        DB::$dbHost = $conf['dbHost'];
        DB::$dbName = $conf['dbName'];
        DB::$dbUser = $conf['dbUser'];
        DB::$dbPassword = $conf['dbPassword'];
        //讀取action值
        if(isset($_GET['action'])) 
            $action=$_GET['action'];    
        else
            $action='no_action';
        //檢查token是否有效
        $response = $responseToken = AuthMiddleware::checkToken();
        if($responseToken['status']==200){
            if($action != "no_action") { 
                $response = AuthMiddleware::checkPrevilege($action);
                if($response['status']==200){ 
                    $router = new Router();
                    require_once __DIR__ . "/../routes/web.php";
                    $response = $router->run($action);
                }
            }
            $response['token'] = $responseToken['token'];
        }
        else{
            switch($action){
                case 'doLogin':
                    $response = AuthMiddleware::doLogin();
                    break;
                default:
                    break;
            }
        }
        echo json_encode($response);
    }
}
?>