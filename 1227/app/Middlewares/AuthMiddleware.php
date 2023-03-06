<?php
namespace Middlewares;
use \Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Vendor\Controller;
use Models\Employee as EmployeeModel;
use Models\Action;

class AuthMiddleware extends Controller{
    private static $id;

    public static function checkPrevilege($action){
        $id = self::$id;
        $em = new EmployeeModel();
        $response = $em->getRoles($id);
        $user_roles = $response['result'];
        $am = new Action();
        $response = $am->getRoles($action);
        $action_roles = $response['result'];
        $r = array_intersect($user_roles, $action_roles);
        if(count($r)!=0){
            return self::response(200, '有權限');
        }
        else{
            return self::response(403, '沒有權限');
        }
    }

    public static function checkToken(){
        $headers = getallheaders();
        $jwt = $headers['Authorization'];
        $secret_key = "YOUR_SECRET_KEY";
        try {
            $payload = JWT::decode($jwt, new Key($secret_key, 'HS256'));
            self::$id =  $payload->data->id;
            $jwt = self::genToken($payload->data->id);
            $response['status'] = 200;
            $response['message'] = "Access granted";
            $response['token'] = $jwt;
        } catch (Exception $e) {
            $response['status'] = 401;
            $response['message'] = $e->getMessage();
        }
        return $response;
    }
    public static function doLogin(){
        $id = $_POST['id'];
        $password = $_POST['password'];
        //查詢DB驗證帳密的正確性
        $em = new EmployeeModel();
        $response = $em->checkIdPw($id,$password);
        if($response['status']==200){
            $jwt = self::genToken($id);
            $response['status'] = 200;
            $response['message'] = "Access granted";
            $response['token'] = $jwt;
        }
        return $response;
    }
    private static function genToken($id){
        $secret_key = "YOUR_SECRET_KEY";
        $issuer_claim = "http://localhost";
        $audience_claim = "http://localhost";
        $issuedat_claim = time(); // issued at
        $expire_claim = $issuedat_claim + 5;
        $payload = array(
            "iss" => $issuer_claim,
            "aud" => $audience_claim,
            "iat" => $issuedat_claim,
            "exp" => $expire_claim,
            "data" => array(
            "id" => $id,
            )
        );
        $jwt = JWT::encode($payload, $secret_key, 'HS256');
        return $jwt;
    }
}
?>