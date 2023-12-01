<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ingreso de pedidos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6" style="margin-top: 20px;">
      <div class="card">
        <div class="card-header text-center">
            <img src="https://natlife.com.ar/logo200.jpg" width="150px" style="float: left;" />
            <h2 class="card-title">Ingreso de Pedidos</h2>
          </div>
          <form action="archivo2.php" method="post" class="text-start">
            <label for="cliente" class="form-label">Datos del cliente</label>
            <div class="mb-3">
              <!-- <label for="nombre-cliente" class="form-label">Nombre</label> -->
              <input type="text" class="form-control" id="nombre" name="nombre" 
                <?php
                    $nombre = $_SESSION['nombre'];
                    echo ' value="' . $nombre . '"';
                ?>
              readonly>
            </div>
            <div class="mb-3">
              <!-- <label for="email-cliente" class="form-label">Email</label> -->
              <input type="email" class="form-control" id="email"  name="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
              <!-- <label for="telefono-cliente" class="form-label">Teléfono</label> -->
              <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" required>
            </div>
            <div class="mb-3">
              <!-- <label for="direccion-cliente" class="form-label">Dirección</label> -->
              <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required>
            </div>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Producto</th>
                  <th>Cantidad</th>
                  <th>Precio</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Alfajor de Cereal</td>
                  <td><input type="number" min="0" max="20" value="0" id="tabla-adc" name="tabla-adc" class="form-control" placeholder="Cantidad"></td>
                  <td>$100</td>
                </tr>
                <tr>
                  <td>Alfajor de Arroz</td>
                  <td><input type="number" min="0" max="20" value="0" id="tabla-ada" name="tabla-ada" class="form-control" placeholder="Cantidad"></td>
                  <td>$150</td>
                </tr>
                <tr>
                  <td>Mix de Cereales</td>
                  <td><input type="number" min="0" max="20" value="0" id="tabla-mdc" name="tabla-mdc" class="form-control" placeholder="Cantidad"></td>
                  <td>$200</td>
                </tr>
              </tbody>
            </table>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary">Enviar pedido</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>

<?php
$datos = $_POST;
echo '<br>';
foreach ($datos as $key => $value) {
  echo $key . ': ' . $value . '<br>';
}
?>