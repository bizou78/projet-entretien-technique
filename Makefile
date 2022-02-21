build:
	cd docker/ && docker-compose build

start:
	cd docker/ && docker-compose up -d --build

stop:
	cd docker/ && docker-compose down --remove-orphans

first-install:
	docker exec php8-container /bin/bash -c "composer install && bin/console d:d:c && bin/console d:m:m && bin/console populate-news"