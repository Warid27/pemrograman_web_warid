# SIM Akademik

[![forthebadge](http://forthebadge.com/images/badges/made-with-php.svg)](http://forthebadge.com)
[![forthebadge](http://forthebadge.com/images/badges/made-with-javascript.svg)](http://forthebadge.com)
[![forthebadge](http://forthebadge.com/images/badges/built-with-love.svg)](http://forthebadge.com)

This is my school project—a simple CRUD app to manage academic system info with a login system using hashed passwords.

## What It Does
A PHP & MySQLi app with these features:
1. **Login System**: Multiuser login with secure hashed passwords.
2. **CRUD**: Create, Read, Update, & Delete (Users / System Info).
3. **Roles**: 
   - `notsign` (guest)
   - `operator` (basic user)
   - `admin` (more control)
   - `superadmin` (full control)

### Extra Features
1. **Light & Dark Mode**: Switch themes.
2. **Alerts**: Pop-ups with SweetAlert2.
3. **Text Editor**: Edit text with CKEDITOR.

## Tools Used
- **PHP**: Runs the app.
- **MySQLi**: Connects to the database.
- **Bootstrap**: Makes it look good.
- **JavaScript**: Adds cool stuff.
- **MySQL**: Stores everything.

## What You Need
- [XAMPP](https://www.apachefriends.org/index.html).
- A browser (like Chrome).

## How to Set It Up
1. **Get the Files**:
   - Download this project from my GitHub.

2. **Set Up the Database**:
   - Start XAMPP (Apache and MySQL).
   - Go to `http://localhost/phpmyadmin`.
   - Import the `.sql` file from the `database` folder:
     - Click "Import," pick the file (e.g., `academycs_db.sql`), and upload it.

3. **Run It**:
   - Put the project folder in `C:/xampp/htdocs/` (e.g., `htdocs/system-info`).
   - Open your browser and go to `http://localhost/system-info`.
   - Log in with a user from the database (passwords are hashed!).

## How It Works
- **Login**: Use a username and password (hashed in the database).
- **Home**: See info based on your role.
- **CRUD**: Add, view, edit, or delete info/users (depends on your role).
- **Extras**: Switch themes, see alerts, use the text editor.

## Help
If it doesn’t work, ask my teacher or friends. It’s my first app!

---

### Notes:
- The "Files" section is removed as requested.
- I kept the setup steps exactly as you specified: import the `.sql` from the `database` folder and run XAMPP.
- Let me know if you need anything else adjusted!
