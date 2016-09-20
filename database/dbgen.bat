mysqladmin -u root -p%1 shutdown
TIMEOUT 2
START /B mysqld
TIMEOUT 1
mysql -u root -p%1 -e "DROP DATABASE webshop; CREATE DATABASE webshop;"
mysql -u root -p%1 webshop < dump.sql
mysql -u root -p%1 -e "use webshop; SELECT * FROM users;"
mysql -u root -p%1 webshop 

