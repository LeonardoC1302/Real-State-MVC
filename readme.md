# Real State Website 
## Project Description
This is a fully functional web development project designed for property listing, blog posts and an easy to use admin panel to manage the database. The project is built using web development technologies like HTML, CSS, JavaScript, PHP and MySQL. It also implements Object Oriented Programming concepts in PHP and the MVC architecture.

## Getting Started
- Ensure you have PHP 8.0 or higher installed on your local machine. You can check your PHP version by running the following command in your terminal:
``` bash
php -v
```
- You will also need to have MySQL installed on your local machine. You can check your MySQL version by running the following command in your terminal:
``` bash
mysql --version
```
- Composer is required to install the PHP dependencies. You can check if you have composer installed by running the following command in your terminal:
``` bash
composer --version
```

- You will also need to have npm installed on your local machine. You can check your npm version by running the following command in your terminal:
``` bash
npm --version
```

## Installation and Usage
1. Clone this repository into your local machine:
``` bash
git clone https://github.com/LeonardoC1302/Real-State.git
```
2. Create a new database named "realstate_crud" on your local machine and use the "db_script.sql" file to create the tables and populate the database.
3. Head to the "includes/config" folder and create a new file named ".env". Fill the file with the following code:
```
DB_HOST = 
DB_USER = 
DB_PASS = 
DB_NAME = 

EMAIL_HOST = 
EMAIL_PORT = 
EMAIL_USER = 
EMAIL_PASS = 
```
*Fill the variables with your database and email credentials.
4. Install the dependencies using composer:
``` bash
composer install
```
5. Install the dependencies using npm:
``` bash
npm install
```
6. Run gulp to compile the sass files:
``` bash
npx gulp
```
7. Run the project on your local machine:
``` bash
php -S localhost:3000
```

## Technologies Used
- HTML
- CSS (SASS)
- JavaScript
- PHP
- MySQL
- Mailtrap
- Composer & Gulp

## Features
- User login and authentication: Users registered in the database can access the admin panel. Permissions are managed so the admin panel is only accessible when the user logs in.
- Admin panel to manage the database: The admin panel allows the user to add, edit and delete properties and sellers. 
- Property listing: The website displays the properties available in the database for the users to browse.
- Contact form: The website has a contact form that allows users to send messages to the admin. Mailtrap is used to test the contact form.

## Project Screenshots
### Home Page
![alt text](/assets/images/realstate.png)
### Admin Panel
![alt text](/assets/images/adminPanel.png)
