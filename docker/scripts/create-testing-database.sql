CREATE DATABASE IF NOT EXISTS testing;
CREATE USER IF NOT EXISTS 'test'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON testing.* TO 'test'@'%';
