

## DOCKER GLOBAL COMMANDS
build:
	cd docker && docker-compose build

start:
	cd docker && docker-compose up -d --build

stop:
	cd docker && docker-compose down --remove-orphans


## DOCKER SYMFONY CONTAINER COMMANDS
install:
	docker exec php8-container composer install

db:
    docker exec php8-container bin/console d:d:c

migration:
    docker exec php8-container bin/console d:m:m

import:
    docker exec php8-container bin/console populate-news

install-full:
    docker exec php8-container sh composer install && bin/console d:d:c && bin/console d:m:m && bin/console populate-news