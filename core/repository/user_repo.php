<?php
require_once('../storage/connection.php');
require_once('../../config/sys.php');
require('../PHPMailer/src/PHPMailer.php');
require('../PHPMailer/src/SMTP.php');
require('../PHPMailer/src/Exception.php');

class UserRepository {
    public $conexion;
    public $ERRORDEL = "Error al preparar la sentencia";

    public function __construct() {
        $this->conexion = Connection::get();
    }
    
    public function login($email, $password){
        $query = "SELECT * FROM users where email = '$email' and password= '$password'";
        if (!$stmt = $this->conexion->prepare($query)) {
            throw Exception($this->ERRORDEL. $this->conexion->error);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $results = array();
        while ($myrow = $result->fetch_assoc()) {
            $results[] = $myrow;
        }
        return $results;
    }

    public function fetchAll(){
        $query = "SELECT * FROM users";
        if (!$stmt = $this->conexion->prepare($query)) {
            throw Exception($this->ERRORDEL. $this->conexion->error);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $results = array();
        while ($myrow = $result->fetch_assoc()) {
            $results[] = $myrow;
        }
        return $results;
    }

    public function insert($user){
        try {
            $query = "INSERT INTO users VALUES (0,?,?,?,?,?)";
            if (!$stmt = $this->conexion->prepare($query)) {
                throw Exception($this->ERRORDEL. $this->conexion->error, 1);
            }
            $stmt->bind_param("ssssi", $user['name'], $user['last_name'], $user['email'], $user['password'], $user['type']);
            if ($stmt->execute()) {
                $id = $this->conexion->insert_id;
                return $id;
            }
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function changePassword($token, $password){
        try {
            $query = "SELECT email FROM tokens where token = '$token' order by(id) DESC";
            if (!$stmt = $this->conexion->prepare($query)) {
                throw Exception($this->ERRORDEL. $this->conexion->error);
            }
            $stmt->execute();
            $result = $stmt->get_result();
            $results = array();
            while ($myrow = $result->fetch_assoc()) {
                $results[] = $myrow;
            }
            $email = $results[0]['email'];
            $query2 = "UPDATE users SET password = '$password' WHERE email='$email'";
            if (!$stmt = $this->conexion->prepare($query2)) {
                throw Exception($this->ERRORDEL. $this->conexion->error);
            }
            $result = $stmt->execute();

            $query3 = "DELETE FROM tokens WHERE token = ?";
            if (!$stmt = $this->conexion->prepare($query3)) {
                throw Exception($this->ERRORDEL. $this->conexion->error, 1);
            }
            $stmt->bind_param("s", $token);
            $stmt->execute();
            return $email != null;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function sendEmail($email){
        $query = "SELECT * FROM users where email = '$email'";
        if (!$stmt = $this->conexion->prepare($query)) {
            throw Exception($this->ERRORDEL. $this->conexion->error);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $results = array();
        while ($myrow = $result->fetch_assoc()) {
            $results[] = $myrow;
        }
        
        if (count($results) >= 1) {
            $token = bin2hex(random_bytes(15));
            try {
                $query = "INSERT INTO tokens VALUES (0,?,?)";
                if (!$stmt = $this->conexion->prepare($query)) {
                    throw Exception($this->ERRORDEL. $this->conexion->error, 1);
                }
                $stmt->bind_param("ss", $token, $results[0]['email']);
                if ($stmt->execute()) {
                    $id = $this->conexion->insert_id;
                }
            } catch (Exception $e) {
                echo $e;
            }

            try {
                $body = file_get_contents('../template/email.php');
                $body = str_replace('{app_name}', app_name, $body); 
                $body = str_replace('{link}', url_base."pages/restart-password.php?token=".$token, $body);
                $body = str_replace('{color_primary}', primary_color, $body); 
                
                $mail = new PHPMailer\PHPMailer\PHPMailer();
                $mail->CharSet = 'UTF-8';
                $mail->IsSMTP();
                $mail->SMTPDebug = 0;
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'ssl';
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 465;
                $mail->IsHTML(true);
                $mail->Username = email_user;
                $mail->Password = email_password;
                $mail->SetFrom($email);
                $mail->Subject = "Cambio de contraseña | ".app_name;
                $mail->MsgHTML($body);
                $mail->AddAddress($email);
                if(!$mail->Send()) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                    return false;
                 } else {
                    return true;
                 }
            } catch (\Throwable $th) {
                return false;
            }
        }
        return false;
    }

    public function register($user){
        try {
            $query = "INSERT INTO users VALUES (0,?,?,?,?,2)";
            if (!$stmt = $this->conexion->prepare($query)) {
                throw Exception($this->ERRORDEL. $this->conexion->error, 1);
            }
            $stmt->bind_param("ssss", $user['name'], $user['last_name'], $user['email'], $user['password']);
            if ($stmt->execute()) {
                $id = $this->conexion->insert_id;
                $user["id"] = $id;
                return $user;
            } else {return null;}
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function delete($id){
        $query = "DELETE FROM users WHERE id  = ?";
        if (!$stmt = $this->conexion->prepare($query)) {
            throw Exception($this->ERRORDEL. $this->conexion->error, 1);
        }
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}

?>