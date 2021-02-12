<?php
header('Content-type: application/json; charset=utf-8');
require_once('../repository/user_repo.php');

abstract class UserController {
    
    public function init(){
        $repository = new UserRepository();
        if (isset($_REQUEST["event"])) {
            switch ($_REQUEST["event"]) {
                case 'login':
                    $data = $repository->login($_REQUEST['email'],$_REQUEST['password']);
                    if ($data == null) {
                        $response["message"] = "No se encuentran registros";
                        $response["success"] = false;
                        $response["data"] = $data;
                        echo json_encode($response);
                    }else{
                        $response["message"] = "Login success";
                        $response["success"] = true;
                        $response["data"] = $data[0];
                        echo json_encode($response);
                    }
                    break;
                case 'fetchAll':
                    $data = $repository->fetchAll();
                    if ($data == null) {
                        $response["message"] = "No se encuentran registros";
                        $response["success"] = false;
                        $response["data"] = $data;
                        echo json_encode($response);
                    }else{
                        $response["message"] = "Login success";
                        $response["success"] = true;
                        $response["data"] = $data;
                        echo json_encode($response);
                    }
                    break;
                case 'insert':
                    parse_str($_REQUEST['form'], $formData);
                    $data = $repository->insert($formData);
                    if ($data == null) {
                        $response["message"] = "No se encuentran registros";
                        $response["success"] = false;
                        $response["data"] = $data;
                        echo json_encode($response);
                    }else{
                        $response["message"] = "Insert success";
                        $response["success"] = true;
                        $response["data"] = $data;
                        echo json_encode($response);
                    }
                    break;
                case 'delete':
                    $data = $repository->delete($_REQUEST['id']);
                    if ($data == null) {
                        $response["message"] = "No se encuentran registros";
                        $response["success"] = false;
                        $response["data"] = $data;
                        echo json_encode($response);
                    }else{
                        $response["message"] = "Delete success";
                        $response["success"] = true;
                        $response["data"] = $data;
                        echo json_encode($response);
                    }
                    break;
                case 'register':
                    parse_str($_REQUEST['form'], $formData);
                    $data = $repository->register($formData);
                    if ($data == null) {
                        $response["message"] = "No se encuentran registros";
                        $response["success"] = false;
                        $response["data"] = $data;
                        echo json_encode($response);
                    }else{
                        $response["message"] = "Insert success";
                        $response["success"] = true;
                        $response["data"] = $data;
                        echo json_encode($response);
                    }
                    break;
                case 'send-email':
                    $data = $repository->sendEmail($_REQUEST["email"]);
                    if ($data == null) {
                        $response["message"] = "No se encuentran registros";
                        $response["success"] = false;
                        $response["data"] = $data;
                        echo json_encode($response);
                    }else{
                        $response["message"] = "Send email success";
                        $response["success"] = true;
                        $response["data"] = $data;
                        echo json_encode($response);
                    }
                    break;
                case 'restore-password':
                    $data = $repository->changePassword($_REQUEST["token"], $_REQUEST["password"]);
                    if ($data == null) {
                        $response["message"] = "No se encuentran registros";
                        $response["success"] = false;
                        $response["data"] = $data;
                        echo json_encode($response);
                    }else{
                        $response["message"] = "Cahnge password success";
                        $response["success"] = true;
                        $response["data"] = $data;
                        echo json_encode($response);
                    }
                    break;
                default:
                    echo '{}';
                    break;
            }
        } else {
            echo '404';
        }
    }
}
UserController::init();
?>