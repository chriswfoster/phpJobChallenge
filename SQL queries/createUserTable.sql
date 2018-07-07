create table monkedia_users(
id int AUTO_INCREMENT primary key,
username varchar(100) UNIQUE,
password varchar(255),
email varchar(255)
)