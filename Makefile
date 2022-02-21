## DOCKER GLOBAL COMMANDS
build:
	cd docker/ && docker-compose build

start:
	cd docker/ && docker-compose up -d --build

stop:
	cd docker/ && docker-compose down --remove-orphans

first-install:
	docker exec php8-container /bin/bash -c "cd /var/www/symfony && composer install && bin/console doctrine:database:create && bin/console doctrine:migration:migrate && bin/console populate-news"