<?php
    if (class_exists('Problema')!=true){
        class Problema{
            protected $id;
            protected $nombre;
            protected $email;
            protected $producto;
            protected $notifica;
            protected $depa;
            protected $desc;
            protected $fecha_registro;

        public function __construct(
             $id=NULL,
             $nombre=NULL,
             $email=NULL,
             $producto=NULL,
             $notifica=NULL,
             $depa=NULL,
             $desc=NULL,
             $fecha_registro=NULL           
            ){
                    $this->id=$id;
                    $this->nombre=$nombre;
                    $this->email=$email;
                    $this->producto=$producto;
                    $this->notifica=$notifica;
                    $this->depa=$depa;
                    $this->desc=$desc;
                    $this->fecha_registro=$fecha_registro;                          
            }//END CONSTRUCTOR
                
  /**
             * Get the value of id
             */
            public function getId()
            {
                        return $this->id;
            }

            /**
             * Set the value of id
             */
            public function setId($id)            {
                        $this->id = $id;

                        return $this;
            }

            /**
             * Get the value of nombre
             */
            public function getNombre()
            {
                        return $this->nombre;
            }

            /**
             * Set the value of nombre
             */
            public function setNombre($nombre)
            {
                        $this->nombre = $nombre;

                        return $this;
            }

            /**
             * Get the value of email
             */
            public function getEmail()
            {
                        return $this->email;
            }

            /**
             * Set the value of email
             */
            public function setEmail($email)
            {
                        $this->email = $email;

                        return $this;
            }

            /**
             * Get the value of producto
             */
            public function getProducto()
            {
                        return $this->producto;
            }

            /**
             * Set the value of producto
             */
            public function setProducto($producto)
            {
                        $this->producto = $producto;

                        return $this;
            }

            /**
             * Get the value of notifica
             */
            public function getNotifica()
            {
                        return $this->notifica;
            }

            /**
             * Set the value of notifica
             */
            public function setNotifica($notifica)
            {
                        $this->notifica = $notifica;

                        return $this;
            }

            /**
             * Get the value of depa
             */
            public function getDepa()
            {
                        return $this->depa;
            }

            /**
             * Set the value of depa
             */
            public function setDepa($depa)
            {
                        $this->depa = $depa;

                        return $this;
            }

            /**
             * Get the value of desc
             */
            public function getDesc()
            {
                        return $this->desc;
            }

            /**
             * Set the value of desc
             */
            public function setDesc($desc)
            {
                        $this->desc = $desc;

                        return $this;
            }

            /**
             * Get the value of fecha_registro
             */
            public function getFechaRegistro()
            {
                        return $this->fecha_registro;
            }

            /**
             * Set the value of fecha_registro
             */
            public function setFechaRegistro($fecha_registro)
            {
                        $this->fecha_registro = $fecha_registro;

                        return $this;
            }          
    

  }//end class    
}//end exists
?>