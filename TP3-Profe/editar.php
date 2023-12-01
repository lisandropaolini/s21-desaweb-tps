<?php
$config = include 'config.php';

$resultado = [
  'error' => false,
  'mensaje' => ''
];

if (!isset($_GET['id'])) {
  $resultado['error'] = true;
  $resultado['mensaje'] = 'El usuario no existe';
}

if (isset($_POST['submit'])) {
  try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    $usuario = [
      "id"      => $_GET['id'],
      "usuario" => $_POST['usuario'],
      "clave"   => $_POST['clave'],
    ];
    
    $consultaSQL = "UPDATE usuarios SET
        usuario  = :usuario,
        clave    = :clave
        WHERE id = :id";
    
    $consulta = $conexion->prepare($consultaSQL);
    $consulta->execute($usuario);

  } catch(PDOException $error) {
    $resultado['error'] = true;
    $resultado['mensaje'] = $error->getMessage();
  }
}

try {
  $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
  $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
    
  $id = $_GET['id'];
  $consultaSQL = "SELECT * FROM usuarios WHERE id =" . $id;

  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();

  $usuario = $sentencia->fetch(PDO::FETCH_ASSOC);

  if (!$usuario) {
    $resultado['error'] = true;
    $resultado['mensaje'] = 'No se ha encontrado el usuario';
  }

} catch(PDOException $error) {
  $resultado['error'] = true;
  $resultado['mensaje'] = $error->getMessage();
}
?>

<?php require "templates/header.php"; ?>

<?php
if ($resultado['error']) {
  ?>
  <div class="container mt-2">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
          <?= $resultado['mensaje'] ?>
        </div>
      </div>
    </div>
  </div>
  <?php
}
?>

<?php
if (isset($_POST['submit']) && !$resultado['error']) {
  ?>
  <div class="container mt-2">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-success" role="alert">
          El usuario ha sido actualizado correctamente
        </div>
      </div>
    </div>
  </div>
  <?php
}
?>

<?php
if (isset($usuario) && $usuario) {
  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="mt-4">Editando el usuario <?= $usuario['usuario'] . ' ' . $usuario['clave']  ?></h2>
        <hr>
        <form method="post">
          <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario" value="<?= $usuario['usuario'] ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="clave">Clave</label>
            <input type="text" name="clave" id="clave" value="<?= $usuario['clave'] ?>" class="form-control">
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Actualizar">
            <a class="btn btn-primary" href="index.php">Regresar al Inicio</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
}
?>

<?php require "templates/footer.php"; ?>