# build options
# install project
install: vendor/autoload.php

vendor/autoload.php:
	docker-compose exec php composer install

# docker-compose command helpers
.PHONY: up
# up containers
up:
	docker-compose up -d

.PHONY: down
# down containers
down:
	docker-compose down

.PHONY: run
# run bash to php container
run:
	docker-compose exec php /bin/bash

.PHONY: test
# running tests
test:
	docker-compose exec php vendor/bin/phpunit

.PHONY: watch-test
#running test watcher
watch-test:
	docker-compose exec php vendor/bin/phpunit-watcher watch