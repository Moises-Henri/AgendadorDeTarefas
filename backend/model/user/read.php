<?php

include("../../connection/conn.php");
$sql = "SELECT * FROM USER";
$stmt = $conn->prepare($sql);
$stmt -> execute();
$dados = $stmt -> fetchAll(PDO::FETCH_ASSOC);


$conn = null;
echo json_encode($dados);

?>