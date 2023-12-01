<?php
$error = false;

try {
  $id = $_GET["id"];
  if (empty($id)){
    echo "{}";
  } else {
    $dsn = 'mysql:host=localhost;dbname=lisandro_tp4';
    $conexion = new PDO($dsn, "mysql", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
  
    $consulta = "SELECT * FROM pedidos WHERE id_pedidos=" . $id;
    $sentencia = $conexion->prepare($consulta);
  
    $sentencia->execute();
    $pedidos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
  
    if (!empty($pedidos)){
      echo json_encode($pedidos[0]);
    } else {
      echo "{}";
    }
  }
} catch(PDOException $error) {
  $error= $error->getMessage();
  echo '{"error": "'.$error.'"}';
}
