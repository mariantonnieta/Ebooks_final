<?php
header('Content-type: application/json; charset=utf-8');
require_once('../repository/category_repo.php');

abstract class CategoryController {
    
    public function init(){
        $repository = new CategoryRepository();
        if (isset($_REQUEST["event"])) {
            switch ($_REQUEST["event"]) {
                case 'fetchAll':
                    $data = $repository->fetchAll();
                    if ($data == null) {
                        $response["message"] = "No se encuentran registros";
                        $response["success"] = false;
                        $response["data"] = $data;
                        echo json_encode($response);
                    }else{
                        $response["message"] = "Category success";
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
CategoryController::init();
?>