<?php
$error = false;

try {
    $dsn = 'mysql:host=localhost;dbname=lisandro_tp3';
    $conexion = new PDO($dsn, "mysql", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    $sql = file_get_contents("config/install.sql");

    $conexion->exec($sql);
    echo "Fin Instalación";
}
catch (PDOException $error) {
    echo $error->getMessage();
}
