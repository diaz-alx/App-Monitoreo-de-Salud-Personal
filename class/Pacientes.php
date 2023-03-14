<?php

class Pacientes  {

    protected $db;
    protected $pacientes;
    protected $paciente;
    protected $imc;
    protected $presion;
    protected $glucosa;

    public function __construct()
    {
        $this->db = Conectar::Conexion();
        $this->pacientes = array();
        $this->paciente = array();
        $this->imc = array();
        $this->presion = array();
        $this->glucosa = array();
    }

    public function get_pacientes()
	{
		$sql = "SELECT * FROM usuarios";
		$resultado = $this->db->query($sql);
		while($row = $resultado->fetch_assoc())
		{
			$this->pacientes[] = $row;
		}
		return $this->pacientes;
	}

    public function ValidarPaciente($user, $password)
    {
        $consulta = $this->get_pacientes();
       
        foreach ($consulta as $usuario) {
            if ($user == $usuario['user'] && $password == $usuario['pass']) {
                return $usuario['id_user'];
            }
        }
        return;
    }

    public function ValidarPacienteExist($user)
		{
			$sql1 = "SELECT * FROM usuarios WHERE user='$user' LIMIT 1";
        
            $resultado1 = $this->db->query($sql1);
            $paciente = $resultado1->fetch_assoc();
			return $paciente;
		}
    
    public function RegistrarNuevoPaciente(string $user,string $pass, string $nombre,string $genero,string $fecha,float $peso,float $altura)
	{
		$sql = "CALL InsertarNuevoUsuario('$user','$pass','$nombre','$genero','$fecha',$peso,$altura)";
        $resultado = $this->db->query($sql);
	}


    public function getImc($id)
    {
        $sql = "call BuscarRecIMC($id)";
        $resultado = $this->db->query($sql);
        $resultado = $resultado->fetch_assoc();
        return $this->imc = $resultado;
    }

    public function getGlucosa()
    {
        return $this->glucosa;
    }
    
    public function getPresionArterial()
    {
        return $this->presion;
    }



    public function CalcularImc(float $peso, float $altura, bool $bool)
    {
        $sql = "SELECT * FROM imc";
        $resultado = $this->db->query($sql);
		while($row = $resultado->fetch_assoc())
		{
			$data[] = $row;
		}
        $imc_valor = ($peso/pow($altura, 2));
        $imc_valor = round($imc_valor,1);
       
        foreach ($data as $tipo) 
        {
            if($imc_valor >= $tipo['min_val'] && $imc_valor <= $tipo['max_val'])
            {
                $id = $tipo['id'] - 1;
            }
        }
        
        if ($bool == FALSE)
            {
                $tmpValues = array(
                    //colocar el prefijo en la clave
                    'i_lec1'=> $imc_valor,
                    'i_estado' => $data[$id]['estado'],
                    'i_img_estado' => $data[$id]['img_estado'],
                    'i_nota'=> $data[$id]['nota'],
                    'i_advertencia' => $data[$id]['advertencia']);
                return $tmpValues;
            }

    }

    public function GuardarImc(float $lec1, string $estado, string $img_estado, string $nota, string $advertencia, int $id_user, $peso)
    {
        $valor = floatval($lec1);
        $sql = "call GuardarIMC($valor, '$estado', '$img_estado',' $nota', '$advertencia', $id_user, $peso)";
        $resultado = $this->db->query($sql);
    }

   

    public function CalcularGlucosa(float $lectura, string $periodo, bool $bool)
    {
        $sql = "SELECT * FROM glucosa";
        $resultado = $this->db->query($sql);
			while($row = $resultado->fetch_assoc())
			{
				$data[] = $row;
			}
        $lectura = round($lectura);
        foreach ($data as $tipo) 
        {
            if($periodo == $tipo['tipo'] && $lectura >= $tipo['min_val'] && $lectura <= $tipo['max_val'])
            {
                $id = $tipo['id'] - 1;
            }
        }
        if ($bool == FALSE)
            {
                $tmpValues = array(
                    //colocar el prefijo en la clave
                    'g_nivel'=> $data[$id]['nivel'],
                    'g_estado' => $data[$id]['estado'],
                    'g_tipo'=> $periodo,
                    'g_lec1' => $lectura,  
                    'g_nota'=> $data[$id]['nota'], 
                    'g_advertencia'=> $data[$id]['advertencia']);
                return $tmpValues;
            }

    }

