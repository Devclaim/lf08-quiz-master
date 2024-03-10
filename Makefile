up:
	docker-compose up
down:
	docker-compose down
restart:
	docker-compose restart
build-image:
	docker-compose up --build
install:
	docker-compose run composer install
test:
	docker-compose run phpunit tests/TestTest.php
lint:
	docker-compose run phpstan analys src tests
