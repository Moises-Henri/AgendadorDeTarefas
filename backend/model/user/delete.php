<?php

include("../../connection/conn.php");

if (empty($_POST['ID'])) {
    $dados = array(
        "type" => "error",
        "message" => "Existe(m) campo(s) obrigatorio(s) nao preenchido(s)"

    );
} else {
     try{
    $sql = "DELETE FROM USER WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $_POST['ID']
    ]);
     $dados = array(
        "type" => "success",
        "message" => "Registro excluido com sucesso!"

    );
} catch(PDOException $e){
 $dados = array(
        "type" => "error",
        "message" => "Erro ao excluir o Registro: ". $e->getMessage()

    );
}
}


$conn = null;
echo json_encode($dados);

?>