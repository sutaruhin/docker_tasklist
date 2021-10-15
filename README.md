# tasklist_docker

## Dockerインストール手順
https://docs.google.com/spreadsheets/d/1R3pFaqo-VWrm8gDpZO9blGvJ7Hvqw7J4/edit?usp=sharing&ouid=112477833990928541919&rtpof=true&sd=true

docker network create shared-nw201 --subnet=192.168.201.0/24 --gateway=192.168.201.1
docker-compose build
docker-compose up -d

# webサーバへログイン
docker exec -it laravel_apache_php /bin/bash composer update 

exit	
	
	
	
# DBサーバへ入ること	
docker exec -it laravel_mysql /bin/bash 
cd /home/mysql	
	
mysql -u root -p	
root入力する	
mysql> create database XXXX;	
	
	
Query OK, 0 rows affected (0.00 sec)	
	
exit	
