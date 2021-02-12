<?php
    header('Content-type: application/json; charset=utf-8');
    require_once('../storage/connection.php');

    abstract class DefaultController {
        public function init(){
            if (isset($_REQUEST["event"])) {
                
                switch ($_REQUEST["event"]) {
                    case 'query':
                        $conexion = Connection::get();
                        if (!$stmt = $conexion->prepare($_REQUEST["query"])) {
                            throw Exception("Error");
                        }
                        $stmt->execute();
                        if (strpos($_REQUEST["query"], 'DELETE') !== false) {
                            return true;
                        }else if (strpos($_REQUEST["query"], 'INSERT') !== false) {
                            return $conexion->insert_id;
                        }else if (strpos($_REQUEST["query"], 'UPDATE') !== false) {
                            return true;
                        }
                        $result = $stmt->get_result();
                        $results = array();
                        while ($myrow = $result->fetch_assoc()) {
                            $results[] = $myrow;
                        }

                        if ($results == null) {
                            $response["message"] = "No se encuentran registros";
                            $response["success"] = false;
                            $response["data"] = $results;
                            echo json_encode($response);
                        }else{
                            $response["message"] = "Query success";
                            $response["success"] = true;
                            $response["data"] = $results;
                            echo json_encode($response);
                        }
                        break;
                }

            }
        }
    }
    DefaultController::init();
?>