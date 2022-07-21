<?php require 'header.php'; ?>

    <div class="content content-is-open">
    
      <div class="card mb-3" >
        <div class="row g-0">
          <div class="col-md-10">
            <div class="card-body">
              <img style="width: 28px;left: 0;display: inline-block;margin: 0.5rem;" src="img/bmi.png" alt="bmi" >
              <h1 class="card-tittle" style="color:black;display: inline-block;"><b>Mi Calculadora de IMC</b></h1>
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
                <p>Peso: <?php echo $_SESSION['UserValues']['peso']; ?> Kg</p>
                <p>Altura: <?php echo $_SESSION['UserValues']['altula']; ?> mts</p>
                <p>Tu lectura anterior: <?php //echo $_SESSION['UserValues']['imc']['valor']; ?></p>
                <p>Tu estado de IMC es: <?php //echo $_SESSION['UserValues']['imc']['estado']; ?></p>
            </div>
          </div>
          <div class="col-md-6">
            <h2 class="card-tittle text-center" ><b>Estado</b></h2>
            <img src="<?php //echo $_SESSION['UserValues']['imc']['img']; ?>" alt="" class="card-img-top">
          </div>
        </div>
      </div>
      <hr>
      
        
    
        <form action="" method="POST">
          <?php if(isset($_REQUEST['actualizar_imc']) || isset($_REQUEST['restablecer'])): ?>
            <div class="card mb-3" >
              <div class="row g-0">
                <div class="col-md-6">
                  <div class="card-body">
                    <p class="card-tittle"><b>El Índice de Masa Corporal (IMC)</b> mide el estado del peso de su cuerpo en relación a la grasa. 
                      Es una sencilla herramienta que le ayuda 
                      a saber cuál es el exceso de grasa sobrante y los riesgos asociados a tener sobre preso. 
                      Puede aplicarse tanto a hombres como a mujeres.</p>
                    <h2><b>Ingresa tu Peso y Altura para calcular tu IMC</b></h2>

                      <label class="col-sm-4 form-label">Peso en KG</label>
                      <div class="input-group mb-3">
                        <input type="number" class="form-control"  aria-describedby="basic-addon3" id="peso_imc" name="peso_imc" placeholder="60.0" step="0.01" min="10" max="500" required>
                        <span class="input-group-text">Kg</span>
                      </div>

                      <label class="col-sm-4 form-label">Altura en mts</label>
                      <div class="input-group mb-3">
                        <input type="number" class="form-control"  aria-describedby="basic-addon3" name="altura_imc" placeholder="1.0" step="0.01" min="1" max="3" required>
                        <span class="input-group-text">mts</span>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            
            <button type="submit" class="btn btn-primary" name="calcular_imc">Calcular tu IMC</button>
            <button type="reset" class="btn btn-secondary">Restablecer valores</button>
            
            

          <?php elseif(isset($_REQUEST['calcular_imc'])): ?>
            <?php if(!isset($errormsg)):?>
            <div class="card mb-3" style="max-width: auto;">
            <div class="row g-0">
              <div class="col-md-6">
                <div class="card-body">
                  <h5 class="card-title"><b>Resultados de tu IMC</b></h5>
                  <p class="card-text">Ingresaste un Peso de: <input type="number" name="peso" value="<?php echo $tmpPeso; ?>" readonly> Kg</p> 
                  <p class="card-text">Ingresaste una Altura de: <input type="number" name="altura" value="<?php echo $tmpAltura; ?>" readonly> mts</p> 
                  <p>Tu IMC es de: <input type="number" name="resultado" step="0.01" value="<?php echo $resultImc['imc_valor']; ?>" readonly> </p> 
                  <p class="card-text">Nota: <?php echo $resultImc['nota']; ?></p>
                  
                </div>
              </div>
              <div class="col-md-6">
                <img  class="card-img-right" style="width:400px;" src="<?php echo $resultImc['img_estado']; ?>" alt="">
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
          
            <button type="submit" class="btn btn-primary" name="actualizar_imc">Actualizar tu IMC</button>
            
          <?php endif; ?>

          
          </form>
         
				</div>
      </div>
    </div>
</body>

</html>

