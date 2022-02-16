

## DOCKER GLOBAL COMMANDS
build:
	cd docker && docker-compose build

start:
	cd docker && docker-compose up -d

stop:
	cd docker && docker-compose down --remove-orphans


## DOCKER SYMFONY CONTAINER COMMANDS
first-install:
	docker exec -it php8-container /bin/bash
