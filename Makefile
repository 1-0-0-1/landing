build:
	docker-compose build
pull:
	docker-compose pull
start:
	docker-compose up -d
stop:
	docker-compose down --remove-orphans
restart:
	make stop && make start


