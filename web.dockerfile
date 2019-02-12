FROM php:7.2-fpm

RUN apt-get update && apt-get install -y composer

#Configurations supplémentaires à fournir pour laravel
#Voir https://hub.docker.com/r/lorisleiva/laravel-docker/dockerfile ?