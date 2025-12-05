<?php

session_start();

if(isset($_SESSION['ID']) && isset($_SESSION['NAME']) && isset($_SESSION['EMAIL'])
     && isset($_SESSION['LEVEL'])){
$dados = array(
        'type' => 'success',
        'message' => 'Seja Bem-Vindo!'
    );
}
else {
$dados = array(
        'type' => 'error',
        'message' => 'Usuario não validado'
    );
}

echo json_encode($dados);

?>