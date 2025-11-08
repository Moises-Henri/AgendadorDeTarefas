<?php

include("../../connection/conn.php");
$sql = "SELECT *, count(ID) as achou FROM USER WHERE EMAIL = ? AND PASSWORD = ?";
$stmt = $conn->prepare($sql);
$stmt -> execute();


$dados = $stmt -> fetchAll(PDO::FETCH_ASSOC);



echo json_encode($dados);
$conn = null;

?>