.PHONY : main build-image build-container start test shell stop clean
main: build-image build-container

build-image:
	docker build -t prueba-kata-php .

build-container:
	docker run -dt --name prueba-kata-php -v .:/540/Boilerplate prueba-kata-php
	docker exec prueba-kata-php composer install

start:
	docker start prueba-kata-php

test: start
	docker exec prueba-kata-php ./vendor/bin/phpunit tests/$(target)

shell: start
	docker exec -it prueba-kata-php /bin/bash

stop:
	docker stop prueba-kata-php

clean: stop
	docker rm prueba-kata-php
	rm -rf vendor
