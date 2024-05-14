.PHONY: build start stop 

build:
	docker build -t rabbitmq:latest -f ./rabbitmq/Dockerfile ./rabbitmq
	docker build -t app:latest -f ./Dockerfile .

start:
	docker compose up -d

stop:
	docker compose down
