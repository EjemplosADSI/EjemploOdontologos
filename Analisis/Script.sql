-- MySQL Script generated by MySQL Workbench
-- 07/22/16 07:18:45
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema odontologia
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema odontologia
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `odontologia` DEFAULT CHARACTER SET utf8 ;
USE `odontologia` ;

-- -----------------------------------------------------
-- Table `odontologia`.`odontologos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `odontologia`.`odontologos` (
  `idodontologos` INT NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(50) NOT NULL,
  `apellidos` VARCHAR(50) NOT NULL,
  `especialidad` ENUM('ENDODONCIA', 'ORTODONCIA', 'PERIODONCIA', 'ODONTOPEDIATRIA', 'IMPLANTOLOGIA', 'ODONTOLOGIA GERIATRICA', 'PROSTODONCIA') NOT NULL,
  `direccion` VARCHAR(60) NOT NULL,
  `celular` BIGINT NOT NULL,
  `estado` ENUM('Activo', 'Inactivo') NOT NULL,
  PRIMARY KEY (`idodontologos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `odontologia`.`pacientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `odontologia`.`pacientes` (
  `idpacientes` INT NOT NULL AUTO_INCREMENT,
  `tipo_documento` ENUM('C.C', 'T.I', 'C.E', 'Otro') NOT NULL,
  `documento` BIGINT NOT NULL,
  `nombres` VARCHAR(50) NOT NULL,
  `apellidos` VARCHAR(50) NOT NULL,
  `direccion` VARCHAR(60) NOT NULL,
  `ciudad` VARCHAR(30) NOT NULL,
  `celular` BIGINT NOT NULL,
  `fecha_nacimiento` DATE NOT NULL,
  `genero` ENUM('Masculino', 'Femenino') NOT NULL,
  `estado` ENUM('Activo', 'Inactivo') NOT NULL,
  PRIMARY KEY (`idpacientes`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `odontologia`.`Consultas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `odontologia`.`Consultas` (
  `idConsultas` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATE NOT NULL,
  `tipo` ENUM('Odontología General', 'Prevención en Odontología', 'Prótesis total', 'Prótesis fija', 'Prótesis removible', 'Implantes dentales') NOT NULL,
  `observacion` TEXT NOT NULL,
  `valor` DOUBLE NOT NULL,
  `estado` ENUM('Activo', 'Inactivo') NOT NULL,
  `odontologo` INT NOT NULL,
  `paciente` INT NOT NULL,
  PRIMARY KEY (`idConsultas`),
  INDEX `fk_odontologos_consultas` (`odontologo` ASC),
  INDEX `fk_pacientes_consultas` (`paciente` ASC),
  CONSTRAINT `fk_consultas_odontologos`
    FOREIGN KEY (`odontologo`)
    REFERENCES `odontologia`.`odontologos` (`idodontologos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_consultas_pacientes`
    FOREIGN KEY (`paciente`)
    REFERENCES `odontologia`.`pacientes` (`idpacientes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
