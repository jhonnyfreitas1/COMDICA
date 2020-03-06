-- convert Laravel migrations to raw SQL scripts --

-- migration:2014_10_11_140953_create_tipos_users_table --
create table `tipos_users` (
  `id` int unsigned not null auto_increment primary key, 
  `name` varchar(255) not null, 
  `created_at` timestamp null, 
  `updated_at` timestamp null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';

-- migration:2014_10_12_000000_create_users_table --
create table `users` (
  `id` bigint unsigned not null auto_increment primary key, 
  `name` varchar(255) not null, 
  `email` varchar(255) not null, 
  `email_verified_at` timestamp null, 
  `password` varchar(255) not null, 
  `tipo_user` int unsigned not null, 
  `remember_token` varchar(100) null, 
  `created_at` timestamp null, 
  `updated_at` timestamp null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table 
  `users` 
add 
  constraint `users_tipo_user_foreign` foreign key (`tipo_user`) references `tipos_users` (`id`) on delete cascade;
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
  `categoria` enum('1', '2', '3', '4', '5') not null, 
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
  `carne_id` varchar(255) not null, 
  `valor_parcelado` int null, 
  `doador_nome` varchar(255) not null, 
  `doador_cpf` varchar(255) not null, 
  `link_carne` varchar(255) not null, 
  `valor_total` varchar(255) not null, 
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
  `valor_parcelado` varchar(255) null, 
  `doador_nome` varchar(255) not null, 
  `doador_cpf` varchar(255) not null, 
  `doador_email` varchar(255) not null, 
  `code` int not null, 
  `link` varchar(255) not null, 
  `valor_total` varchar(255) not null, 
  `parcelas` int not null default '1', 
  `metodo_pagamento` enum('boleto', 'carne') not null, 
  `vencimento` varchar(255) not null, 
  `cod_barra` varchar(255) not null, 
  `data_pagamento` varchar(255) null, 
  `status` varchar(255) not null, 
  `created_at` timestamp null, 
  `updated_at` timestamp null, 
  `fk_id_carne` varchar(255) null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table 
  `doacao_boleto` 
add 
  constraint `doacao_boleto_fk_id_carne_foreign` foreign key (`fk_id_carne`) references `doacao_carne` (`carne_id`) on delete cascade;

-- migration:2019_07_16_040944_create_tokens_table --
create table `tokens` (
  `paymentToken` varchar(255) not null, 
  `chargeReference` varchar(255) null, 
  `chargeCode` varchar(255) not null, 
  `created_at` timestamp(1) null, 
  `updated_at` timestamp(1) null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table 
  `tokens` 
add 
  primary key `tokens_paymenttoken_primary`(`paymentToken`);

-- migration:2019_08_30_232225_create_contatos_table --
create table `contatos` (
  `id` bigint unsigned not null auto_increment primary key, 
  `usuario_mensagem` varchar(255) not null, 
  `usuario_nome` varchar(255) not null, 
  `usuario_email` varchar(255) null, 
  `usuario_telefone` varchar(255) null, 
  `visto` tinyint(1) not null default '0', 
  `contato_assunto` enum(
    'reclamacao', 'duvida', 'sugestao'
  ) not null, 
  `created_at` timestamp null, 
  `updated_at` timestamp null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';

-- migration:2019_10_02_140015_create_code_reference_payment --
create table `code_reference_payment` (
  `id` bigint unsigned not null auto_increment primary key, 
  `link_recibo` varchar(255) not null, 
  `codigo_verificacao` varchar(255) not null, 
  `cod_boleto` int not null, 
  `metodo_pagamento` enum('boleto', 'carne') not null, 
  `created_at` timestamp null, 
  `updated_at` timestamp null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';

-- migration:2019_12_04_191653_create_resp_gerals_table --
create table `resp_gerals` (
  `id` int unsigned not null auto_increment primary key, 
  `name` varchar(255) null, 
  `gender` enum('F', 'M') null, 
  `ethnicity` enum(
    'Branco', 'Pardo', 'Negro', 'Indígena'
  ) null, 
  `pregnant` tinyint(1) null, 
  `responsible` varchar(255) null, 
  `locality` enum(
    'Centro', 'Quinze', 'Bom Jesus', 'Vila de Itapipireh', 
    'Nova Araçoiaba', 'Boa Esperança', 
    'Loteamento Hildebrando', 'Purgatorio', 
    'Distrito Canaã', 'Engenho Vinagre', 
    'Loteamento São Miguel Arcanjo', 
    'Loteamento Santa Helena', 'Residencia Flores', 
    'Loteamento Boa Esperança'
  ) null, 
  `street` varchar(255) null, 
  `complement` varchar(255) null, 
  `residence` int null, 
  `number` varchar(255) null, 
  `deficient` tinyint(1) null, 
  `created_at` timestamp null, 
  `updated_at` timestamp null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';

-- migration:2019_12_04_191756_create_resp_ocorrencias_table --
create table `resp_ocorrencias` (
  `id` int unsigned not null auto_increment primary key, 
  `occurrence` enum(
    'Residencia', 'Habitação Coletiva', 
    'Escola', 'Local de Prática Esportiva', 
    'Bar/Similar', 'Via Pública', 'Comércio/Serviços', 
    'Indústria/Construção', 'Outros'
  ) null, 
  `otherOcurrence` tinyint(1) null, 
  `autoProvocated` tinyint(1) null, 
  `created_at` timestamp null, 
  `updated_at` timestamp null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';

-- migration:2019_12_04_191809_create_resp_violencias_table --
create table `resp_violencias` (
  `id` int unsigned not null auto_increment primary key, 
  `violence` enum(
    'Física', 'Psicológica/Mental', 
    'Tortura', 'Sexual', 'Tráfico de Seres Humanos', 
    'Financeira/Econômica', 'Negligência/Abandono', 
    'Trabalho Infantil', 'Intervenção Legal', 
    'Outros'
  ) null, 
  `agression` enum(
    'Força Corporal/Espancamento', 
    'Enforcamento', 'Objeto Contudente', 
    'Objeto Perfúro-Cortante', 'Objeto Susbtância/Objeto Quente', 
    'Envenenamento', 'Arma de Fogo', 
    'Ameaça', 'Outros'
  ) null, 
  `consOcurrence` enum(
    'Aborto', 'Gravidez', 'DST', 'Tentativa de Suicídio', 
    'Transtorno Mental', 'Transtorno Comportamental', 
    'Estresse Pós-Traumático', 'Outros'
  ) null, 
  `violenceType` enum(
    'Assédio Sexual', 'Atentado Violento ao Pudor', 
    'Estupro', 'Exploração Sexual', 
    'Outros'
  ) null, 
  `penetration` tinyint(1) null, 
  `penetrationType` enum('Anal', 'Vaginal', 'Oral') null, 
  `created_at` timestamp null, 
  `updated_at` timestamp null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';

-- migration:2019_12_04_191825_create_resp_lesaos_table --
create table `resp_lesaos` (
  `id` int unsigned not null auto_increment primary key, 
  `nature` enum(
    'Contusão', 'Corte/Perfuração/Laceração', 
    'Entorse/Luxação', 'Fratura', 
    'Amputação', 'Traumatismo Dentário', 
    'Traumatismo Crâniano-Encefálico', 
    'Politraumatismo', 'Intoxicação', 
    'Queimadura', 'Outros'
  ) null, 
  `bodyPart` enum(
    'Cabeça/Rosto', 'Pescoço', 'Boca/Dentes', 
    'Coluna/Medula', 'Tórax/Dorso', 
    'Abdomên', 'Quadril/Pelve', 'Membros Superiores', 
    'Membros Inferiores', 'Órgãos Genitais/Ãnus', 
    'Múltiplos Órgãos/Regiões'
  ) null, 
  `created_at` timestamp null, 
  `updated_at` timestamp null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';

-- migration:2019_12_04_191835_create_resp_agressors_table --
create table `resp_agressors` (
  `id` int unsigned not null auto_increment primary key, 
  `agressorNumber` int null, 
  `agressorGender` enum(
    'Masculino', 'Feminino', 'Ambos os Sexos', 
    'Outros'
  ) null, 
  `parent` enum(
    'Pai', 'Mãe', 'Padrasto', 'Madrasta', 
    'Cônjuge', 'Ex-Cônjuge', 'Namorado(A)', 
    'Ex-Namorado(A)', 'Filho(A)', 'Irmão(A)', 
    'Amigos/Conhecidos', 'Desconhecidos', 
    'Cuidador(A)', 'Patrão/Chefe', 
    'Pessoa com Relação Instituicional', 
    'Policial/Agente', 'Própria Pessoa', 
    'Outros'
  ) null, 
  `alcool` tinyint(1) null, 
  `created_at` timestamp null, 
  `updated_at` timestamp null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';

-- migration:2019_12_05_122503_create_dados_gerais_table --
create table `dados_gerais` (
  `id` int unsigned not null auto_increment primary key, 
  `hashDenun` varchar(255) null, 
  `respGeral` int unsigned not null, 
  `respOcorrencia` int unsigned not null, 
  `respViolencia` int unsigned not null, 
  `respLesao` int unsigned not null, 
  `respAgressor` int unsigned not null, 
  `created_at` timestamp null, 
  `updated_at` timestamp null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table 
  `dados_gerais` 
add 
  constraint `dados_gerais_respgeral_foreign` foreign key (`respGeral`) references `resp_gerals` (`id`) on delete cascade;
alter table 
  `dados_gerais` 
add 
  constraint `dados_gerais_respocorrencia_foreign` foreign key (`respOcorrencia`) references `resp_ocorrencias` (`id`) on delete cascade;
alter table 
  `dados_gerais` 
add 
  constraint `dados_gerais_respviolencia_foreign` foreign key (`respViolencia`) references `resp_violencias` (`id`) on delete cascade;
alter table 
  `dados_gerais` 
add 
  constraint `dados_gerais_resplesao_foreign` foreign key (`respLesao`) references `resp_lesaos` (`id`) on delete cascade;
alter table 
  `dados_gerais` 
add 
  constraint `dados_gerais_respagressor_foreign` foreign key (`respAgressor`) references `resp_agressors` (`id`) on delete cascade;

-- migration:2020_02_09_154524_create_imgs_insts_table --
create table `imgs_insts` (
  `img_id` int unsigned not null auto_increment primary key, 
  `imagem_princ` varchar(255) not null, 
  `imagem_sec` varchar(255) not null, 
  `imagem_ter` varchar(255) not null, 
  `imagem_qua` varchar(255) not null, 
  `created_at` timestamp null, 
  `updated_at` timestamp null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';

-- migration:2020_02_09_154525_create_instituicoes_table --
create table `instituicoes` (
  `id` int unsigned not null auto_increment primary key, 
  `name` varchar(255) not null, 
  `visao` varchar(255) not null, 
  `valor` varchar(255) not null, 
  `missao` varchar(255) not null, 
  `inst_img` int unsigned not null, 
  `created_at` timestamp null, 
  `updated_at` timestamp null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table 
  `instituicoes` 
add 
  constraint `instituicoes_inst_img_foreign` foreign key (`inst_img`) references `imgs_insts` (`img_id`) on delete cascade;

-- migration:2020_03_01_152152_create_anexos_pdf_postagem --
create table `anexos_pdf_postagem` (
  `id` bigint unsigned not null auto_increment primary key, 
  `nome_pdf` varchar(255) not null, 
  `src_pdf` varchar(255) not null, 
  `id_post` bigint unsigned not null, 
  `created_at` timestamp null, 
  `updated_at` timestamp null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table 
  `anexos_pdf_postagem` 
add 
  constraint `anexos_pdf_postagem_id_post_foreign` foreign key (`id_post`) references `postagens` (`id`) on delete cascade;
