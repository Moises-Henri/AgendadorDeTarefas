<?php

include("../../connection/conn.php");
date_default_timezone_set('America/Sao_Paulo');
$dataLocal = data('Y-m-d H:i:s', time());

if (empty($_POST['TITLE'])  || empty($_POST['DESCRIPTION'])) {
    $dados = array(
        "type" => "error",
        "message" => "Existe(m) campo(s) obrigatorio(s) nao preenchido(s)"

    );
} else {
    try{
    $sql = "INSERT INTO TASK (DATE_TIME, TITLE, DESCRIPTION, STATUS, USER_ID) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $dataLocal,
        $_POST['TITLE'],
        $_POST['DESCRIPTION'],
        '1',
        $_POST['USER_ID']
    ]);
     $dados = array(
        "type" => "success",
        "message" => "Registro salvo com sucesso!"

    );
} catch(PDOException $e){
 $dados = array(
        "type" => "error",
        "message" => "Erro ao salvar Registro: ". $e->getMessage()

    );
    
}
}

$conn = null;
echo json_encode($dados);

?>