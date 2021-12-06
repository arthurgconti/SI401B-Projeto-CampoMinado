<?php
require_once('../php/model/usuarioDAO.php');

try {
    $data = json_decode(file_get_contents('php://input'), true);
    unset($_SESSION["newLevel"]);
    echo json_encode(["status" => 200]);
} catch (PDOException $err) {
    echo json_encode(["error" => "conexão falhou: " . $err->getMessage()]);
}
