mysql\bin\mysqladmin.exe -u root -p%1 shutdown
TIMEOUT 3
START /B mysql\bin\mysqld.exe
mysql -u root -p%1 -e "DROP DATABASE webshop; CREATE DATABASE webshop;"
mysql -u root -p%1 webshop < dump.sql
mysql -u root -p%1 webshop 

