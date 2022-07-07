#!/usr/bin/make

SHELL = /bin/bash

phpstan: ## Run PHPStan
	./vendor/bin/phpstan analyse app
