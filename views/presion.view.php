<?php require 'header.php'; ?>

  <div class="content content-is-open">
      <div class="card mb-3" >
        <div class="row g-0">
          <div class="col-md-10">
            <div class="card-body">
              <img style="width: 28px;left: 0;display: inline-block;margin: 0.5rem;" src="img/blood-pressure.png" alt="bmi" >
              <h1 class="card-tittle" style="color:black;display: inline-block;"><b>Mi Presión Arterial</b></h1>
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
              <p class="card-text">Ultima lectura: Sistólica <?php echo $_SESSION['resultado']['p_lec1']; ?> mmHg / Diastólica <?php echo $_SESSION['resultado']['p_lec2']; ?> mmHg</p>
              <p class="card-text">Presión arterial: <?php echo $_SESSION['resultado']['p_estado']; ?></p>
              <p class="card-text">Aviso: <?php echo $_SESSION['resultado']['p_nota']; ?></p>
            </div>
          </div>
          <div class="col-md-6">
              <img src="img/blood-pressure.png" alt="" class="card-img-top">
          </div>
        </div>
      </div>
      
      <hr> 

    <form action="" method="post">
      <?php if(isset($_REQUEST['actualizar_presion']) || isset($_REQUEST['restablecer'])): ?>
        <div class="card mb-3" >
              <div class="row g-0">
                <div class="col-md-6">
                  <div class="card-body">
                    <p class="card-text">Si se ha tomado la presión arterial recientemente y sabe sus valores máximos(Sistólica) y mínimos(Diastólica), le sugerimos que los introduzca en la casilla que verá a continuación 
                      para que sepa, rápidamente, si su tensión es normal o no. La calculadora compara sus valores de presión arterial con los del rango normal y detecta 
                      si hay alguna anomalía. El resultado final le ayudará a entender por qué es importante chequear su tensión arterial.</p>
                    <h2 class="card-title"><b>Ingresa lecturas de tu presión arterial</b></h2>
                      <div class="form-row">
                        <div class="col-10 col-sm-8 form-group">
                          <label class="col-sm-4 col-form-label">Lectura 1</label>
                            <div class="input-group-text col-sm-10">
                              <span class="input-group-text" >Sistólica</span>
                              <input type="number" class="form-control" aria-describedby="basic-addon3" name="lectura1" step="1" min="40" max="500" required>
                              <span class="input-group-text" >mmHg</span>
                            </div>

                          <label class="col-sm-4 col-form-label">Lectura 2</label>
                            <div class="input-group-text col-sm-10">
                              <span class="input-group-text" >Diastólica</span>
                              <input type="number" class="form-control" aria-describedby="basic-addon3" name="lectura2" step="1" min="40" max="500" required>
                              <span class="input-group-text" >mmHg</span>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
              

                <div class="col-md-6">
                  <img src="img/bloodpresurechart.png" class="img-fluid rounded-start" style="width:250px;" alt="...">
                </div>

              </div>
        </div>
            <br>

        <button type="submit" class="btn btn-primary" name="calcular_presion">Calcular Presión Arterial</button>
      
      <?php elseif(isset($_REQUEST['calcular_presion'])): ?>
      
        <?php if(!isset($errormsg)):?>

          <div class="card mb-3" style="max-width: auto;">
            <div class="row g-0">
              
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><b>Resultados</b> </h5>
                  <p class="card-text">Ingresaste un lectura1 sistólica: <input type="number" name="set_lectura1" value="<?php echo $resultPresion['p_lec1']; ?>" readonly>mmHg </p> 
                  <p class="card-text">Ingresaste un lectura2 diastólica: <input type="number" name="set_lectura2" value="<?php echo $resultPresion['p_lec2']; ?>" readonly>mmHg </p>
                  <p class="card-text">Sus presión arterial es <?php echo $resultPresion['p_estado']; ?>.</p>
                  <p class="card-text">Alerta: <?php echo $resultPresion['p_advertencia']; ?>!. <?php echo $resultPresion['p_nota']; ?></p>
                  
                </div>
              </div>
              <div class="col-md-4">
                <img src="img/bloodpresurechart.png" class="img-fluid rounded-start" alt="...">
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
      <?php else:?>
        <button type="submit" class="btn btn-primary" name="actualizar_presion">Actualizar Presión Arterial</button>
      
      <?php endif; ?>
    </form>
    
</div>
</body>
</html>

