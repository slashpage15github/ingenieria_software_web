<?php
include("class_usuarios.php");
include("class_db.php");
class usuarios_dal extends class_db{
	
	function __construct()
	{
		parent::__construct();
	}

	function __destruct()
	{
        parent::__destruct();

	}
	
  

    //Obtener listado
    function verify_user($usuario,$clave){
        //$elsql =sprintf("select * from usuarios where usuario='%s' and clave='%s'",mysqli_real_escape_string($this->db_conn,$usuario),mysqli_real_escape_string($this->db_conn,$clave));
        
       $elsql ="Select IDUsuario from usuarios where usuario='$usuario' and clave='$clave'";


        //echo $elsql."\n"; //exit;
        $this->set_sql( $elsql);
    	$rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        $total_de_registro = mysqli_num_rows($rs);
            //if($total_de_registro==1){
            if($total_de_registro>0){
                return 1;
            }
            else{
                return 0;
            }
            mysqli_free_result($rs);
            //mysqli_close($conn);
     }
    

    function verify_usertipo($usuario,$clave){
        $elsql =sprintf("select tipo_usuario from usuarios where usuario='%s' and clave='%s'",mysqli_real_escape_string($this->db_conn,$usuario),mysqli_real_escape_string($this->db_conn,$clave));
        //echo $elsql; exit;
        $this->set_sql( $elsql);
        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        $renglon= mysqli_fetch_array($rs);
        $tipou= $renglon[0];

        return $tipou;
            mysqli_free_result($rs);
            //mysqli_close($conn);
     }


     //Obtener listado
    function get_datos_total_usuarios(){

        $elsql ="select * ";
        $elsql.="from usuarios";

        $this->set_sql($elsql);

        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        $total_de_registro = mysqli_num_rows($rs);
        $i=0;
        while($renglon = mysqli_fetch_assoc($rs)) {
            $obj_det = new usuarios($renglon["IDUsuario"],$renglon["usuario"],$renglon["clave"],$renglon["nombre_usuario"],$renglon["tipo_usuario"]);

          
            $i++;
            $lista[$i]=$obj_det;
            unset($obj_det);
        }

        return $lista;
     }

    //Obtener listado
    function get_datos_usuarios_by_id($id){

        $elsql ="select * ";
        $elsql.="from usuarios where IDUsuario=$id";
        //echo $elsql;
        $this->set_sql($elsql);

        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        $total_de_registro = mysqli_num_rows($rs);
        $i=0;
        while($renglon = mysqli_fetch_assoc($rs)) {
            $obj_det = new usuarios($renglon["IDUsuario"],$renglon["usuario"],$renglon["clave"],$renglon["nombre_usuario"],$renglon["tipo_usuario"]);

            $i++;
            $lista[$i]=$obj_det;
            unset($obj_det);
        }

        return $lista;
     }     
    
            //eliminar egresos
    function eliminar_usuario($id){
        
        $sql = "delete from usuarios where IDUsuario=$id";
     
        //print $sql;exit;
        $this->set_sql($sql);
        $this->db_conn->set_charset("utf8");
        
        mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));

        if(mysqli_affected_rows($this->db_conn)==1) {
            $borrado=1;
        }else{
            $borrado=0;
        }
        //unset($obj);
        return $borrado;
    }


        //Insertar
    function insertar_usuarios($obj){
        $fecha=date("Y-m-d H:i:s");

        $sql = "insert into usuarios (";
        $sql .= "usuario,";
        $sql .= "clave,";
        $sql .= "nombre_usuario,";
        $sql .= "tipo_usuario";
        $sql .= ") ";
        $sql .= "values(";
        $sql .= "'".$obj->getUsuario()."',";
        $sql .= "'".$obj->getClave()."',";
        $sql .= "'".$obj->getNombreUsuario()."',";
        $sql .= "'".$obj->getTipoUsuario()."'";
        $sql .= ")";
        //print $sql;exit;
        $this->set_sql($sql);
        $this->db_conn->set_charset("utf8");
        
        mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));

        if(mysqli_affected_rows($this->db_conn)==1) {
            $insertado=1;
        }else{
            $insertado=0;
        }
        unset($obj);
        return $insertado;
    }


    function actualiza_usuarios($obj){
        $fecha=date("Y-m-d H:i:s");
/*
        echo '<pre>';
        echo print_r($obj);
        echo '</pre>';exit;

        $sql .= "folio_finanzas="."'".$obj->getFolioFinanzas()."',";
        $sql .= "cuentas_x_pagar="."'".$obj->getCuentasXPagar()."',";


*/
        $sql = "update usuarios set ";
        $sql .= "usuario="."'".$obj->getUsuario()."',";
        $sql .= "clave="."'".$obj->getClave()."',";
        $sql .= "nombre_usuario="."'".$obj->getNombreUsuario()."',";
        $sql .= "tipo_usuario="."'".$obj->getTipoUsuario()."'";
        $sql .= " where IDUsuario = ".$obj->getIDUsuario();

        //echo $sql;exit;
        $this->set_sql($sql);
        $this->db_conn->set_charset("utf8");
        
        mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));

        if(mysqli_affected_rows($this->db_conn)==1) {
            $actualizado=1;
        }else{
            $actualizado=0;
        }
        unset($obj);
        return $actualizado;
    }
    }//end class
?>