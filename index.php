<?php
require_once("PersonaInterfase.php");

	class Coche 
	{
		

		// Propiedades
        public $marca	   = null;
        public $colores = null;
		/*
		var $Coches = array(
		1 => array(
			'idCoche' => 1,
			'Marca' => 'BMW',
			'Color' => 'rojo'
		),
		2 => array(
			'id' => 2,
			'Marca' => 'Mazda',
			'Color' => 'amarillo'
		),

	);		
	*/
        
		// Constructor:
        function Coche() {
        }

		// Métodos:
		
		public function obtenerCoches() {
        return $this->Coches;
    }

        function getMarca() {
            return $this->marca;
        }

        public function setMarca( $marca ) {
            $this->marca = $marca;
        }


        public function getColores() {
            return $this->colores;
        }

        public function setColores( $colores ) {
            $this->colores = $colores;
        }
        public function mostrarInfo(){
         
        
        $info = "<h1>Información del coche:</h1>";
        $info.= "Marca: ".$this->marca;
        $info.= "<br/> Color: ".$this->getColores();
       
         
        return $info;
    }
		
	}


class Persona implements PersonaInterfase
	{

		// Propiedades
        private $nombre	   = null;
        private $apellidos = null;
		private $genero    = null;

		// Constructor:
        function Persona() {
        }



// Métodos obligatorios según la interface (si se elimina alguno se generará un error):
  // viene de Interface Persona (persona.php
  
		// Métodos de interface

        public function getOjos() {
            return $this->ojos;
        }

        public function setOjos( $ojos ) {
            $this->ojos = $ojos;
        }

        public function getPelo() {
            return $this->pelo;
        }

        public function setPelo( $pelo ) {
            $this->pelo = $pelo;
        }
  // fin Métodos de interface
  
  
		public function setCoche($marca, $color){
				$coche= new Coche();
				$coche->setMarca($marca);
				$coche->setColores($color);
				$this->coche[]=$coche;
		}
		
		 public function getCoche() {
            return $this->coche;
        }
	  public function darBajaCoche(Coche $pCoche, $param){
     foreach ($this->getCoche() as $key =>$unCoche) {
      /*		
		echo '<br>';
		 echo '<br>';
		 echo 'parámetro enviado: '.$param;
		 echo '<br><br>';
		 echo 'Objeto unCoche: ';
		 echo '<br><br>';
		 print_r($unCoche);
		 echo '<br><br>';
		 echo 'Marca :'.$unCoche->marca;
		 echo '<br><br>';
		 */
      if($unCoche->marca==$param){
		 
         $unCoche->marca=NULL;
		 $unCoche->colores=NULL;
		
		//unset($pCoche[$key]);
		unset($this->coche[$key]);
		 //unset($unCoche->marca);
		 /*
		 echo 'Ok has dado de baja a este coche: ';
		 echo '<br><br>';
		  */          
          //  break;
         return 'has dado de baja el coche '.$param;

      }
	  	//	 echo '<br>';
		// echo '<br>';
		// echo 'Fin clase darBajaCoche';
		// exit;
    }
  }	
/*
  	  public function darBajaCoche(Coche $pCoche){
     foreach ($this->getCoche() as $unCoche) {
      if($unCoche->marca==$pCoche){

         $unCoche=NULL;
         return 'has dado de baja del '.$pCoche;
		

	}
*/		

	}

	
	class Joven  extends Persona
	{

		// Propiedades
        private $nombre	   = null;
        private $apellidos = null;
	    private $edad = null;
		private  $rango = '(0-26)';

		// Constructor:
        function Joven() {
        }

		// Métodos:
		 
		 public function getRango(){
           return $this->rango; 
     
        }

        function getNombre() : string {
            return $this->nombre;
        }

        public function setNombre( $nombre ) {
            $this->nombre = $nombre;
        }

        public function getApellidos() {
            return $this->apellidos;
        }

        public function setApellidos( $apellidos ) {
            $this->apellidos = $apellidos;
        }
		
        public function getEdad() : int {
            return $this->edad;
        }

        public function setEdad( $edad ){
            $this->edad = $edad;
        }
  

	}
		
		class Adulto extends Joven
	
	{
		public  $rango = '(27-50)';

       
			public function __set($rango, $value){
        if($rango == '(27-50)'){
            trigger_error("es de solo lecturaty", E_USER_ERROR );
            //throw new Exception('wow');
        }
     
        }
	
     
        }

function eliminar($id, &$caja){ 
    foreach($caja as $key => $obj){       
        if($id == $obj->marca){          
            unset($caja[$key]);         
            break;
        }
    }
    return;
}	

	$objPersona = new Joven();

	$objPersona->setNombre("Alicia");
	$objPersona->setApellidos("Boehme ");
	$objPersona->setOjos("verdes");
    $objPersona->setPelo("castaño");	
	
	
	$objPersona->setEdad(45);
	
	$objPersona->setCoche("Peugeot", "Burdeos");
	$objPersona->setCoche("Citroen", "Blanco");
     
	 $objAdulto = new Adulto();
	 $objAdulto->rango = "(27-50)"; //error
	 echo $objAdulto->rango; 
	 


	
	$objRango = new Joven();
   
         echo ' Rango Joven '. $objRango->getRango(); 
echo "<br/>";	
echo ' Rango Adulto '. $objAdulto->rango;

echo "<br/><br/><br/><br/>";

	echo "<h1>Nombre: ".$objPersona->getNombre()." ".$objPersona->getApellidos(). ",".$objPersona->getEdad(). " años"."<br/>"; 
	echo "ojos: ".$objPersona->getOjos().", "."Pelo: ".$objPersona->getPelo(). "<br/></h1>";
  echo '<p style="color:red;">'.'Coches asigandos con set y get'.'</p>';
  
 	 
 echo '<br>';
 
 //eliminar('Peugeot', $coche);	
echo '<h1>Información de los coches de '.$objPersona->getNombre().'</h1>';
  	echo '<pre>';
     print_r( $objPersona->getCoche());
	
	echo '</pre>';
   		
    foreach ($objPersona->getCoche() as $key =>$unCoche) {

echo '<br/>key :'.$key.' '. $unCoche->marca;
	 echo "<br/><br/>";

      }
	
 $coche= new Coche('Citroen');
$objPersona->darBajaCoche ($coche,'Citroen');
echo "<h1>nuevo Objeto aplicando borrar coche</h1>";
echo "<br/><br/>";
  	echo '<pre>';
     print_r( $objPersona->getCoche());
	
	echo '</pre>';
	
    foreach ($objPersona->getCoche() as $key =>$unCoche) {
     echo 'key :'.$key.' '. $unCoche->marca;
	 echo "<br/><br/>";
      }
	//echo "Nombre: [".$objCoche->coches."]<br/>";

	// getEdad esta definido como integer
	echo "getEdad esta definido como integer"."]<br/>";
	var_dump($objPersona->getEdad());
?>