    public function GuardarGlucosa(string $tipo, float $lec1, string $estado, string $nivel, string $nota, string $advertencia, int $id_user)
    {
        $valor = floatval($lec1);
        $sql = "call GuardarGlucosa('$tipo', $lec1, '$estado','$nivel',' $nota', '$advertencia', $id_user)";
        $resultado = $this->db->query($sql);
    }
    

    public function CalcularPresion(float $lectura1, float $lectura2)
    {
        $sql = "SELECT * FROM presion_arterial";
        $resultado = $this->db->query($sql);
        $id = '';
			while($row = $resultado->fetch_assoc())
			{
				$data[] = $row;
			}

        $lectura1 = round($lectura1);
        $lectura2= round($lectura2);


        $id = $this->CalcularPresionArterial($lectura1, $lectura2);
        if (!$id)
            {
                return null;
            }
            else
            {
                $tmpValues = array(
                    //colocar el prefijo en la clave
                    'p_estado'=>  $data[$id]['estado'], 
                    'p_lec1'=> $lectura1,
                    'p_lec2' => $lectura2,
                    'p_nota'=> $data[$id]['nota'], 
                    'p_advertencia'=> $data[$id]['advertencia']);
                return $tmpValues;
            }
            
    }
    

    public function GuardarPresion(string $estado, float $lec1, float $lec2, string $nota, string $advertencia, int $id_user)
    {
        $valor1 = floatval($lec1);
        $valor2 = floatval($lec2);
        $sql = "call GuardarPresion('$estado', $valor1, $valor2,' $nota', '$advertencia', $id_user)";
        $resultado = $this->db->query($sql);
    }

    

    protected function CalcularPresionArterial(float $lect1, float $lect2){
        $sql = "SELECT * FROM presion_arterial";
        $resultado = $this->db->query($sql);
        $id = '';
			while($row = $resultado->fetch_assoc())
			{
				$data[] = $row;
			}
        foreach ($data as $tipo){
            if( $lect1 >= $tipo['lec_a_min'] && $lect1 <= $tipo['lec_a_max'] && $lect2 >= $tipo['lec_b_min'] && $lect2 <= $tipo['lec_b_max'])
            {
                return $tipo['id'] - 1;
            }
            
        }  
        return;
    }



    public function get_paciente($id)
	{
		$sql1 = "SELECT * FROM usuarios WHERE id_user='$id' LIMIT 1";
    
        $resultado1 = $this->db->query($sql1);
        $paciente = $resultado1->fetch_assoc();
		return $paciente;
	}

   
    public function BuscarResultados($id)
	{
        $sql = "call BuscarResultados($id)";
        $resultado1 = $this->db->query($sql);
        $paciente = $resultado1->fetch_assoc();
        
		return $paciente;
	}

    public function ReporteImc($id)
	{
        $sql = "SELECT date_format(r.fecha, '%d/%m/%Y') as fecha_prueba,r.id as No_Prueba, r.estado as Resultado, r.lec1 as Lectura, r.nota as Recomendacion FROM pruebas_imc r WHERE r.fecha BETWEEN CURRENT_DATE - 7 and CURRENT_DATE + 1 and r.id_user = $id";
        $resultado = $this->db->query($sql);
        while($row = $resultado->fetch_assoc())
			{
				$data[] = $row;
			}
        
		return $data;
	}

    public function ReporteGlucosa($id)
	{
        $sql = "SELECT date_format(r.fecha, '%d/%m/%Y') as fecha_prueba,r.id as No_Prueba, r.estado as Resultado, r.tipo as periodo, r.nivel as nivel, r.lec1 as Lectura, r.nota as Recomendacion FROM pruebas_glucosa r WHERE r.fecha BETWEEN CURRENT_DATE - 7 and CURRENT_DATE + 1 and r.id_user = $id";
        $resultado = $this->db->query($sql);
        while($row = $resultado->fetch_assoc())
			{
				$data[] = $row;
			}
        
		return $data;
	}

    public function ReportePresion($id)
	{
        $sql = "SELECT date_format(r.fecha, '%d/%m/%Y') as fecha_prueba,r.id as No_Prueba, r.estado as Resultado, r.lec1 as Lectura1,r.lec2 as Lectura2, r.nota as Recomendacion FROM pruebas_presion r WHERE r.fecha BETWEEN CURRENT_DATE - 7 and CURRENT_DATE + 1 and r.id_user = $id";
        $resultado = $this->db->query($sql);
        while($row = $resultado->fetch_assoc())
			{
				$data[] = $row;
			}
        
		return $data;
	}

}