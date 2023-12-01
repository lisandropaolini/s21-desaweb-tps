<?php
session_start();

if (!empty($_POST['nombre'])) {
  $_SESSION['nombre'] = $_POST['nombre'];
  header('Location: archivo2.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Formulario con input de nombre</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<head>
<body>
  <div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6 text-center" style="margin-top: 20px;">
      <div class="card">
        <div class="card-body">
          <img src="https://natlife.com.ar/logo200.jpg" width="150px" />
          <form action="archivo1.php" method="post" class="text-start">
            <div class="mb-3">
              <!-- <label for="nombre" class="form-label">Usuario</label> -->
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" required>
            </div>
            <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>