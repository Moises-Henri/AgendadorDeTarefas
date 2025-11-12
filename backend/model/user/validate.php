<?php

session_start();
if(isset($_SESSION['ID'] && $_SESSION['NAME'] && $_SESSION['EMAIL'] && $_SESSION['LEVEL'])){
$dados = array(
        'type' = 'Sucesso!',
        'message' = 'Usuario validado!'
    );
}
else {
$dados = array(
        'type' = 'Erro',
        'message' = 'Usuario não validado'
    );
}

json_encode($dados);

?>