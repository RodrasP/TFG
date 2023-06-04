<!-- Vista común a la mayoría (sino todas) las vistas de la aplicación
     Suele contener la imagen corporativa de la apliación Web
     Concretamente esta página contiene el nombre de la empresa
     "Cadena Tiendas Media" y una barra de hiperenlaces con un enalace a la
     página home, llamado "inicio"
     El nombre del archivo es indiferente: layout, comun, etc.
-->
<!DOCTYPE html>
<html>

<head>
  <title>Vecinos en red</title>
  <meta charset="utf-8">
  <link rel="icon" href="web\imagenes\logo_boceto.png" type="image/png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href='web/css/style.css' />
</head>

<body>
  <header>
    <div class="header-content">
      <a href="index.php?ctl=inicio" style="text-decoration: none;">
        <h1>VecinosEnRed</h1>
        <p>Nos vemos en la pista</p>
      </a>
    </div>
  </header>

  <?php if ($_SESSION['usuario'] === 'anonimo') : ?>
    <nav style="padding: 16px;">
    <?php else : ?>
      <nav>
      <?php endif ?>
      <a href="index.php?ctl=inicio" class="enlace">Inicio</a> |
      <a href="index.php?ctl=contacto" class="enlace">Contacto</a> |
      <?php if ($_SESSION['usuario'] === 'anonimo') : ?>
        <a href="index.php?ctl=iniSes" class="enlace">Iniciar Sesion</a> |
      <?php else : ?>
        <a href="index.php?ctl=reservar" class="enlace">Reservar</a> |

        <?php if ($_SESSION['rol'] === 'admin') : ?>
          <a href="index.php?ctl=users" class="enlace">Usuarios</a> |
        <?php endif ?>

        <div class="dropdown">
          <button class="dropbtn"><?= $_SESSION['nombre_usuario'] ?></button>
          <div class="dropdown-content">
            <form method="post" action="index.php">
              <input type="hidden" name="ctl" value="cerrarSes">
              <input type="submit" value="Cerrar Sesion" name="ok">
            </form>
          </div>
        </div>

      <?php endif; ?>



      </nav>




      <div id="contenido">


        <?= $contenido ?>
      </div>
      <footer>
        <div class="navegacion">

          <nav>
            <ul>
              <li>
                <a href="index.php?ctl=inicio" class="enlace">Inicio</a>
              </li>
              <li>
                <a href="index.php?ctl=contacto" class="enlace">Contacto</a>
              </li>
              <?php if ($_SESSION['usuario'] === 'anonimo') : ?>
                <li>
                  <a href="index.php?ctl=iniSes" class="enlace">Iniciar Sesion</a>
                </li>
              <?php else : ?>
                <li>
                  <a href="index.php?ctl=reservar" class="enlace">Reservar</a>
                </li>
                <?php if ($_SESSION['rol'] === 'admin') : ?>
                  <li>
                    <a href="index.php?ctl=users" class="enlace">Usuarios</a>
                  </li>
                <?php endif ?>
              <?php endif; ?>
            </ul>
          </nav>
        </div>

        <div class="nombre">
          <h1>VecinosEnRed</h1>
          <p>Nos vemos en la pista</p>
        </div>
        <div class="contacto-footer">
          <h3 style="color: white;">Contacto</h3>
          <ul>
            <li style="color: white;">
              <span>Teléfono:</span> +34 612 345 678
            </li>
            <li style="color: white;">
              <span>Correo electrónico:</span> info@VecinosEnRed.com
            </li>
          </ul>
        </div>

      </footer>
      <script>
        // Seleccionar el elemento con la clase dropdown-content
        const dropbtn = document.querySelector('.dropbtn');
        dropbtn.addEventListener('click', function() {

          window.location.replace('index.php?ctl=perfil');

        });
      </script>
</body>

</html>