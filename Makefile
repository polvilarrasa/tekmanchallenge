.PHONY:

setup:
	docker-compose exec php composer install

	php bin/console doctrine:fixtures:load

test-application:
	docker-compose exec php ./vendor/bin/phpunit tests/TekmanCandidate/Application

test-integration:
	docker-compose exec php ./vendor/bin/phpunit tests/TekmanCandidate/Integration

test-unit:
	docker-compose exec php ./vendor/bin/phpunit tests/TekmanCandidate/Unit

test:
	docker-compose exec php ./vendor/bin/phpunit
