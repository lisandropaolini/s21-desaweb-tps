<?php
$resultado = [
  'error' => false,
  'mensaje' => ''
];

try {
  $id = $_GET['id'];

  $dsn = 'mysql:host=localhost;dbname=lisandro_tp3';
  $conexion = new PDO($dsn, "mysql", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

  $consulta = "SELECT * FROM pedidos WHERE id_pedidos=" . $id;
  $sentencia = $conexion->prepare($consulta);

  $sentencia->execute();
  $pedido = $sentencia->fetch(PDO::FETCH_ASSOC);

  $conexion = null;
  $sentencia = null;

} catch(PDOException $error) {
  $resultado['error'] = true;
  $resultado['mensaje'] = $error->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ingreso de pedidos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
   rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
   integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6" style="margin-top: 20px;">
      <div class="card">
        <div class="card-header text-center">
            <img src="https://natlife.com.ar/logo200.jpg" width="150px" style="float: left;" alt="" />
            <h2 class="card-title">Ver Pedido</h2>
          </div>

            <label for="cliente" class="form-label">Detalle del pedido</label>
            <div class="mb-3">
              <input type="text" class="form-control" id="nombre" name="nombre"
                placeholder="Nombre" value="<?= $pedido['nombre'] ?>" disabled>
            </div>
            <div class="mb-3">
              <input type="email" class="form-control" id="email"  name="email"
               placeholder="Email" value="<?= $pedido['email'] ?>" disabled>
            </div>
            <div class="mb-3">
              <input type="tel" class="form-control" id="telefono" name="telefono"
               placeholder="Teléfono" value="<?= $pedido['telefono'] ?>" disabled>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" id="direccion" name="direccion"
               placeholder="Dirección" value="<?= $pedido['direccion'] ?>" disabled>
            </div>
            <table class="table table-striped" aria-describedby="mispedidos">
              <thead>
                <tr>
                  <th>Producto</th>
                  <th>Cantidad</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Alfajor de Cereal</td>
                  <td><input type="number" min="0" max="20" id="tabla-adc"
                   name="tabla-adc" class="form-control" placeholder="Cantidad"
                   value="<?= $pedido['alf_cer'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Alfajor de Arroz</td>
                  <td><input type="number" min="0" max="20" id="tabla-ada"
                   name="tabla-ada" class="form-control" placeholder="Cantidad"
                   value="<?= $pedido['alf_arr'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Mix de Cereales</td>
                  <td><input type="number" min="0" max="20" id="tabla-mdc"
                   name="tabla-mdc" class="form-control" placeholder="Cantidad"
                   value="<?= $pedido['mix_cer'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Estado</td>
                  <td>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="EstadoSwitchCheck"
                    name="EstadoSwitchCheck" disabled <?php if ($pedido['estado'] == "ENTREGADO") {echo "checked";} ?>>
                    <label class="form-check-label" for="EstadoSwitchCheck">Entregado</label>
                  </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <div class="d-flex justify-content-end" style="vertical-align: bottom;">
            <a href="index.php" class="text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
                <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z"></path>
                <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z"></path>
              </svg>Volver</a>&MediumSpace;&MediumSpace;&MediumSpace;&MediumSpace;&MediumSpace;&MediumSpace;&MediumSpace;

            </div>

        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>

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
