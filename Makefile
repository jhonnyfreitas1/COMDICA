conf:
	sudo apt-get install php7.2 php7.2-mbstring php7.2-mysql php7.2-intl php7.2-xml composer
	composer install --no-scripts
	cp .env.example .env
	php artisan key:generate
	sudo apt-get install mysql-server-5.7
	$(MAKE) bd-conf
composer:
	composer install --no-scripts
	cp .env.example .env
	php artisan key:generate
	$(MAKE) bd-conf

conf-git-jhonny:
	git config user.email "jhonnyfarias87@gmail.com"
	git config user.name "jhonnyfreitas1"

conf-git-reni:
	git config user.email "renissonx@gmail.com"
	git config user.name "renissonsilva"

bd-conf:
	mysql -u jhonny -p --execute="drop database if exists comdica; create database comdica; drop user if exists 'comdica'; create user 'comdica' identified by 'comdica'; grant all privileges on comdica.* to 'comdica';"
	sed -i 's/DB_DATABASE.*/DB_DATABASE=comdica/' .env
	sed -i 's/DB_USERNAME.*/DB_USERNAME=comdica/' .env
	sed -i 's/DB_PASSWORD.*/DB_PASSWORD=comdica/' .env	
	sed -i 's/MAIL_HOST.*/MAIL_HOST=smtp.gmail.com/' .env
	# sed -i 's/MAIL_PORT.*/MAIL_PORT=587/' .env
	# sed -i 's/MAIL_USERNAME.*/MAIL_USERNAME=suporte.cticifpe@gmail.com/' .env
	# sed -i 's/MAIL_PASSWORD.*/MAIL_PASSWORD=suporte.ctic2019/' .env
	sed -i 's/MAIL_ENCRYPTION.*/MAIL_ENCRYPTION=tls/' .env
	php artisan migrate:refresh --seed
