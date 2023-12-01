<?php

  // Validar datos
  $nombre = $_POST['nombre'];
  if (!empty($nombre)) {
    // Conectarse a la base de datos
    $conn = mysqli_connect("localhost", "mysql", "", "lisandro_tp3");
    if (!$conn) {
      die("Error al conectarse a la base de datos: " . mysqli_connect_error());
    }

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $tabla_adc = $_POST['tabla-adc'];
    $tabla_ada = $_POST['tabla-ada'];
    $tabla_mdc = $_POST['tabla-mdc'];

    $valores= "'$nombre', '$email', '$telefono', '$direccion', '$tabla_adc', '$tabla_ada', '$tabla_mdc'";
    $campos = "nombre, email, telefono, direccion, alf_cer, alf_arr, mix_cer";

    // Insertar el registro
    $sql = "INSERT INTO pedidos ($campos) VALUES ($valores)";

    $resultado = mysqli_query($conn, $sql);

    if (!$resultado) {
      die("Error al insertar el registro: " . mysqli_error($conn));
    }

    // Cerrar la conexión con la base de datos
    mysqli_close($conn);

    // Redirigir al usuario a la página principal
    header("Location: index.php");
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
            <h2 class="card-title">Ingresar Pedido</h2>
          </div>
          <form action="agregar.php" method="post" class="text-start">
            <label for="cliente" class="form-label">Detalle del pedido</label>
            <div class="mb-3">
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
            </div>
            <div class="mb-3">
              <input type="email" class="form-control" id="email"  name="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
              <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" required>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required>
            </div>
            <table class="table table-striped" aria-describedby="mydesc">
              
              <thead>
                <tr>
                  <th>Producto</th>
                  <th>Cantidad</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Alfajor de Cereal</td>
                  <td><input type="number" min="0" max="20" value="0" id="tabla-adc"
                   name="tabla-adc" class="form-control" placeholder="Cantidad" required></td>
                </tr>
                <tr>
                  <td>Alfajor de Arroz</td>
                  <td><input type="number" min="0" max="20" value="0" id="tabla-ada"
                   name="tabla-ada" class="form-control" placeholder="Cantidad" required></td>
                </tr>
                <tr>
                  <td>Mix de Cereales</td>
                  <td><input type="number" min="0" max="20" value="0" id="tabla-mdc"
                   name="tabla-mdc" class="form-control" placeholder="Cantidad" required></td>
                </tr>
              </tbody>
            </table>
            <div class="d-flex justify-content-end" style="vertical-align: bottom;">
            <a href="index.php" class="text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
                <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z"></path>
                <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z"></path>
              </svg>Volver</a>&MediumSpace;&MediumSpace;&MediumSpace;&MediumSpace;&MediumSpace;&MediumSpace;&MediumSpace;
              <button type="submit" class="btn btn-primary">Ingresar pedido</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
