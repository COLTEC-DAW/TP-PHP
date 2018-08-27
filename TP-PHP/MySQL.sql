CREATE DATABASE IF NOT EXISTS tpphp;

CREATE TABLE IF NOT EXISTS users(
  login VARCHAR(50) NOT NULL,
  password VARCHAR(50) NOT NULL,
  name VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  CONSTRAINT PK_users PRIMARY KEY (login)
);

CREATE TABLE IF NOT EXISTS events(
  id INT AUTO_INCREMENT NOT NULL,
  name VARCHAR(50) NOT NULL,
  description VARCHAR(300) NOT NULL,
  place VARCHAR(50) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  importance SMALLINT,
  CONSTRAINT PK_events PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS ingressos(
  users_login VARCHAR(50) NOT NULL,
  events_id INT NOT NULL,
  quantity INT NOT NULL,
  payment BOOLEAN NOT NULL,
  CONSTRAINT FK_ingressos_users FOREIGN KEY (users_login)
    REFERENCES users(login),
  CONSTRAINT FK_ingressos_events FOREIGN KEY (events_id)
    REFERENCES events(id),
  CONSTRAINT uq_ingressos UNIQUE(users_login, events_id)
);

CREATE USER IF NOT EXISTS 'admin'@'localhost' IDENTIFIED BY 'admin';
GRANT ALL PRIVILEGES ON tpphp.* TO 'admin'@'localhost';
FLUSH PRIVILEGES;

CREATE USER IF NOT EXISTS 'user'@'localhost' IDENTIFIED BY 'user';
GRANT SELECT, INSERT, UPDATE ON tpphp.* TO 'user'@'localhost';
FLUSH PRIVILEGES;
