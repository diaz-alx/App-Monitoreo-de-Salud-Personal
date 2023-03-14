<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script data-search-pseudo-elements defer src="css/fontawesome/all.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Clínica ABC</title>

  <script type="text/javascript">
     $(document).ready(function () {
      $("ul li a").click(function () {
          var id = $(this);
          $(".active").removeClass("active");
          $(id).addClass("active");
          localStorage.setItem("selectedolditem", $(id).text());
      });
      var selectedolditem = localStorage.getItem('selectedolditem');
      if (selectedolditem !== null) {
          $("a:contains('" + selectedolditem + "')").addClass("active");
      }
      });
   </script>

</head>

<body>

<div class="wrapper">
    <div class="sidebar" >
    
          <div class="profile title">
              CLINICA.ABC
          </div>
          
          <img src="img/healthcare.png" alt="logo" class="profile img">
          
            <ul class="nav">
              <li>
                <a href="dashboard.php"><i class="fas fa-th fa-2x"></i>Mi Dashboard</a>
              </li>
              <li>
                <a href="imc.php"><i class="fas fa-weight fa-2x"></i>Mi IMC</a>
              </li>
              <li>
                <a href="glucometro.php"><i class="fas fa-eye-dropper fa-2x"></i> Mi Glucómetro</a>
              </li>
              <li>
                <a href="presion.php"><i class="fas fa-heartbeat fa-2x"></i>Mi Presión Arterial</a>
              </li>

              <li>
                <a href="reportes.php"><i class="fas fa-heartbeat fa-2x"></i>Mis Reportes</a>
              </li>

              <li>
                <a href="logout.php"><i class="fas fa-sign-out-alt fa-2x"></i> Cerrar Sesión</a>
              </li>
            </ul>

            <div class="footer">
                  <p>Universidad Tecnológica de Panamá&reg;</p><br>
                  <p>Por: Gabriel Díaz</p>
                  <i class="fab fa-github"></i>
            </div>
    </div>