install:
	docker-compose down
	docker-compose build
	docker-compose up -d
	docker-compose run --rm fpm_php composer install
	docker-compose run --rm fpm_php php artisan migrate
	docker-compose run --rm fpm_php chmod -R 777 ./storage
rebuild:
	docker-compose down
	docker-compose build
	docker-compose up -d
chmod:
	sudo chmod -R 777 ./laravel

phpcli:
	docker exec -it fpm_php bash

nodecli:
	docker exec -it node bash
