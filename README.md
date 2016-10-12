# Web Security / EITF05 
## Project Structure ##
In this project we have 2 different root folders. The regular root, which contains the finished webshop with protection against XSS, CSRF and SQL injection, and the unsecureroot, which contains a version susceptible to all attacks used for demonstration purposes. 

## Instructions for Database generation ##
Instructions for generating the database from dump.sql if you have a xampp setup:
These instructions assume that **mysqladmin** is located in **xampp\mysql\bin\mysqladmin.exe** 
and mysqld in **xampp\mysql\bin\mysqld.exe**.
It also assumes that the root user is called "root" and the webshop folder is placed in 
**xampp\mysql\data\webshop**


**It is important that your system has mysql as PATH variable, otherwise the commands will not work**
### WARNING ###

**This will replace your current webshop database with the one created from dump.sql**

###Step by step (for Windows with xampp):###
1. **Move** `dbgen.bat`, `dbgenpw.bat`,`dump.sql`, and `dumpgen.bat` to your xampp folder.
2. Open CMD and navigate to your **xampp** directory.
3. In CMD, type:  `dbgenpw.bat <password>`, where <password> is your root password. If no password 
exists, use `dbgen.bat` instead.
4. Lean back and enjoy, you should also be automatically logged in


## Generating a new dump.sql file ##
Alternative 1: `mysqldump -uroot -p[password] webshop > /path/to/file/dump.sql`

outputs the dump.sql at the given path.

**Note**: No space character (' ') between -p and [password]

Alternative 2: run `dumpgen.bat <password>` and `dump.sql` will be generated in the current folder.
If there is no root password, leave the password field empty.

## Cross Site Scripting ##
To perform a cross site scripting attack you could just insert something into the comment field. I used:
">\<script\>document.location="http://localhost/malicious/";\</script\> 
which simply redirects the user to the malicious website, which as of writing this just returns you to the original website, effectively creating a loop between the two sites, forcing a logout between. Whether or not that can be considered a valuable attack effort I leave for someone else to evaluate.
