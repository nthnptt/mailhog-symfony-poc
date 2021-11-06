.PHONY: up
up:
	docker-compose up -d

.PHONY: run
run:
	docker-compose exec php /bin/bash