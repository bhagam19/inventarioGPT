<?php    
    $datos=[
        "instalacion"=>"
            id int NOT NULL AUTO_INCREMENT,            
            confirmacion int(1) NOT NULL,
            PRIMARY KEY(id)
            "
        ,
        "usuarios"=>"
            id int NOT NULL AUTO_INCREMENT,            
            usuarioCED int(11) NOT NULL,
            usuario varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
            contrasena varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
            nombres varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
            apellidos varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
            defUsuario int NOT NULL ,
            permiso int(1) NOT NULL,
            PRIMARY KEY(id)
            "       
    ];
    $contenidos=[
        "instalacion"=>1,
        "usuarios"=>['
            "71379517",
            "71379517",
            "inventApp",
            "Adolfo León",
            "Ruiz Hernández",
            1,
            6
        ','
            "12345",
            "12345",
            "admin12345",
            "Super",
            "Admin IE",
            1,
            6
        ']
    ]; 
?>