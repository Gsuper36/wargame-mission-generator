include .makeenv

SHELL = /bin/sh

UID := $(shell id -u)
GID := $(shell id -g)

export APP_NAME 
export APP_PORT
export DB_USER
export DB_PASSWORD
export DB_PORT
export UID
export GID

all: help

help:
	@echo "up\ndown\nbuild\n"

up:
	docker-compose up -d --no-build

down:
	docker-compose down

build:
	docker-compose build
	@mkdir -p ./docker/postgres/dbdata
	@chown -R ${UID}:${GID} ./docker/postgres

init-project:
	@cp docker-compose.example.yml docker-compose.yml
	@cp .makeenv.example .makeenv
	@cp .env.example .env
	@echo "Copied docker-compose, .makeenv and .env"

init-app:
	@./composer install
	@./php key:generate
	@./php migrate --seed

sh-app:
	@docker-compose exec app /bin/sh

sh-db:
	@docker-compose exec db /bin/sh
