<?php
    require_once dirname(__FILE__).'/../01modelo/modeloInventario.php';
    class ControladorInventario{
        private $ModeloInventario;
        private $dato;
        public function __construct(){
            $this->ModeloInventario =new ModeloInventario();	
        } 
        static function verificarInstalacion(){
            $cnx = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            $resultado = $cnx->query("SHOW TABLES LIKE 'instalacion'");
            $existeTabla = $resultado->num_rows > 0;
            $cnx->close();    
            return $existeTabla;

            /*
            $tabla='information_schema.tables';
            $condicion='table_schema="id19696923_sinsimat" AND table_name="instalacion"';
            $registro=new ModeloInventario();
            $dato=$registro->mostrar($tabla,$condicion);            
            return $dato;
            */
        }
        static function instalar(){
            require('adm/01-mdl/headerInstallBD.php');
            require('adm/01-mdl/contenidoInstalacion.php');
            $registro=new ModeloInventario();
            foreach($datos as $tabla=>$columnas){
                $dato=$registro->crearTabla($tabla,$columnas); 
            }
            foreach($contenidos as $tabla=>$valores){
                if(is_array($valores)){
                    foreach($valores as $valor){
                        $dato=$registro->insertarValores($tabla,$valor);
                    }
                }else{
                    $dato=$registro->insertarValores($tabla,$valores);
                }
            }
            require('adm/01-mdl/footerInstallBD.php');
                                      
        }       
        static function index(){
            require('adm/02-vst/index.php');
        }
        static function validarLogin($tabla,$usuario,$contrasena){
            $condicion ='dane='.$usuario;
            $registro=new ModeloInventario();
            $dato= $registro->mostrar($tabla,$condicion);
            $respuesta="";
            if($dato===NULL){       
                $respuesta="NE";    
            }else{
                foreach($dato as $key=>$v){
                    $usuario=$v['dane'];
                    $dbHash=$v['contrasena'];
                    $id=$v['id'];
                    $permiso=$v['permiso'];
                    if($contrasena==$dbHash||crypt($contrasena,$dbHash) == $dbHash){
                        $_SESSION['usuario']=$usuario;
                        $_SESSION['id']=$id;
                        $_SESSION['permiso']=$permiso;
                        if($dbHash=="SvS1234*"){
                            $respuesta="C";
                        }else{
                            $respuesta="S";
                        }
                    }else{
                        $respuesta="N";
                    }
                }                
            }
            return $respuesta;
        }
        static function cargarUsuarioActivo(){
            $tabla='usuarios';
            $condicion='dane='.$_SESSION['usuario'];
            $registro=new ModeloInventario();
            $dato= $registro->mostrar($tabla,$condicion);
            return $dato;            
        }        
        static function consultar($tabla,$condicion){
            $registro=new ModeloInventario();
            $dato= $registro->mostrar($tabla,$condicion);
            return $dato;
        }
        static function consultarJoin($columnas,$tabla1,$tipoJoin,$tabla2,$On,$condicion){
            $registro=new ModeloInventario();
            $dato= $registro->mostrarJoin($columnas,$tabla1,$tipoJoin,$tabla2,$On,$condicion);
            return $dato;
        }
        static function consultarDistinct($columna,$tabla,$condicion){
            $registro=new ModeloInventario();
            $dato= $registro->mostrarDistinct($columna, $tabla,$condicion);
            return $dato;
        }
        static function insertarDatos($tabla,$valores){
            $registro=new ModeloInventario();
            $registro->insertarValores($tabla,$valores);

        }
        static function borrarDatos($tabla,$condicion){
            $registro=new ModeloInventario();
            $registro->borrar($tabla,$condicion);
        }
        static function volverEnumerar($tabla){
            $registro=new ModeloInventario();
            $registro->volverEnumerar($tabla);
        }
    }
?>