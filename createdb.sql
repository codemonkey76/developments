create database developments;
create user 'developments'@'localhost' identified by 'secret';
grant all on developments.* to 'developments'@'localhost';
flush privileges;
