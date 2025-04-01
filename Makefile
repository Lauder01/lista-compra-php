.PHONY : main build-image build-container start test shell stop clean
main: build-image build-container

build-image:
	docker build -t lista-compra-php .

build-container:
	docker run -dt --name lista-compra-php -v .:/540/Boilerplate lista-compra-php
	docker exec lista-compra-php composer install

start:
	docker start lista-compra-php

test: start
	docker exec lista-compra-php ./vendor/bin/phpunit tests/$(target)

shell: start
	docker exec -it lista-compra-php /bin/bash

stop:
	docker stop lista-compra-php

clean: stop
	docker rm lista-compra-php
	rm -rf vendor
