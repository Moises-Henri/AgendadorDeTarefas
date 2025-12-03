<?php

session_start();
session_destroy();

 $dados = array(
        'type' => 'Sucesso',
        'message' => 'Sessão finalizada'
    );
echo json_encode($dados);
?>