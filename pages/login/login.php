<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title></title>
  <link rel="stylesheet" href="/src/styles/login.css" />
  <link rel="stylesheet" href="/src/styles/footer.css">
</head>

<body>
  <main>
    <div class="wrapper">
      <form method="POST" action="php/sign-in.php">
        <img class="imagen" src="/src/img/logo.svg" width="340" alt="" />
        <h1>Iniciar sesion</h1>
        <?php
        if (isset($_GET['error']) && $_GET['error'] == '1') {
          echo '<div class="alert alert-danger">Contraseña Incorrecta. </div>';
        }
        ?>
        <?php
        if (isset($_GET['error']) && $_GET['error'] == '2') {
          echo '<div class="alert alert-danger">Favor de insertar los datos correspondientes. </div>';
        }
        ?>
        <div class="input-box">
          <input type="text" name="user" placeholder="nombre de usuario" required />
          <i class="bx bxs-user"></i>
        </div>
        <div class="input-box">
          <input type="password" name="pass" placeholder="contraseña" required />
          <i class="bx bxs-lock-alt"></i>
        </div>

        <div class="renember-forgot">
          <label><input type="checkbox" /> Recordar</label>
          <a href="#">¿olvidaste tu contraseña?</a>
        </div>

        <input class="btn " name="btnIngresar" type="submit" value="Iniciar sesion">
        </input>
      </form>
    </div>
  </main>
  <footer class="footer">
    <div class="footer-left">
      <a href="#">Acerca de</a>
      <a href="#">Política de Privacidad</a>
      <a href="#">Contáctenos</a>
    </div>
    <div class="footer-right">
      <strong>&copy; 2024 Instituto Hispanoamericano Méxicano</strong>
    </div>
  </footer>
</body>

</html>