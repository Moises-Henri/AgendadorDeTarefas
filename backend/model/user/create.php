<?php

include("../../connection/conn.php");

if (empty($_POST['NAME']) || empty($_POST['EMAIL'])  || empty($_POST['PASSWORD'])  || 
  empty($_POST['LEVEL'])) {
    $dados = array(
        "type" => "error",
        "message" => "Existe(m) campo(s) obrigatorio(s) nao preenchido(s)"

    );
} else {
    try{
    $sql = "INSERT INTO USER (NAME, EMAIL, PASSWORD, LEVEL) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $_POST['NAME'],
        $_POST['EMAIL'],
        $_POST['PASSWORD'],
        $_POST['LEVEL']
    ])
}
};
<<<<<<< HEAD
     $dados = array(
        "type" => "success",
        "message" => "Registro salvo com sucesso!"

    );
} catch(PDOException $e){
 $dados = array(
        "type" => "error",
        "message" => "Erro ao salvar Registro: ". $e->getMessage()

    );
    
=======
    $dados = array(
        "type" == "Sucess",
        "message" == "Registro Salvo com Sucesso!"

    );
} catch(PDOEXPECTION $e){

    $dados = array(
        "type" == "error",
        "message" == "Erro ao salvar o registro: ". $e ->getMessage()
    );
>>>>>>> a5e2cfa84056cb2e12bb999172d56a72f87ef151
}
}

$conn = null;
echo json_encode($dados);

?>