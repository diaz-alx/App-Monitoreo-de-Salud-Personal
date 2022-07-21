<?php require 'header.php'; ?>

  <div class="content content-is-open">
    <div class="card mb-3" >
          <div class="row g-0">
              <div class="col-md-10">
                <div class="card-body">
                  <img style="width: 28px;left: 0;display: inline-block;margin: 0.5rem;" src="img/glucosemeter.png" alt="bmi" >
                  <h1 class="card-tittle" style="color:black;display: inline-block;"><b>Mi Glucómetro</b></h1>
                </div>
              </div>
              <div class="col-md-2">
                <div class="card-body">
                  <p class="card-text text-right">Visitas de hoy <span class=" badge bg-warning text-dark"> <?php echo $contador; ?></span></p>
                </div>
              </div>
          </div>
          <div class="row g-0">
            <div class="col-md-6">
              <div class="card-body">
                <h2 class="card-tittle" ><b>Historial de: </b><b style="color:red;"> <?php echo ucwords($_SESSION['UserValues']['nombre']); ?></b></h2>
                <p class="card-text">Glucosa estado: <?php echo $_SESSION['UserValues']['glucosa']['estado']; ?> </p>
                <p class="card-text">Última lectura: <?php echo $_SESSION['UserValues']['glucosa']['lectura']; ?> mg/dL</p>
                <p class="card-text">Nivel: <?php echo $_SESSION['UserValues']['glucosa']['nivel']; ?></p>
                <p class="card-text">Tomada en: <?php echo $_SESSION['UserValues']['glucosa']['periodo']; ?></p>
              </div>
            </div>
            <div class="col-md-6">
              <img src="img/glucometer.png" alt="" class="card-img-top">
            </div>
          </div>
        </div>
        <hr>

    <form action="" method="post">
     

      <?php if(isset($_REQUEST['actualizar_glucosa']) || isset($_REQUEST['restablecer'])): ?>
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-6">
            <div class="card-body">
                  <p class="card-text">Esta calculadora de glucosa en sangre le ofrece una descripción de los valores de azúcar en sangre medidos en mg/dl, dependiendo del tipo de prueba: glucosa en ayunas, después de comer o post-prandial, para una persona normal en la diabetes temprana y la diabetes establecida.</p>
                  <h5 class="card-title">Ingresa lectura de glucosa en sangre</h5>
                  <label class="col-sm-2 form-label">Lectura</label>
                    <div class="input-group mb-3">
                      <input type="number" class="form-control"  aria-describedby="basic-addon3" placeholder="70" name="lectura" step="1" min="1" max="500" required>
                      <span class="input-group-text">mg/dL</span>
                    </div>
      
                  <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Periodo</legend>
                      <div class="col-sm-10">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="periodo" id="gridRadios1" value="ayuna" checked>
                          <label class="form-check-label" for="gridRadios1">
                            Ayuna
                          </label>
                        </div>

                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="periodo" id="gridRadios2" value="prosprandial">
                          <label class="form-check-label" for="gridRadios2">
                            Prosprandial
                          </label>
                        </div>
                      </div>
                  </fieldset>
            </div>
          </div>
        </div>
      </div>

      
      <button type="submit" class="btn btn-primary" name="calcular_glucosa">Calcular glucosa en sangre</button>
      
      <?php elseif(isset($_REQUEST['calcular_glucosa'])): ?>
      
        <?php if(!isset($errormsg)):?>
        
          <div class="card mb-3" style="max-width: auto;">
            <div class="row g-0">
              
              <div class="col-md-6">
                <div class="card-body">
                  <h5 class="card-title">Resultado</h5>
                  <p class="card-text">Ingresaste un lectura de: <input type="number" name="set_lectura" value="<?php echo $resultGlucosa['lectura']; ?>" readonly>mg/dL </p> 
                  <p>Tomada en: <input type="text" name="set_periodo" value="<?php echo $resultGlucosa['periodo']; ?>" readonly> </p> 
                  <p class="card-text">Sus niveles de glucosa estan <?php echo $resultGlucosa['nivel']; ?>, sugestivo <?php echo $resultGlucosa['estado']; ?>.</p>
                  <p class="card-text"><?php echo $resultGlucosa['advice']; ?>! <?php echo $resultGlucosa['nota']; ?>.</p>
                  
                </div>
              </div>
              <div class="col-md-6">
                <img src="img/monitor.png" class="img-fluid rounded-start" alt="...">
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <button type="submit" class="btn btn-success" name="submit">Guardar Resultados</button>
          </div>
        <?php else:?>
        <?php echo $errormsg;?>
        <?php endif; ?>

        <div class="row mb-3">
            <button type="submit" class="btn btn-secondary" name="restablecer">Volver a calcular</button>
        </div>
       <?php else: ?>
        <button type="submit" class="btn btn-primary" name="actualizar_glucosa">Actualizar glucosa en sangre</button>
      
      <?php endif; ?>
    </form>
   
</div>
</div>
</body>
</html>

