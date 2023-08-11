service_name=app-test

# build
build:
	docker compose -f docker\docker-compose.yml build

# run the services
up:
	docker compose -f docker\docker-compose.yml up -d

# down the services
down:
	docker compose -f docker\docker-compose.yml down

# restart the services
restart: down up

# go inside the $(service_name) container
sh:
	docker compose -f docker\docker-compose.yml exec $(service_name) sh

# test the $(service_name)
test:
	docker compose -f docker\docker-compose.yml exec -T $(service_name) sh -c 'php artisan test --env .env.testing'

# copy vendor
cp-vendor:
	docker compose -f docker\docker-compose.yml cp $(service_name):/var/www/html/vendor src
