# docker-compose command helpers
.PHONY: up
up:
	docker-compose up -d

.PHONY: down
down:
	docker-compose down

.PHONY: run
run:
	docker-compose exec php /bin/bash

.PHONY: test
test:
	docker-compose exec php vendor/bin/phpunit

.PHONY: watch-test
watch-test:
	docker-compose exec php vendor/bin/phpunit-watcher watch