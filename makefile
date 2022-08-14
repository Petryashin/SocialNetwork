#!/usr/bin/make

SHELL = /bin/bash

phpstan: ## Run PHPStan
	./vendor/bin/phpstan analyse app

up: ## Run docker containers
	docker-compose up -d
