.PHONY: dev asset build cache remove

# Développement : watch en continu
dev:
	php bin/console cache:clear
	php bin/console asset-map:compile

asset:
	php bin/console asset-map:compile

build:
	php bin/console cache:clear
	php bin/console asset-map:compile
	
cache:
	php bin/console cache:clear

remove:
	rm -rf public/assets/