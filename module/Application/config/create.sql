SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `zf2_angular` DEFAULT CHARACTER SET latin1 ;
USE `zf2_angular` ;

-- -----------------------------------------------------
-- Table `zf2_angular`.`categorias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `zf2_angular`.`categorias` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zf2_angular`.`produtos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `zf2_angular`.`produtos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(255) NOT NULL ,
  `descricao` TEXT NOT NULL ,
  `categoria_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_produtos_categorias` (`categoria_id` ASC) ,
  CONSTRAINT `fk_produtos_categorias`
    FOREIGN KEY (`categoria_id` )
    REFERENCES `zf2_angular`.`categorias` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
