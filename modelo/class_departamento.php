<?php
if (class_exists('Departamento')!=true){
	class Departamento{
		protected $id_depa;
		protected $nombre_depa;

		public function __construct($id_depa=NULL,$nombre_depa=NULL){
			$this->id_depa=$id_depa;
			$this->nombre_depa=$nombre_depa;
		}//END constructor

		/**
		 * Get the value of id_depa
		 */
		public function getIdDepa()
		{
				return $this->id_depa;
		}

		/**
		 * Set the value of id_depa
		 */
		public function setIdDepa($id_depa)
		{
				$this->id_depa = $id_depa;

				return $this;
		}

		/**
		 * Get the value of nombre_depa
		 */
		public function getNombreDepa()
		{
				return $this->nombre_depa;
		}

		/**
		 * Set the value of nombre_depa
		 */
		public function setNombreDepa($nombre_depa)
		{
				$this->nombre_depa = $nombre_depa;

				return $this;
		}

	}//end class
}//end void redefinition
?>