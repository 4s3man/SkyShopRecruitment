run:
	docker-compose up -d --build && \
	docker container exec -t kuba_skyshop_recruitment composer install && \
	make tests && \
	docker container exec -it kuba_skyshop_recruitment bash

tests:
	docker container exec -t kuba_skyshop_recruitment php ./vendor/bin/phpunit