# Web Security / EITF05 

Instructions for generating the database from dump.sql if you have a xampp setup:
These instructions assume that **mysqladmin** is located in **xampp\mysql\bin\mysqladmin.exe** 
and mysqld in **xampp\mysql\bin\mysqld.exe**.
It also assumes that the root user is called "root" and the webshop folder is placed in 
**xampp\mysql\data\webshop**


## WARNING ##

**This will replace your current webshop database with the one created from dump.sql**

### Instructions ###
1. **move** dbgen.bat and dump.sql to your xampp folder.
2. open CMD and navigate to your **xampp** directory.
3. in CMD, type:  "dbgen.bat <password>", where <password> is your root password.
4. Lean back and enjoy, you should also be automatically logged in


### Generating a new dump.sql file ###
mysqldump -uroot -p[password] webshop > /path/to/file/dump.sql

outputs the dump.sql at the given path.
**Note**: No space character (' ') between -p and [password]