-- convert Laravel migrations to raw SQL scripts --

-- migration:2014_10_12_000000_create_users_table --
create table `users` (
  `id` bigint unsigned not null auto_increment primary key, 
  `name` varchar(255) not null, 
  `email` varchar(255) not null, 
  `email_verified_at` timestamp null, 
  `password` varchar(255) not null, 
  `remember_token` varchar(100) null, 
  `created_at` timestamp null, 
  `updated_at` timestamp null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table 
  `users` 
add 
  unique `users_email_unique`(`email`);

-- migration:2014_10_12_100000_create_password_resets_table --
create table `password_resets` (
  `email` varchar(255) not null, 
  `token` varchar(255) not null, 
  `created_at` timestamp null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table 
  `password_resets` 
add 
  index `password_resets_email_index`(`email`);

-- migration:2019_06_29_030732_create_postagens_table --
create table `postagens` (
  `id` bigint unsigned not null auto_increment primary key, 
  `titulo` varchar(255) not null, 
  `descricao` text not null, 
  `imagem_principal` varchar(255) not null, 
  `link_yt` varchar(255) null, 
  `pdf1` varchar(255) null, 
  `pdf2` varchar(255) null, 
  `user_id` bigint unsigned not null, 
  `created_at` timestamp null, 
  `updated_at` timestamp null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table 
  `postagens` 
add 
  constraint `postagens_user_id_foreign` foreign key (`user_id`) references `users` (`id`) on delete cascade;

-- migration:2019_06_29_030755_create_doacao_carne_table --
create table `doacao_carne` (
  `carne_id` int not null, 
  `valor_parcelado` int null, 
  `doador_nome` varchar(255) not null, 
  `link_carne` varchar(255) not null, 
  `valor_total` int not null, 
  `numero_parcelas` int not null, 
  `parcelas_pagas` int null, 
  `status` varchar(255) not null, 
  `created_at` timestamp null, 
  `updated_at` timestamp null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table 
  `doacao_carne` 
add 
  primary key `doacao_carne_carne_id_primary`(`carne_id`);

-- migration:2019_06_29_030857_create_doacao_boleto_table --
create table `doacao_boleto` (
  `id` bigint unsigned not null auto_increment primary key, 
  `valor_parcelado` int not null, 
  `doador_nome` varchar(255) not null, 
  `doador_cpf` varchar(255) not null, 
  `doador_email` varchar(255) not null, 
  `doador_telefone` varchar(255) not null, 
  `charger_id` int not null, 
  `link_boleto` varchar(255) not null, 
  `valor_total` decimal(4,2) not null, 
  `quantidade` int not null, 
  `parcelas` int not null default '1', 
  `metodo_pagamento` enum('boleto', 'carne') not null, 
  `vencimento` date not null, 
  `cod_barra` varchar(255) not null, 
  `status` varchar(255) not null, 
  `created_at` timestamp null, 
  `updated_at` timestamp null, 
  `fk_id_carne` int null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table 
  `doacao_boleto` 
add 
  constraint `doacao_boleto_fk_id_carne_foreign` foreign key (`fk_id_carne`) references `doacao_carne` (`carne_id`) on delete cascade;
