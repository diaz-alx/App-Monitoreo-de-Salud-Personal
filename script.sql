
CREATE DATABASE health_app;
use health_app;


--
-- Table structure for table imc
--
create table imc(
    id int(10) not null,
    estado varchar(100) not null,
    img_estado varchar(100) not null,
    img_m varchar(100) not null,
    img_f varchar(100) not null,
    min_val float(10,2) not null,
    max_val float(10,2) not null,
    nota text not null,
    advertencia text not null);

INSERT INTO IMC VALUES(1, 'bajo de peso', 'img/imc_under.png', 'img/male/imc/m_under.png', 'img/female/imc/f_underwight.png', '1', '18.5', 'se encuentra dentro del rango de peso insuficiente.','');
INSERT INTO IMC VALUES(2, 'peso normal', 'img/imc_normal.png', 'img/male/imc/m_normal.png', 'img/female/imc/f_normal.png', '18.5', '24.9', 'se encuentra dentro del rango de peso normal o saludable.','');
INSERT INTO IMC VALUES(3, 'sobrepeso', 'img/imc_over.png', 'img/male/imc/m_over.png', 'img/female/imc/f_overw.png', '25', '29.9', 'se encuentra dentro del rango de sobrepeso.','');
INSERT INTO IMC VALUES(4, 'obesidad', 'img/imc_obesity.png', 'img/male/imc/m_obesity.png', '', '30', '39.9', 'se encuentra dentro del rango de obesidad.','');
INSERT INTO IMC VALUES(5, 'obesidad extrema', 'img/imc_obesity.png', 'img/male/imc/m_extreme.png', 'img/female/imc/f_extreme.png', '40', '1000', 'se encuentra dentro del rango de obesidade extrema.','');

--
-- Table structure for table glucosa
--
create table glucosa(
    id int(10) not null,
    tipo varchar(100) not null,
    estado varchar(100) not null,
    nivel varchar(100) not null,
    min_val float(10,2) not null,
    max_val float(10,2) not null,
    nota text not null,
    advertencia text not null
);
--
-- insercciones para glocusa
--
INSERT INTO GLUCOSA VALUES(1, 'ayuna', 'hipoglucemia', 'bajo', '0', '70', 'Un nivel bajo de glucosa en sangre bajo impide el funcionamiento normal del cerebro pudiendo provocar síncopes, que pueden llegar a ser fatales. Por favor, repita la prueba y si sus niveles siguen siendo bajos consulte a su médico de inmediato.', 'Advertencia');
INSERT INTO GLUCOSA VALUES(2, 'ayuna', 'sin diabetes', 'normal', '70', '100', 'Sus niveles de glucosa en sangre están dentro de los límites normales y ahora no tiene usted diabetes. Repita esta prueba para comprobar sus niveles de glucosa en sangre cada 3 años.', 'Felicidades');
INSERT INTO GLUCOSA VALUES(3, 'prosprandial', 'sin diabetes', 'normal', '0', '139', 'Sus niveles de glucosa en sangre están dentro de los límites normales y ahora no tiene usted diabetes. Repita esta prueba para comprobar sus niveles de glucosa en sangre cada 3 años.', 'Felicidades');
INSERT INTO GLUCOSA VALUES(4, 'ayuna', 'pre diabetes', 'moderado', '101', '125', 'Sus niveles de glucosa están por encima de lo normal.', 'La pre-diabetes duplica el riesgo de sufrir diabetes tipo 2, cardiopatías y accidentes cerebrovasculares.');
INSERT INTO GLUCOSA VALUES(5, 'prosprandial', 'pre diabetes', 'moderado', '140', '199', 'Sus niveles de glucosa están por encima de lo normal.', 'La pre-diabetes duplica el riesgo de sufrir diabetes tipo 2, cardiopatías y accidentes cerebrovasculares.');
INSERT INTO GLUCOSA VALUES(6, 'ayuna', 'diabetes', 'alto', '126', '1000', 'Tiene usted niveles más altos de lo normal de glucosa en sangre en ayunas, lo que significa que tiene usted más posibilidades de ser diabético.', 'Advertencia, consulte a su médico!');
INSERT INTO GLUCOSA VALUES(7, 'prosprandial', 'diabetes', 'alto', '200', '1000', 'Tiene usted niveles más altos de lo normal de glucosa en sangre en ayunas, lo que significa que tiene usted más posibilidades de ser diabético.', 'Advertencia, consulte a su médico!');


--
-- Table structure for table presion_arterial
--

