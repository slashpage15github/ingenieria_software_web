<?php
include('class_problema.php');
include('class_db.php');

    class Problema_dal extends class_db{

        function __construct(){
            parent::__construct();
        }


        function __destruct(){
            parent::__destruct();
        }

        function datos_por_id($id){
            $rfc=$this->db_conn->real_escape_string($id);
            $sql="select * from problematicas where id='$id'";
            $this->set_sql($sql);
            $result=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
            $total_cursos=mysqli_num_rows($result);
            $obj_det=null;

 

            if ($total_cursos==1){
                $renglon=mysqli_fetch_assoc($result);
                $obj_det=new Problema(
                    $renglon["id"],
                    $renglon["nombre"],
                    $renglon["email"],
                    $renglon["producto"],
                    $renglon["notifica"],
                    $renglon["depa"],
                    $renglon["desc"],                                            
                    $renglon["fecha_registro"]        
                    );
            }
            return $obj_det;
        }//end datos_por_id

 


        function obtener_lista_problematicas(){
            $sql="select * from problematicas";
            $this->set_sql($sql);
            $rs=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
            $total_cursos=mysqli_num_rows($rs);
            $obj_det=null;

 

            if ($total_cursos>0){
                $i=0;
                while ($renglon = mysqli_fetch_assoc($rs)){
                    $obj_det=new Problema(
                        $renglon["id"],
                        $renglon["nombre"],
                        $renglon["email"],
                        $renglon["producto"],
                        $renglon["notifica"],
                        $renglon["depa"],
                        $renglon["desc"],                                            
                        $renglon["fecha_registro"]
                        );

 

                    $i++;
                    $lista[$i]=$obj_det;
                    unset($obj_det);

 


                }//end while    
                    return $lista;
            }//end if    
        }//end function    

 

        function existe_problema($id){
            $rfc=$this->db_conn->real_escape_string($id);
            $sql = "select count(*) from problematicas";
            $sql.=" where id='$id'";

 

            $this->set_sql($sql);
            $rs=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));

 

            $renglon=mysqli_fetch_array($rs);
            $cuantos=$renglon[0];

 

            return $cuantos;    
        }

 

        function insertar_problematica($obj){
            
            $fecha=date("Y-m-d H:i:s");
            $sql="insert into problematicas(";
            $sql.="nombre,";
            $sql.="email,";
            $sql.="producto,";
            $sql.="notifica,";
            $sql.="depa,";
            $sql.="`desc`,";                                                
            $sql.="fecha_registro)";            
            $sql.=" values (";
            $sql.="'".$obj->getNombre()."',";
            $sql.="'".$obj->getEmail()."',";
            $sql.="'".$obj->getProducto()."',";
            $sql.="'".$obj->getNotifica()."',";
            $sql.="'".$obj->getDepa()."',";
            $sql.="'".$obj->getDesc()."',";                                            
            $sql.="'".$fecha."'";
            $sql.=")";

 //echo $sql;exit;

            $this->set_sql($sql);
            $this->db_conn->set_charset("utf8");
            mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
            if(mysqli_affected_rows($this->db_conn)==1){
                $insertado=1;
            }
            else{
                $insertado=0;
            }

 

            unset($obj);
            return $insertado;
        }//end function    

 


        function borra_problematica($obj){
            $id=$this->db_conn->real_escape_string($obj->getId());
            $sql="delete from problematicas where id='$id'";
            //echo $sql;return;
            $this->set_sql($sql);
            mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
                if(mysqli_affected_rows($this->db_conn)==1){
                    $borrado=1;
                }
                else{
                    $borrado=0;
                }

 

                unset($obj);
                return $borrado;

 

        }    

 

        function actualiza_problematica($obj){
/*
        echo '<pre>';
        echo print_r($obj);
        echo '</pre>';
        exit;
*/
        $sql = "update problematicas set ";
        $sql .= "nombre="."'".$obj->getNombre()."',";
        $sql .= "email="."'".$obj->getEmail()."',";
        $sql .= "producto="."'".$obj->getProducto()."',";
        $sql .= "notifica="."'".$obj->getNotifica()."',";
        $sql .= "depa="."'".$obj->getDepa()."',";
        $sql .= "desc="."'".$obj->getDesc()."'";
        $sql .= " where id = '".$obj->getId()."'";

 

        //echo $sql;//exit;
        
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