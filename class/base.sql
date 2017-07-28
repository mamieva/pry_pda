SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `Punta del Agua` ;
CREATE SCHEMA IF NOT EXISTS `Punta del Agua` DEFAULT CHARACTER SET utf8 ;
SHOW WARNINGS;
DROP SCHEMA IF EXISTS `punta del agua` ;
CREATE SCHEMA IF NOT EXISTS `punta del agua` DEFAULT CHARACTER SET utf8 ;
SHOW WARNINGS;
USE `Punta del Agua` ;

-- -----------------------------------------------------
-- Table `Proveedores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Proveedores` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `Proveedores` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(200) NOT NULL ,
  `ciudad` VARCHAR(200) NULL ,
  `provincia` VARCHAR(200) NULL ,
  `pais` VARCHAR(45) NULL ,
  `fecha_creado` DATETIME NOT NULL DEFAULT now() ,
  `fecha_modificado` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `Marcas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Marcas` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `Marcas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `Proveedores_id` INT NOT NULL ,
  `nombre` VARCHAR(200) NOT NULL ,
  `descripcion` VARCHAR(200) NULL ,
  `fecha_creado` DATETIME NOT NULL DEFAULT now() ,
  `fecha_modificado` DATETIME NULL ,
  PRIMARY KEY (`id`, `Proveedores_id`) ,
  CONSTRAINT `fk_Marcas_Proveedores1`
    FOREIGN KEY (`Proveedores_id` )
    REFERENCES `Proveedores` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_Marcas_Proveedores1_idx` ON `Marcas` (`Proveedores_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `Productos_Tipos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Productos_Tipos` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `Productos_Tipos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(200) NOT NULL ,
  `descripcion` VARCHAR(400) NULL ,
  `fecha_creado` DATETIME NOT NULL DEFAULT now() ,
  `fecha_modificado` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `Productos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Productos` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `Productos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(200) NOT NULL ,
  `descripcion` VARCHAR(400) NULL ,
  `cantidad_unidades_caja` DECIMAL NULL ,
  `precio_costo` FLOAT NULL ,
  `precio_venta` FLOAT NULL ,
  `tipo_precio` ENUM('KIG','UNI','CAJ') NULL ,
  `peso_unidad` FLOAT NULL ,
  `fecha_creado` DATETIME NOT NULL DEFAULT now() ,
  `fecha_modificado` DATETIME NULL ,
  `Marcas_id` INT NOT NULL ,
  `Productos_Tipos_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `Marcas_id`, `Productos_Tipos_id`) ,
  CONSTRAINT `fk_Productos_Marcas1`
    FOREIGN KEY (`Marcas_id` )
    REFERENCES `Marcas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Productos_Productos_Tipos1`
    FOREIGN KEY (`Productos_Tipos_id` )
    REFERENCES `Productos_Tipos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_Productos_Marcas1_idx` ON `Productos` (`Marcas_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_Productos_Productos_Tipos1_idx` ON `Productos` (`Productos_Tipos_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `Usuarios_Tipos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Usuarios_Tipos` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `Usuarios_Tipos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `codigo` VARCHAR(45) NOT NULL ,
  `nombre` VARCHAR(100) NOT NULL ,
  `descripcion` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `Usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Usuarios` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `Usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `usuario` VARCHAR(200) NOT NULL ,
  `contraseña` VARCHAR(200) NOT NULL ,
  `situacion` ENUM('HAB','SUS') NOT NULL DEFAULT 'HAB' ,
  `fecha_creado` DATETIME NOT NULL DEFAULT now() ,
  `fecha_modificado` DATETIME NULL ,
  `Usuarios_Tipos_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `Usuarios_Tipos_id`) ,
  CONSTRAINT `fk_Usuarios_Usuarios_Tipos`
    FOREIGN KEY (`Usuarios_Tipos_id` )
    REFERENCES `Usuarios_Tipos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = '	';

SHOW WARNINGS;
CREATE INDEX `fk_Usuarios_Usuarios_Tipos_idx` ON `Usuarios` (`Usuarios_Tipos_id` ASC) ;

SHOW WARNINGS;
CREATE UNIQUE INDEX `usuario_UNIQUE` ON `Usuarios` (`usuario` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `Locales`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Locales` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `Locales` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(200) NOT NULL ,
  `direccion` VARCHAR(300) NULL ,
  `ciudad` VARCHAR(200) NULL ,
  `provincia` VARCHAR(100) NULL ,
  `pais` VARCHAR(100) NULL ,
  `fecha_creado` DATETIME NOT NULL DEFAULT now() ,
  `fecha_modificado` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `Repartidores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Repartidores` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `Repartidores` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(100) NOT NULL ,
  `apellido` VARCHAR(100) NOT NULL ,
  `num_documento` VARCHAR(20) NULL ,
  `domicilio` VARCHAR(200) NULL ,
  `fecha_creado` DATETIME NOT NULL DEFAULT now() ,
  `fecha_modificado` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE UNIQUE INDEX `num_documento_UNIQUE` ON `Repartidores` (`num_documento` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `Entrada`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Entrada` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `Entrada` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `Productos_id` INT NOT NULL ,
  `Usuarios_id` INT NOT NULL ,
  `fecha_entrada` DATE NOT NULL ,
  `cantidad_kg` FLOAT NULL ,
  `cantidad_cajas` DECIMAL NULL ,
  `cantidad_unidades` DECIMAL NULL ,
  `precio_total` DECIMAL NULL ,
  `situacion` ENUM('HAB','SUS') NOT NULL DEFAULT 'HAB' ,
  `fecha_creado` DATETIME NOT NULL DEFAULT now() ,
  `fecha_modificado` DATETIME NULL ,
  PRIMARY KEY (`id`, `Productos_id`, `Usuarios_id`) ,
  CONSTRAINT `fk_Marcas_has_Productos_Productos1`
    FOREIGN KEY (`Productos_id` )
    REFERENCES `Productos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Entrada_Usuarios1`
    FOREIGN KEY (`Usuarios_id` )
    REFERENCES `Usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_Marcas_has_Productos_Productos1_idx` ON `Entrada` (`Productos_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_Entrada_Usuarios1_idx` ON `Entrada` (`Usuarios_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `Salida`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Salida` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `Salida` (
  `Productos_id` INT NOT NULL AUTO_INCREMENT ,
  `Locales_emisor_id` INT NOT NULL ,
  `Locales_receptor_id` INT NULL ,
  `Repartidores_id` INT NULL ,
  `Usuarios_id` INT NOT NULL ,
  `tipo_salida` ENUM('LOCAL','REPARTIDOR') NULL ,
  `fecha_entrada` DATE NOT NULL ,
  `cantidad_kg` FLOAT NULL ,
  `cantidad_cajas` DECIMAL NULL ,
  `cantidad_unidades` DECIMAL NULL ,
  `precio_total` DECIMAL NULL ,
  `situacion` ENUM('HAB','SUS') NULL ,
  `fecha_creado` DATETIME NOT NULL DEFAULT now() ,
  `fecha_modificado` DATETIME NULL ,
  PRIMARY KEY (`Productos_id`, `Locales_emisor_id`, `Locales_receptor_id`, `Repartidores_id`, `Usuarios_id`) ,
  CONSTRAINT `fk_Productos_has_Locales_Productos1`
    FOREIGN KEY (`Productos_id` )
    REFERENCES `Productos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Productos_has_Locales_Locales1`
    FOREIGN KEY (`Locales_emisor_id` )
    REFERENCES `Locales` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Salida_Locales1`
    FOREIGN KEY (`Locales_receptor_id` )
    REFERENCES `Locales` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Salida_Usuarios1`
    FOREIGN KEY (`Usuarios_id` )
    REFERENCES `Usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Salida_Repartidores1`
    FOREIGN KEY (`Repartidores_id` )
    REFERENCES `Repartidores` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_Productos_has_Locales_Locales1_idx` ON `Salida` (`Locales_emisor_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_Productos_has_Locales_Productos1_idx` ON `Salida` (`Productos_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_Salida_Locales1_idx` ON `Salida` (`Locales_receptor_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_Salida_Usuarios1_idx` ON `Salida` (`Usuarios_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_Salida_Repartidores1_idx` ON `Salida` (`Repartidores_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `Productos_Stock`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Productos_Stock` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `Productos_Stock` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `Productos_id` INT NOT NULL ,
  `Locales_id` INT NOT NULL ,
  `cantidad_cajas` DECIMAL NULL DEFAULT 0 ,
  `cantidad_kg` FLOAT NULL DEFAULT 0 ,
  `cantidad_unidades` DECIMAL NULL DEFAULT 0 ,
  `fecha_creado` DATETIME NOT NULL DEFAULT now() ,
  `fecha_modificado` DATETIME NULL ,
  PRIMARY KEY (`id`, `Productos_id`, `Locales_id`) ,
  CONSTRAINT `fk_Productos_Stock_Productos1`
    FOREIGN KEY (`Productos_id` )
    REFERENCES `Productos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Productos_Stock_Locales1`
    FOREIGN KEY (`Locales_id` )
    REFERENCES `Locales` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_Productos_Stock_Productos1_idx` ON `Productos_Stock` (`Productos_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_Productos_Stock_Locales1_idx` ON `Productos_Stock` (`Locales_id` ASC) ;

SHOW WARNINGS;
USE `punta del agua` ;

-- -----------------------------------------------------
-- Table `proveedores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `proveedores` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `proveedores` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(200) NOT NULL ,
  `ciudad` VARCHAR(200) NULL DEFAULT NULL ,
  `provincia` VARCHAR(200) NULL DEFAULT NULL ,
  `pais` VARCHAR(45) NULL DEFAULT NULL ,
  `fecha_creado` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `fecha_modificado` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `marcas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `marcas` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `marcas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `Proveedores_id` INT(11) NOT NULL ,
  `nombre` VARCHAR(200) NOT NULL ,
  `descripcion` VARCHAR(200) NULL DEFAULT NULL ,
  `fecha_creado` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `fecha_modificado` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`, `Proveedores_id`) ,
  CONSTRAINT `fk_Marcas_Proveedores1`
    FOREIGN KEY (`Proveedores_id` )
    REFERENCES `proveedores` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_Marcas_Proveedores1_idx` ON `marcas` (`Proveedores_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `productos_tipos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `productos_tipos` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `productos_tipos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(200) NOT NULL ,
  `descripcion` VARCHAR(400) NULL DEFAULT NULL ,
  `fecha_creado` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `fecha_modificado` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `productos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `productos` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `productos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(200) NOT NULL ,
  `descripcion` VARCHAR(400) NULL DEFAULT NULL ,
  `cantidad_unidades_caja` DECIMAL(10,0) NULL DEFAULT NULL ,
  `precio_costo` FLOAT NULL DEFAULT NULL ,
  `precio_venta` FLOAT NULL DEFAULT NULL ,
  `tipo_precio` ENUM('KIG','UNI','CAJ') NULL DEFAULT NULL ,
  `peso_unidad` FLOAT NULL DEFAULT NULL ,
  `fecha_creado` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `fecha_modificado` DATETIME NULL DEFAULT NULL ,
  `Marcas_id` INT(11) NOT NULL ,
  `Productos_Tipos_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`, `Marcas_id`, `Productos_Tipos_id`) ,
  CONSTRAINT `fk_Productos_Marcas1`
    FOREIGN KEY (`Marcas_id` )
    REFERENCES `marcas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Productos_Productos_Tipos1`
    FOREIGN KEY (`Productos_Tipos_id` )
    REFERENCES `productos_tipos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_Productos_Marcas1_idx` ON `productos` (`Marcas_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_Productos_Productos_Tipos1_idx` ON `productos` (`Productos_Tipos_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `usuarios_tipos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `usuarios_tipos` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `usuarios_tipos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `codigo` VARCHAR(45) NOT NULL ,
  `nombre` VARCHAR(100) NOT NULL ,
  `descripcion` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `usuarios` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `usuario` VARCHAR(200) NOT NULL ,
  `contraseña` VARCHAR(200) NOT NULL ,
  `situacion` ENUM('HAB','SUS') NOT NULL DEFAULT 'HAB' ,
  `fecha_creado` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `fecha_modificado` DATETIME NULL DEFAULT NULL ,
  `Usuarios_Tipos_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`, `Usuarios_Tipos_id`) ,
  CONSTRAINT `fk_Usuarios_Usuarios_Tipos`
    FOREIGN KEY (`Usuarios_Tipos_id` )
    REFERENCES `usuarios_tipos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 82
DEFAULT CHARACTER SET = utf8
COMMENT = '	';

SHOW WARNINGS;
CREATE UNIQUE INDEX `usuario_UNIQUE` ON `usuarios` (`usuario` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_Usuarios_Usuarios_Tipos_idx` ON `usuarios` (`Usuarios_Tipos_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `entrada`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `entrada` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `entrada` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `Productos_id` INT(11) NOT NULL ,
  `Usuarios_id` INT(11) NOT NULL ,
  `fecha_entrada` DATE NOT NULL ,
  `cantidad_kg` FLOAT NULL DEFAULT NULL ,
  `cantidad_cajas` DECIMAL(10,0) NULL DEFAULT NULL ,
  `cantidad_unidades` DECIMAL(10,0) NULL DEFAULT NULL ,
  `precio_total` DECIMAL(10,0) NULL DEFAULT NULL ,
  `situacion` ENUM('HAB','SUS') NOT NULL DEFAULT 'HAB' ,
  `fecha_creado` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `fecha_modificado` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`, `Productos_id`, `Usuarios_id`) ,
  CONSTRAINT `fk_Marcas_has_Productos_Productos1`
    FOREIGN KEY (`Productos_id` )
    REFERENCES `productos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Entrada_Usuarios1`
    FOREIGN KEY (`Usuarios_id` )
    REFERENCES `usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_Marcas_has_Productos_Productos1_idx` ON `entrada` (`Productos_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_Entrada_Usuarios1_idx` ON `entrada` (`Usuarios_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `locales`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `locales` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `locales` (
  `id` INT(11) NOT NULL ,
  `nombre` VARCHAR(200) NOT NULL ,
  `direccion` VARCHAR(300) NULL DEFAULT NULL ,
  `ciudad` VARCHAR(200) NULL DEFAULT NULL ,
  `provincia` VARCHAR(100) NULL DEFAULT NULL ,
  `pais` VARCHAR(100) NULL DEFAULT NULL ,
  `tipo` ENUM('LOC','REP') NULL DEFAULT NULL ,
  `fecha_creado` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `fecha_modificado` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `productos_stock`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `productos_stock` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `productos_stock` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `Productos_id` INT(11) NOT NULL ,
  `cantidad_cajas` DECIMAL(10,0) NULL DEFAULT '0' ,
  `cantidad_kg` FLOAT NULL DEFAULT '0' ,
  `cantidad_unidades` DECIMAL(10,0) NULL DEFAULT '0' ,
  `fecha_creado` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `fecha_modificado` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`, `Productos_id`) ,
  CONSTRAINT `fk_Productos_Stock_Productos1`
    FOREIGN KEY (`Productos_id` )
    REFERENCES `productos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_Productos_Stock_Productos1_idx` ON `productos_stock` (`Productos_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `repartidores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `repartidores` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `repartidores` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(100) NOT NULL ,
  `apellido` VARCHAR(100) NOT NULL ,
  `num_documento` VARCHAR(20) NULL DEFAULT NULL ,
  `domicilio` VARCHAR(200) NULL DEFAULT NULL ,
  `fecha_creado` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `fecha_modificado` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE UNIQUE INDEX `num_documento_UNIQUE` ON `repartidores` (`num_documento` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `salida`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `salida` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `salida` (
  `Productos_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `Locales_receptor_id` INT(11) NOT NULL DEFAULT '0' ,
  `Usuarios_id` INT(11) NOT NULL ,
  `fecha_salida` DATE NOT NULL ,
  `cantidad_kg` FLOAT NULL DEFAULT NULL ,
  `cantidad_cajas` DECIMAL(10,0) NULL DEFAULT NULL ,
  `cantidad_unidades` DECIMAL(10,0) NULL DEFAULT NULL ,
  `precio_total` DECIMAL(10,0) NULL DEFAULT NULL ,
  `situacion` ENUM('HAB','SUS') NULL DEFAULT NULL ,
  `fecha_creado` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `fecha_modificado` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`Productos_id`, `Locales_receptor_id`, `Usuarios_id`) ,
  CONSTRAINT `fk_Productos_has_Locales_Productos1`
    FOREIGN KEY (`Productos_id` )
    REFERENCES `productos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Salida_Locales1`
    FOREIGN KEY (`Locales_receptor_id` )
    REFERENCES `locales` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Salida_Usuarios1`
    FOREIGN KEY (`Usuarios_id` )
    REFERENCES `usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_Productos_has_Locales_Productos1_idx` ON `salida` (`Productos_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_Salida_Locales1_idx` ON `salida` (`Locales_receptor_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_Salida_Usuarios1_idx` ON `salida` (`Usuarios_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Placeholder table for view `salida_v`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `salida_v` (`Productos_id` INT, `Locales_receptor_id` INT, `Usuarios_id` INT, `fecha_salida` INT, `cantidad_kg` INT, `cantidad_cajas` INT, `cantidad_unidades` INT, `precio_total` INT, `situacion` INT, `fecha_creado` INT, `fecha_modificado` INT, `locales_nombre` INT, `productos_nombre` INT, `usuarios_usuario` INT);
SHOW WARNINGS;

-- -----------------------------------------------------
-- Placeholder table for view `usuarios_v`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuarios_v` (`id` INT, `usuario` INT, `contraseña` INT, `fecha_creado` INT, `fecha_modificado` INT, `tipos_id` INT, `tipos_codigo` INT, `tipos_nombre` INT, `tipos_descripcion` INT);
SHOW WARNINGS;

-- -----------------------------------------------------
-- View `salida_v`
-- -----------------------------------------------------
DROP VIEW IF EXISTS `salida_v` ;
SHOW WARNINGS;
DROP TABLE IF EXISTS `salida_v`;
SHOW WARNINGS;
USE `punta del agua`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `salida_v` AS select `salida`.`Productos_id` AS `Productos_id`,`salida`.`Locales_receptor_id` AS `Locales_receptor_id`,`salida`.`Usuarios_id` AS `Usuarios_id`,`salida`.`fecha_salida` AS `fecha_salida`,`salida`.`cantidad_kg` AS `cantidad_kg`,`salida`.`cantidad_cajas` AS `cantidad_cajas`,`salida`.`cantidad_unidades` AS `cantidad_unidades`,`salida`.`precio_total` AS `precio_total`,`salida`.`situacion` AS `situacion`,`salida`.`fecha_creado` AS `fecha_creado`,`salida`.`fecha_modificado` AS `fecha_modificado`,`locales`.`nombre` AS `locales_nombre`,`productos`.`nombre` AS `productos_nombre`,`usuarios`.`usuario` AS `usuarios_usuario` from (((`salida` join `locales`) join `productos`) join `usuarios`) where ((`salida`.`Locales_receptor_id` = `locales`.`id`) and (`salida`.`Productos_id` = `productos`.`id`) and (`salida`.`Usuarios_id` = `usuarios`.`id`));
SHOW WARNINGS;

-- -----------------------------------------------------
-- View `usuarios_v`
-- -----------------------------------------------------
DROP VIEW IF EXISTS `usuarios_v` ;
SHOW WARNINGS;
DROP TABLE IF EXISTS `usuarios_v`;
SHOW WARNINGS;
USE `punta del agua`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usuarios_v` AS select `usuarios`.`id` AS `id`,`usuarios`.`usuario` AS `usuario`,`usuarios`.`contraseña` AS `contraseña`,`usuarios`.`fecha_creado` AS `fecha_creado`,`usuarios`.`fecha_modificado` AS `fecha_modificado`,`tipos`.`id` AS `tipos_id`,`tipos`.`codigo` AS `tipos_codigo`,`tipos`.`nombre` AS `tipos_nombre`,`tipos`.`descripcion` AS `tipos_descripcion` from (`usuarios` join `usuarios_tipos` `tipos`) where (`usuarios`.`Usuarios_Tipos_id` = `tipos`.`id`);
SHOW WARNINGS;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
