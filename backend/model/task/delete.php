<?php

include("../../connection/conn.php");
date_default_timezone_set('America/Sao_Paulo');
$dataLocal = date('Y-m-d H:i:s', time());

if (empty($_POST['ID'])) {
    $dados = array(
        "type" => "error",
        "message" => "Existe(m) campo(s) obrigatorio(s) nao preenchido(s)"

    );
} else {
     try{
    $sql = "UPDATE TASK SET STATUS = ? WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        '4',
        $_POST['ID']
    ]);
     $dados = array(
        "type" => "success",
        "message" => "Registro cancelado com sucesso!"

    );
} catch(PDOException $e){
 $dados = array(
        "type" => "error",
        "message" => "Erro ao cancelar o Registro: ". $e->getMessage()

    );
}
}


$conn = null;
echo json_encode($dados);
?>