conf:
	sudo apt-get install php7.2 php7.2-mbstring php7.2-mysql php7.2-intl php7.2-xml composer
	#composer install --no-scripts comentando por enquanto jaja ativo depois do gerencianet
	sudo apt-get install mysql-server-5.7
	#$(MAKE) bd-conf

composer:
	composer install --no-scripts
	cp .env.example .env
	php artisan key:generate
	$(MAKE) bd-conf

renisson:
	git config user.email "renissonsilva"
	git config user.name "renissonx@gmail.com"
	sed -i 's/$username=.*/$username="renisson";/' controller/bd-conection.php
	sed -i 's/$password=.*/$password="renisson";/' controller/bd-conection.php
felipe:
	git config user.name "filipeandrev"
	git config user.email "filipe.andrev7@gmail.com"
	sed -i 's/$username=.*/$username="felipe";/' controller/bd-conection.php   #muda ai depois nao sei seu usuario do banco.
	sed -i 's/$password=.*/$password="felipe";/' controller/bd-conection.php

jhonny:
	git config user.email "jhonnyfarias87@gmail.com"
	git config user.name "jhonnyfreitas1"
	sed -i 's/$username=.*/$username="root";/' controller/bd-conection.php
	sed -i 's/$password=.*/$password="jhonny522";/' controller/bd-conection.php
bd-renisson:

	mysql -u renisson -p < controller/modelo.sql
bd-jhonny: 
	mysql -u root -p < controller/modelo.sql

