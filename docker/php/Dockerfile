#イメージのベースを指定
FROM php:7.4-fpm

#composerのインストール
COPY --from=composer:1.10 /usr/bin/composer /usr/bin/composer

#php.iniの作成
COPY php.ini /usr/local/etc/php/ 

#npmのインストール
COPY --from=node:10.22 /usr/local/bin /usr/local/bin
COPY --from=node:10.22 /usr/local/lib /usr/local/lib

#パッケージ管理ツールapt-getの更新と必要パッケージのインストール
RUN apt-get update \
&& apt-get install -y \
&& apt-get install -y locales \
&& locale-gen ja_JP.UTF-8 \
&& echo "export LANG=ja_JP.UTF-8" >> ~/.bashrc\
git \
zip \
unzip \
&& docker-php-ext-install pdo_mysql bcmath

WORKDIR /var/www/html

#コンテナ内に入った時のディレクトリを指定
WORKDIR /var/www/html