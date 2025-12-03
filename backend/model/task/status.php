<?php

include("../../connection/conn.php");
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
        $_POST['STATUS'],
        $_POST['ID']
    ]);
     $dados = array(
        "type" => "success",
        "message" => "Status Atualizado com sucesso!"

    );
} catch(PDOException $e){
 $dados = array(
        "type" => "error",
        "message" => "Erro ao atualizar o Status: ". $e->getMessage()

    );
}
}


$conn = null;
echo json_encode($dados);
?>