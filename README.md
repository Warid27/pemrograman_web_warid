# SIM Akademik

[![forthebadge](http://forthebadge.com/images/badges/made-with-php.svg)](http://forthebadge.com)
[![forthebadge](http://forthebadge.com/images/badges/made-with-javascript.svg)](http://forthebadge.com)
[![forthebadge](http://forthebadge.com/images/badges/built-with-love.svg)](http://forthebadge.com)

Welcome to SIM Akademik, a simple CRUD app to manage academic system information with a login system using hashed passwords. This project is a school assignment and is intended to demonstrate a basic understanding of PHP, MySQLi, and web development.

## Getting Started

To get started, follow these steps:

1. Clone the repository: `https://github.com/Warid27/pemrograman_web_warid.git`
2. Set up the database:
	* Start XAMPP (Apache and MySQL).
	* Go to `http://localhost/phpmyadmin`.
	* Import the `.sql` file from the `database` folder (e.g., `academycs_db.sql`).
3. Run the app:
	* Put the project folder in `C:/xampp/htdocs/` (e.g., `htdocs/pemrograman_web_warid`).
	* Open your browser and go to `http://localhost/pemrograman_web_warid`.
	* Log in with a user from the database (passwords are hashed!).

## Features

* **Login System**: Multiuser login with secure hashed passwords.
* **CRUD**: Create, Read, Update, & Delete (Users / System Info).
* **Roles**: 
	+ `notsign` (guest)
	+ `operator` (basic user)
	+ `admin` (more control)
	+ `superadmin` (full control)
* **Light & Dark Mode**: Switch themes.
* **Alerts**: Pop-ups with SweetAlert2.
* **Text Editor**: Edit text with CKEDITOR.

## Tools Used

* **PHP**: Runs the app.
* **MySQLi**: Connects to the database.
* **Bootstrap**: Makes it look good.
* **JavaScript**: Adds cool stuff.
* **MySQL**: Stores everything.

## Help

If you encounter any issues or have questions, feel free to reach out to my teacher or friends. This is my first app, and I'm happy to help troubleshoot or provide guidance.

---

### Notes

* This README.md file provides an overview of the project, its features, and how to get started.
* The project is designed to be easy to use and understand, but if you have any questions or need further assistance, please don't hesitate to ask.
