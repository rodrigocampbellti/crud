
DROP DATABASE IF EXISTS application;
CREATE DATABASE application CHARACTER SET utf8 COLLATE utf8_general_ci;
USE application;

CREATE TABLE users (
   user_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
 user_name VARCHAR (200) NOT NULL,
 user_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 user_password VARCHAR (200) NOT NULL,
 user_email VARCHAR (200) NOT NULL,
user_birth DATE NOT NULL, 
 user_avatar VARCHAR (200) NOT NULL,
 user_bio TEXT,
  user_type ENUM('admin', 'author', 'moderator','user'),
  user_status ENUM('on', 'off', 'deleted') DEFAULT 'on') ;


INSERT INTO users(
    user_name,
    user_date,
    user_password,
    user_email,
    user_birth,
    user_avatar, 
    user_bio,
    user_type,
    user_status
) VALUES ('Fernanda da Silva', '2022-01-01', SHA1('12345_Qw'),'fulana@silva.com','1998-06-19', 'https://randomuser.me/api/portraits/women/58.jpg', 'comentadora, organizadora, enroladora e coach.', 'admin','on'
);
  INSERT INTO users   (
    user_name,
    user_date,
    user_password,
    user_email,
    user_birth,
    user_avatar, 
    user_bio,
    user_type,
    user_status
) VALUES ('Joao da Fernandes', '2021-03-01', SHA1('12354_Qw'),'joao@fefe.com','1990-05-10', 'https://randomuser.me/api/portraits/men/58.jpg', 'comentador', 'author','off'
);
 INSERT INTO users (
    user_name,
    user_date,
    user_password,
    user_email,
    user_birth,
    user_avatar, 
    user_bio,
    user_type,
    user_status
) VALUES ('Juvenildo Washington', '2022-02-11', SHA1('12489_Qw'),'juvenildo@shutmessage.com','1980-05-10', 'https://randomuser.me/api/portraits/men/58.jpg', 'enteressado no assunto', 'user','on'
);
 INSERT INTO users (
    user_name,
    user_date,
    user_password,
    user_email,
    user_birth,
    user_avatar, 
    user_bio,
    user_type,
    user_status
) VALUES ('Felipe Cardoso', '2022-05-06', SHA1('23467_Qw'),'felipecardoso@msgs.com','1992-06-08', 'https://randomuser.me/api/portraits/men/57.jpg', 'Pesquisador e divulgador', 'moderador','deleted'
);