create table presion_arterial(
    id int(10) not null,
    estado varchar(100) not null,
    lec_a_min float(10,2) not null,
    lec_a_max float(10,2) not null,
    lec_b_min float(10,2) not null,
    lec_b_max float(10,2) not null,
    nota text not null,
    advertencia text not null
);
--
-- insercciones para presion arterial
--
INSERT INTO PRESION_ARTERIAL VALUES(1, 'baja', '40', '90', '40', '60', 'algo más bajos de lo que sería deseable.', 'Una presión de pulso baja, en ocasiones, es indicativo de una función cardíaca sub-optima y un volumen bajo de accidentes cerebrovasculares, lo que puede dar lugar a insuficiencia cardíaca.');
INSERT INTO PRESION_ARTERIAL VALUES(2, 'normal', '90', '120', '60', '80', 'Repita la medición un par de veces para obtener valores consistentemente similares.', 'Si sus lecturas son correctas, nuestra interpretación es que padece usted Presión Arterial Normal.');
INSERT INTO PRESION_ARTERIAL VALUES(3, 'elevada', '120', '130', '80', '80', 'Sus vlores de Presión Arterial son algo más altos que el rango considerado óptimo.', 'Si los valores son consistentemente similares podría usted presentar un cuadro de prehipertensión.Repita la medición un par de veces para obtener valores consistentemente similares.');
INSERT INTO PRESION_ARTERIAL VALUES(4, 'presión arterial alta', '130', '140', '80', '90', 'Sus lecturas de Presión Arterial son bastante altas y debe usted controlar su tensión com medicación. Hipertensión nivel 1.', 'Si tras repetidas lecturas el valor es similar al indicado con anterioridad le recomendamos que confirme el diagnóstico con su médico.');
INSERT INTO PRESION_ARTERIAL VALUES(5, 'presión arterial alta', '140', '180', '90', '120', 'Sus lecturas de Presión Arterial son bastante altas. hipertensión nivel 2', 'Si tras repetidas lecturas el valor es similar al indicado con anterioridad le recomendamos que confirme el diagnóstico con su médico.');
INSERT INTO PRESION_ARTERIAL VALUES(6, 'crisis de hipertensión', '140', '1000', '90', '1000', 'Consulte a su médico de inmediato. Crisis de hipertensión.', 'Si tras repetidas lecturas el valor es similar al indicado con anterioridad le recomendamos que confirme el diagnóstico con su médico.');

--
-- insercciones para presion arterial
--
create table pruebas_imc(
    id int(10) not null,
    lec1 float(10,2) not null DEFAULT 0,
    estado varchar(100) not null,
    img_estado varchar(100) not null default 'img/default.png',
    nota text not null,
    advertencia text not null,
    fecha TIMESTAMP not null,
    id_user int(10) not null
);

create table pruebas_glucosa(
    id int(10) not null,
    tipo varchar(100) not null,
    lec1 float(10,2) not null DEFAULT 0,
    estado varchar(100) not null,
    nivel varchar(100) not null,
    nota text not null,
    advertencia text not null,
    fecha TIMESTAMP not null,
    id_user int(10) not null
);

create table pruebas_presion(
    id int(10) not null,
    estado varchar(100) not null,
    lec1 float(10,2) not null DEFAULT 0,
    lec2 float(10,2) not null DEFAULT 0,
    nota text not null,
    advertencia text not null,
    fecha TIMESTAMP not null,
    id_user int(10) not null
);

--
-- Table structure for table usuarios
--
create table usuarios (
    id_user int(10) not null,
    user varchar(50) not null,
    pass varchar(255) not null,
    nombre varchar(255) not null,
    pic_profile varchar(100) not null,
    genero enum('masculino','femenino') NOT NULL,
    adj enum('o','a') NOT NULL,
    fecha_nac date not null,
    edad int(10) not null,
    peso float(10,2) not null,
    altura float(10,2) not null
);




--
-- Indexes for table pruebas
--
ALTER TABLE pruebas_imc
  ADD PRIMARY KEY (id),
  ADD KEY id_user_pruebas (id_user);

ALTER TABLE pruebas_glucosa
  ADD PRIMARY KEY (id),
  ADD KEY id_user_pruebas (id_user);

ALTER TABLE pruebas_presion
  ADD PRIMARY KEY (id),
  ADD KEY id_user_pruebas (id_user);

--
-- Indexes for table usuarios
--
ALTER TABLE usuarios
  ADD PRIMARY KEY (id_user),
  ADD UNIQUE KEY username (user);


--
-- AUTO_INCREMENT for table pruebas
--
ALTER TABLE pruebas_imc
  MODIFY id int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE pruebas_glucosa
  MODIFY id int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE pruebas_presion
  MODIFY id int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table usuarios
--
ALTER TABLE usuarios
  MODIFY id_user int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table pruebas
--
ALTER TABLE pruebas_imc
  ADD CONSTRAINT id_user_pruebasimc FOREIGN KEY (id_user) REFERENCES usuarios (id_user);

ALTER TABLE pruebas_glucosa
  ADD CONSTRAINT id_user_pruebasglucosa FOREIGN KEY (id_user) REFERENCES usuarios (id_user);

ALTER TABLE pruebas_presion
  ADD CONSTRAINT id_user_pruebaspresion FOREIGN KEY (id_user) REFERENCES usuarios (id_user);


