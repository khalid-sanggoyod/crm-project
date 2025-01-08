# CRUD Operations Backend

## Description

This CRUD (Create, Read, Update, Delete) backend application provides a user interface to interact with a backend API for managing data. It allows developers to perform operations such as creating new records, reading existing data, updating records, and deleting entries. The backend is designed to offer a seamless experience for managing data effectively.

## Prerequisites

Before you proceed with the project setup, make sure you have the following prerequisites installed on your system:


- Check if PHP 8.1 or a higher version is installed by running:
```bash
php --version
```

- If PHP 8.1+ is not installed, install it based on your operating system. For example, on Ubuntu:
```bash
sudo apt-get install php8.1
```

- install [composer] -> https://getcomposer.org/
    
For Windows or macOS, refer to the official PHP downloads page: https://www.php.net/downloads.php.

## Installation:

1. Open the terminal in your root directory (abc-app) & to install the composer packages run the following command:  
```bash
composer install
```

2. In the root directory, you will find a file named .env.example rename the given file name to .env and run the following command to generate the key and update the DB_DATABASE with your database
```bash
php artisan migrate
```

3.  To serve the application you need to run the following command in the project directory. (This will give you an address with port number 8000)
Now navigate to the given address you will see your application is running.
```bash 
php artisan serve
```