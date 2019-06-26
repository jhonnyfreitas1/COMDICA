drop database if exists comdica;
create database if not exists comdica;
	
use comdica;    	

CREATE TABLE `users` (
`id_user` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(255) NOT NULL,
`email` varchar(100) NOT NULL,
`password` varchar(255) NOT NULL,
`admin` boolean default NULL,
`created_at` timestamp,
`verified_at` date default NULL,
PRIMARY KEY (`id_user`)
);
CREATE TABLE `password_reset` (
`user_email`varchar(191) not null,
`token` varchar(191) not null,
`created_at` timestamp not null
);

CREATE TABLE `posts` (
`id_post` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`user_id` int(11) NOT NULL,
`nome_post` varchar(200) NOT NULL,
`descricao_post` text NOT NULL,
`imagem` varchar(100) NOT NULL,
`link_yt` varchar(2048),
`pdf` varchar(100),
`pdf2` varchar(100),
`created_at` timestamp,
CONSTRAINT `pk_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`)
ON DELETE CASCADE
);

CREATE TABLE `doacoes_carne` (
`carnet_id` int(11)  primary key,
`doador_nome` varchar(255) not null,
`valor_total` int not null,
`valor_parcelado` int(15) not null,
`link` varchar(191) NOT NULL,
`numero_parcelas`  int not null, 
`created_at` timestamp not null,
`status` VARCHAR(20) not null
);
CREATE TABLE  `doacoes_imposto`(
`id_doacao` int not null primary key auto_increment,
`valor_parcelado` int(15),
`doador_nome` varchar(255) not null,
`doador_cpf` varchar(14) not null,
`doador_telefone` varchar(16) NOT NULL,
`doador_email` varchar(255) NOT NULL,
`num_transacao` int NOT NULL,
`link_boleto` varchar(255) NOT NULL,
`valor_total` int(15) NOT NULL, 
`quantidade` int NOT NULL,
`parcelas` int NOT NULL,
`parcelas_pagas` int,
`metodo_pagamento` enum('boleto','carne') NOT NULL, 
`vencimento` date NOT NULL,
`fk_carnet_id` int ,
`data_criacao` timestamp,
`cod_barra` varchar(255) NOT NULL,
`status` varchar(50) NOT NULL,
CONSTRAINT `pk_carnet` FOREIGN KEY (`fk_carnet_id`) REFERENCES `doacoes_carne` (`carnet_id`)
ON DELETE CASCADE
);
INSERT INTO users(name,email,password,admin) values ('admin','comdica@admin','$2y$10$LzMSd7SBEaNlv.H4m86MYu0IQefyFpRQa/TWBDS12nfiq6cORaZ6O',true);
