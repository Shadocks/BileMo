# BileMo

## Scope
Exposed a number of APIs so that applications from other web platforms can perform operations.

### Project
Used Symfony (4.0) framework and the API Platform (api-platform/api-pack : 1.1) core librairie.

### Operations
- consult the list of BileMo products;
- consult the details of a BileMo product;
- consult the list of registered users linked to a client on the website;
- consult the details of a registered user linked to a client;
- add a new user linked to a customer;
- delete a user added by a customer.

## Local use
- Wampserver64 (PHP 7.1.9; MySQL 5.7.19; Apache 2.4.27; phpMyAdmin 4.7.4)
- Composer

## Run application
Composer :
- Install the project dependencies, `composer install`

Server PHP:
- In the CLI, move to the public folder `cd public` (ex: `cd wamp64\www\bilemo\public`)
- Enter the following command to launch the server: `php -S localhost:9800`
- Access the project via your browser: http://localhost:9800

Virtualhost Apache :
```apache
<VirtualHost *:80>
	RewriteEngine On
	RewriteCond %{HTTP:Authorization} ^(.*)
	RewriteRule .* - [e=HTTP_AUTHORIZATION:%1]
	ServerName BileMo
	DocumentRoot "c:/wamp64/www/projet/api-bilemo/public"
	<Directory  "c:/wamp64/www/projet/api-bilemo/public/">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Require local
		FallbackResource /index.php
	</Directory>
</VirtualHost>
```
## Configuration
Complete the `.env.dist` or create a copy and rename to `.env`.

### Database
Execute :
- `doctrine:database:create` Creates the configured datatbase
- `doctrine:schema:validate` Validate the mapping files
- `doctrine:schema:create` Executes the SQL needed to generate the database schema

Generate a dataset :
- `doctrine:fixture:load` Load data fixtures to your database

### First request
For question/test application you can use Postman or insomnia.

Documentation :
- Method : `GET`
- URL : `http://bilemo/api/docs`

You can access at others format in adding a `.` then extension (ex: `http://bilemo/api/docs.html`)

Available formats :
- jsonld
- json
- html
- xml
