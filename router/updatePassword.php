<?php
require_once('../php/model/usuarioDAO.php');

try {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data["id"])) {
        if (UsuarioDAO::getInstance()->updatePassword(
            $data["id"],
            $data["senha"]
        )) {
            echo json_encode(["status" => 200,"message" => "Senha alterada com sucesso!" ]);
        } else {
            echo json_encode(["status" => 404]);
        }
    }
} catch (PDOException $err) {
    echo json_encode(["error" => "conexão falhou: " . $err->getMessage()]);
}