--
-- Procedures guardar resltados en imc
--

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GuardarIMC`(
  IN `p_lec1` FLOAT, 
  IN `p_estado` VARCHAR(50), 
  IN `p_img_estado` VARCHAR(50), 
  IN `p_nota` TEXT, 
  IN `p_advertencia` TEXT, 
  IN `p_idUser` INT, 
  IN `p_peso` INT)
BEGIN
	INSERT INTO pruebas_imc(lec1, estado, img_estado, nota, advertencia, id_user) 
	VALUES (p_lec1, p_estado, p_img_estado, p_nota, p_advertencia, p_idUser);

  UPDATE usuarios SET peso = p_peso WHERE id_user = p_idUser;
END$$
DELIMITER ;

--
-- Procedures guardar resltados en glucosa
--
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GuardarGlucosa`(
	IN `p_tipo` VARCHAR(100), 
	IN `p_lec1` FLOAT(10,2),
	IN `p_estado` VARCHAR(100),
	IN `p_nivel` VARCHAR(100), 
	IN `p_nota` TEXT, 
	IN `p_advertencia` TEXT, 
	IN `p_idUser` INT)
BEGIN
	INSERT INTO pruebas_glucosa(tipo, lec1, estado, nivel, nota, advertencia, id_user) 
	VALUES (p_tipo, p_lec1, p_estado, p_nivel, p_nota, p_advertencia, p_idUser);
END$$
DELIMITER ;

--
-- Procedures guardar resltados en glucosa
--

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GuardarPresion`( 
  IN `p_estado` VARCHAR(100),
	IN `p_lec1` FLOAT(10,2),
  IN `p_lec2` FLOAT(10,2),
	IN `p_nota` TEXT, 
	IN `p_advertencia` TEXT, 
	IN `p_idUser` INT)
BEGIN
	INSERT INTO pruebas_presion(estado, lec1, lec2, nota, advertencia, id_user) 
	VALUES (p_estado, p_lec1, p_lec2, p_nota, p_advertencia, p_idUser);
END$$
DELIMITER ;


--
-- Procedures buscar resultados de las pruebas
--


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarResultados`(IN `p_idUser` INT)
BEGIN
    SELECT g.advertencia as 'g_advertencia', g.estado as 'g_estado', g.lec1 as 'g_lec1', g.nota as 'g_nota', g.tipo as 'g_tipo', g.nivel as 'g_nivel', 
      i.advertencia as 'i_advertencia', i.estado as 'i_estado',i.img_estado as 'i_img_estado', i.lec1 as 'i_lec1', i.nota as 'i_nota', 
      p.advertencia as 'p_advertencia', p.estado as 'p_estado', p.lec1 as 'p_lec1', p.lec2 as 'p_lec2', p.nota as 'p_nota' 
      FROM pruebas_glucosa g, pruebas_imc i, pruebas_presion p 
      WHERE g.id_user= p_idUser AND i.id_user = p_idUser and p.id_user = p_idUser 
      ORDER BY g.fecha, i.fecha , p.fecha DESC LIMIT 1;
END$$
DELIMITER ;

--
-- Procedures InsertarNuevo Usuario
--

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarNuevoUsuario`(IN `p_user` VARCHAR(50), 
IN `p_pass` VARCHAR(200), 
IN `p_nombre` VARCHAR(50), 
IN `p_genero` VARCHAR(20), 
IN `p_fecha_nac` varchar(20), 
IN `p_peso` FLOAT(10,2), 
IN `p_altura` FLOAT(10,2))
BEGIN
    DECLARE edad int;
    DECLARE adj char;
    DECLARE picture varchar(50);
    
	SELECT DATE_FORMAT(FROM_DAYS(DATEDIFF(now(),p_fecha_nac)), '%Y')+0 INTO edad;
   

    IF p_genero = 'femenino' THEN
    SET adj = 'a';
    SET picture = 'img/profilefemale.png';
    ELSE 
    SET adj = 'o';
    SET picture = 'img/profilemale.png';
    END IF;

    INSERT INTO usuarios (user,pass,nombre,pic_profile,genero,adj,fecha_nac,edad,peso,altura)
    VALUES(
      p_user,p_pass,p_nombre,picture,p_genero,adj,p_fecha_nac,edad,p_peso,p_altura
    );

END$$
DELIMITER ;


DELIMITER $$
CREATE TRIGGER `updatePruebas` AFTER INSERT ON `usuarios`
 FOR EACH ROW BEGIN
           INSERT INTO pruebas_imc  (lec1,estado,img_estado,nota,advertencia,id_user)
           VALUES
           (calcularIMC(NEW.peso, new.altura), 'sin datos', 'img/bmi.png', 'sin datos', 'sin datos', NEW.id_user);

			INSERT INTO pruebas_glucosa (tipo,lec1,estado,nivel,nota,advertencia,id_user)
            VALUES
            ('sin datos',0,'sin datos','sin datos','sin datos', 'sin datos', NEW.id_user);

			INSERT INTO pruebas_presion (estado,lec1,lec2,nota,advertencia,id_user)
            VALUES
            ('sin datos',0,0,'sin datos','sin datos', NEW.id_user);

END$$
DELIMITER ;

CREATE FUNCTION `calcularIMC` (weight FLOAT, height FLOAT)
RETURNS FLOAT
BEGIN
  DECLARE imc FLOAT;
  SET imc = weight / (height * height);
  RETURN imc;
END;





