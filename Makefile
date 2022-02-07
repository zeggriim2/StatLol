.PHONY: composer-install tests install fixtures database prepare tests phpstan php-cs-fixer composer-valid doctrine fix analyse

install:
	cp .env.dist .env.$(env).local
	sed -i -e 's/DATABASE_USER/$(db_user)/' .env.$(env).local
	sed -i -e 's/DATABASE_PASSWORD/$(db_password)/' .env.$(env).local
	sed -i -e 's/ENV/$(env)/' .env.$(env).local
	composer-install
	make prepare env=$(env)

composer-install:
	composer install


database-dev:
	php bin/console doctrine:database:drop --if-exists --force --env=dev
	php bin/console doctrine:database:create --env=dev
	php bin/console doctrine:schema:update --force --env=dev

database-test:
	php bin/console doctrine:database:drop --if-exists --force --env=test
	php bin/console doctrine:database:create --env=test
	php bin/console doctrine:schema:update --force --env=test --no-interaction

database-migration-dev:
	php bin/console doctrine:database:drop --if-exists --force --env=dev
	php bin/console doctrine:database:create --env=dev
	php bin/console doctrine:migrations:migrate --env=dev --no-interaction

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

phpstan:
	php vendor/bin/phpstan analyse -c phpstan.neon src --level 7 --no-progress

test: ## Test Unitaire 
	php bin/phpunit --testdox

phpcs:
	php vendor/bin/phpcs

phpcbf:
	php vendor/bin/phpcbf