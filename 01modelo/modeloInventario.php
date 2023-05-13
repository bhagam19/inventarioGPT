<?php    
    class ModeloRegistro{        
        private $ModeloRegistro;
        private $cnx;
        private $datos;
        public function __construct(){
            require_once dirname(__FILE__).'/../config.php';
            $this->ModeloRegistro = array();
            $this->cnx = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        }
        public function crearTabla($tabla, $columnas){
            $consulta='CREATE TABLE IF NOT EXISTS '.$tabla.'(
                '.$columnas.'
            )';
            if($this->cnx->query($consulta)):
                echo'
                    <div>Se creó la tabla <span>"'.strtoupper($tabla).'"</span> con éxito.</div>
                ';
            else:
                echo'
                    <div><p class="rojo">No se pudo crear la tabla"'.strtoupper($tabla).'". Razón: [".mysqli_error($cnx)."]</p>/div>
            ';                
            endif;             
        }
        public function insertarValores($tabla, $valores){            
            $consulta='INSERT INTO '.$tabla.' values(null,'.$valores.')';
            $resultado=$this->cnx->query($consulta);
            if($resultado){
                return true;
            }else{
                echo false;
            }
        }
        public function mostrar($tabla, $condicion){
            $consulta ='SELECT * FROM '.$tabla.' WHERE '.$condicion;
            $resultado=$this->cnx->query($consulta);
            while($fila=$resultado->fetch_assoc()){
                $this->datos[]=$fila;
            }
            return $this->datos;
        }
        public function mostrarJoin($columnas,$tabla1,$tipoJoin,$tabla2,$On,$condicion){
            $consulta ='SELECT '.$columnas.' FROM '.$tabla1.' '.$tipoJoin.' '.$tabla2.' ON '.$On.' WHERE '.$condicion;
            $resultado=$this->cnx->query($consulta);
            while($fila=$resultado->fetch_assoc()){
                $this->datos[]=$fila;
            }
           // var_dump($this->datos);
            return $this->datos;
        }
        public function mostrarDistinct($columna, $tabla, $condicion){
            $consulta ='SELECT DISTINCT '.$columna.' FROM '.$tabla.' WHERE '.$condicion;
            $resultado=$this->cnx->query($consulta);
            while($fila=$resultado->fetch_assoc()){
                $this->datos[]=$fila;
            }
            return $this->datos;
        }
        public function borrar($tabla, $condicion){
            $consulta ='DELETE FROM '.$tabla.$condicion;
            $this->cnx->query($consulta);
        }
        public function volverEnumerar($tabla){
            $consulta='SET @count=0; ';
            $consulta.='UPDATE '.$tabla.' SET '.$tabla.'.id=@count:=@count+1; ';
            $this->cnx->multi_query($consulta);
        }
    }
?>  