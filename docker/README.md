# docker-lamp
# igi環境用 docker定義ファイル
#
#- Apache 2.4
#	- mod_rewrite
#	- GD
#- php 7.2
#- MySql 5.7
#- PhpMyAdmin
#
#  Produce by H.Suda (2020.12.01)
#
## Advance preparation

- [Docker Desktop](https://www.docker.com/products/docker-desktop)
- [Docker Compose](https://docs.docker.com/compose/install/)

## How to set up

```
$ cd docker-swallows
$ docker-compose build
$ docker-compose up
```
phpMyAdmin : [http://localhost:8088/]
web  : [http://localhost:8001/]

## Directory

```
igi-sales-docker
│
│  docker-compose.yml
│  README.md
│  
├─docker
│  ├─db
│  │  │  Dockerfile
│  │  │  my.cnf
│  │  │  
│  │  └─mysql_data
│  ├─logs
│  │      
│  └─web
│      │  Dockerfile
│      │  php.ini
│      │  .env(igi-salesへ複写しお使いください)
│      └─etc_apche2
│          │  ports.conf
│          │  
│          └─sites-available
│                  000-default.conf
│                  base.conf
│                  
└─igi-sales
         (ここは各自git cloneすること）
```

##　操作手順
docker network create shared-nw201 --subnet=192.168.201.0/24 --gateway=192.168.201.1
docker-compose build;
docker-compose up -d  
--- 参考 ---------------------------------------
- database host : mysql
- database user : root
- database pass : root
- database port : 3306

## データベース作成手順
DBサーバへ入ること

# cd /home/mysql
# ls
igi_mysql_dump_20201117.sql
# mysql -u root -h mysql-igi -p
Enter password:
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 23
Server version: 5.6.50 MySQL Community Server (GPL)

Copyright (c) 2000, 2020, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.
mysql> create database sales;
mysql> use sales;
mysql> source igi_mysql_dump_20201117.sql;
Query OK, 0 rows affected (0.00 sec)

exit

## 2.mysqlAdmin へ入り　パスワード変更
https://i.gyazo.com/65302f9ef3db31d648b9f021a21824e3.png


## .env 変更
DB_CONNECTION=mysql
DB_HOST=mysql-igi
DB_PORT=3306
DB_DATABASE=sales
DB_USERNAME=root
DB_PASSWORD=root

## 補足
※再実行時の削除は下記コマンドで一括削除を行ってからお進みください
docker-compose down --rmi all --volumes
#イメージ再作成です
 docker-compose build --no-cache
 docker-compose up -d
# Linux 接続
docker exec -it igi_apache_php bash
docker ps
