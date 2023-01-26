# Registration Management System

This project aims to create a simple and easy to use Registration Management System (RMS) for academic institutions. The RMS is built using **PHP, Apache Web Server, and MySQL database**. 

Users are divided into three roles: Administrator, Professor, and Student. Each role has different capabilities within the system.

 > **Note:** This project developed for MIS233 - Web Based Application Programming Course in Bogazici University.

### Administrators 
 - Register new users & courses, 
 - Change user status, 
 - Update their passwords, 
 - Set the system parameters, 
 - Get reports.

### Professors 
 - submit the grades of their students, 
 - Control their consent requests,
 - View detailed information about their courses
 - Update their passwords.

### Students 

 - Add or remove courses on their list, 
 - Ask for consent for courses, 
 - View detailed information about their courses
 - Update their passwords.


## Getting Started

To use this system, you will need to have a web server with PHP and an SQL database installed. Once you have those set up, you can import the SQL file included in the repository to create the necessary tables in the database. After that, you can customize the config.php file to match your server and database settings.

### Prerequisites
Web server with PHP
SQL database (e.g. MySQL)

## Installing
1. Clone the repository
2. Import the SQL file to your database
3. Customize the config.php file to match your server and database settings
4. Run the application on your web server

## Built With
- PHP
- Apache Web Server
- MySQL database
