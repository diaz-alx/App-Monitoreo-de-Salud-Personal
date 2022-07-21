DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GuardarIMC`(
	IN `p_lec1` FLOAT, 
	IN `p_estado` VARCHAR(50), 
	IN `p_img_estado` VARCHAR(50), 
	IN `p_nota` TEXT, 
	IN `p_advertencia` TEXT, 
	IN `p_idUser` INT)
BEGIN
	INSERT INTO pruebas_imc(lec1, estado, img_estado, nota, advertencia, id_user) 
	VALUES (p_lec1, p_estado, p_img_estado, p_nota, p_advertencia, p_idUser);
END$$
DELIMITER ;


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GuardarGlucosa`(
	IN `p_tipo` VARCHAR(50), 
	IN `p_lec1` FLOAT,
	IN `p_estado` VARCHAR(50),
	IN `p_nivel` VARCHAR(50), 
	IN `p_nota` TEXT, 
	IN `p_advertencia` TEXT, 
	IN `p_idUser` INT)
BEGIN
	INSERT INTO pruebas_imc(tipo, lec1, estado, nivel, nota, advertencia, id_user) 
	VALUES (p_tipo, p_lec1, p_estado, p_nivel, p_nota, p_advertencia, p_idUser);
END$$
DELIMITER ;


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GuardarGlucosa`(
	IN `p_lec1` FLOAT, 
	IN `p_estado` VARCHAR(50), 
	IN `p_img_estado` VARCHAR(50), 
	IN `p_nota` TEXT, 
	IN `p_advertencia` TEXT, 
	IN `p_idUser` INT)
BEGIN
	INSERT INTO pruebas_imc(lec1, estado, img_estado, nota, advertencia, id_user) 
	VALUES (p_lec1, p_estado, p_img_estado, p_nota, p_advertencia, p_idUser);
END$$
DELIMITER ;