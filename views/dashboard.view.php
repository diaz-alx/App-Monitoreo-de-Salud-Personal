<?php require 'header.php'; ?>


    
    <div class="content content-is-open">
   
            <div class="card mb-3" style="max-width: auto;">
              <div class="row g-0">
                  <div class="col-md-10">
                    <div class="card-body">
                      <h1 class="card-title" style="color:black;">Bienvenid<?php //echo $_SESSION['UserValues']['sexo']['adj']; ?> <b><?php echo ucwords($_SESSION['UserValues']['nombre']); ?></b></h1> 
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="card-body">
                      <p class="card-text text-right">Visitas de hoy <span class=" badge bg-warning text-dark"> <?php echo $visit_counter['c_index']; ?></span></p>
                    </div>
                  </div>
              </div>


              <div class="row g-0">
              
                <div class="col-md-2 mx-auto text-center">
                  <img src="<?php echo $_SESSION['UserValues']['pic_profile'];?>" class="img-fluid rounded-start" style="width: 12rem;"alt="...">
                </div>
                
                
                <div class="col-md-8">
                  <div class="card-body">
                    <h2 class="card-tittle"><b>Datos Personales</b></h2>                    
                    <p class="card-text"><i class="fas fa-venus-mars"></i><b> Sexo:</b>  <?php echo $_SESSION['UserValues']['genero']; ?></p>
                    <p class="card-text"><i class="fas fa-calendar-alt"></i><b> Edad:</b>  <?php echo $_SESSION['UserValues']['edad']; ?></p>
                    <p class="card-text"><i class="fas fa-weight"></i><b> Peso:</b>  <?php echo $_SESSION['UserValues']['peso']; ?> Kg</p>
                    <p class="card-text"><i class="fas fa-ruler-vertical"></i><b> Altura:</b>  <?php echo $_SESSION['UserValues']['altula']; ?> mts</p>
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="row row-cols-2 row-cols-md-3 g-4">
            <div class="col">
            
              <div class="card h-100">
              <sup><span class="position-absolute top-0 start-100 translate-middle badge bg-warning text-dark">Visitas <?php echo $visit_counter['c_imc']; ?></span></sup>
                <img src="img/bmi.png" alt="imc profile" class="card-img-top" alt="...">
                
                <div class="card-body">
                  <h5 class="card-title text-center"><b>Tu IMC</b></h5>
                  <p class="card-text"><b>Nota: </b><?php ////echo $_SESSION['UserValues']['imc']['mensaje']; ?></p>
                  
                  <p  class="card-text"><b>Última lectura: </b><?php ////echo $_SESSION['UserValues']['imc']['valor']; ?></p>
                  <p class="card-text"><b>Rango: </b> <?php ////echo $_SESSION['UserValues']['imc']['estado']; ?></p>
                  <div class="d-flex justify-content-center">
                  <a class="btn btn-primary" href="imc.php">Calcular tu IMC</a>
                  </div>
                  
                </div>
              </div>
            </div>


            <div class="col">
              <div class="card h-100">
                <sup><span class="position-absolute top-0 start-100 translate-middle badge bg-warning text-dark">Visitas  <?php echo $visit_counter['c_glucosa']; ?></span></sup>
                <img src="img/diabetes-test.png"   class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title text-center"><b>Tu Glucosa en Sangre</b></h5>
                  <p class="card-text"><b>Nota: </b>Tu glucosa se encuentra <?php //echo $_SESSION['UserValues']['glucosa']['estado']; ?> </p>
                  <p class="card-text"><b>Última lectura: </b> <?php //echo $_SESSION['UserValues']['glucosa']['lectura']; ?> mg/dL</p>
                  <p class="card-text"><b>Nivel: </b> <?php //echo $_SESSION['UserValues']['glucosa']['nivel']; ?></p>
                  <p  class="card-text"><b>Tomada en: </b> <?php //echo $_SESSION['UserValues']['glucosa']['periodo']; ?></p>

                  <div class="d-flex justify-content-center">
                    <a class="btn btn-primary"href="glucometro.php">Calcular Glucosa en Sangre</a>
                  </div>
                  
                </div>
              </div>
            </div>


            <div class="col">
              <div class="card h-100">
                <sup><span class="position-absolute top-0 start-100 translate-middle badge bg-warning text-dark">Visitas  <?php echo $visit_counter['c_presion']; ?></span></sup>
                <img src="img/blood-pressure.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title text-center"><b>Tu Presión Arterial</b></h5>
                  <p class="card-text"><b>Nota: </b>Tu presión arterial se encuentra <?php //echo $_SESSION['UserValues']['presion']['estado']; ?></p>

                  <p class="card-text"><b>Última lectura:</b> Sistólica <?php //echo $_SESSION['UserValues']['presion']['sistolica']; ?> mmHg / Diastólica <?php //echo $_SESSION['UserValues']['presion']['diastolica']; ?> mmHg</p>
                  <p class="card-text"><b>Aviso: </b><?php //echo $_SESSION['UserValues']['presion']['alerta']; ?></p>

                  <div class="d-flex justify-content-center">
                    <a class="btn btn-primary"href="presion.php">Calcular tu Presión Arterial</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        
      

    </div>
    
  </div>
</body>


</html>