<?php    
    $datos=[
        "instalacion"=>"
            id int NOT NULL AUTO_INCREMENT,            
            confirmacion int(1) NOT NULL,
            PRIMARY KEY(id)
        ",
        "usuarios"=>"
            id int NOT NULL AUTO_INCREMENT,            
            usuarioCED int(11) NOT NULL,
            usuario varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
            contrasena varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
            nombres varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
            apellidos varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
            defUsuario int NOT NULL ,
            permiso int NOT NULL,
            PRIMARY KEY(id)
        ",
        "categoriasDeBienes"=>"
            id int NOT NULL AUTO_INCREMENT,            
            nomCategoria varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
            PRIMARY KEY(id)
        ",
        "ubicaciones"=>"
            id int NOT NULL AUTO_INCREMENT,            
            nomUbicacion varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
			PRIMARY KEY(id)
        ",
        "dependencias"=>"
            id int NOT NULL AUTO_INCREMENT,            
            nomDependencias varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
			codUbicacion int NOT NULL,
			usuarioID int NOT NULL,
			PRIMARY KEY(id),
            FOREIGN KEY(codUbicacion) REFERENCES ubicaciones(id),
            FOREIGN KEY(usuarioID) REFERENCES usuarios(id)						
        ",
        "almacenamiento"=>"
            id int NOT NULL AUTO_INCREMENT,            
            nomAlmacenamiento varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
			PRIMARY KEY(id)			
        ",
        "estadoDelBien"=>"
            id int NOT NULL AUTO_INCREMENT,            
            nomEstado varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
			PRIMARY KEY(id)			
        ",
        "mantenimiento"=>"
            id int NOT NULL AUTO_INCREMENT,            
            nomMantenimiento varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
			PRIMARY KEY(id)			
        ",
        "bienes"=>"
            id int NOT NULL AUTO_INCREMENT,            
            nomBien varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			detalleDelBien varchar(400) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			serieDelBien varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			origenDelBien varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			fechaAdquisicion date ,
			precio float ,
			cantBien int (4) ,
			codCategoria int(2) ,
			codDependencias int(2) ,
			usuarioID int (2) ,
			codAlmacenamiento int (2) ,
			codEstado int(2) ,
			codMantenimiento int(2) ,
			observaciones varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci,	
			PRIMARY KEY(id),
			FOREIGN KEY (codCategoria) REFERENCES categoriasDeBienes (id),
			FOREIGN KEY (codDependencias) REFERENCES dependencias (id),
			FOREIGN KEY (usuarioID) REFERENCES usuarios (id),
			FOREIGN KEY (codAlmacenamiento) REFERENCES almacenamiento (id),
			FOREIGN KEY (codEstado) REFERENCES estadoDelBien (id),
			FOREIGN KEY (codMantenimiento) REFERENCES mantenimiento (id)			
        ",
        "detallesDeBienes"=>"
            id int NOT NULL AUTO_INCREMENT,            
            carEspecial varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			tamano varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			material varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			color varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			marca varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			otra varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,				
			PRIMARY KEY(id)
        ",
        "modificacionesBienes"=>"
            id int NOT NULL AUTO_INCREMENT,            
            nomBien varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			detalleDelBien varchar(400) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			serieDelBien varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			origenDelBien varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			fechaAdquisicion date ,
			precio float ,
			cantBien int (4) ,
			codCategoria int(2),
			codDependencias int(2) ,
			usuarioID int (2) ,
			codAlmacenamiento int (2) ,
			codEstado int(2) ,
			codMantenimiento int(2),
			observaciones varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            PRIMARY KEY(id)
        ",
        "logs"=>"
            utc int,
            anio varchar(4) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            mes varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            dia varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            hora varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            minuto varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            segundo varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            ip varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            navegador varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            usuario varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            contrasena varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            pagVisitada varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci
        "
    ];
    $contenidos=[
        "instalacion"=>1,
        "usuarios"=>['"71379517","71379517","inventApp","Adolfo León","Ruiz Hernández",1,6'],
        "categoriasDeBienes"=>['"Muebles"','Equipos y Material de Laboratorio','Material Didáctico','Instrumentos Musicales','Equipos de Cómputo',
                                'Equipos de Comunicación','Equipos Audiovisuales','Equipos de Bombeo','Equipos de Oficina','Maquinaria de Talleres y Diversos Oficios',
                                'Maquinaria Agrí­cola','Bibliobancos de Textos Escolares','Material Bibliográfico','Licencias de Software','Semovientes',
                                'Muebles y Equipos de Enfermerí­a y Primeros Auxilios','Extintores de Incendio','Bienes de Consumo (Papelerí­a y Aseo)',
                                'Libros Reglamentarios','Enseres','Primeros Auxilios','Implementos de Aseo','Implementos de Recreación y Deportes',
                                'Utensilios de Cocina','Edificaciones','Herramientas y Materiales','Reporte de Necesidad','Reporte para Mantenimiento'],
        "ubicaciones"=>['"Salón"','"Oficina"','"Departamento"','"Otro Lugar"'],
        "dependencias"=>['"AULA B2 C-102 (Secretaría)",2,1'],
        "almacenamiento"=>['"En Uso"','"Almacenado"'],
        "estadoDelBien"=>['"Nuevo"','"Bueno"','"Regular"','"Malo"'],
        "mantenimiento"=>['"Al Día"','"En Mora"','"Dado de Baja"']
    ]; 
?>