<?php

include("../../connection/conn.php");
$sql = "SELECT * FROM TASK ORDER BY ID DESC";
$stmt = $conn->prepare($sql);
$stmt -> execute();


$dados = $stmt -> fetchAll(PDO::FETCH_ASSOC);



echo json_encode($dados);
$conn = null;

?>