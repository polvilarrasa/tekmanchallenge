.PHONY:

setup:
	docker-compose exec php composer install

test-e2e:
	docker-compose exec php ./vendor/bin/phpunit tests/TekmanCandidate/E2E

test-integration:
	docker-compose exec php ./vendor/bin/phpunit tests/TekmanCandidate/Integration

test-unit:
	docker-compose exec php ./vendor/bin/phpunit tests/TekmanCandidate/Unit

test:
	docker-compose exec php ./vendor/bin/phpunit
