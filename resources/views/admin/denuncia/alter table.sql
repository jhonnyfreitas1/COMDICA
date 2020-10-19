alter table 
  `dados_gerais` 
add 
  constraint `dados_gerais_respfinalizar_foreign` foreign key (`respFinalizar`) references `resp_finalizar` (`id`) on delete cascade;


ALTER TABLE `dados_gerais` ADD CONSTRAINT `dados_gerais_respfinalizar_foreign` 
FOREIGN KEY (`respFinalizar`) REFERENCES `resp_finalizar` (`id`) on delete cascade;