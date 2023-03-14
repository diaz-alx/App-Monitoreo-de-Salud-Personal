<?php require 'header.php'; ?>

  <div class="content content-is-open">
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div class="card mb-3" >
          <div class="row g-0">
              <div class="col-md-10">
                <div class="card-body">
                  <img style="width: 28px;left: 0;display: inline-block;margin: 0.5rem;" src="img/glucosemeter.png" alt="bmi" >
                  <h1 class="card-tittle" style="color:black;display: inline-block;"><b>Mis Reportes</b></h1>
                </div>
              </div>
              <div class="col-md-2">
                <div class="card-body">
                  <p class="card-text text-right">Visitas de hoy <span class=" badge bg-warning text-dark"> <?php echo $contador; ?></span></p>
                </div>
              </div>
          </div>
          <div class="row g-0">
            <div class="col-md-10">
              <div class="card-body">
                <h2 class="card-tittle" ><b>Historial de: </b><b style="color:red;"> <?php echo ucwords($_SESSION['UserValues']['nombre']); ?></b></h2>
              </div>
            </div>
            
          
                  <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Seleccionar Tipo de Reporte</legend>
                      <div class="col-sm-10">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="tipo" id="gridRadios1" value="imc" checked>
                          <label class="form-check-label" for="gridRadios1">
                            Imc
                          </label>
                        </div>

                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="tipo" id="gridRadios2" value="presion">
                          <label class="form-check-label" for="gridRadios2">
                            Presión
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="tipo" id="gridRadios2" value="glucosa">
                          <label class="form-check-label" for="gridRadios2">
                            Glucosa
                          </label>
                        </div>
                      </div>
                  </fieldset>
              
           
          </div>
        </div>
        <hr>

        <button type="submit" class="btn btn-primary" name="generarReporte">Generar Reporte</button>

        <hr>

    
        <?php if(isset($_REQUEST['generarReporte']) && $tipoReporte == 'imc') : ?>
        <div class="card mb-10" >
            <div class="row g-0">
                <div class="col-md-10">
                    <div class="card-body">
                    <h5 class="card-title"><b>Resultados de tu IMC</b> </h5>
                    <table class="table">

                    <thead>
                        <tr>
                        <th scope="col">No Prueba</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Resultado</th>
                        <th scope="col">Lectura</th>
                        <th scope="col">Recomendación</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($datos as $data) {
                    echo "<tr>
                                <th scope='row'>".$data['No_Prueba']."</th>
                                <td>".$data['fecha_prueba']."</td>
                                <td>".$data['Resultado']."</td>
                                <td>".$data['Lectura']."</td>
                                <td>".$data['Recomendacion']."</td>
                            <tr>";
                        }
                        ?>
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>

        <?php elseif(isset($_REQUEST['generarReporte']) && $tipoReporte == 'glucosa') : ?>              
        <div class="card mb-10" >
            <div class="row g-0">
                <div class="col-md-10">
                    <div class="card-body">
                    <h5 class="card-title"><b>Resultados de tu Glucosa</b> </h5>
                    <table class="table">

                    <thead>
                        <tr>
                        <th scope="col">No Prueba</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Resultado</th>
                        <th scope="col">Lectura</th>
                        <th scope="col">Periodo</th>
                        <th scope="col">Nivel</th>
                        <th scope="col">Recomendación</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($datos as $data) {
                    echo "<tr>
                                <th scope='row'>".$data['No_Prueba']."</th>
                                <td>".$data['fecha_prueba']."</td>
                                <td>".$data['Resultado']."</td>
                                <td>".$data['Lectura']."</td>
                                <td>".$data['periodo']."</td>
                                <td>".$data['nivel']."</td>
                                <td>".$data['Recomendacion']."</td>
                            <tr>";
                        }
                        ?>
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>

        <?php elseif(isset($_REQUEST['generarReporte']) && $tipoReporte == 'presion') : ?>  
            <div class="card mb-10" >
            <div class="row g-0">
                <div class="col-md-10">
                    <div class="card-body">
                    <h5 class="card-title"><b>Resultados de tu Presión</b> </h5>
                    <table class="table">

                    <thead>
                        <tr>
                        <th scope="col">No Prueba</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Resultado</th>
                        <th scope="col">Sistólica</th>
                        <th scope="col">Diastólica</th>

                        <th scope="col">Recomendación</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($datos as $data) {
                    echo "<tr>
                                <th scope='row'>".$data['No_Prueba']."</th>
                                <td>".$data['fecha_prueba']."</td>
                                <td>".$data['Resultado']."</td>
                                <td>".$data['Lectura1']."</td>
                                <td>".$data['Lectura2']."</td>
                                <td>".$data['Recomendacion']."</td>
                            <tr>";
                        }
                        ?>
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>  
        

        <?php endif; ?>
        
      
   
    </form>
   
</div>
</div>
</body>
</html>