.PHONY: start build test

start:
	docker build -t rabbitmq -f ./rabbitmq/Dockerfile .
	docker run --name rabbitmq -p 15672:15672 -d rabbitmq:latest

build:
	docker build -t app:latest -f ./Dockerfile .

test:
	docker run -p 8000:8000 --rm app:latest