## Tools
#### Docker
- visit "[https://www.docker.com](https://www.docker.com)
#### make
- for linux : use the package manager
- for windows : visit [https://gnuwin32.sourceforge.net/packages/make.htm](https://gnuwin32.sourceforge.net/packages/make.htm)

## Docker Setup
- build : `make build`
- up the services : `make up`
- stop the services : `make down`
- restart the services : `make restart`
- execute shell commands inside the app container : `make sh`
- execute laravel tests : `make test`
- copy laravel vendor to ./src/vendor : `make cp-vendor`

## DB Setup
- For MYSQL :
    1. edit `docker/configs/mysql/dump/*.sql`
    2. run `make restart`
- For PGSQL :
    1. edit `docker/configs/mysql/dump/*.sql`
    2. run `make restart`

## Laravel env Setup
- edit `docker/configs/laravel/.env`

## Run Laravel
- go to http://localhost:82

## Run PMA (Mysql)
- go to http://localhost:8080
- User : `root`
- Password : `root`

## Run Adminer (PostgreSQL)
- For MYSQL :
    - go to http://localhost:8080
    - System : `MySql`
    - Server : `mysql-db`
    - User : `root`
    - Password : `root`
    - Database : `app_db` or `app_db_test`
- For PGSQL :
    - go to http://localhost:8080
    - System : `PostgreSQL`
    - Server : `pgsql-db`
    - User : `postgres`
    - Password : `root`
    - Database : `app_db` or `app_db_test`
