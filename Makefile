# vim: set tabstop=8 softtabstop=8 noexpandtab:
phpstan:
	docker run --rm -it -w=/app -v ${PWD}:/app oskarstark/phpstan-ga:0.12.86 analyse src/ --level=7

cs:
	symfony composer install
	symfony php vendor/bin/php-cs-fixer fix --diff --diff-format=udiff --verbose

test:
	symfony php vendor/bin/phpunit -v
