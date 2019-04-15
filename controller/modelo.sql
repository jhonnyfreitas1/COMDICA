
drop database if exists comdica;
	create database if not exists comdica;
	
    use comdica;

	CREATE TABLE `users` (
	 `id` int(11) NOT NULL AUTO_INCREMENT,
	 `name` varchar(255) NOT NULL,
	 `email` varchar(100) NOT NULL,
	 `password` varchar(255) NOT NULL,
	 `admin` boolean default null,
     PRIMARY KEY (`id`)
	);

		CREATE TABLE `posts` (
		 `id` int(11) NOT NULL AUTO_INCREMENT,
		 `user_id` int(11) NOT NULL,
		 `nome_post` varchar(200) NOT NULL,
		 `descricao_post` text NOT NULL,
		 `imagem` varchar(100) NOT NULL,
		 `categoria` enum('Post educativo', 'Tutorial', 'Notícias', 'Vídeos', 'Entrevistas', 'Pesquisas','Atas') NOT NULL,
		 PRIMARY KEY (`id`),
		 CONSTRAINT `pk_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
		);

			CREATE TABLE `avaliacoes` (
				`id` int not null AUTO_INCREMENT,
			  `user_id` int(11) NOT NULL,
			  `qnt_estrela` int(11) NOT NULL,
			  `ponto_id` int(11) NOT NULL,
			  `modified` datetime DEFAULT NULL,
			   PRIMARY KEY (id),
			   CONSTRAINT `pk_av_ponto` FOREIGN KEY (`ponto_id`) REFERENCES `pontos_turisticos` (`id`) ON DELETE CASCADE,
			   CONSTRAINT `pk_av_users` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`) 
		);

		CREATE TABLE imagens(
			img varchar(100) NOT NULL,
			imagens_id INT(11) NOT NULL AUTO_INCREMENT,
			post_id INT NOT NULL,
			PRIMARY KEY (imagens_id),
			CONSTRAINT fk_post FOREIGN KEY (post_id) REFERENCES posts (id)
			ON DELETE CASCADE
		);

