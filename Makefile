up:
	docker-compose up -d
stop:
	docker-compose stop

migrate:
	docker-compose run --rm backend yii migrate
seed:
	docker-compose run --rm backend yii seed/index
install:
	docker-compose run --rm backend composer install
init:
	docker-compose run --rm backend php /app/init

ide:
	php yii ide-helper/generate

