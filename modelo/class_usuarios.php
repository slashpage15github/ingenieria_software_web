<?php
if(class_exists('usuarios') != true)
{
class usuarios{
	protected $IDUsuario;
	protected $usuario;
	protected $clave;
	protected $nombre_usuario;
	protected $tipo_usuario;


    		public function __construct($IDUsuario=NULL,$usuario=NULL,$clave=NULL,$nombre_usuario=NULL,$tipo_usuario=NULL)
      		{
        		$this->IDUsuario=$IDUsuario;
        		$this->usuario=$usuario;
    			$this->clave=$clave;
    			$this->nombre_usuario=$nombre_usuario;
    			$this->tipo_usuario=$tipo_usuario;
      		}

    	//Getters & Setters
	


    /**
     * @return mixed
     */
    public function getIDUsuario()
    {
        return $this->IDUsuario;
    }

    /**
     * @param mixed $IDUsuario
     *
     * @return self
     */
    public function setIDUsuario($IDUsuario)
    {
        $this->IDUsuario = $IDUsuario;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     *
     * @return self
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * @param mixed $clave
     *
     * @return self
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombreUsuario()
    {
        return $this->nombre_usuario;
    }

    /**
     * @param mixed $nombre_usuario
     *
     * @return self
     */
    public function setNombreUsuario($nombre_usuario)
    {
        $this->nombre_usuario = $nombre_usuario;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipoUsuario()
    {
        return $this->tipo_usuario;
    }

    /**
     * @param mixed $tipo_usuario
     *
     * @return self
     */
    public function setTipoUsuario($tipo_usuario)
    {
        $this->tipo_usuario = $tipo_usuario;

        return $this;
    }
}
}
?>