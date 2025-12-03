<?php

session_start();
if(isset($_SESSION['ID']) && isset($_SESSION['NAME']) && isset($_SESSION['EMAIL']) && 
isset($_SESSION['LEVEL'])){
$dados = array(
        'type' => 'Sucesso!',
        'message' => 'Usuario validado!'
    );
}
else {
$dados = array(
        'type' => 'Erro',
        'message' => 'Usuario não validado'
    );
}

echo json_encode($dados);

?>