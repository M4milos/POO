create schema if not exists POO;
USE POO;


create table IF NOT EXISTS `POO`.`estado`(
	`id_estado` INT(11) NOT NULL AUTO_INCREMENT,
    `nome_estado` VARCHAR(45) DEFAULT NULL,
    `sigla` VARCHAR(45) DEFAULT NULL,
    PRIMARY KEY (`id_estado`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table IF NOT EXISTS `POO`.`cidade`(
	`id_cidade` INT(11) NOT NULL AUTO_INCREMENT,
    `nome_cidade` VARCHAR(45) DEFAULT NULL,
    `id_estado` INT(11) DEFAULT NULL,
    PRIMARY KEY (`id_cidade`),
    KEY `fk_estado_cidade_idx` (`id_estado`),
	CONSTRAINT `fk_estado_cidade` FOREIGN KEY (`id_estado`) 
	REFERENCES `estado` (`id_estado`) 
	ON DELETE NO ACTION 
	ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into estado values ('', 'Santa Catarina', 'SC');
insert into estado values ('', 'Rio Grande do Sul', 'RS');
insert into estado values ('', 'Paraná', 'PR');

insert into cidade values ('', 'Rio do Sul', '1');
insert into cidade values ('', 'Porto Alegre', '2');
insert into cidade values ('', 'Curitiba', '3');