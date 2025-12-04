<?php

include("../../connection/conn.php");
session_start();
date_default_timezone_set('America/Sao_Paulo');
$dataLocal = date('Y-m-d H:i:s', time());

if (empty($_POST['TITLE'])  || empty($_POST['DESCRIPTION'])) {
    $dados = array(
        "type" => "error",
        "message" => "Existe(m) campo(s) obrigatorio(s) nao preenchido(s)"

    );
} else {
     try{
    $sql = "UPDATE TASK SET TITLE = ?, DESCRIPTION = ?, DATE_TIME = ? WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $_POST['TITLE'],
        $_POST['DESCRIPTION'],
        $_POST['DATE_TIME'],
        $_POST['ID']
    ]);
     $dados = array(
        "type" => "success",
        "message" => "Registro alterado com sucesso!"

    );
} catch(PDOException $e){
 $dados = array(
        "type" => "error",
        "message" => "Erro ao atualizar o Registro: ". $e->getMessage()

    );
}
}


$conn = null;
echo json_encode($dados);
?>