<?php

include("../../connection/conn.php");


if (empty($_POST['NAME']) || empty($_POST['EMAIL'])  || empty($_POST['PASSWORD'])  || 
  empty($_POST['LEVEL'])  ||  empty($_POST['ID'])) {
    $dados = array(
        "type" => "error",
        "message" => "Existe(m) campo(s) obrigatorio(s) nao preenchido(s)"

    );
} else {
     try{
    $sql = "UPDATE USER SET NAME = ?, EMAIL = ?, PASSWORD = ?, LEVEL = ? WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $_POST['NAME'],
        $_POST['EMAIL'],
        $_POST['PASSWORD'],
        $_POST['LEVEL'],
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