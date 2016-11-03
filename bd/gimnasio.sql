-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema gimnasio
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `gimnasio` ;

-- -----------------------------------------------------
-- Schema gimnasio
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `gimnasio` DEFAULT CHARACTER SET utf8 ;
USE `gimnasio` ;

-- -----------------------------------------------------
-- Table `gimnasio`.`Usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gimnasio`.`Usuario` ;

CREATE TABLE IF NOT EXISTS `gimnasio`.`Usuario` (
  `dni` VARCHAR(9) NOT NULL,
  `password` VARCHAR(45) NULL,
  `nombreusuario` VARCHAR(45) NULL,
  `idioma` VARCHAR(3) NULL,
  `correo` VARCHAR(45) NULL,
  `tipousuario` VARCHAR(15) NULL,
  PRIMARY KEY (`dni`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gimnasio`.`SesionEntrenamiento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gimnasio`.`SesionEntrenamiento` ;

CREATE TABLE IF NOT EXISTS `gimnasio`.`SesionEntrenamiento` (
  `idsesion` INT NOT NULL,
  `fecha` DATE NULL,
  `horainicio` DATETIME NULL,
  `horafin` DATETIME NULL,
  `nombreactividad` VARCHAR(45) NULL,
  `nombretablaejercicios` VARCHAR(45) NULL,
  `Usuario_dni` INT NOT NULL,
  PRIMARY KEY (`idsesion`, `Usuario_dni`))
ENGINE = InnoDB;

CREATE INDEX `fk_SesionEntrenamiento_Usuario1_idx` ON `gimnasio`.`SesionEntrenamiento` (`Usuario_dni` ASC);


-- -----------------------------------------------------
-- Table `gimnasio`.`Actividad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gimnasio`.`Actividad` ;

CREATE TABLE IF NOT EXISTS `gimnasio`.`Actividad` (
  `idactividad` INT NOT NULL,
  `nombreactividad` VARCHAR(45) NULL,
  `horainicio` DATETIME NULL,
  `horafin` DATETIME NULL,
  `responsable` VARCHAR(45) NULL,
  `tipoactividad` INT NULL,
  `numplazasmax` INT NULL,
  `SesionEntrenamiento_idsesion` INT NOT NULL,
  `Usuario_Dni` INT NOT NULL,
  `Entrenador_dni` INT NOT NULL,
  PRIMARY KEY (`idactividad`, `SesionEntrenamiento_idsesion`, `Usuario_Dni`, `Entrenador_dni`))
ENGINE = InnoDB;

CREATE INDEX `fk_Actividad_SesionEntrenamiento1_idx` ON `gimnasio`.`Actividad` (`SesionEntrenamiento_idsesion` ASC, `Usuario_Dni` ASC);

CREATE INDEX `fk_Actividad_Usuario1_idx` ON `gimnasio`.`Actividad` (`Entrenador_dni` ASC);


-- -----------------------------------------------------
-- Table `gimnasio`.`TablaEjercicios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gimnasio`.`TablaEjercicios` ;

CREATE TABLE IF NOT EXISTS `gimnasio`.`TablaEjercicios` (
  `idtabla` INT NOT NULL,
  `nombretabla` VARCHAR(45) NULL,
  `tipotabla` INT NULL,
  `responsable` VARCHAR(45) NULL,
  `niveldificultadglobal` INT NULL,
  `Actividad_idactividad` INT NOT NULL,
  PRIMARY KEY (`idtabla`, `Actividad_idactividad`))
ENGINE = InnoDB;

CREATE INDEX `fk_TablaEjercicios_Actividad1_idx` ON `gimnasio`.`TablaEjercicios` (`Actividad_idactividad` ASC);


-- -----------------------------------------------------
-- Table `gimnasio`.`Ejercicio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gimnasio`.`Ejercicio` ;

CREATE TABLE IF NOT EXISTS `gimnasio`.`Ejercicio` (
  `idejercicio` INT NOT NULL,
  `nombreejercicio` VARCHAR(45) NULL,
  `tipoejercicio` VARCHAR(45) NULL,
  `imagen` VARCHAR(45) NULL,
  `video` VARCHAR(45) NULL,
  `niveldificultad` INT NULL,
  `anotaciones` VARCHAR(300) NULL,
  `TablaEjercicios_idtabla` INT NOT NULL,
  PRIMARY KEY (`idEjercicio`, `TablaEjercicios_idtabla`))
ENGINE = InnoDB;

CREATE INDEX `fk_Ejercicio_TablaEjercicios1_idx` ON `gimnasio`.`Ejercicio` (`TablaEjercicios_idtabla` ASC);


-- -----------------------------------------------------
-- Table `gimnasio`.`Notificacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gimnasio`.`Notificacion` ;

CREATE TABLE IF NOT EXISTS `gimnasio`.`Notificacion` (
  `idnotificacion` INT NOT NULL,
  `nombrenotificacion` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  `tiponotificacion` INT NULL,
  `Usuario_dni` INT NOT NULL,
  PRIMARY KEY (`idnotificacion`, `Usuario_dni`))
ENGINE = InnoDB;

CREATE INDEX `fk_Notificacion_Usuario1_idx` ON `gimnasio`.`Notificacion` (`Usuario_dni` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

DROP USER 'admingym'@'%';
CREATE USER 'admingym'@'%' IDENTIFIED BY  'admingym';

GRANT USAGE ON * . * TO  'admingym'@'%' IDENTIFIED BY  'admingym' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;

GRANT ALL PRIVILEGES ON  `gimnasio` . * TO  'admingym'@'%';
