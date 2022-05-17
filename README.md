## Test Join Brands
Install Docker https://docs.docker.com/get-docker/


git clone https://github.com/folivera/test-join-brands.git

cd test-join-brands

composer install

cp .env.example .env

Establecer valores para las variables

DB_DATABASE=jb_db
DB_USERNAME=sail
DB_PASSWORD=password

alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'

sail up -d

sail artisan key:generate

#Obtener el nombre del contenedor de la BD
Docker ps

#Obtener la ip del contenedor de la BD y agregarla en la variable DB_HOST

docker inspect -f '{{range.NetworkSettings.Networks}}{{.IPAddress}}{{end}}' test-join-brands_mariadb_1


sail artisan migrate

- Create user 
http://localhost:8080/register

- Login user
http://localhost:8080/login

- Lost Password
http://localhost:8080/password/reset

- Change Password
Obtener link del log http://localhost:8080/password/reset/{token}?email=example@domain.org

- Change Email
http://localhost:8080/update-email

- List users
http://localhost:8080/users

- Set user Status ‘Active,suspended’
En la lista anterior dar clic en el icono para editar el status