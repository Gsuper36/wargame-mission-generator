#!/bin/bash

export $(grep -v '^#' .makeenv | xargs)

docker-compose exec app php artisan $@
