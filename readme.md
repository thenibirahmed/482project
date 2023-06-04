# *** Traveling Management System ***

### Group 4
-------------------------------------------------------------
Github link: https://github.com/thenibirahmed/482project
live url: https://tms.nibirahmed.com/

Admin user credentials
------------------------
- Email: `admin@admin.com`
- Password: `admin`

User credentials
------------------------
- Email: `customer@customer.com`
- Password: `customer`


How to Deploy:
-------------------------

- Upload all files to xampp or any delevelopment environment
- Because of some complex structures in the code, a vhost (local domain) should be made in the development environement to make the code work perfectly
- Create a database
- Have to give the database credentials to three files
    - inc/connection.php
    - inc/config.php
    - db_connection.php
- Sample config.php is given below
- Import the sql file from the db directory
- The project should run perfectly

`inc/config.php`

```
$host = ‘localhost’; // or 127.0.0.1
$user = ‘root’;
$pass = ‘’;
$db = ‘482lab’;
```
### Thank You
