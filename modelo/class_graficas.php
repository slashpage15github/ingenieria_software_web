<?php
include('class_db.php');
class graficas extends class_db{
	
	function __construct()
	{
		parent::__construct();
	}

	function __destruct()
	{
        parent::__destruct();

	}

    function get_all_problematicas_departamento(){
        $elsql="select d.nombre_depa,count(*) as problemas from problematicas p
        join departamento d
        on p.depa=d.id_depa
        GROUP BY d.id_depa";

                //print $elsql;exit;
                $this->set_sql($elsql);
        
                $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
                $total_de_registro = mysqli_num_rows($rs);
                $i=0;
                $arreglo = array();
                while (($row = $rs->fetch_assoc()) !== null)
                    {
                        $data[] = array_map("utf8_encode",$row);
                        
                    }
                mysqli_free_result($rs);
                $this->close_db();
                //return $data;
               //$data = array_map("utf8_encode", $data );
                return $data;
                //return json_encode($arreglo,JSON_UNESCAPED_UNICODE);
    }
}//end class
?>