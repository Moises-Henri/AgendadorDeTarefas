<?php

include("../../connection/conn.php");
session_start();

$sql = "SELECT * FROM TASK WHERE USER_ID = ".$_SESSION['ID']." ORDER BY ID DESC";
$stmt = $conn->prepare($sql);
$stmt -> execute();


$dados = $stmt -> fetchAll(PDO::FETCH_ASSOC);


$conn = null;
echo json_encode($dados);


?>