<?php
	
	class Conectar {
		
		public static function conexion(){
			
			$conexion = new mysqli("localhost", "root", "", "health_app");
			return $conexion;
			
		}
	}
?>