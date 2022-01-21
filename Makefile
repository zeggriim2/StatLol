database-dev:
	php bin/console doctrine:database:drop --if-exists --force --env=dev
	php bin/console doctrine:database:create --env=dev
	php bin/console doctrine:schema:update --force --env=dev

database-test:
	php bin/console doctrine:database:drop --if-exists --force --env=test
	php bin/console doctrine:database:create --env=test
	php bin/console doctrine:schema:update --force --env=test

database-migration-dev:
	php bin/console doctrine:database:drop --if-exists --force --env=dev
	php bin/console doctrine:database:create --env=dev
	php bin/console doctrine:migrations:migrate --env=dev

database-migration-test:
	php bin/console doctrine:database:create --if-exists --force --env=test
	php bin/console doctrine:migrations:migrate --env=test

fixtures-test:
	php bin/console doctrine:fixtures:load -n --env=test

fixtures-dev:
	php bin/console doctrine:fixtures:load -n --env=dev

.PHONY: vendor
analyze:
	composer valid
	php bin/console doctrine:schema:valid --skip-sync
	php vendor/bin/phpcs
	php bin/console lint:twig templates/
	php vendor/bin/phpstan analyse -c phpstan.neon src --level 7 --no-progress


phpcs:
	php vendor/bin/phpcs

phpcbf:
	php vendor/bin/phpcbf