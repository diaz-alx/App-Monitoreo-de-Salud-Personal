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
                    'imc_valor'=> $imc_valor,
                    'estado' => $data[$id]['estado'],
                    'img_estado' => $data[$id]['img_estado'],
                    'nota'=> $data[$id]['nota'],
                    'advertencia' => $data[$id]['advertencia']);
                return $tmpValues;
            }
        // $this->imc['imc_valor'] = $imc_valor;
        // $this->imc['estado'] = $data[$id]['estado'];
        // $this->imc['img_estado'] = $data[$id]['img_estado'];
        // $this->imc['nota'] = $data[$id]['nota'];
        // $this->imc['advertencia'] = $data[$id]['advertencia'];
    }

    public function GuardarImc(float $lec1, string $estado, string $img_estado, string $nota, string $advertencia, int $id_user)
    {
        $valor = floatval($lec1);
        $sql = "call GuardarIMC($valor, '$estado', '$img_estado',' $nota', '$advertencia', $id_user)";
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
                $id = $tipo['id'];
            }
        }
        if ($bool == FALSE)
            {
                $tmpValues = array(
                    'nivel'=> $data[$id]['nivel'],
                    'estado' => $data[$id]['estado'],
                    'periodo'=> $periodo,
                    'lectura' => $lectura,  
                    'nota'=> $data[$id]['nota'], 
                    'advertencia'=> $data[$id]['advertencia']);
                return $tmpValues;
            }

    }

    public function GuardarGlucosa(string $tipo, float $lec1, string $estado, string $nivel, string $nota, string $advertencia, int $id_user)
    {
        $valor = floatval($lec1);
        $sql = "call GuardarIMC($valor, '$estado', '$img_estado',' $nota', '$advertencia', $id_user)";
        $resultado = $this->db->query($sql);
    }
    

    public function CalcularPresion(float $lectura1, float $lectura2, bool $bool)
    {
        $sql = "SELECT * FROM presion_arterial";
        $data = $this->db->query($sql);
			while($row = $data->fetch_assoc())
			{
				$data = $row;
			}
        $lectura1 = round($lectura1);
        $lectura2= round($lectura2);

        $id = $this->CalcularPresionArterial($lectura1,$lectura2);
        if (null !== $id){
            if ($bool == FALSE)
            {
                $tmpValues = array(
                    'estado'=> $data[$id]['estado'], 
                    'lectura1'=>$lectura1,
                    'lectura2' => $lectura2,  
                    'mensaje'=>$data[$id]['mensaje'], 
                    'advertencia'=>$data[$id]['advertencia']);
                return $tmpValues;
            }
            else
            {
                $this->presion['estado'] = $data[$id]['estado'];
                $this->presion['alta'] = $lectura1;
                $this->presion['baja'] = $lectura2;
                $this->presion['mensaje'] = $data[$id]['mensaje'];
                $this->presion['alerta'] = $data[$id]['alerta'];
            } 
        }
    }

    

    protected function CalcularPresionArterial(int $lect1, int $lect2){
        $sql = "SELECT * FROM presion_arterial";
        $data = $this->db->query($sql);
			while($row = $data->fetch_assoc())
			{
				$data = $row;
			}
        foreach ($data as $tipo){
            if( $lect1 >= $tipo['lec_a_min'] && $lect1 <= $tipo['lec_a_max'] && $lect2 >= $tipo['lec_b_min'] && $lect2 <= $tipo['lect_b_max'])
            {
                return  $tipo['id'];
            }
        }
        return;
    }



    public function get_paciente($id)
		{
			$sql1 = "SELECT * FROM usuarios WHERE id_user='$id' LIMIT 1";
            $sql2 = "call BuscarRecIMC($id)";
            $resultado1 = $this->db->query($sql1);
            $paciente = $resultado1->fetch_assoc();
			$resultado2 = $this->db->query($sql2);
			$pruebas = $resultado2->fetch_assoc();

            $datos[] = $paciente;
            if($pruebas != null){
                array_push($datos,$pruebas);
            }

			return $datos;
		}

}