drop database if exists comdica;
	create database if not exists comdica;
	
    use comdica;
    	
	CREATE TABLE `users` (
	 `id_user` int(11) NOT NULL AUTO_INCREMENT,
	 `name` varchar(255) NOT NULL,
	 `email` varchar(100) NOT NULL,
	 `password` varchar(255) NOT NULL,
	 `admin` boolean default NULL,
     PRIMARY KEY (`id_user`)
	);

	CREATE TABLE `posts` (
		 `id_post` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		 `user_id` int(11) NOT NULL,
		 `nome_post` varchar(200) NOT NULL,
		 `descricao_post` text NOT NULL,
		 `imagem` varchar(100) NOT NULL,
		 `categoria` enum('Post educativo', 'Tutorial', 'Notícia', 'Vídeo', 'Entrevista', 'Pesquisa','Ata','Evento') NOT NULL,
		 CONSTRAINT `pk_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`)
         ON DELETE CASCADE
		);

	CREATE TABLE 
    `doacoes_avulsas` (
			  `id_doa_av` int(11) not null primary key AUTO_INCREMENT,
              `doador` varchar(255) not null,
			  `valor` int(15) NOT NULL,
			  `metodo`  enum('boleto','cartao') NULL, 
              `data` DATETIME NOT NULL,
              `status` enum('pago','cancelado','aguardando pagamento','processando')
              );


     CREATE TABLE  `doacoes_imposto`(
		`id_doa_im` int not null primary key auto_increment,
        `doador` varchar(255) not null,
		`valor` int(15) NOT NULL, 
        `metodo` enum('boleto','cartao') not null, 
        `data` DATETIME NOT NULL,
		`status` enum('pago','cancelado','aguardando pagamento','processando') 
		);

		CREATE TABLE `imagens`(
			`img` varchar(100) NOT NULL,
			`imagens_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`fk_id_post` INT(11) NOT NULL,
			CONSTRAINT fk_post_id FOREIGN KEY (fk_id_post)
			REFERENCES posts (id_post)
		);
			INSERT INTO users(name,email,password,admin) values ('admin','comdica@admin','adminadmin',true);
