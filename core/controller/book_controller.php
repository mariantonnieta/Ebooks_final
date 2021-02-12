<?php
header('Content-type: application/json; charset=utf-8');
require_once('../repository/book_repo.php');

abstract class BookController {
    public function init(){
        $repository = new BookRepository();
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
                        $response["message"] = "Book success";
                        $response["success"] = true;
                        $response["data"] = $data;
                        echo json_encode($response);
                    }
                    break;
                case 'fetch':
                    $data = $repository->fetch($_REQUEST['book_id']);
                    if ($data == null) {
                        $response["message"] = "No se encuentran registros";
                        $response["success"] = false;
                        $response["data"] = $data;
                        echo json_encode($response);
                    } else {
                        $response["message"] = "Book success";
                        $response["success"] = true;
                        $response["data"] = $data[0];
                        echo json_encode($response);
                    }
                    break;
                case 'insert':
                    if ( 0 < $_FILES['file']['error'] ) {
                        echo 'Error: error' .$_FILES['file']['error'] . '<br>';
                    } else {
                        $srcDir = "../../resource/images/books/";
                        if (!is_dir($srcDir)) {
                            echo "$srcDir is not a directory!\n";
                        }
                        if (!is_writable($srcDir)) {
                            echo "$srcDir is not writable!\n";
                        }
                        if (!opendir($srcDir)) {
                            echo "$srcDir could not be opened.\n";
                        }
                        if (!file_exists($srcDir) ) {
                            mkdir ($srcDir, 0744);
                        }
                        $moved = move_uploaded_file($_FILES['file']['tmp_name'], $srcDir.$_FILES['file']['name']);
                        if (!$moved) {
                            echo "$srcDir no moved.\n";
                        }

                        $data = $repository->insert($_REQUEST, $_FILES['file']['name']);
                        if ($data == null) {
                            $response["message"] = "Ocurrio un problema al insertar el libro";
                            $response["success"] = false;
                            $response["data"] = $data;
                            echo json_encode($response);
                        } else {
                            $response["message"] = "Book success";
                            $response["success"] = true;
                            $response["data"] = $data[0];
                            echo json_encode($response);
                        }
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
                case 'fetchBorrow':
                    $data = $repository->fetchBorrow($_REQUEST['id']);
                    if ($data == null) {
                        $response["message"] = "No se encuentran registros";
                        $response["success"] = false;
                        $response["data"] = $data;
                        echo json_encode($response);
                    }else{
                        $response["message"] = "Borrow success";
                        $response["success"] = true;
                        $response["data"] = $data;
                        echo json_encode($response);
                    }
                    break;
                case 'return':
                    $data = $repository->returnBook($_REQUEST['book'], $_REQUEST['id']);
                    if ($data == null) {
                        $response["message"] = "No se encuentran registros";
                        $response["success"] = false;
                        $response["data"] = $data;
                        echo json_encode($response);
                    }else{
                        $response["message"] = "Return success";
                        $response["success"] = true;
                        $response["data"] = $data;
                        echo json_encode($response);
                    }
                    break;
                case 'borrow':
                    $data = $repository->borrow($_REQUEST['book'], $_REQUEST['id'], $_REQUEST['time']);
                    if ($data == null) {
                        $response["message"] = "No se encuentran registros";
                        $response["success"] = false;
                        $response["data"] = $data;
                        echo json_encode($response);
                    }else{
                        $response["message"] = "Return success";
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
BookController::init();
?>